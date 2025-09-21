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
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Changes</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">IP Address</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Location</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Date</th>
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
                        <td class="px-4 py-2">
                            @if($log->old_values || $log->new_values)
                                <button onclick="toggleDetails({{ $log->id }})"
                                    class="text-indigo-600 hover:underline text-sm">
                                    View Changes
                                </button>
                                <div id="changes-{{ $log->id }}" class="hidden mt-2 text-xs bg-gray-50 p-2 rounded border">
                                    @if($log->old_values)
                                        <p class="font-semibold text-red-600">Old:</p>
                                        <pre class="whitespace-pre-wrap">{{ json_encode($log->old_values, JSON_PRETTY_PRINT) }}</pre>
                                    @endif
                                    @if($log->new_values)
                                        <p class="font-semibold text-green-600 mt-2">New:</p>
                                        <pre class="whitespace-pre-wrap">{{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}</pre>
                                    @endif
                                </div>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->ip_address ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->location ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->created_at->format('d M Y, H:i') }}</td>
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

<script>
    function toggleDetails(id) {
        const el = document.getElementById('changes-' + id);
        el.classList.toggle('hidden');
    }
</script>
@endsection
