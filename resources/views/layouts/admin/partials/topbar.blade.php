<div x-data="{ isSidebarOpen: false }" class="flex items-center justify-between py-[18px] px-4 bg-white border-b border-gray-200 relative">
    <div class="flex items-center">
        <button class="text-gray-500 focus:outline-none md:hidden" @click="isSidebarOpen = true">
            <i class="fas fa-bars"></i>
        </button>
        {{-- Search functionality commented out --}}
    </div>

    <div class="flex items-center space-x-4 relative">
        {{-- <a href="{{ route('notifications') }}"  --}}
        <a href="{{ route('admin.notifications.index') }}" 
        class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none relative">
            <i class="fas fa-bell"></i>
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </a>


        <div class="relative">
            <button id="quickActionsBtn" class="flex items-center text-sm text-gray-500 focus:outline-none">
                <span class="hidden md:inline-block">Quick Actions</span>
                <i class="ml-1 fas fa-chevron-down"></i>
            </button>

            <div id="quickActionsDropdown" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50">
                <a href="{{ route('admin.profile.edit')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                <a href="{{ route('logout')}}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
            </div>
        </div>
    </div>

    <div x-show="isSidebarOpen" 
         x-transition:enter="ease-out duration-300" 
         x-transition:enter-start="opacity-0" 
         x-transition:enter-end="opacity-100" 
         x-transition:leave="ease-in duration-200" 
         x-transition:leave-start="opacity-100" 
         x-transition:leave-end="opacity-0"
         @click="isSidebarOpen = false" 
         class="fixed inset-0 z-30 bg-gray-600 bg-opacity-75 transition-opacity md:hidden" 
         x-cloak>
    </div>

    <div x-show="isSidebarOpen"
         x-transition:enter="transition ease-in-out duration-300 transform"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in-out duration-300 transform"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed inset-y-0 left-0 z-40 flex-shrink-0 flex flex-col w-64 bg-white border-r border-gray-200 md:hidden"
         @click.away="isSidebarOpen = false" {{-- Closes sidebar if click happens outside the panel --}}
         x-cloak>

        <div class="flex items-center justify-between py-5 px-4 bg-indigo-600">
          <h1 class="text-white font-bold text-xl">{{ $setting->app_name }}</h1>
           <button @click="isSidebarOpen = false" class="text-white hover:text-indigo-100 focus:outline-none">
              <i class="fas fa-times"></i>
          </button>
        </div>

        <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto sidebar-scroll">
          <div class="space-y-1" @click.stop="isSidebarOpen = false"> {{-- Close sidebar on any navigation link click --}}

            <a href="{{ route('dashboard') }}"
              class="sidebar-link flex items-center px-2 py-3 text-sm font-medium rounded-md
                 {{ request()->routeIs('dashboard') ? 'text-indigo-500 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
              <i
                class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
              Dashboard
            </a>

            <div x-data="{ open: {{ request()->routeIs('task.*') ? 'true' : 'false' }} }" @click.stop> {{-- Stop click propagation for dropdown --}}
              <button @click="open = !open"
                class="w-full flex items-center justify-between px-2 py-3 text-sm font-medium rounded-md
                        {{ request()->routeIs('task.*') ? 'text-indigo-700 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
                <div class="flex items-center">
                  <i class="fas fa-tasks mr-3 {{ request()->routeIs('task.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                  <span>Tasks</span>
                </div>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs"></i>
              </button>

              <div x-show="open" class="ml-6 mt-2 space-y-1">
                @if(auth()->user()->designation->hierarchy_level == 0)
                <a href="{{ route('task.index') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md
                    {{ request()->routeIs('task.index') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-list mr-2"></i> All Tasks
                </a>
                @endif
                <a href="{{ route('task.mytask') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md
                    {{ request()->routeIs('task.mytask') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-user-check mr-2"></i> My Tasks
                </a>
                <a href="{{ route('task.priority') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md
                    {{ request()->routeIs('task.priority') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-exclamation-circle mr-2"></i> Task Priority
                </a>
                <a href="{{ route('task.category') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md
                    {{ request()->routeIs('task.category') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-tags mr-2"></i> Task Category
                </a>
              </div>
            </div>

            <a href="{{ route('attendance.index') }}"
              class="sidebar-link flex items-center px-2 py-3 text-sm font-medium
                 {{ request()->routeIs('attendence.*') ? 'text-indigo-500 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
              <i
                class="fas fa-user-clock mr-3 {{ request()->routeIs('attendence.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
              Attendance
            </a>

            <a href="#"
              class="sidebar-link flex items-center px-2 py-3 text-sm font-medium
                 {{ request()->routeIs('performance.*') ? 'text-indigo-500 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
              <i
                class="fas fa-chart-line mr-3 {{ request()->routeIs('performance.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
              Performance
            </a>

            <div x-data="{ open: {{ request()->routeIs('settings.*') ? 'true' : 'false' }} }" @click.stop>
              <button @click="open = !open"
                class="w-full flex items-center justify-between px-2 py-3 text-sm font-medium rounded-md
                        {{ request()->routeIs('settings.*') ? 'text-indigo-700 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
                <div class="flex items-center">
                  <i
                    class="fas fa-cog mr-3 {{ request()->routeIs('settings.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                  <span>Settings</span>
                </div>
                <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs"></i>
              </button>

              <div x-show="open" class="ml-6 mt-2 space-y-1">
                <a href="{{ route('settings.general') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md
                    {{ request()->routeIs('settings.general') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-sliders-h mr-2"></i> General Setting
                </a>
                <a href="{{ route('settings.institutions') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md
                    {{ request()->routeIs('settings.institutions') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-university mr-2"></i> Institution Setup
                </a>
              </div>
            </div>

            @if(auth()->user()->designation->hierarchy_level == 0)

            <div class="pt-4 mt-4 border-t border-gray-200"
              x-data="{ open: {{ request()->routeIs('users.*') || request()->routeIs('designations.*') || request()->routeIs('departments.*') ? 'true' : 'false' }} }" @click.stop>
              <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Administration</h3>

              <button @click="open = !open"
                class="w-full flex items-center justify-between px-2 py-3 text-sm font-medium
                  {{ request()->routeIs('users.*') || request()->routeIs('designations.*') || request()->routeIs('departments.*') ? 'text-indigo-500 bg-indigo-100 rounded-md' : 'text-gray-600 hover:bg-gray-100' }}">
                <span class="flex items-center">
                  <i
                    class="fas fa-users-cog mr-3 {{ request()->routeIs('users.*') || request()->routeIs('designations.*') || request()->routeIs('departments.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                  User Management
                </span>
                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>

              <div x-show="open" class="ml-6 mt-2 space-y-1" x-cloak>
                <a href="{{ route('users.index') }}"
                  class="flex items-center px-2 py-2 text-sm rounded-md {{ request()->routeIs('users.*') ? 'text-indigo-500 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-user mr-2"></i> Users
                </a>
                <a href="{{ route('designations.index')}}"
                  class="flex items-center px-2 py-2 text-sm rounded-md {{ request()->routeIs('designations.*') ? 'text-indigo-500 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-id-badge mr-2"></i> Designations
                </a>
                <a href="{{ route('departments.index')}}"
                  class="flex items-center px-2 py-2 text-sm rounded-md {{ request()->routeIs('departments.*') ? 'text-indigo-500 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                  <i class="fas fa-building mr-2"></i> Departments
                </a>
              </div>

              <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100">
                <i class="fas fa-sliders-h mr-2"></i> KPI Settings
              </a>
              <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100">
                <i class="fas fa-file-alt mr-2"></i> Reports
              </a>
              <a href="{{ route('auditlog.index')}}" class="flex items-center px-2 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100">
                <i class="fas fa-history mr-2"></i> Audit Logs
              </a>
            </div>
            @endif
          </div>
        </div>

        <div class="p-4 border-t border-gray-200">
          <div class="flex items-center">
            <img class="w-10 h-10 rounded-full"
              src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt="User profile">
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-700">
                {{ auth()->user()->name }}
                <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full">{{
                  auth()->user()->designation->designation_name }}</span>
              </p>
              <a href="{{ route('logout')}}" class="text-xs font-medium text-gray-500 hover:text-gray-700">Logout</a>
            </div>
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