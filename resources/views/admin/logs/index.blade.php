@extends('layouts.admin.app')
@section('title', 'Admin | Daily Logs')

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">

    {{-- Flash Messages --}}
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        });
    </script>
    @endif

    <div class="mb-6 flex justify-between items-center flex-wrap">
        <div class="mb-2 md:mb-0">
            <h2 class="text-2xl font-bold text-gray-800">Daily Logs</h2>
            <p class="text-gray-600">Create and manage employee daily logs</p>
        </div>

        <div class="flex space-x-2">
            <form method="GET" class="flex space-x-2">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search logs..."
                    class="border rounded-md px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                <select name="status" class="border rounded-md px-3 py-2 text-sm">
                    <option value="">All status</option>
                    <option value="0" {{ (string)($statusFilter ?? '' )==='0' ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ ($statusFilter ?? '' )==='1' ? 'selected' : '' }}>In Progress</option>
                    <option value="2" {{ ($statusFilter ?? '' )==='2' ? 'selected' : '' }}>Completed</option>
                </select>
                <button type="submit" class="px-3 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <button id="new-log-button"
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                <i class="fas fa-plus mr-1"></i> New Log
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-2 sm:px-6 border-b border-gray-200 flex justify-between">
            <h3 class="text-lg font-medium text-gray-900">Log List</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Employee</th>
                        <th class="px-4 py-2">Priority</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Hours</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($logs as $index => $log)
                    <tr data-id="{{ $log->id }}">
                        <td class="px-4 py-2">{{ $logs->firstItem() + $index }}</td>
                        <td class="px-4 py-2 font-semibold text-gray-800">{{ $log->title ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $log->employee?->user?->name ?? '-' }}</td>

                        <!-- Inline priority select -->
                        <td class="px-4 py-2 text-gray-600">
                            <select class="inline-priority-select border rounded px-2 py-1 text-sm"
                                data-id="{{ $log->id }}">
                                <option value="">--</option>
                                @foreach($priorities as $p)
                                <option value="{{ $p->id }}" {{ $log->priority_id == $p->id ? 'selected' : '' }}>
                                    {{ $p->name }}
                                </option>
                                @endforeach
                            </select>
                        </td>

                        <!-- Inline status select -->
                        <td class="px-4 py-2">
                            <select class="inline-status-select border rounded px-2 py-1 text-sm"
                                data-id="{{ $log->id }}">
                                <option value="0" {{ $log->status == 0 ? 'selected' : '' }}>Pending</option>
                                <option value="1" {{ $log->status == 1 ? 'selected' : '' }}>In Progress</option>
                                <option value="2" {{ $log->status == 2 ? 'selected' : '' }}>Completed</option>
                            </select>
                        </td>

                        <td class="px-4 py-2">{{ $log->hours_spent ?? number_format($log->computed_hours ?? 0, 2) }} hrs
                        </td>

                        <td class="px-4 py-2 flex space-x-2">
                            <button class="view-btn text-gray-600 hover:text-gray-900" data-id="{{ $log->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="edit-btn text-indigo-600 hover:text-indigo-800" data-id="{{ $log->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" action="{{ url("admin/logs/{$log->id}") }}" class="inline delete-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No logs found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-4 py-4 bg-gray-50">
            {{ $logs->onEachSide(1)->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div id="log-modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

        <!-- Modal content -->
        <div class="bg-white rounded-2xl shadow-2xl transform transition-all max-w-2xl w-full p-6 relative z-20">
            <!-- Close Button -->
            <button type="button" id="close-modal-btn"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Modal Title -->
            <h3 class="text-2xl font-semibold text-gray-900 mb-4" id="modal-title">New Log</h3>

            <!-- Form -->
            <form id="log-form" method="POST" action="{{ route('logs.store') }}">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">
                <input type="hidden" name="log_id" id="log-id">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Employee</label>
                        <input type="hidden" name="employee_id" id="employee_id">
                        <input type="text" id="employee_search" placeholder="Search employee by name or email"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2" autocomplete="off">
                        <div id="employee_suggestions"
                            class="bg-white border mt-1 rounded-lg shadow max-h-44 overflow-auto hidden"></div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
                        <select name="priority_id" id="priority_id"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="">Select Priority</option>
                            @foreach($priorities as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" id="log-title"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="log-desc" rows="6"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
                    </div>

                    {{-- <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status_select"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2">
                            <option value="0">Pending</option>
                            <option value="1">In Progress</option>
                            <option value="2">Completed</option>
                        </select>
                    </div> --}}
                    <div class="mb-4">
                        <label for="status_select" class="block text-sm font-semibold text-gray-800 mb-2">
                            Status
                        </label>
                        <select name="status" id="status_select"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-2 text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:outline-none transition ease-in-out duration-200">
                            <option value="0" class="text-gray-600"> Pending</option>
                            <option value="1" class="text-blue-600"> In Progress</option>
                            <option value="2" class="text-green-600"> Completed</option>
                        </select>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" id="cancel-btn"
                        class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition font-medium">Cancel</button>
                    <button type="submit" id="save-btn"
                        class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('log-modal');
    const newBtn = document.getElementById('new-log-button');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const form = document.getElementById('log-form');
    const modalTitle = document.getElementById('modal-title');
    const methodInput = document.getElementById('form-method');
    const logIdInput = document.getElementById('log-id');

    const titleInput = document.getElementById('log-title');
    const descInput = document.getElementById('log-desc');
    const employeeSearch = document.getElementById('employee_search');
    const employeeHidden = document.getElementById('employee_id');
    const employeeSuggestions = document.getElementById('employee_suggestions');
    const prioritySelect = document.getElementById('priority_id');
    const statusSelect = document.getElementById('status_select');

    function openModal() { modal.classList.remove('hidden'); }
    function closeModal() { modal.classList.add('hidden'); }

    if (newBtn) {
        newBtn.addEventListener('click', () => {
            modalTitle.innerText = 'New Log';
            form.action = "{{ route('logs.store') }}";
            methodInput.value = 'POST';
            logIdInput.value = '';
            titleInput.value = '';
            descInput.value = '';
            employeeHidden.value = '';
            employeeSearch.value = '';
            prioritySelect.value = '';
            statusSelect.value = '0';
            document.getElementById('save-btn').style.display = '';
            Array.from(form.elements).forEach(el => el.disabled = false);
            openModal();
        });
    }

    cancelBtn.addEventListener('click', closeModal);
    closeBtn.addEventListener('click', closeModal);

    async function loadLogIntoModal(id, forView = false) {
        try {
            const res = await fetch(`{{ url('admin/logs') }}/${id}`, { headers: {'Accept': 'application/json'} });
            if (!res.ok) throw new Error('Failed to load');
            const log = await res.json();

            modalTitle.innerText = forView ? 'View Log' : 'Edit Log';
            form.action = forView ? '#' : `{{ url('admin/logs') }}/${log.id}`;
            methodInput.value = forView ? 'GET' : 'PUT';
            logIdInput.value = log.id;

            titleInput.value = log.title ?? '';
            descInput.value = log.description ?? '';
            employeeHidden.value = log.employee_id ?? '';
            employeeSearch.value = log.employee ? `${log.employee.user.name} <${log.employee.user.email}>` : '';
            prioritySelect.value = log.priority_id ?? '';
            statusSelect.value = log.status ?? 0;

            if (forView) {
                document.getElementById('save-btn').style.display = 'none';
                Array.from(form.elements).forEach(el => el.disabled = true);
                cancelBtn.disabled = false;
            } else {
                document.getElementById('save-btn').style.display = '';
                Array.from(form.elements).forEach(el => el.disabled = false);
            }

            openModal();
        } catch (err) {
            Swal.fire('Error', 'Unable to load log details', 'error');
        }
    }

    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', () => loadLogIntoModal(btn.dataset.id, true));
    });

    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', () => loadLogIntoModal(btn.dataset.id, false));
    });

    // Delete confirm
    document.querySelectorAll('.delete-form').forEach(f => {
        f.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) f.submit();
            });
        });
    });

    function debounce(fn, delay=300) {
        let t;
        return function(...args) {
            clearTimeout(t);
            t = setTimeout(() => fn.apply(this, args), delay);
        };
    }

    async function searchEmployees(q) {
        if (!q) return [];
        const url = new URL("{{ route('employees.search') }}", location.origin);
        url.searchParams.set('q', q);
        const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
        if (!res.ok) return [];
        return await res.json();
    }

    function showSuggestions(container, items) {
        container.innerHTML = '';
        if (!items.length) {
            container.classList.add('hidden');
            return;
        }
        items.forEach(it => {
            const div = document.createElement('div');
            div.className = 'px-3 py-2 cursor-pointer hover:bg-gray-100';
            div.innerText = `${it.name} (${it.email})`;
            div.dataset.id = it.id;
            container.appendChild(div);
        });
        container.classList.remove('hidden');
    }

    employeeSearch.addEventListener('input', debounce(async () => {
        const items = await searchEmployees(employeeSearch.value);
        showSuggestions(employeeSuggestions, items);
    }));

    employeeSuggestions.addEventListener('click', e => {
        if (e.target.dataset.id) {
            employeeHidden.value = e.target.dataset.id;
            employeeSearch.value = e.target.innerText;
            employeeSuggestions.classList.add('hidden');
        }
    });

    // Inline priority change
    document.querySelectorAll('.inline-priority-select').forEach(sel => {
        sel.addEventListener('change', async (e) => {
            const id = e.target.dataset.id;
            const priority_id = e.target.value;
            try {
                const res = await fetch(`{{ url('admin/logs') }}/${id}/priority`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ priority_id })
                });
                if (!res.ok) throw new Error('Failed to update priority');
                await res.json();
                Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: 'Priority updated', timer:1500, showConfirmButton:false });
            } catch (err) {
                Swal.fire('Error', 'Unable to update priority', 'error');
            }
        });
    });

    // Inline status change
    document.querySelectorAll('.inline-status-select').forEach(sel => {
        sel.addEventListener('change', async (e) => {
            const id = e.target.dataset.id;
            const status = e.target.value;
            try {
                const res = await fetch(`{{ url('admin/logs') }}/${id}/status`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ status })
                });
                if (!res.ok) throw new Error('Failed to update status');
                await res.json();
                Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: 'Status updated', timer:1500, showConfirmButton:false });
            } catch (err) {
                Swal.fire('Error', 'Unable to update status', 'error');
            }
        });
    });

});
</script>
@endpush