@extends('layouts.admin.app')
@section('title', 'Admin | Task Management')

@push('styles')
<!-- add any page-specific styles here -->
@endpush

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
            <h2 class="text-2xl font-bold text-gray-800">Task Management</h2>
            <p class="text-gray-600">Manage tasks, priorities, categories and assignments</p>
        </div>

        <div class="flex space-x-2">
            <form method="GET" class="flex space-x-2">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search tasks..."
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

            <button id="new-task-button"
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                <i class="fas fa-plus mr-1"></i> New Task
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200 flex justify-between">
            <h3 class="text-lg font-medium text-gray-900">Task List</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Task</th>
                        <th class="px-4 py-2">Category</th>
                        <th class="px-4 py-2">Priority</th>
                        <th class="px-4 py-2">Assignee</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($tasks as $index => $task)
                    <tr>
                        <td class="px-4 py-2">{{ $tasks->firstItem() + $index }}</td>
                        <td class="px-4 py-2 font-semibold text-gray-800">{{ $task->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $task->category->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $task->priority->name ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $task->assignee?->name ?? '-' }}</td>
                        <td class="px-4 py-2">
                            @if($task->status == 0)
                            <span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">Pending</span>
                            @elseif($task->status == 1)
                            <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-800">In Progress</span>
                            @else
                            <span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Completed</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 flex space-x-2">
                            <button class="view-btn text-gray-600 hover:text-gray-900" data-id="{{ $task->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="edit-btn text-indigo-600 hover:text-indigo-800" data-id="{{ $task->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" action="{{ route('tasks.destroy', $task) }}" class="inline delete-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No tasks found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-4 py-4 bg-gray-50">
            {{ $tasks->onEachSide(1)->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div id="task-modal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>

        <!-- Modal content -->
        <div class="bg-white rounded-2xl shadow-2xl transform transition-all max-w-2xl w-full p-8 relative z-20">
            <!-- Close Button -->
            <button type="button" id="close-modal-btn"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-times text-xl"></i>
            </button>

            <!-- Modal Title -->
            <h3 class="text-2xl font-semibold text-gray-900 mb-6" id="modal-title">New Task</h3>

            <!-- Form -->
            <form id="task-form" method="POST" class="space-y-6" action="{{ route('tasks.store') }}">
                @csrf
                <input type="hidden" name="_method" id="form-method" value="POST">
                <input type="hidden" name="task_id" id="task-id">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="task_category_id" id="task_category_id" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2
                                       focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Priority -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
                        <select name="priority_id" id="priority_id" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2
                                       focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                            <option value="">-- Select Priority --</option>
                            @foreach($priorities as $p)
                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Task Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Task Name</label>
                        <input type="text" name="name" id="task-name" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2
                             focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                    </div>

                    <!-- Due Date -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                        <input type="date" name="due_date" id="due_date" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2
                                    focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="description" id="task-desc" rows="4"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2
                                         focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition"></textarea>
                    </div>

                    <!-- Assignee Search -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Assign To</label>
                        <input type="hidden" name="assigned_to" id="assigned_to">
                        <input type="text" id="assigned_to_search" placeholder="Search user by name or email" class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2
                                      focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition">
                        <div id="assigned_to_suggestions"
                            class="bg-white border mt-1 rounded-lg shadow max-h-48 overflow-auto hidden"></div>
                    </div>

                    <!-- Assigned By -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Assigned By</label>
                        <input type="text" value="{{ auth()->user()->name }}"
                            class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100" readonly>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" id="cancel-btn"
                        class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300 transition font-medium">
                        Cancel
                    </button>
                    <button type="submit" id="save-btn"
                        class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition font-medium">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('task-modal');
    const newBtn = document.getElementById('new-task-button');
    const closeBtn = document.getElementById('close-modal-btn');
    const cancelBtn = document.getElementById('cancel-btn');
    const form = document.getElementById('task-form');
    const modalTitle = document.getElementById('modal-title');
    const methodInput = document.getElementById('form-method');
    const taskIdInput = document.getElementById('task-id');

    // inputs
    const nameInput = document.getElementById('task-name');
    const descInput = document.getElementById('task-desc');
    const categorySelect = document.getElementById('task_category_id');
    const prioritySelect = document.getElementById('priority_id');
    const assignedToSearch = document.getElementById('assigned_to_search');
    const assignedToHidden = document.getElementById('assigned_to');
    const assignedToSuggestions = document.getElementById('assigned_to_suggestions');
    const dueDateInput = document.getElementById('due_date');

    function openModal() { modal.classList.remove('hidden'); }
    function closeModal() { modal.classList.add('hidden'); }

    // open modal for create
    if (newBtn) {
        newBtn.addEventListener('click', () => {
            modalTitle.innerText = 'New Task';
            form.action = "{{ route('tasks.store') }}";
            methodInput.value = 'POST';
            taskIdInput.value = '';
            nameInput.value = '';
            descInput.value = '';
            categorySelect.value = '';
            prioritySelect.value = '';
            assignedToHidden.value = '';
            assignedToSearch.value = '';
            dueDateInput.value = '';
            openModal();
        });
    }

    cancelBtn.addEventListener('click', closeModal);
    closeBtn.addEventListener('click', closeModal);

    // handle view buttons
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.dataset.id;
            try {
                const res = await fetch(`{{ url('admin/tasks') }}/${id}`, { headers: { 'Accept': 'application/json' } });
                if (!res.ok) throw new Error('Failed to load');
                const task = await res.json();

                modalTitle.innerText = 'View Task';
                form.action = '#';
                methodInput.value = 'GET';
                taskIdInput.value = task.id;
                nameInput.value = task.name ?? '';
                descInput.value = task.description ?? '';
                categorySelect.value = task.task_category_id ?? '';
                prioritySelect.value = task.priority_id ?? '';
                assignedToHidden.value = task.assigned_to ?? '';
                assignedToSearch.value = task.assignee ? `${task.assignee.name} <${task.assignee.email}>` : '';
                dueDateInput.value = task.due_date ?? '';


                Array.from(form.elements).forEach(el => el.disabled = true);
                cancelBtn.disabled = false;
                openModal();
            } catch (err) {
                Swal.fire('Error', 'Unable to load task details', 'error');
            }
        });
    });

    // handle edit buttons
    document.querySelectorAll('.edit-btn').forEach(btn => {
        btn.addEventListener('click', async () => {
            const id = btn.dataset.id;
            try {
                const res = await fetch(`{{ url('admin/tasks') }}/${id}`, { headers: { 'Accept': 'application/json' } });
                if (!res.ok) throw new Error('Failed to load');
                const task = await res.json();

                modalTitle.innerText = 'Edit Task';
                form.action = `{{ url('admin/tasks') }}/${task.id}`;
                methodInput.value = 'PUT';
                taskIdInput.value = task.id;
                nameInput.value = task.name ?? '';
                descInput.value = task.description ?? '';
                categorySelect.value = task.task_category_id ?? '';
                prioritySelect.value = task.priority_id ?? '';
                assignedToHidden.value = task.assigned_to ?? '';
                assignedToSearch.value = task.assignee ? `${task.assignee.name} <${task.assignee.email}>` : '';
                    dueDateInput.value = task.due_date ?? '';


                Array.from(form.elements).forEach(el => el.disabled = false);
                openModal();
            } catch (err) {
                Swal.fire('Error', 'Unable to load task details', 'error');
            }
        });
    });

    // Delete confirmation
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

    // Debounce helper
    function debounce(fn, delay=300) {
        let t;
        return function(...args) {
            clearTimeout(t);
            t = setTimeout(() => fn.apply(this, args), delay);
        };
    }

    // AJAX user search
    async function searchUsers(q) {
        if (!q) return [];
        const url = new URL("{{ route('users.search') }}", location.origin);
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
        items.forEach(user => {
            const div = document.createElement('div');
            div.className = 'px-3 py-2 cursor-pointer hover:bg-gray-100';
            div.innerText = `${user.name} (${user.email})`;
            div.dataset.id = user.id;
            container.appendChild(div);
        });
        container.classList.remove('hidden');
    }

    assignedToSearch.addEventListener('input', debounce(async () => {
        const users = await searchUsers(assignedToSearch.value);
        showSuggestions(assignedToSuggestions, users);
    }));

    assignedToSuggestions.addEventListener('click', e => {
        if (e.target.dataset.id) {
            assignedToHidden.value = e.target.dataset.id;
            assignedToSearch.value = e.target.innerText;
            assignedToSuggestions.classList.add('hidden');
        }
    });
});
</script>
@endpush
