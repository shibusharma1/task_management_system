@extends('layouts.admin.app')
@section('title', 'Admin | Institution Setup')

@push('styles')
@endpush

@section('contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div class="mb-6 flex justify-between items-center flex-wrap">
        <div class="mb-2 md:mb-0">
            <h2 class="text-2xl font-bold text-gray-800">Institution Setup</h2>
            <p class="text-gray-600">Manage client institutions and details</p>
        </div>
        <div class="flex space-x-2">
            <form method="GET" class="flex space-x-2">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search institutions..."
                    class="border rounded-md px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500">
                <button type="submit" class="px-3 py-2 bg-gray-100 text-sm rounded hover:bg-gray-200">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button id="new-institution-button"
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none"
                disabled>
                <i class="fas fa-plus mr-1"></i> New Institution
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200 flex justify-between">
            <h3 class="text-lg font-medium text-gray-900">Institution List</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">#</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Client ID</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Name</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Phone</th>
                        <th class="px-4 py-2 text-left font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($institutions as $index => $institution)
                    <tr>
                        <td class="px-4 py-2">{{ $institutions->firstItem() + $index }}</td>
                        <td class="px-4 py-2 font-semibold text-gray-800">{{ $institution->client_id }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $institution->name }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $institution->email ?? '-' }}</td>
                        <td class="px-4 py-2 text-gray-600">{{ $institution->phone ?? '-' }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <button class="edit-btn text-indigo-600 hover:text-indigo-800"
                                data-id="{{ $institution->id }}" data-client="{{ $institution->client_id }}"
                                data-name="{{ $institution->name }}" data-email="{{ $institution->email }}"
                                data-phone="{{ $institution->phone }}" data-address="{{ $institution->address }}"
                                data-website="{{ $institution->website }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" action="{{ route('settings.institutions.destroy', $institution) }}"
                                class="inline delete-form">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No institutions found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-4 py-4 bg-gray-50">
            {{ $institutions->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div id="institution-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
        <div class="bg-white rounded-lg shadow-xl transform transition-all max-w-lg w-full p-6 relative">
            <button type="button" id="close-modal-btn" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
                <i class="fas fa-times text-lg"></i>
            </button>
            <h3 class="text-lg font-medium text-gray-900 mb-4" id="modal-title">New Institution</h3>
            <form id="institution-form" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" id="form-method" name="_method" value="POST">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Client ID</label>
                    <input type="text" name="client_id" id="institution-client"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Institution Name</label>
                    <input type="text" name="name" id="institution-name"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="institution-email"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="institution-phone"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <textarea name="address" id="institution-address"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Website</label>
                    <input type="url" name="website" id="institution-website"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="cancel-btn"
                        class="px-4 py-2 bg-gray-200 rounded-md hover:bg-gray-300">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('institution-modal');
        const newBtn = document.getElementById('new-institution-button');
        const cancelBtn = document.getElementById('cancel-btn');
        const closeBtn = document.getElementById('close-modal-btn');
        const form = document.getElementById('institution-form');
        const modalTitle = document.getElementById('modal-title');
        const methodInput = document.getElementById('form-method');

        const clientInput = document.getElementById('institution-client');
        const nameInput = document.getElementById('institution-name');
        const emailInput = document.getElementById('institution-email');
        const phoneInput = document.getElementById('institution-phone');
        const addressInput = document.getElementById('institution-address');
        const websiteInput = document.getElementById('institution-website');

        // Open modal for create
        newBtn.addEventListener('click', () => {
            modalTitle.innerText = 'New Institution';
            form.action = "{{ route('settings.institutions.store') }}";
            methodInput.value = 'POST';
            clientInput.value = '';
            nameInput.value = '';
            emailInput.value = '';
            phoneInput.value = '';
            addressInput.value = '';
            websiteInput.value = '';
            modal.classList.remove('hidden');
        });

        // Cancel and close
        cancelBtn.addEventListener('click', () => modal.classList.add('hidden'));
        closeBtn.addEventListener('click', () => modal.classList.add('hidden'));

        // Open modal for edit
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                modalTitle.innerText = 'Edit Institution';
                form.action = `/admin/settings/institutions/${btn.dataset.id}`;
                methodInput.value = 'PUT';
                clientInput.value = btn.dataset.client;
                nameInput.value = btn.dataset.name;
                emailInput.value = btn.dataset.email;
                phoneInput.value = btn.dataset.phone;
                addressInput.value = btn.dataset.address;
                websiteInput.value = btn.dataset.website;
                modal.classList.remove('hidden');
            });
        });

        // SweetAlert for delete confirmation
        document.querySelectorAll('.delete-form').forEach(f => {
            f.addEventListener('submit', function(e) {
                e.preventDefault();
                // Swal.fire({
                //     title: 'Are you sure?',
                //     text: "This action cannot be undone!",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#e3342f',
                //     cancelButtonColor: '#6c757d',
                //     confirmButtonText: 'Yes, delete it!'
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         f.submit();
                //     }
                // });
                Swal.fire({
                    toast: true,
                    position: 'top-end', // top-right
                    icon: 'error', // you can use 'info', 'warning', etc.
                    title: 'Institution cannot be deleted. You can only update it.',
                    showConfirmButton: false,
                    timer: 3000, // 3 seconds
                    timerProgressBar: true
                });

            });
        });
    });

    // Toast alerts
    @if(session('success'))
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    @endif

    @if ($errors->any())
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: "{{ $errors->first() }}",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
    });
    @endif
</script>
@endpush