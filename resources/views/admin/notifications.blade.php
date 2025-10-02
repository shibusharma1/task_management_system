@extends('layouts.admin.app')
@section('title', 'Notifications')

@section('contents')
<div class="min-h-[calc(100vh-2rem)] p-4 bg-gray-50 overflow-y-auto">
    <div class="bg-white rounded-xl shadow-md max-w-5xl w-full mx-auto">

        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Notifications</h2>
            <p class="text-sm text-gray-500 mt-1">All your recent notifications are listed below</p>
        </div>

        <!-- Notifications Section -->
        <div class="p-6 space-y-6" id="notificationList">
            @forelse($notifications as $n)
                <div class="border rounded-lg p-4 flex items-start gap-4 relative notification-item {{ $n->is_read ? '' : 'unread' }}" data-id="{{ $n->id }}">
                    {{-- Unread indicator --}}
                    @if(!$n->is_read)
                        <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                    @endif

                    {{-- Icon --}}
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                        @switch($n->type)
                            @case('task_assigned')
                                <i class="fas fa-tasks text-gray-500 text-lg"></i>
                                @break
                            @case('project_assigned')
                                <i class="fas fa-project-diagram text-gray-500 text-lg"></i>
                                @break
                            @case('comment')
                                <i class="fas fa-comment text-gray-500 text-lg"></i>
                                @break
                            @case('login')
                            @case('password_change')
                                <i class="fas fa-user-shield text-gray-500 text-lg"></i>
                                @break
                            @default
                                <i class="fas fa-bell text-gray-500 text-lg"></i>
                        @endswitch
                    </div>

                    {{-- Content --}}
                    <div class="flex-1">
                        <p class="text-sm text-gray-700">
                            <span class="font-medium">{{ $n->extra_data['from'] ?? 'System' }}</span>
                            {!! nl2br(e($n->message)) !!}
                        </p>

                        {{-- Extra data --}}
                        @if(!empty($n->extra_data))
                            <p class="text-xs text-gray-500 mt-1">
                                @foreach($n->extra_data as $key => $value)
                                    <span class="mr-2">
                                        <strong>{{ ucfirst($key) }}:</strong>
                                        {{ is_array($value) ? json_encode($value) : e($value) }}
                                    </span>
                                @endforeach
                            </p>
                        @endif

                        {{-- Timestamp --}}
                        <p class="text-xs text-gray-400 mt-1">{{ $n->created_at->diffForHumans() }}</p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-col gap-1">
                        {{-- View (opens modal with details) --}}
                        <button class="text-blue-600 text-sm hover:underline view-notification-btn" data-id="{{ $n->id }}">
                            View
                        </button>

                        {{-- Link to related model if route exists --}}
                        @php
                            $relatedRoute = null;
                            if($n->related) {
                                $relatedType = class_basename($n->related_type);
                                if ($relatedType === 'Task' && $n->related?->id) {
                                    $relatedRoute = route('tasks.show', $n->related->id);
                                } elseif ($relatedType === 'Project' && $n->related?->id) {
                                    $relatedRoute = route('projects.show', $n->related->id);
                                } elseif ($relatedType === 'Comment' && $n->related?->id) {
                                    $relatedRoute = route('comments.show', $n->related->id);
                                }
                            }
                        @endphp

                        @if($relatedRoute)
                            {{-- <a href="{{ $relatedRoute }}" class="text-blue-600 text-sm hover:underline">Open {{ class_basename($n->related_type) }}</a> --}}
                        @endif

                        {{-- Mark as Read --}}
                        @if(!$n->is_read)
                            <button class="text-xs text-gray-500 hover:underline mark-read-btn" data-id="{{ $n->id }}">Mark as Read</button>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No notifications available.</p>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t">
            <div class="max-w-5xl mx-auto">
                {{ $notifications->links() }}
            </div>
        </div>

    </div>
</div>

