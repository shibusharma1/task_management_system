<div class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200 relative">
    <div class="flex items-center">
        <button class="text-gray-500 focus:outline-none md:hidden">
            <i class="fas fa-bars"></i>
        </button>
        <div class="relative ml-4 md:ml-6">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
            <input
                class="block w-full py-2 pl-10 pr-3 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none"
                placeholder="Search tasks, employees...">
        </div>
    </div>

    <div class="flex items-center space-x-4 relative">
        <button class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none relative">
            <i class="fas fa-bell"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        <!-- Quick Actions -->
        <div class="relative">
            <button id="quickActionsBtn" class="flex items-center text-sm text-gray-500 focus:outline-none">
                <span class="hidden md:inline-block">Quick Actions</span>
                <i class="ml-1 fas fa-chevron-down"></i>
            </button>

            <!-- Dropdown Menu -->
            <div id="quickActionsDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>
</div>

<script>
    const btn = document.getElementById('quickActionsBtn');
    const dropdown = document.getElementById('quickActionsDropdown');

    btn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
    });

    // Close dropdown if clicked outside
    window.addEventListener('click', (e) => {
        if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>
