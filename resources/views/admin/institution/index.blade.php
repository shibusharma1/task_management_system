<!-- Main Content -->
<div id="institution-content" class="content-page hidden p-6 bg-white rounded-lg shadow-sm">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">
            <i class="fas fa-building mr-2 text-blue-500"></i>
            Institution Management
        </h2>
        <button class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 transition-colors">
            <i class="fas fa-plus mr-1"></i> Add New
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
            <h3 class="text-gray-500 text-sm font-medium">Total Branches</h3>
            <p class="text-2xl font-bold text-blue-600">24</p>
        </div>
        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
            <h3 class="text-gray-500 text-sm font-medium">Active Departments</h3>
            <p class="text-2xl font-bold text-green-600">18</p>
        </div>
        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
            <h3 class="text-gray-500 text-sm font-medium">Registered Users</h3>
            <p class="text-2xl font-bold text-purple-600">342</p>
        </div>
    </div>

    <!-- Institution Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">Headquarters</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">Main Office</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">New York, NY</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <button class="text-red-600 hover:text-red-900">Delete</button>
                    </td>
                </tr>
                <!-- More rows... -->
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6">
        <div class="text-sm text-gray-500">
            Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> entries
        </div>
        <div class="flex space-x-2">
            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Previous</button>
            <button class="px-3 py-1 border rounded-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">1</button>
            <button class="px-3 py-1 border rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Next</button>
        </div>
    </div>
</div>