<!-- Modal (hidden by default) -->
<div id="notificationModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl mx-4 overflow-hidden">
        <div class="flex items-center justify-between px-6 py-4 border-b">
            <h3 id="modalTitle" class="text-lg font-semibold text-gray-800">Notification</h3>
            <button id="modalClose" class="text-gray-500 hover:text-gray-800">&times;</button>
        </div>

        <div class="p-6" id="modalBody">
            <p id="modalMessage" class="text-sm text-gray-700"></p>

            <div id="modalExtra" class="mt-4 text-xs text-gray-500"></div>

            <div class="mt-6 flex items-center justify-end gap-3">
                <a id="modalOpenRelated" class="text-blue-600 text-xsm hover:underline hidden" href="#" target="_blank">Open Related</a>
                <button id="modalMarkRead" class="px-3 py-2 bg-blue-600 text-white rounded text-sm hidden">Mark as Read</button>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", () => {
    const csrfToken = '{{ csrf_token() }}';

    // helper - show modal
    function showModal(data) {
        const modal = document.getElementById('notificationModal');
        document.getElementById('modalTitle').textContent = data.title || 'Notification';
        document.getElementById('modalMessage').innerHTML = data.message ? (data.message.replace(/\n/g, '<br>')) : '';
        
        // extra data
        const extraEl = document.getElementById('modalExtra');
        extraEl.innerHTML = '';
        if (data.extra_data && Object.keys(data.extra_data).length) {
            let html = '<ul class="list-disc pl-5">';
            for (const [k, v] of Object.entries(data.extra_data)) {
                html += `<li><strong>${k.charAt(0).toUpperCase()+k.slice(1)}:</strong> ${Array.isArray(v) ? JSON.stringify(v) : v}</li>`;
            }
            html += '</ul>';
            extraEl.innerHTML = html;
        }

        // related link
        const openRelated = document.getElementById('modalOpenRelated');
        if (data.related_route) {
            openRelated.href = data.related_route;
            openRelated.classList.remove('hidden');
        } else {
            openRelated.classList.add('hidden');
        }

        // mark read button
        const modalMarkRead = document.getElementById('modalMarkRead');
        if (!data.is_read) {
            modalMarkRead.dataset.id = data.id;
            modalMarkRead.classList.remove('hidden');
        } else {
            modalMarkRead.classList.add('hidden');
        }

        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    // helper - hide modal
    function hideModal() {
        const modal = document.getElementById('notificationModal');
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }

    // click view -> fetch JSON -> show modal and optionally mark read on open
    document.querySelectorAll('.view-notification-btn').forEach(btn => {
        btn.addEventListener('click', async (e) => {
            const id = btn.dataset.id;
            if (! id) return;

            try {
                const res = await fetch(`/admin/notifications/${id}`, {
                    headers: { 'Accept': 'application/json' },
                });
                if (! res.ok) throw new Error('Failed to fetch');

                const data = await res.json();
                showModal(data);
            } catch (err) {
                console.error('Failed to load notification:', err);
                alert('Unable to load notification details.');
            }
        });
    });

    // modal close
    document.getElementById('modalClose').addEventListener('click', hideModal);

    // mark-as-read from list buttons
    document.querySelectorAll('.mark-read-btn').forEach(btn => {
        btn.addEventListener('click', async (e) => {
            const id = btn.dataset.id;
            if(!id) return;
            try {
                const res = await fetch(`/admin/notifications/${id}/mark-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                });
                if (! res.ok) throw new Error('Failed');

                // update UI
                const item = document.querySelector(`.notification-item[data-id="${id}"]`);
                if (item) {
                    item.classList.remove('unread');
                    const dot = item.querySelector('span.absolute');
                    if (dot) dot.remove();
                    const markBtn = item.querySelector('.mark-read-btn');
                    if (markBtn) markBtn.remove();
                    item.classList.add('bg-gray-50');
                }
            } catch (err) {
                console.error(err);
                alert('Unable to mark notification as read.');
            }
        });
    });

    // mark-as-read from modal
    document.getElementById('modalMarkRead').addEventListener('click', async function () {
        const id = this.dataset.id;
        if(!id) return;
        try {
            const res = await fetch(`/admin/notifications/${id}/mark-read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
            });
            if (! res.ok) throw new Error('Failed');

            // update modal UI and list UI
            this.classList.add('hidden');
            // update list item
            const item = document.querySelector(`.notification-item[data-id="${id}"]`);
            if (item) {
                item.classList.remove('unread');
                const dot = item.querySelector('span.absolute');
                if (dot) dot.remove();
                const markBtn = item.querySelector('.mark-read-btn');
                if (markBtn) markBtn.remove();
                item.classList.add('bg-gray-50');
            }
        } catch (err) {
            console.error(err);
            alert('Unable to mark as read.');
        }
    });

    // click outside modal to close
    document.getElementById('notificationModal').addEventListener('click', (e) => {
        if (e.target.id === 'notificationModal') hideModal();
    });
});
</script>
@endpush

@endsection
