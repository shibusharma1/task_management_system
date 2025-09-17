<!-- Sidebar -->
<div class="hidden md:flex md:flex-shrink-0">
    <div class="flex flex-col w-64 bg-white border-r border-gray-200">
        <div class="flex items-center justify-center h-16 px-4 bg-indigo-600">
            <h1 class="text-white font-bold text-xl">TaskFlow Pro</h1>
        </div>
        <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
            <div class="space-y-1">
                <a href=" {{ route('dashboard') }}" data-target="dashboard" {{--
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-white rounded-md bg-indigo-100 text-indigo-700">
                    --}}
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{
                    request()->routeIs('dashboard') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' :
                    'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i
                        class="fas fa-tachometer-alt mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                    Dashboard
                </a>
                {{-- <a href="{{ route('task.index')}}" data-target="tasks"
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{ request()->routeIs('task.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i
                        class="fas fa-tasks mr-3 {{ request()->routeIs('task.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                    My Tasks
                </a>
                --}}
                <!-- Tasks Dropdown -->
                <div x-data="{ open: {{ request()->routeIs('task.*') ? 'true' : 'false' }} }">
                    <!-- Dropdown main button -->
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-2 py-3 text-sm font-medium rounded-md 
                        {{ request()->routeIs('task.*') ? 'text-indigo-700 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
                        <div class="flex items-center">
                            <i class="fas fa-tasks mr-3 
                            {{ request()->routeIs('task.*') ? 'text-indigo-500' : 'text-gray-400' }}">
                            </i>
                            <span>Tasks</span>
                        </div>
                        <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs"></i>
                    </button>

                    <!-- Dropdown Items -->
                    <div x-show="open" x-collapse class="ml-6 mt-2 space-y-1">
                        <a href="{{ route('task.index') }}"
                            class="block px-2 py-2 text-sm rounded-md 
                            {{ request()->routeIs('task.index') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                            All Tasks
                        </a>
                        <a href="{{ route('task.mytask') }}"
                            class="block px-2 py-2 text-sm rounded-md 
                        {{ request()->routeIs('task.mytask') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                            My Tasks
                        </a>
                        <a href="{{ route('task.priority') }}"
                            class="block px-2 py-2 text-sm rounded-md 
                        {{ request()->routeIs('task.priority') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                            Task Priority
                        </a>
                        <a href="{{ route('task.category') }}"
                            class="block px-2 py-2 text-sm rounded-md 
                        {{ request()->routeIs('task.category') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                            Task Category
                        </a>
                    </div>
                </div>

                <a href="{{ route('attendance.index') }}" data-target="attendance"
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{ request()->routeIs('attendence.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i
                        class="fas fa-user-clock mr-3 {{ request()->routeIs('attendence.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                    Attendance
                </a>
                {{-- <a href="#" data-target="task-assignment"
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{ request()->routeIs('dashboard') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i class="fas fa-project-diagram mr-3 text-gray-400"></i>
                    Task Assignment
                </a> --}}
                <a href="{{ route('reminder.index')}}" data-target="reminders"
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{ request()->routeIs('reminder.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i
                        class="fas fa-bell mr-3 {{ request()->routeIs('reminder.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                    Reminders
                </a>
                <a href="#" data-target="performance"
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{ request()->routeIs('performance.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i
                        class="fas fa-chart-line mr-3 {{ request()->routeIs('performance.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                    Performance
                </a>
                {{-- <a href="#" data-target="settings"
                    class="sidebar-link flex items-center px-2 py-3 text-sm font-medium {{ request()->routeIs('setting') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                    <i
                        class="fas fa-cog mr-3 {{ request()->routeIs('setting.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                    Settings
                </a> --}}

                <!-- Settings Dropdown -->
                <div x-data="{ open: {{ request()->routeIs('settings.*') ? 'true' : 'false' }} }">
                    <!-- Dropdown main button -->
                    <button @click="open = !open"
                        class="w-full flex items-center justify-between px-2 py-3 text-sm font-medium rounded-md 
                        {{ request()->routeIs('settings.*') ? 'text-indigo-700 bg-indigo-100' : 'text-gray-600 hover:bg-gray-100' }}">
                        <div class="flex items-center">
                            <i class="fas fa-cog mr-3 
                            {{ request()->routeIs('settings.*') ? 'text-indigo-500' : 'text-gray-400' }}">
                            </i>
                            <span>Settings</span>
                        </div>
                        <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="text-xs"></i>
                    </button>

                    <!-- Dropdown Items -->
                    <div x-show="open" x-collapse class="ml-6 mt-2 space-y-1">
                        <!-- General Setting -->
                        <a href="{{ route('settings.general') }}"
                            class="block px-2 py-2 text-sm rounded-md 
                            {{ request()->routeIs('settings.general') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                            General Setting
                        </a>

                        <!-- Institution Setup -->
                        <a href="{{ route('settings.institutions') }}"
                            class="block px-2 py-2 text-sm rounded-md 
                            {{ request()->routeIs('settings.institutions') ? 'text-indigo-700 bg-indigo-100 font-medium' : 'text-gray-600 hover:bg-gray-100' }}">
                            Institution Setup
                        </a>
                    </div>
                </div>


                <!-- Admin Only Links -->
                <div id="admin-links" class="pt-4 mt-4 border-t border-gray-200">
                    <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Administration</h3>
                    <div class="mt-2 space-y-1">
                        {{-- <a href="{{ route('designations.index')}}" data-target="user-management"
                            class="sidebar-link flex items-center px-2 py-2 text-sm font-medium {{ request()->routeIs('designations.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                            <i
                                class="fas fa-users-cog mr-3 {{ request()->routeIs('designations.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                            Designations
                        </a>
                        <a href="{{ route('departments.index')}}" data-target="user-management"
                            class="sidebar-link flex items-center px-2 py-2 text-sm font-medium {{ request()->routeIs('departments.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                            <i
                                class="fas fa-users-cog mr-3 {{ request()->routeIs('departments.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                            Departments
                        </a>
                        <a href="{{ route('users.index') }}" data-target="user-management"
                            class="sidebar-link flex items-center px-2 py-2 text-sm font-medium {{ request()->routeIs('users.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                            <i
                                class="fas fa-users-cog mr-3 {{ request()->routeIs('users.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                            Users
                        </a> --}}

                        <div
                            x-data="{ open: {{ request()->routeIs('users.*') || request()->routeIs('designations.*') || request()->routeIs('departments.*') ? 'true' : 'false' }} }">
                            <button @click="open = !open" class="w-full flex items-center justify-between px-2 py-3 text-sm font-medium 
        {{ request()->routeIs('users.*') || request()->routeIs('designations.*') || request()->routeIs('departments.*') 
            ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' 
            : 'text-gray-600 rounded-md hover:bg-gray-100' }}">
                                <span class="flex items-center">
                                    <i class="fas fa-users-cog mr-3 
                {{ request()->routeIs('users.*') || request()->routeIs('designations.*') || request()->routeIs('departments.*') 
                    ? 'text-indigo-500' 
                    : 'text-gray-600' }}">
                                    </i>
                                    User Management
                                </span>
                                <svg :class="{ 'rotate-180': open }" class="w-4 h-4 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <div x-show="open" class="ml-6 mt-2 space-y-1" x-cloak>
                                <a href="{{ route('users.index') }}" class="sidebar-link flex items-center px-2 py-2 text-sm font-medium 
            {{ request()->routeIs('users.*') 
                ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' 
                : 'text-gray-600 rounded-md hover:bg-gray-100' }}">
                                    <i
                                        class="fas fa-users mr-3 {{ request()->routeIs('users.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                                    Users
                                </a>
                                <a href="{{ route('designations.index')}}" class="sidebar-link flex items-center px-2 py-2 text-sm font-medium 
            {{ request()->routeIs('designations.*') 
                ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' 
                : 'text-gray-600 rounded-md hover:bg-gray-100' }}">
                                    <i
                                        class="fas fa-id-badge mr-3 {{ request()->routeIs('designations.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                                    Designations
                                </a>
                                <a href="{{ route('departments.index')}}" class="sidebar-link flex items-center px-2 py-2 text-sm font-medium 
            {{ request()->routeIs('departments.*') 
                ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' 
                : 'text-gray-600 rounded-md hover:bg-gray-100' }}">
                                    <i
                                        class="fas fa-building mr-3 {{ request()->routeIs('departments.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                                    Departments
                                </a>
                            </div>
                        </div>




                        <a href="#" data-target="kpi-settings"
                            class="sidebar-link flex items-center px-2 py-2 text-sm font-medium {{ request()->routeIs('kpi.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                            <i
                                class="fas fa-sliders-h mr-3 {{ request()->routeIs('kpi.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                            KPI Settings
                        </a>
                        {{-- <a href="#" data-target="institution"
                            class="sidebar-link flex items-center px-2 py-2 text-sm font-medium {{ request()->routeIs('institution.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                            <i
                                class="fas fa-university mr-3 {{ request()->routeIs('institution.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                            Institution
                        </a> --}}
                        <a href="#" data-target="reports"
                            class="sidebar-link flex items-center px-2 py-2 text-sm font-medium {{ request()->routeIs('reports.*') ? 'text-indigo-500 rounded-md bg-indigo-100 text-indigo-700' : 'text-gray-600 rounded-md hover:bg-gray-100' }} ">
                            <i
                                class="fas fa-file-alt mr-3 {{ request()->routeIs('reports.*') ? 'text-indigo-500' : 'text-gray-600' }}"></i>
                            Reports
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 border-t border-gray-200">
            <div class="flex items-center">
                <img class="w-10 h-10 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="User profile">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }} <span
                            class="text-xs bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full">{{
                            auth()->user()->designation->designation_name }}</span></p>
                    <a href="{{ route('logout')}}"
                        class="text-xs font-medium text-gray-500 hover:text-gray-700">Logout</a>
                </div>
            </div>
        </div>
    </div>
</div>