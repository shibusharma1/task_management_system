        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-white border-r border-gray-200">
                <div class="flex items-center justify-center h-16 px-4 bg-indigo-600">
                    <h1 class="text-white font-bold text-xl">TaskFlow Pro</h1>
                </div>
                <div class="flex flex-col flex-grow px-4 py-4 overflow-y-auto">
                    <div class="space-y-1">
                        <a href="#" data-target="dashboard" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-white rounded-md bg-indigo-100 text-indigo-700">
                            <i class="fas fa-tachometer-alt mr-3 text-indigo-500"></i>
                            Dashboard
                        </a>
                        <a href="#" data-target="tasks" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-tasks mr-3 text-gray-400"></i>
                            My Tasks
                        </a>
                        <a href="#" data-target="attendance" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-user-clock mr-3 text-gray-400"></i>
                            Attendance
                        </a>
                        <a href="#" data-target="task-assignment" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-project-diagram mr-3 text-gray-400"></i>
                            Task Assignment
                        </a>
                        <a href="#" data-target="reminders" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-bell mr-3 text-gray-400"></i>
                            Reminders
                        </a>
                        <a href="#" data-target="performance" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-chart-line mr-3 text-gray-400"></i>
                            Performance
                        </a>
                        <a href="#" data-target="settings" class="sidebar-link flex items-center px-2 py-3 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                            <i class="fas fa-cog mr-3 text-gray-400"></i>
                            Settings
                        </a>
                        <!-- Admin Only Links -->
                        <div id="admin-links" class="pt-4 mt-4 border-t border-gray-200">
                            <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Administration</h3>
                            <div class="mt-2 space-y-1">
                                <a href="#" data-target="user-management" class="sidebar-link flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                    <i class="fas fa-users-cog mr-3 text-gray-400"></i>
                                    User Management
                                </a>
                                <a href="#" data-target="kpi-settings" class="sidebar-link flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                    <i class="fas fa-sliders-h mr-3 text-gray-400"></i>
                                    KPI Settings
                                </a>
                                <a href="#" data-target="reports" class="sidebar-link flex items-center px-2 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-100">
                                    <i class="fas fa-file-alt mr-3 text-gray-400"></i>
                                    Reports
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center">
                        <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile">
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-700">{{ auth()->user()->name }} <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full">{{ auth()->user()->designation }}</span></p>
                            <a href="{{ route('logout')}}" class="text-xs font-medium text-gray-500 hover:text-gray-700">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
