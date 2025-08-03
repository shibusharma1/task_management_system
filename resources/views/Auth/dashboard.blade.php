<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow Pro - Inter-Office Task Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
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
                            <p class="text-sm font-medium text-gray-700">John Doe <span class="text-xs bg-indigo-100 text-indigo-800 px-2 py-0.5 rounded-full">Manager</span></p>
                            <button class="text-xs font-medium text-gray-500 hover:text-gray-700">Logout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top navigation -->
            <div class="flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <button class="text-gray-500 focus:outline-none md:hidden">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="relative ml-4 md:ml-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input class="block w-full py-2 pl-10 pr-3 text-sm bg-gray-100 border border-transparent rounded-md focus:bg-white focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none" placeholder="Search tasks, employees...">
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Attendance Check-in/out Button -->
                    <button id="attendance-btn" class="px-3 py-1 text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                        <i class="fas fa-sign-in-alt mr-1"></i> Check In
                    </button>
                    
                    <button class="p-1 text-gray-400 rounded-full hover:text-gray-500 focus:outline-none">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>
                    <button class="flex items-center text-sm text-gray-500 focus:outline-none">
                        <span class="hidden md:inline-block">Quick Actions</span>
                        <i class="ml-1 fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>
            
            <!-- Main content area -->
            <div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
                <!-- Dashboard Content -->
                <div id="dashboard-content" class="content-page">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                            <p class="text-gray-600">Welcome back! Here's your overview for today, <span id="current-date" class="font-medium"></span>.</p>
                        </div>
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                            <i class="fas fa-plus mr-1"></i> New Task
                        </button>
                    </div>
                    
                    <!-- Stats cards -->
                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-6">
                        <!-- Pending Tasks -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                        <i class="fas fa-clock text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Pending Tasks</dt>
                                            <dd class="flex items-baseline">
                                                <div class="text-2xl font-semibold text-gray-900">5</div>
                                                <div class="ml-2 flex items-baseline text-sm font-semibold text-red-600">
                                                    <i class="fas fa-arrow-up text-xs"></i>
                                                    <span class="sr-only">Increased by</span>
                                                    2
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Completed Tasks -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Completed Today</dt>
                                            <dd class="flex items-baseline">
                                                <div class="text-2xl font-semibold text-gray-900">3</div>
                                                <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                    <i class="fas fa-arrow-up text-xs"></i>
                                                    <span class="sr-only">Increased by</span>
                                                    1
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Team Performance -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Team Performance</dt>
                                            <dd class="flex items-baseline">
                                                <div class="text-2xl font-semibold text-gray-900">82%</div>
                                                <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                    <i class="fas fa-arrow-up text-xs"></i>
                                                    <span class="sr-only">Increased by</span>
                                                    5%
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Attendance -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-4 py-5 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                        <i class="fas fa-user-clock text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">Attendance</dt>
                                            <dd class="flex items-baseline">
                                                <div class="text-2xl font-semibold text-gray-900">95%</div>
                                                <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                                    <i class="fas fa-arrow-up text-xs"></i>
                                                    <span class="sr-only">Increased by</span>
                                                    2%
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Main Dashboard Content -->
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Task Assignment Section -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Task Assignment</h3>
                                        <div class="flex space-x-2">
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                                <i class="fas fa-plus mr-1"></i> Assign Task
                                            </button>
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                                <i class="fas fa-plus mr-1"></i> Request Task
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <!-- Assigned Task -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                                <span class="ml-3 block font-medium">Complete quarterly financial report</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                                <span class="text-sm text-gray-500">Due: Aug 5</span>
                                                <div class="flex -space-x-1">
                                                    <img class="w-6 h-6 rounded-full border-2 border-white" src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                            <span class="mr-3">Assigned by: Sarah (Manager)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>Finance Department</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Requested Task -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="ml-3 block font-medium">Approve marketing campaign budget</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Requested</span>
                                                <span class="text-sm text-gray-500">Submitted: Jul 28</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user mr-1 text-gray-400"></i>
                                            <span class="mr-3">Requested by: Michael (Team Lead)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>Marketing Department</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Completed Task -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" checked>
                                                <span class="ml-3 block font-medium line-through">Review employee performance metrics</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                                <span class="text-sm text-gray-500">Jul 28</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                            <span class="mr-3">Assigned by: David (Director)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>HR Department</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View all tasks</a>
                                </div>
                            </div>
                            
                            <!-- Team Performance Charts -->
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                <!-- Task Completion Rate -->
                                <div class="bg-white p-4 shadow rounded-lg">
                                    <h3 class="text-lg font-medium text-gray-900 mb-4">Task Completion Rate</h3>
                                    <div class="h-64">
                                        <canvas id="completionRateChart"></canvas>
                                    </div>
                                </div>
                                
                                <!-- KPI Performance -->
                                <div class="bg-white p-4 shadow rounded-lg">
                                    <h3 class="text-lg font-medium text-gray-900 mb-4">KPI Performance</h3>
                                    <div class="h-64">
                                        <canvas id="kpiPerformanceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Attendance Section -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Attendance</h3>
                                </div>
                                <div class="p-4">
                                    <div class="flex items-center justify-between mb-4">
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Today's Status</p>
                                            <p id="attendance-status" class="text-lg font-semibold text-gray-900">Checked In: 09:15 AM</p>
                                        </div>
                                        <div id="attendance-timer" class="text-xl font-bold text-indigo-600">07:24:35</div>
                                    </div>
                                    <div class="border-t border-gray-200 pt-4">
                                        <h4 class="text-sm font-medium text-gray-500 mb-2">This Week</h4>
                                        <div class="grid grid-cols-7 gap-1 text-center">
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Mon</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Tue</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Wed</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Thu</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-yellow-100 flex items-center justify-center">
                                                    <i class="fas fa-clock text-yellow-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Fri</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-minus text-gray-500 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Sat</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-minus text-gray-500 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Sun</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-minus text-gray-500 text-xs"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Reminders -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Reminders</h3>
                                        <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                            <i class="fas fa-plus mr-1"></i> Add
                                        </button>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <!-- Reminder item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <i class="fas fa-bell text-indigo-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Team Meeting</p>
                                                    <p class="text-sm text-gray-500">10:30 AM</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Weekly sprint planning with development team</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Reminder item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                                    <i class="fas fa-exclamation text-red-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Project Deadline</p>
                                                    <p class="text-sm text-gray-500">Tomorrow</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Submit final report for client approval</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Reminder item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-birthday-cake text-green-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Birthday</p>
                                                    <p class="text-sm text-gray-500">Aug 15</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Sarah's birthday celebration</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Team Hierarchy -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Team Hierarchy</h3>
                                </div>
                                <div class="p-4">
                                    <div class="space-y-4">
                                        <!-- Level 1 -->
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">1</div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">John Doe</p>
                                                <p class="text-xs text-gray-500">Director</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Level 2 -->
                                        <div class="ml-8 pl-4 border-l-2 border-gray-200">
                                            <div class="flex items-center pt-2">
                                                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">2</div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                                                    <p class="text-xs text-gray-500">Manager</p>
                                                </div>
                                            </div>
                                            
                                            <!-- Level 3 -->
                                            <div class="ml-8 pl-4 border-l-2 border-gray-200">
                                                <div class="flex items-center pt-2">
                                                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-green-600 flex items-center justify-center text-white font-bold">3</div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-900">Michael Chen</p>
                                                        <p class="text-xs text-gray-500">Team Lead</p>
                                                    </div>
                                                </div>
                                                
                                                <!-- Level 4 -->
                                                <div class="ml-8 pl-4 border-l-2 border-gray-200">
                                                    <div class="flex items-center pt-2">
                                                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white font-bold">4</div>
                                                        <div class="ml-3">
                                                            <p class="text-sm font-medium text-gray-900">David Wilson</p>
                                                            <p class="text-xs text-gray-500">Developer</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center pt-2">
                                                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white font-bold">4</div>
                                                        <div class="ml-3">
                                                            <p class="text-sm font-medium text-gray-900">Emily Brown</p>
                                                            <p class="text-xs text-gray-500">Designer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- My Tasks Content -->
                <div id="tasks-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">My Tasks</h2>
                            <p class="text-gray-600">View and manage all your assigned tasks</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                                <i class="fas fa-plus mr-1"></i> New Task
                            </button>
                            <div class="relative">
                                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option>All Tasks</option>
                                    <option>Pending</option>
                                    <option>In Progress</option>
                                    <option>Completed</option>
                                    <option>Overdue</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Task List</h3>
                                <div class="flex items-center space-x-2">
                                    <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                        <i class="fas fa-filter mr-1"></i> Filter
                                    </button>
                                    <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                        <i class="fas fa-sort mr-1"></i> Sort
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <!-- Task Item -->
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <span class="ml-3 block font-medium">Complete quarterly financial report</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        <span class="text-sm text-gray-500">Due: Aug 5</span>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                    <span class="mr-3">Assigned by: Sarah (Manager)</span>
                                    <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                    <span>Finance Department</span>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                    <span>Complete the Q3 financial report with all department expenses and revenue projections.</span>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-comment mr-1 text-gray-400"></i>
                                    <span class="text-indigo-600">2 new comments</span>
                                </div>
                            </div>
                            
                            <!-- Task Item -->
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" checked>
                                        <span class="ml-3 block font-medium line-through">Review employee performance metrics</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                        <span class="text-sm text-gray-500">Jul 28</span>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                    <span class="mr-3">Assigned by: David (Director)</span>
                                    <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                    <span>HR Department</span>
                                </div>
                            </div>
                            
                            <!-- Task Item -->
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <span class="ml-3 block font-medium">Prepare presentation for client meeting</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                                        <span class="text-sm text-gray-500">Due: Aug 10</span>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                    <span class="mr-3">Assigned by: Michael (Team Lead)</span>
                                    <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                    <span>Marketing Department</span>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                    <span>Create a 15-slide presentation for the upcoming client meeting with Acme Corp.</span>
                                </div>
                            </div>
                            
                            <!-- Task Item -->
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <span class="ml-3 block font-medium">Update project documentation</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Overdue</span>
                                        <span class="text-sm text-gray-500">Due: Jul 25</span>
                                        <button class="text-gray-400 hover:text-gray-500">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                    <span class="mr-3">Assigned by: Sarah (Manager)</span>
                                    <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                    <span>Development Department</span>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                    <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                    <span>Update all API documentation for the new release.</span>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View all tasks</a>
                        </div>
                    </div>
                </div>
                
                <!-- Attendance Content -->
                <div id="attendance-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Attendance</h2>
                            <p class="text-gray-600">Track your check-in/check-out times and attendance history</p>
                        </div>
                        <div class="flex space-x-2">
                            <div class="relative">
                                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option>This Week</option>
                                    <option>Last Week</option>
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>Custom Range</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Current Status -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Current Status</h3>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm font-medium text-gray-500">Today's Status</p>
                                            <p id="attendance-status-page" class="text-lg font-semibold text-gray-900">Checked In: 09:15 AM</p>
                                        </div>
                                        <div id="attendance-timer-page" class="text-xl font-bold text-indigo-600">07:24:35</div>
                                        <button id="attendance-btn-page" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                                            <i class="fas fa-sign-in-alt mr-1"></i> Check Out
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Attendance History -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Attendance History</h3>
                                </div>
                                <div class="p-6">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Date
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Check In
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Check Out
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Hours Worked
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Status
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    Aug 2, 2023
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    09:15 AM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    06:30 PM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    9h 15m
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                        Present
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    Aug 1, 2023
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    09:00 AM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    05:45 PM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    8h 45m
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                        Present
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    Jul 31, 2023
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    09:30 AM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    06:00 PM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    8h 30m
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                        Present
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    Jul 28, 2023
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    10:00 AM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    04:30 PM
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    6h 30m
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                        Half Day
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                                    Jul 27, 2023
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    -
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    -
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                                    -
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                        Absent
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="flex-1 flex justify-between sm:hidden">
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                Previous
                                            </a>
                                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                Next
                                            </a>
                                        </div>
                                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                            <div>
                                                <p class="text-sm text-gray-700">
                                                    Showing
                                                    <span class="font-medium">1</span>
                                                    to
                                                    <span class="font-medium">5</span>
                                                    of
                                                    <span class="font-medium">24</span>
                                                    entries
                                                </p>
                                            </div>
                                            <div>
                                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                        <span class="sr-only">Previous</span>
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                    <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                        1
                                                    </a>
                                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                        2
                                                    </a>
                                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                        3
                                                    </a>
                                                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                                        ...
                                                    </span>
                                                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                        8
                                                    </a>
                                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                        <span class="sr-only">Next</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Weekly Summary -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Weekly Summary</h3>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Days Present</p>
                                            <p class="text-2xl font-semibold text-gray-900">4</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Days Absent</p>
                                            <p class="text-2xl font-semibold text-gray-900">1</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Total Hours</p>
                                            <p class="text-2xl font-semibold text-gray-900">33h</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Avg. Hours/Day</p>
                                            <p class="text-2xl font-semibold text-gray-900">8.25h</p>
                                        </div>
                                    </div>
                                    <div class="mt-6">
                                        <h4 class="text-sm font-medium text-gray-500 mb-2">This Week</h4>
                                        <div class="grid grid-cols-7 gap-1 text-center">
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Mon</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Tue</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Wed</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-check text-green-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Thu</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-yellow-100 flex items-center justify-center">
                                                    <i class="fas fa-clock text-yellow-600 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Fri</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-minus text-gray-500 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Sat</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-minus text-gray-500 text-xs"></i>
                                                </div>
                                            </div>
                                            <div class="py-1">
                                                <p class="text-xs text-gray-500">Sun</p>
                                                <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                                    <i class="fas fa-minus text-gray-500 text-xs"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Attendance Trends -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Attendance Trends</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-64">
                                        <canvas id="attendanceTrendsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Task Assignment Content -->
                <div id="task-assignment-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Task Assignment</h2>
                            <p class="text-gray-600">Assign tasks to team members or request tasks from managers</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                                <i class="fas fa-plus mr-1"></i> Assign Task
                            </button>
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none">
                                <i class="fas fa-plus mr-1"></i> Request Task
                            </button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Assigned Tasks -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Assigned Tasks</h3>
                                        <div class="flex items-center space-x-2">
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                                <i class="fas fa-filter mr-1"></i> Filter
                                            </button>
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                                <i class="fas fa-sort mr-1"></i> Sort
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <!-- Task Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="ml-3 block font-medium">Complete quarterly financial report</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                                <span class="text-sm text-gray-500">Due: Aug 5</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user mr-1 text-gray-400"></i>
                                            <span class="mr-3">Assigned to: David Wilson (Developer)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>Finance Department</span>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                            <span>Complete the Q3 financial report with all department expenses and revenue projections.</span>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-comment mr-1 text-gray-400"></i>
                                            <span class="text-indigo-600">2 new comments</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Task Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="ml-3 block font-medium">Prepare presentation for client meeting</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In Progress</span>
                                                <span class="text-sm text-gray-500">Due: Aug 10</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user mr-1 text-gray-400"></i>
                                            <span class="mr-3">Assigned to: Emily Brown (Designer)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>Marketing Department</span>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                            <span>Create a 15-slide presentation for the upcoming client meeting with Acme Corp.</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Task Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="ml-3 block font-medium line-through">Review employee performance metrics</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                                <span class="text-sm text-gray-500">Jul 28</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user mr-1 text-gray-400"></i>
                                            <span class="mr-3">Assigned to: Michael Chen (Team Lead)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>HR Department</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View all assigned tasks</a>
                                </div>
                            </div>
                            
                            <!-- Task Request Form (Hidden by default) -->
                            <div id="task-request-form" class="bg-white shadow rounded-lg overflow-hidden hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Request New Task</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="space-y-6">
                                            <div>
                                                <label for="task-title" class="block text-sm font-medium text-gray-700">Task Title</label>
                                                <input type="text" id="task-title" name="task-title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            
                                            <div>
                                                <label for="task-description" class="block text-sm font-medium text-gray-700">Description</label>
                                                <textarea id="task-description" name="task-description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                            </div>
                                            
                                            <div>
                                                <label for="request-to" class="block text-sm font-medium text-gray-700">Request To</label>
                                                <select id="request-to" name="request-to" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>Sarah Johnson (Manager)</option>
                                                    <option>John Doe (Director)</option>
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label for="due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                                <input type="date" id="due-date" name="due-date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3">
                                                <button type="button" id="cancel-request" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Submit Request
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Requested Tasks -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Requested Tasks</h3>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <!-- Task Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="ml-3 block font-medium">Approve marketing campaign budget</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Requested</span>
                                                <span class="text-sm text-gray-500">Submitted: Jul 28</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                            <span class="mr-3">Requested from: Sarah Johnson (Manager)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>Marketing Department</span>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-align-left mr-1 text-gray-400"></i>
                                            <span>Need approval for the $50,000 marketing campaign budget for Q4.</span>
                                        </div>
                                    </div>
                                    
                                    <!-- Task Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <span class="ml-3 block font-medium line-through">New laptop purchase</span>
                                            </div>
                                            <div class="flex items-center space-x-2">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Approved</span>
                                                <span class="text-sm text-gray-500">Jul 20</span>
                                                <button class="text-gray-400 hover:text-gray-500">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex items-center text-sm text-gray-500">
                                            <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                            <span class="mr-3">Requested from: John Doe (Director)</span>
                                            <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                            <span>IT Department</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View all requested tasks</a>
                                </div>
                            </div>
                            
                            <!-- Team Members -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Team Members</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <!-- Team Member -->
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                                                <p class="text-xs text-gray-500">Manager</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Team Member -->
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Michael Chen</p>
                                                <p class="text-xs text-gray-500">Team Lead</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Team Member -->
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">David Wilson</p>
                                                <p class="text-xs text-gray-500">Developer</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Team Member -->
                                        <div class="flex items-center">
                                            <img class="w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Emily Brown</p>
                                                <p class="text-xs text-gray-500">Designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reminders Content -->
                <div id="reminders-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Reminders</h2>
                            <p class="text-gray-600">Manage your personal reminders and notifications</p>
                        </div>
                        <button id="new-reminder-btn" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                            <i class="fas fa-plus mr-1"></i> New Reminder
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Reminders List -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">My Reminders</h3>
                                        <div class="flex items-center space-x-2">
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                                <i class="fas fa-filter mr-1"></i> Filter
                                            </button>
                                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                                <i class="fas fa-sort mr-1"></i> Sort
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-200">
                                    <!-- Reminder Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <i class="fas fa-bell text-indigo-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Team Meeting</p>
                                                    <p class="text-sm text-gray-500">Today, 10:30 AM</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Weekly sprint planning with development team</p>
                                                <div class="mt-2 flex items-center text-sm text-gray-500">
                                                    <i class="fas fa-repeat mr-1 text-gray-400"></i>
                                                    <span>Weekly on Monday</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Reminder Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                                    <i class="fas fa-exclamation text-red-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Project Deadline</p>
                                                    <p class="text-sm text-gray-500">Tomorrow, 5:00 PM</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Submit final report for client approval</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Reminder Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center">
                                                    <i class="fas fa-birthday-cake text-green-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Birthday</p>
                                                    <p class="text-sm text-gray-500">Aug 15, 9:00 AM</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Sarah's birthday celebration</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Reminder Item -->
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                                    <i class="fas fa-calendar-check text-yellow-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3 flex-1">
                                                <div class="flex items-center justify-between">
                                                    <p class="text-sm font-medium text-gray-900">Performance Review</p>
                                                    <p class="text-sm text-gray-500">Aug 20, 2:00 PM</p>
                                                </div>
                                                <p class="mt-1 text-sm text-gray-500">Quarterly performance review with manager</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View all reminders</a>
                                </div>
                            </div>
                            
                            <!-- New Reminder Form (Hidden by default) -->
                            <div id="new-reminder-form" class="bg-white shadow rounded-lg overflow-hidden hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">New Reminder</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="space-y-6">
                                            <div>
                                                <label for="reminder-title" class="block text-sm font-medium text-gray-700">Title</label>
                                                <input type="text" id="reminder-title" name="reminder-title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            
                                            <div>
                                                <label for="reminder-description" class="block text-sm font-medium text-gray-700">Description</label>
                                                <textarea id="reminder-description" name="reminder-description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                            </div>
                                            
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label for="reminder-date" class="block text-sm font-medium text-gray-700">Date</label>
                                                    <input type="date" id="reminder-date" name="reminder-date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                </div>
                                                <div>
                                                    <label for="reminder-time" class="block text-sm font-medium text-gray-700">Time</label>
                                                    <input type="time" id="reminder-time" name="reminder-time" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                </div>
                                            </div>
                                            
                                            <div>
                                                <label for="reminder-repeat" class="block text-sm font-medium text-gray-700">Repeat</label>
                                                <select id="reminder-repeat" name="reminder-repeat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>Never</option>
                                                    <option>Daily</option>
                                                    <option>Weekly</option>
                                                    <option>Monthly</option>
                                                    <option>Yearly</option>
                                                </select>
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3">
                                                <button type="button" id="cancel-reminder" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Save Reminder
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Upcoming Reminders -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Upcoming</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <!-- Reminder Item -->
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                                    <i class="fas fa-bell text-indigo-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Team Meeting</p>
                                                <p class="text-sm text-gray-500">Today, 10:30 AM</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Reminder Item -->
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center">
                                                    <i class="fas fa-exclamation text-red-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Project Deadline</p>
                                                <p class="text-sm text-gray-500">Tomorrow, 5:00 PM</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Reminder Item -->
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0 pt-0.5">
                                                <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center">
                                                    <i class="fas fa-calendar-check text-yellow-600"></i>
                                                </div>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Performance Review</p>
                                                <p class="text-sm text-gray-500">Aug 20, 2:00 PM</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Notification Settings -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Notification Settings</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="space-y-4">
                                            <div class="flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="email-notifications" name="email-notifications" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="email-notifications" class="font-medium text-gray-700">Email Notifications</label>
                                                    <p class="text-gray-500">Receive reminder notifications via email</p>
                                                </div>
                                            </div>
                                            
                                            <div class="flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="push-notifications" name="push-notifications" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="push-notifications" class="font-medium text-gray-700">Push Notifications</label>
                                                    <p class="text-gray-500">Receive reminder notifications on your device</p>
                                                </div>
                                            </div>
                                            
                                            <div class="flex items-start">
                                                <div class="flex items-center h-5">
                                                    <input id="reminder-sounds" name="reminder-sounds" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                </div>
                                                <div class="ml-3 text-sm">
                                                    <label for="reminder-sounds" class="font-medium text-gray-700">Play Sound</label>
                                                    <p class="text-gray-500">Play a sound when reminders trigger</p>
                                                </div>
                                            </div>
                                            
                                            <div class="pt-4">
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Save Settings
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Performance Content -->
                <div id="performance-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Performance</h2>
                            <p class="text-gray-600">Track your performance metrics and KPIs</p>
                        </div>
                        <div class="flex space-x-2">
                            <div class="relative">
                                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>This Quarter</option>
                                    <option>Last Quarter</option>
                                    <option>This Year</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Performance Summary -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Summary</h3>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                        <!-- KPI 1 -->
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Task Completion</p>
                                            <p class="text-2xl font-semibold text-gray-900">85%</p>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="flex mb-2 items-center justify-between">
                                                        <div>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                                                +5% from last month
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                                        <div style="width:85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI 2 -->
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Attendance</p>
                                            <p class="text-2xl font-semibold text-gray-900">95%</p>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="flex mb-2 items-center justify-between">
                                                        <div>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                                                +2% from last month
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                                        <div style="width:95%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI 3 -->
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Quality</p>
                                            <p class="text-2xl font-semibold text-gray-900">78%</p>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="flex mb-2 items-center justify-between">
                                                        <div>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-600 bg-yellow-200">
                                                                -2% from last month
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                                        <div style="width:78%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Performance Charts -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Trends</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-80">
                                        <canvas id="performanceTrendsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- KPI Breakdown -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">KPI Breakdown</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Task Completion</p>
                                                <p class="text-sm font-medium text-gray-900">85% (Weight: 40%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                                                        <div style="width:85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Attendance</p>
                                                <p class="text-sm font-medium text-gray-900">95% (Weight: 30%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                                        <div style="width:95%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Quality</p>
                                                <p class="text-sm font-medium text-gray-900">78% (Weight: 20%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                                        <div style="width:78%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Collaboration</p>
                                                <p class="text-sm font-medium text-gray-900">90% (Weight: 10%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-purple-200">
                                                        <div style="width:90%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Overall Performance -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Overall Performance</h3>
                                </div>
                                <div class="p-6">
                                    <div class="text-center">
                                        <div class="relative inline-block">
                                            <svg class="w-32 h-32" viewBox="0 0 36 36">
                                                <path d="M18 2.0845
                                                    a 15.9155 15.9155 0 0 1 0 31.831
                                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                                    fill="none"
                                                    stroke="#e6e6e6"
                                                    stroke-width="3"
                                                    stroke-dasharray="100, 100"
                                                />
                                                <path d="M18 2.0845
                                                    a 15.9155 15.9155 0 0 1 0 31.831
                                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                                    fill="none"
                                                    stroke="#4f46e5"
                                                    stroke-width="3"
                                                    stroke-dasharray="87, 100"
                                                />
                                                <text x="18" y="20.5" text-anchor="middle" font-size="8" fill="#4f46e5" font-weight="bold">87%</text>
                                            </svg>
                                        </div>
                                        <p class="mt-2 text-sm font-medium text-gray-700">Your current performance score</p>
                                        <p class="text-xs text-gray-500">Based on weighted KPI metrics</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Team Comparison -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Team Comparison</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-64">
                                        <canvas id="teamComparisonChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Performance Tips -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Tips</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-lightbulb text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-700">Improve Task Completion</p>
                                                <p class="text-sm text-gray-500">Prioritize tasks with closer deadlines and break larger tasks into smaller steps.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-lightbulb text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-700">Enhance Quality</p>
                                                <p class="text-sm text-gray-500">Double-check your work before submission and ask for feedback from peers.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-lightbulb text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-700">Boost Collaboration</p>
                                                <p class="text-sm text-gray-500">Participate more in team discussions and offer help to colleagues when possible.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Settings Content -->
                <div id="settings-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Settings</h2>
                            <p class="text-gray-600">Manage your account and application preferences</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Account Settings -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Account Settings</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                                            <div class="sm:col-span-4">
                                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="username" id="username" value="johndoe" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm border-gray-300">
                                                </div>
                                            </div>
                                            
                                            <div class="sm:col-span-4">
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                                <div class="mt-1">
                                                    <input id="email" name="email" type="email" value="john.doe@company.com" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                            
                                            <div class="sm:col-span-4">
                                                <label for="timezone" class="block text-sm font-medium text-gray-700">Timezone</label>
                                                <div class="mt-1">
                                                    <select id="timezone" name="timezone" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option>(UTC-12:00) International Date Line West</option>
                                                        <option>(UTC-11:00) Midway Island, Samoa</option>
                                                        <option>(UTC-10:00) Hawaii</option>
                                                        <option>(UTC-09:00) Alaska</option>
                                                        <option selected>(UTC-08:00) Pacific Time (US & Canada)</option>
                                                        <option>(UTC-07:00) Arizona</option>
                                                        <option>(UTC-07:00) Mountain Time (US & Canada)</option>
                                                        <option>(UTC-06:00) Central Time (US & Canada)</option>
                                                        <option>(UTC-05:00) Eastern Time (US & Canada)</option>
                                                        <option>(UTC-04:30) Caracas</option>
                                                        <option>(UTC-04:00) Atlantic Time (Canada)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="sm:col-span-4">
                                                <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                                                <div class="mt-1">
                                                    <select id="language" name="language" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                                        <option selected>English (United States)</option>
                                                        <option>Español (Spanish)</option>
                                                        <option>Français (French)</option>
                                                        <option>Deutsch (German)</option>
                                                        <option>日本語 (Japanese)</option>
                                                        <option>中文 (Chinese)</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="sm:col-span-6">
                                                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                                                <div class="mt-1 flex items-center">
                                                    <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="User profile" class="h-full w-full">
                                                    </span>
                                                    <button type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Change
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="pt-5">
                                            <div class="flex justify-end">
                                                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Notification Preferences -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Notification Preferences</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="space-y-6">
                                            <fieldset>
                                                <legend class="text-base font-medium text-gray-900">Email Notifications</legend>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="task-assigned" name="task-assigned" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="task-assigned" class="font-medium text-gray-700">Task assigned to me</label>
                                                            <p class="text-gray-500">Get notified when a new task is assigned to you</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="task-completed" name="task-completed" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="task-completed" class="font-medium text-gray-700">Task completed</label>
                                                            <p class="text-gray-500">Get notified when someone completes a task you assigned</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="task-overdue" name="task-overdue" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="task-overdue" class="font-medium text-gray-700">Task overdue</label>
                                                            <p class="text-gray-500">Get notified when a task is approaching its deadline</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="new-comment" name="new-comment" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="new-comment" class="font-medium text-gray-700">New comments</label>
                                                            <p class="text-gray-500">Get notified when someone comments on your task</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset>
                                                <legend class="text-base font-medium text-gray-900">Push Notifications</legend>
                                                <div class="mt-4 space-y-4">
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="push-task-assigned" name="push-task-assigned" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="push-task-assigned" class="font-medium text-gray-700">Task assigned to me</label>
                                                            <p class="text-gray-500">Get notified when a new task is assigned to you</p>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-start">
                                                        <div class="flex items-center h-5">
                                                            <input id="push-urgent" name="push-urgent" type="checkbox" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                                        </div>
                                                        <div class="ml-3 text-sm">
                                                            <label for="push-urgent" class="font-medium text-gray-700">Urgent tasks only</label>
                                                            <p class="text-gray-500">Only receive push notifications for urgent tasks</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            <div class="pt-5">
                                                <div class="flex justify-end">
                                                    <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Cancel
                                                    </button>
                                                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Security -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Security</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Password</h4>
                                            <p class="mt-1 text-sm text-gray-500">Last changed 3 months ago</p>
                                            <button class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Change Password
                                            </button>
                                        </div>
                                        
                                        <div class="pt-4 border-t border-gray-200">
                                            <h4 class="text-sm font-medium text-gray-700">Two-Factor Authentication</h4>
                                            <p class="mt-1 text-sm text-gray-500">Add an extra layer of security to your account</p>
                                            <div class="mt-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 bg-green-500 rounded-full p-1">
                                                        <i class="fas fa-check text-white text-xs"></i>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-700">Enabled</p>
                                                    </div>
                                                </div>
                                                <button class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                    Manage
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="pt-4 border-t border-gray-200">
                                            <h4 class="text-sm font-medium text-gray-700">Active Sessions</h4>
                                            <p class="mt-1 text-sm text-gray-500">Manage your logged-in devices</p>
                                            <div class="mt-4 space-y-4">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <i class="fas fa-desktop text-gray-400"></i>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-700">Chrome on Windows</p>
                                                        <p class="text-sm text-gray-500">San Francisco, CA • Active now</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <i class="fas fa-mobile-alt text-gray-400"></i>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-sm font-medium text-gray-700">Safari on iPhone</p>
                                                        <p class="text-sm text-gray-500">New York, NY • 2 hours ago</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="mt-4 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                View all sessions
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Danger Zone -->
                            <div class="bg-white shadow rounded-lg overflow-hidden border border-red-200">
                                <div class="px-4 py-5 sm:px-6 border-b border-red-200 bg-red-50">
                                    <h3 class="text-lg font-medium leading-6 text-red-800">Danger Zone</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Deactivate Account</h4>
                                            <p class="mt-1 text-sm text-gray-500">Temporarily disable your account</p>
                                            <button class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-red-700 bg-red-100 hover:bg-red-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Deactivate Account
                                            </button>
                                        </div>
                                        
                                        <div class="pt-4 border-t border-gray-200">
                                            <h4 class="text-sm font-medium text-gray-700">Delete Account</h4>
                                            <p class="mt-1 text-sm text-gray-500">Permanently remove your account and all data</p>
                                            <button class="mt-2 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                Delete Account
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- User Management Content (Admin) -->
                <div id="user-management-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">User Management</h2>
                            <p class="text-gray-600">Manage all system users and their permissions</p>
                        </div>
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                            <i class="fas fa-plus mr-1"></i> Add User
                        </button>
                    </div>
                    
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">All Users</h3>
                                <div class="flex items-center space-x-2">
                                    <div class="relative">
                                        <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-1 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                            <option>All Roles</option>
                                            <option>Administrator</option>
                                            <option>Manager</option>
                                            <option>Team Lead</option>
                                            <option>Employee</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                    <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                                        <i class="fas fa-filter mr-1"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        User
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Email
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Role
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Last Active
                                                    </th>
                                                    <th scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only">Actions</span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                                                <div class="text-sm text-gray-500">Director</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">john.doe@company.com</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                                            Administrator
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Active
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        2 hours ago
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                                                <div class="text-sm text-gray-500">Finance</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">sarah.johnson@company.com</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                            Manager
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Active
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        1 day ago
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                                                <div class="text-sm text-gray-500">Development</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">michael.chen@company.com</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Team Lead
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Active
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        3 hours ago
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">David Wilson</div>
                                                                <div class="text-sm text-gray-500">Development</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">david.wilson@company.com</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                            Employee
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            Active
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        5 minutes ago
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">
                                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                            </div>
                                                            <div class="ml-4">
                                                                <div class="text-sm font-medium text-gray-900">Emily Brown</div>
                                                                <div class="text-sm text-gray-500">Design</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">emily.brown@company.com</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                            Employee
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                            Pending
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        Never
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                        <button class="text-red-600 hover:text-red-900">Delete</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">View all users</a>
                        </div>
                    </div>
                </div>
                
                <!-- KPI Settings Content (Admin) -->
                <div id="kpi-settings-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">KPI Settings</h2>
                            <p class="text-gray-600">Define and manage Key Performance Indicators for employee evaluation</p>
                        </div>
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                            <i class="fas fa-plus mr-1"></i> Add KPI
                        </button>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Current KPIs -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Current KPIs</h3>
                                </div>
                                <div class="p-6">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    KPI Name
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Description
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Weight
                                                                </th>
                                                                <th scope="col" class="relative px-6 py-3">
                                                                    <span class="sr-only">Actions</span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm font-medium text-gray-900">Task Completion</div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-500">Percentage of assigned tasks completed on time</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">40%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm font-medium text-gray-900">Attendance</div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-500">Percentage of work days present</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">30%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm font-medium text-gray-900">Quality</div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-500">Quality of work based on peer reviews</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">20%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm font-medium text-gray-900">Collaboration</div>
                                                                </td>
                                                                <td class="px-6 py-4">
                                                                    <div class="text-sm text-gray-500">Teamwork and collaboration metrics</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">10%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                                    <button class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 flex items-center justify-between">
                                        <div class="flex-1 flex justify-between sm:hidden">
                                            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                Previous
                                            </a>
                                            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                Next
                                            </a>
                                        </div>
                                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                            <div>
                                                <p class="text-sm text-gray-700">
                                                    Total weight: <span class="font-medium">100%</span>
                                                </p>
                                            </div>
                                            <div>
                                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                        <span class="sr-only">Previous</span>
                                                        <i class="fas fa-chevron-left"></i>
                                                    </a>
                                                    <a href="#" aria-current="page" class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                        1
                                                    </a>
                                                    <span class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                                        ...
                                                    </span>
                                                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                        <span class="sr-only">Next</span>
                                                        <i class="fas fa-chevron-right"></i>
                                                    </a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Add/Edit KPI Form (Hidden by default) -->
                            <div id="kpi-form" class="bg-white shadow rounded-lg overflow-hidden hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Add New KPI</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="space-y-6">
                                            <div>
                                                <label for="kpi-name" class="block text-sm font-medium text-gray-700">KPI Name</label>
                                                <input type="text" id="kpi-name" name="kpi-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            
                                            <div>
                                                <label for="kpi-description" class="block text-sm font-medium text-gray-700">Description</label>
                                                <textarea id="kpi-description" name="kpi-description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                            </div>
                                            
                                            <div>
                                                <label for="kpi-weight" class="block text-sm font-medium text-gray-700">Weight (%)</label>
                                                <input type="number" id="kpi-weight" name="kpi-weight" min="1" max="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            </div>
                                            
                                            <div class="flex justify-end space-x-3">
                                                <button type="button" id="cancel-kpi" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Save KPI
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- KPI Distribution -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">KPI Weight Distribution</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-64">
                                        <canvas id="kpiDistributionChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- KPI Guidelines -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">KPI Guidelines</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Total Weight</h4>
                                            <p class="mt-1 text-sm text-gray-500">The sum of all KPI weights must equal 100%. The system will prevent saving if this condition is not met.</p>
                                        </div>
                                        
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">KPI Types</h4>
                                            <p class="mt-1 text-sm text-gray-500">Consider including both quantitative (task completion, attendance) and qualitative (quality, collaboration) metrics.</p>
                                        </div>
                                        
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-700">Role-Specific KPIs</h4>
                                            <p class="mt-1 text-sm text-gray-500">You can assign different KPI sets to different roles by creating role-specific KPI templates.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Reports Content (Admin) -->
                <div id="reports-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Reports</h2>
                            <p class="text-gray-600">Generate and view performance reports for individuals and teams</p>
                        </div>
                        <div class="flex space-x-2">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                                <i class="fas fa-download mr-1"></i> Export
                            </button>
                            <div class="relative">
                                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>This Quarter</option>
                                    <option>Last Quarter</option>
                                    <option>This Year</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Team Performance Report -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-lg font-medium leading-6 text-gray-900">Team Performance Report</h3>
                                        <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                            <i class="fas fa-print mr-1"></i> Print
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <div class="flex flex-col">
                                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                    <table class="min-w-full divide-y divide-gray-200">
                                                        <thead class="bg-gray-50">
                                                            <tr>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Employee
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Task Completion
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Attendance
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Quality
                                                                </th>
                                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                                    Overall
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-gray-200">
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                                        </div>
                                                                        <div class="ml-4">
                                                                            <div class="text-sm font-medium text-gray-900">Sarah Johnson</div>
                                                                            <div class="text-sm text-gray-500">Manager</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">92%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">98%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">85%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                        91%
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                                        </div>
                                                                        <div class="ml-4">
                                                                            <div class="text-sm font-medium text-gray-900">Michael Chen</div>
                                                                            <div class="text-sm text-gray-500">Team Lead</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">88%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">95%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">82%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                        88%
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                                        </div>
                                                                        <div class="ml-4">
                                                                            <div class="text-sm font-medium text-gray-900">David Wilson</div>
                                                                            <div class="text-sm text-gray-500">Developer</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">85%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">92%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">78%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                                        84%
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="flex items-center">
                                                                        <div class="flex-shrink-0 h-10 w-10">
                                                                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                                                        </div>
                                                                        <div class="ml-4">
                                                                            <div class="text-sm font-medium text-gray-900">Emily Brown</div>
                                                                            <div class="text-sm text-gray-500">Designer</div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">78%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">85%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <div class="text-sm text-gray-900">82%</div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap">
                                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                                        80%
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Attendance Report -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Attendance Report</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-64">
                                        <canvas id="attendanceReportChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Report Filters -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Report Filters</h3>
                                </div>
                                <div class="p-6">
                                    <form>
                                        <div class="space-y-4">
                                            <div>
                                                <label for="report-type" class="block text-sm font-medium text-gray-700">Report Type</label>
                                                <select id="report-type" name="report-type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>Performance Summary</option>
                                                    <option>Attendance</option>
                                                    <option>Task Completion</option>
                                                    <option>Quality Metrics</option>
                                                    <option>Custom Report</option>
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label for="time-period" class="block text-sm font-medium text-gray-700">Time Period</label>
                                                <select id="time-period" name="time-period" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>This Month</option>
                                                    <option>Last Month</option>
                                                    <option>This Quarter</option>
                                                    <option>Last Quarter</option>
                                                    <option>This Year</option>
                                                    <option>Custom Range</option>
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label for="department" class="block text-sm font-medium text-gray-700">Department</label>
                                                <select id="department" name="department" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>All Departments</option>
                                                    <option>Finance</option>
                                                    <option>Marketing</option>
                                                    <option>Development</option>
                                                    <option>Design</option>
                                                    <option>HR</option>
                                                </select>
                                            </div>
                                            
                                            <div>
                                                <label for="employee" class="block text-sm font-medium text-gray-700">Employee</label>
                                                <select id="employee" name="employee" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option>All Employees</option>
                                                    <option>John Doe</option>
                                                    <option>Sarah Johnson</option>
                                                    <option>Michael Chen</option>
                                                    <option>David Wilson</option>
                                                    <option>Emily Brown</option>
                                                </select>
                                            </div>
                                            
                                            <div class="pt-2">
                                                <button type="submit" class="inline-flex justify-center w-full py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Generate Report
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <!-- Quick Stats -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Quick Stats</h3>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Avg. Performance</p>
                                            <p class="text-2xl font-semibold text-gray-900">85.7%</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Avg. Attendance</p>
                                            <p class="text-2xl font-semibold text-gray-900">92.5%</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Tasks Completed</p>
                                            <p class="text-2xl font-semibold text-gray-900">128</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Tasks Overdue</p>
                                            <p class="text-2xl font-semibold text-gray-900">12</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Recent Reports -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Recent Reports</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-file-alt text-indigo-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Q2 Performance Report</p>
                                                <p class="text-sm text-gray-500">Generated: Jul 15, 2023</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-file-alt text-indigo-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">June Attendance Summary</p>
                                                <p class="text-sm text-gray-500">Generated: Jul 1, 2023</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-file-alt text-indigo-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Marketing Team Review</p>
                                                <p class="text-sm text-gray-500">Generated: Jun 25, 2023</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all reports</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set current date
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('en-US', options);
        
        // Attendance button toggle
        const attendanceBtn = document.getElementById('attendance-btn');
        let isCheckedIn = true;
        
        attendanceBtn.addEventListener('click', function() {
            if (isCheckedIn) {
                this.innerHTML = '<i class="fas fa-sign-out-alt mr-1"></i> Check Out';
                this.classList.remove('bg-green-600', 'hover:bg-green-700');
                this.classList.add('bg-red-600', 'hover:bg-red-700');
                document.getElementById('attendance-status').textContent = 'Checked Out: ' + new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                document.getElementById('attendance-status-page').textContent = 'Checked Out: ' + new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                document.getElementById('attendance-timer').textContent = '00:00:00';
                document.getElementById('attendance-timer-page').textContent = '00:00:00';
            } else {
                this.innerHTML = '<i class="fas fa-sign-in-alt mr-1"></i> Check In';
                this.classList.remove('bg-red-600', 'hover:bg-red-700');
                this.classList.add('bg-green-600', 'hover:bg-green-700');
                document.getElementById('attendance-status').textContent = 'Checked In: ' + new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                document.getElementById('attendance-status-page').textContent = 'Checked In: ' + new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                startTimer();
            }
            isCheckedIn = !isCheckedIn;
        });
        
        // Timer function for attendance
        function startTimer() {
            let seconds = 0;
            setInterval(function() {
                seconds++;
                const hours = Math.floor(seconds / 3600);
                const minutes = Math.floor((seconds % 3600) / 60);
                const secs = seconds % 60;
                document.getElementById('attendance-timer').textContent = 
                    `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
                document.getElementById('attendance-timer-page').textContent = 
                    `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
            }, 1000);
        }
        
        // Initialize charts
        // Task Completion Rate Chart
        const completionRateCtx = document.getElementById('completionRateChart').getContext('2d');
        const completionRateChart = new Chart(completionRateCtx, {
            type: 'bar',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Completed Tasks',
                    data: [12, 19, 8, 15, 12, 5, 2],
                    backgroundColor: '#6366f1',
                    borderColor: '#6366f1',
                    borderWidth: 1
                }, {
                    label: 'Assigned Tasks',
                    data: [15, 22, 12, 18, 15, 8, 3],
                    backgroundColor: '#a5b4fc',
                    borderColor: '#a5b4fc',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // KPI Performance Chart
        const kpiPerformanceCtx = document.getElementById('kpiPerformanceChart').getContext('2d');
        const kpiPerformanceChart = new Chart(kpiPerformanceCtx, {
            type: 'radar',
            data: {
                labels: ['Task Completion', 'Attendance', 'Quality', 'Timeliness', 'Collaboration'],
                datasets: [{
                    label: 'Your Score',
                    data: [85, 95, 78, 82, 90],
                    backgroundColor: 'rgba(99, 102, 241, 0.2)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    pointBackgroundColor: 'rgba(99, 102, 241, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(99, 102, 241, 1)'
                }, {
                    label: 'Team Average',
                    data: [75, 88, 72, 78, 85],
                    backgroundColor: 'rgba(165, 180, 252, 0.2)',
                    borderColor: 'rgba(165, 180, 252, 1)',
                    pointBackgroundColor: 'rgba(165, 180, 252, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(165, 180, 252, 1)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        angleLines: {
                            display: true
                        },
                        suggestedMin: 0,
                        suggestedMax: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // Attendance Trends Chart
        const attendanceTrendsCtx = document.getElementById('attendanceTrendsChart').getContext('2d');
        const attendanceTrendsChart = new Chart(attendanceTrendsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Attendance Rate',
                    data: [92, 88, 90, 93, 95, 94, 95],
                    backgroundColor: 'rgba(124, 58, 237, 0.1)',
                    borderColor: 'rgba(124, 58, 237, 1)',
                    borderWidth: 2,
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 80,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // Performance Trends Chart
        const performanceTrendsCtx = document.getElementById('performanceTrendsChart').getContext('2d');
        const performanceTrendsChart = new Chart(performanceTrendsCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Your Performance',
                    data: [82, 85, 83, 87, 86, 88, 87],
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 2,
                    tension: 0.1,
                    fill: true
                }, {
                    label: 'Team Average',
                    data: [78, 80, 79, 82, 83, 85, 84],
                    backgroundColor: 'rgba(165, 180, 252, 0.1)',
                    borderColor: 'rgba(165, 180, 252, 1)',
                    borderWidth: 2,
                    tension: 0.1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        min: 70,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // Team Comparison Chart
        const teamComparisonCtx = document.getElementById('teamComparisonChart').getContext('2d');
        const teamComparisonChart = new Chart(teamComparisonCtx, {
            type: 'bar',
            data: {
                labels: ['Task Completion', 'Attendance', 'Quality', 'Collaboration'],
                datasets: [{
                    label: 'You',
                    data: [85, 95, 78, 90],
                    backgroundColor: 'rgba(99, 102, 241, 0.7)',
                    borderColor: 'rgba(99, 102, 241, 1)',
                    borderWidth: 1
                }, {
                    label: 'Team Average',
                    data: [75, 88, 72, 85],
                    backgroundColor: 'rgba(165, 180, 252, 0.7)',
                    borderColor: 'rgba(165, 180, 252, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // KPI Distribution Chart
        const kpiDistributionCtx = document.getElementById('kpiDistributionChart').getContext('2d');
        const kpiDistributionChart = new Chart(kpiDistributionCtx, {
            type: 'doughnut',
            data: {
                labels: ['Task Completion', 'Attendance', 'Quality', 'Collaboration'],
                datasets: [{
                    data: [40, 30, 20, 10],
                    backgroundColor: [
                        'rgba(99, 102, 241, 0.7)',
                        'rgba(16, 185, 129, 0.7)',
                        'rgba(245, 158, 11, 0.7)',
                        'rgba(139, 92, 246, 0.7)'
                    ],
                    borderColor: [
                        'rgba(99, 102, 241, 1)',
                        'rgba(16, 185, 129, 1)',
                        'rgba(245, 158, 11, 1)',
                        'rgba(139, 92, 246, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
        
        // Attendance Report Chart
        const attendanceReportCtx = document.getElementById('attendanceReportChart').getContext('2d');
        const attendanceReportChart = new Chart(attendanceReportCtx, {
            type: 'bar',
            data: {
                labels: ['John D.', 'Sarah J.', 'Michael C.', 'David W.', 'Emily B.'],
                datasets: [{
                    label: 'Attendance Rate',
                    data: [98, 95, 92, 90, 85],
                    backgroundColor: 'rgba(124, 58, 237, 0.7)',
                    borderColor: 'rgba(124, 58, 237, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        
        // Hide admin links for non-admin users (simulating role-based access)
        // In a real app, this would be handled by the backend
        const userRole = 'Manager'; // Change to 'Employee' to see difference
        if (userRole !== 'Administrator') {
            // document.getElementById('admin-links').style.display = 'none';
        }
        
        // Navigation between pages
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-target');
                
                // Hide all content pages
                document.querySelectorAll('.content-page').forEach(page => {
                    page.classList.add('hidden');
                });
                
                // Show the target content page
                document.getElementById(`${target}-content`).classList.remove('hidden');
                
                // Update active state in sidebar
                document.querySelectorAll('.sidebar-link').forEach(l => {
                    l.classList.remove('text-white', 'bg-indigo-100', 'text-indigo-700');
                    l.classList.add('text-gray-600', 'hover:bg-gray-100');
                    l.querySelector('i').classList.remove('text-indigo-500');
                    l.querySelector('i').classList.add('text-gray-400');
                });
                
                this.classList.remove('text-gray-600', 'hover:bg-gray-100');
                this.classList.add('text-white', 'bg-indigo-100', 'text-indigo-700');
                this.querySelector('i').classList.remove('text-gray-400');
                this.querySelector('i').classList.add('text-indigo-500');
            });
        });
        
        // Task Request Form Toggle
        const taskRequestBtn = document.querySelector('#task-assignment-content button.bg-indigo-600');
        const taskRequestForm = document.getElementById('task-request-form');
        const cancelRequestBtn = document.getElementById('cancel-request');
        
        if (taskRequestBtn && taskRequestForm && cancelRequestBtn) {
            taskRequestBtn.addEventListener('click', function(e) {
                e.preventDefault();
                taskRequestForm.classList.remove('hidden');
            });
            
            cancelRequestBtn.addEventListener('click', function(e) {
                e.preventDefault();
                taskRequestForm.classList.add('hidden');
            });
        }
        
        // New Reminder Form Toggle
        const newReminderBtn = document.getElementById('new-reminder-btn');
        const newReminderForm = document.getElementById('new-reminder-form');
        const cancelReminderBtn = document.getElementById('cancel-reminder');
        
        if (newReminderBtn && newReminderForm && cancelReminderBtn) {
            newReminderBtn.addEventListener('click', function(e) {
                e.preventDefault();
                newReminderForm.classList.remove('hidden');
            });
            
            cancelReminderBtn.addEventListener('click', function(e) {
                e.preventDefault();
                newReminderForm.classList.add('hidden');
            });
        }
        
        // KPI Form Toggle (Admin)
        const newKpiBtn = document.querySelector('#kpi-settings-content button.bg-indigo-600');
        const kpiForm = document.getElementById('kpi-form');
        const cancelKpiBtn = document.getElementById('cancel-kpi');
        
        if (newKpiBtn && kpiForm && cancelKpiBtn) {
            newKpiBtn.addEventListener('click', function(e) {
                e.preventDefault();
                kpiForm.classList.remove('hidden');
            });
            
            cancelKpiBtn.addEventListener('click', function(e) {
                e.preventDefault();
                kpiForm.classList.add('hidden');
            });
        }
        
        // Initialize attendance button on attendance page
        const attendanceBtnPage = document.getElementById('attendance-btn-page');
        if (attendanceBtnPage) {
            attendanceBtnPage.addEventListener('click', function() {
                if (isCheckedIn) {
                    this.innerHTML = '<i class="fas fa-sign-out-alt mr-1"></i> Check Out';
                    this.classList.remove('bg-green-600', 'hover:bg-green-700');
                    this.classList.add('bg-red-600', 'hover:bg-red-700');
                    document.getElementById('attendance-status-page').textContent = 'Checked Out: ' + new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                    document.getElementById('attendance-timer-page').textContent = '00:00:00';
                } else {
                    this.innerHTML = '<i class="fas fa-sign-in-alt mr-1"></i> Check In';
                    this.classList.remove('bg-red-600', 'hover:bg-red-700');
                    this.classList.add('bg-green-600', 'hover:bg-green-700');
                    document.getElementById('attendance-status-page').textContent = 'Checked In: ' + new Date().toLocaleTimeString('en-US', {hour: '2-digit', minute:'2-digit'});
                    startTimer();
                }
                isCheckedIn = !isCheckedIn;
            });
        }
    </script>
</body>
</html>