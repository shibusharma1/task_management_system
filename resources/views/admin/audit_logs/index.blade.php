@extends('layouts.admin.app')
@section('title', 'Admin | Audit Logs')

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div class="mb-6 flex justify-between items-center flex-wrap">
        <div class="mb-2 md:mb-0">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <i class="fas fa-history text-indigo-600 mr-2"></i> Audit Logs
            </h2>
            <p class="text-gray-600">Track user activities, changes, and system operations</p>
        </div>
        <div class="flex space-x-2">
            <form method="GET" class="flex space-x-2">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search logs..."
                    class="border rounded-md px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                <button type="submit" class="px-3 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200 flex justify-between">
            <h3 class="text-lg font-medium text-gray-900">Audit Log Records</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">#</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">User</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Action</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Model</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">IP Address</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Location</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Date</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Changes</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($logs as $index => $log)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $logs->firstItem() + $index }}</td>
                        <td class="px-4 py-2">
                            {{ $log->user->name ?? 'System' }}
                            <p class="text-xs text-gray-500">{{ $log->user->email ?? '' }}</p>
                        </td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded text-xs font-medium 
                                @if($log->action === 'create') bg-green-100 text-green-700 
                                @elseif($log->action === 'update') bg-yellow-100 text-yellow-700 
                                @elseif($log->action === 'delete') bg-red-100 text-red-700 
                                @else bg-gray-100 text-gray-700 @endif">
                                {{ ucfirst($log->action) }}
                            </span>
                        </td>
                        <td class="px-4 py-2 text-gray-600">
                            {{ class_basename($log->auditable_type) }} (ID: {{ $log->auditable_id }})
                        </td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->ip_address ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->location ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-4 py-2">
                            @if($log->old_values || $log->new_values)
                                <button data-id="{{ $log->id }}"
                                    class="view-btn text-indigo-600 hover:underline text-sm">
                                    View Changes
                                </button>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-4 text-center text-gray-500">No audit logs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-4 py-4 bg-gray-50">
            {{ $logs->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Audit Log Modal -->
<div id="audit-modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

        <!-- Modal content -->
        <div class="bg-white rounded-2xl shadow-2xl transform transition-all max-w-2xl w-full p-8 relative z-20">
            <!-- Close Button -->
            <button type="button" id="close-audit-modal"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Modal Title -->
            <h3 class="text-2xl font-semibold text-gray-900 mb-6">Audit Log Details</h3>

            <!-- Audit Info -->
            <div class="grid grid-cols-2 gap-4 mb-6 text-sm text-gray-700">
                <div>
                    <label class="font-medium text-gray-500">Username</label>
                    <input type="text" id="audit-username" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
                </div>
                <div>
                    <label class="font-medium text-gray-500">Action</label>
                    <input type="text" id="audit-action" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
                </div>
                <div>
                    <label class="font-medium text-gray-500">Audit Table</label>
                    <input type="text" id="audit-table" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
                </div>
                <div>
                    <label class="font-medium text-gray-500">Modified At</label>
                    <input type="text" id="audit-timestamp" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
                </div>
            </div>

            <!-- Old / New Values -->
            <div id="audit-changes" class="grid grid-cols-2 gap-4 max-h-96 overflow-y-auto mb-6 text-sm">
                <!-- Dynamically injected form-like old/new values -->
            </div>

            <!-- Buttons -->
            <div class="flex justify-end">
                <button type="button" id="audit-cancel-btn"
                    class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition font-medium">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>



<script>
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const auditModal = document.getElementById('audit-modal');
            const auditUsername = document.getElementById('audit-username');
            const auditAction = document.getElementById('audit-action');
            const auditTable = document.getElementById('audit-table');
            const auditTimestamp = document.getElementById('audit-timestamp');
            const auditChanges = document.getElementById('audit-changes');

            auditUsername.value = btn.dataset.user;
            auditAction.value = btn.dataset.action;
            auditTable.value = btn.dataset.table;
            auditTimestamp.value = btn.dataset.timestamp;

            const oldValues = JSON.parse(btn.dataset.old || '{}');
            const newValues = JSON.parse(btn.dataset.new || '{}');

            let html = '';
            const allKeys = Array.from(new Set([...Object.keys(oldValues), ...Object.keys(newValues)]));
            allKeys.forEach(key => {
                const oldVal = oldValues[key] ?? '';
                const newVal = newValues[key] ?? '';

                html += `
                    <div class="mb-2">
                        <label class="block text-xs font-medium text-gray-500">${key} (Old)</label>
                        <input type="text" class="mt-1 block w-full border rounded px-2 py-1 text-sm text-red-600 bg-gray-50" value="${oldVal}" readonly>
                    </div>
                    <div class="mb-2">
                        <label class="block text-xs font-medium text-gray-500">${key} (New)</label>
                        <input type="text" class="mt-1 block w-full border rounded px-2 py-1 text-sm text-green-600 bg-gray-50" value="${newVal}" readonly>
                    </div>
                `;
            });

            auditChanges.innerHTML = html || '<p class="text-gray-400">No changes recorded.</p>';
            auditModal.classList.remove('hidden');
        });
    });

    // Close modal
    document.getElementById('close-audit-modal').addEventListener('click', () => {
        document.getElementById('audit-modal').classList.add('hidden');
    });
    document.getElementById('audit-cancel-btn').addEventListener('click', () => {
        document.getElementById('audit-modal').classList.add('hidden');
    });


</script>
@endsection
