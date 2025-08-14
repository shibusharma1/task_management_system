@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')

@push( 'styles')
{{-- Additional Internal --}}

@endpush

@section( 'contents')
<!-- Main content -->
<div class="flex flex-col flex-1 overflow-hidden">
    <!-- Top navigation -->
    @include('layouts.admin.partials.topbar')

    <!-- Main content area -->
    <div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
        <!-- Dashboard Content -->
        <div id="dashboard-content" class="content-page">
            <div class="mb-6 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-gray-600">Welcome back! Here's your overview for today, <span id="current-date"
                            class="font-medium"></span>.</p>
                </div>
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
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
                                    <button
                                        class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                        <i class="fas fa-plus mr-1"></i> Assign Task
                                    </button>
                                    <button
                                        class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
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
                                        <input type="checkbox"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <span class="ml-3 block font-medium">Complete quarterly financial report</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        <span class="text-sm text-gray-500">Due: Aug 5</span>
                                        <div class="flex -space-x-1">
                                            <img class="w-6 h-6 rounded-full border-2 border-white"
                                                src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="">
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
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Requested</span>
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
                                        <input type="checkbox"
                                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                                            checked>
                                        <span class="ml-3 block font-medium line-through">Review employee performance
                                            metrics</span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
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
                                    {{-- <p id="attendance-status" class="text-lg font-semibold text-gray-900">Checked
                                        In: 09:15 AM</p> --}}
                                    @if($checkedIn && !$checkedOut)
                                    <p id="attendance-status" class="text-lg font-semibold text-gray-900">Checked In: {{
                                        $checkInFormatted }}</p>
                                    @elseif($checkedOut && $checkedIn)
                                    <p id="attendance-status" class="text-lg font-semibold text-gray-900">Checked Out:
                                        {{
                                        $checkOutFormatted }}</p>
                                    @else
                                    <p id="attendance-status" class="text-lg font-semibold text-gray-900">Checked In:
                                        --:-- -- </p>
                                    @endif

                                </div>
                                <div id="attendance-timer" class="text-xl font-bold text-indigo-600"></div>
                            </div>
                            <div class="border-t border-gray-200 pt-4">
                                <h4 class="text-sm font-medium text-gray-500 mb-2">This Week</h4>
                                <div class="grid grid-cols-7 gap-1 text-center">
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Mon</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-check text-green-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Tue</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-check text-green-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Wed</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                            <i class="fas fa-check text-green-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Thu</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-yellow-100 flex items-center justify-center">
                                            <i class="fas fa-clock text-yellow-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Fri</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                            <i class="fas fa-minus text-gray-500 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Sat</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                            <i class="fas fa-minus text-gray-500 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="py-1">
                                        <p class="text-xs text-gray-500">Sun</p>
                                        <div
                                            class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
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
                                <button
                                    class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                    <i class="fas fa-plus mr-1"></i> Add
                                </button>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <!-- Reminder item -->
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 pt-0.5">
                                        <div
                                            class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-bell text-indigo-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium text-gray-900">Team Meeting</p>
                                            <p class="text-sm text-gray-500">10:30 AM</p>
                                        </div>
                                        <p class="mt-1 text-sm text-gray-500">Weekly sprint planning with development
                                            team</p>
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
                                        <p class="mt-1 text-sm text-gray-500">Submit final report for client approval
                                        </p>
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
                                    <div
                                        class="flex-shrink-0 w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">
                                        1</div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">John Doe</p>
                                        <p class="text-xs text-gray-500">Director</p>
                                    </div>
                                </div>

                                <!-- Level 2 -->
                                <div class="ml-8 pl-4 border-l-2 border-gray-200">
                                    <div class="flex items-center pt-2">
                                        <div
                                            class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold">
                                            2</div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Sarah Johnson</p>
                                            <p class="text-xs text-gray-500">Manager</p>
                                        </div>
                                    </div>

                                    <!-- Level 3 -->
                                    <div class="ml-8 pl-4 border-l-2 border-gray-200">
                                        <div class="flex items-center pt-2">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 rounded-full bg-green-600 flex items-center justify-center text-white font-bold">
                                                3</div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Michael Chen</p>
                                                <p class="text-xs text-gray-500">Team Lead</p>
                                            </div>
                                        </div>

                                        <!-- Level 4 -->
                                        <div class="ml-8 pl-4 border-l-2 border-gray-200">
                                            <div class="flex items-center pt-2">
                                                <div
                                                    class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white font-bold">
                                                    4</div>
                                                <div class="ml-3">
                                                    <p class="text-sm font-medium text-gray-900">David Wilson</p>
                                                    <p class="text-xs text-gray-500">Developer</p>
                                                </div>
                                            </div>
                                            <div class="flex items-center pt-2">
                                                <div
                                                    class="flex-shrink-0 w-8 h-8 rounded-full bg-gray-600 flex items-center justify-center text-white font-bold">
                                                    4</div>
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
<<<<<<< HEAD
=======
                
                <!-- My Tasks Content -->
                @include('admin.tasks.index')
                
                <!-- Attendance Content -->
                @include('admin.attendance.index')
                
                <!-- Task Assignment Content -->
                @include('admin.tasks.task_assignment')
                
                <!-- Reminders Content -->
                @include('admin.remainders.index')
                
                <!-- Performance Content -->
                @include('admin.performance.index')
                
                <!-- Settings Content -->
                @include('admin.settings.index')
                
                <!-- User Management Content (Admin) -->
                @include('admin.user_management.index')
                
                <!-- KPI Settings Content (Admin) -->
                @include('admin.kpis.index')

                <!-- institution Settings Content (Admin) -->
                @include('admin.institution.index')
                
                <!-- Reports Content (Admin) -->
                @include('admin.reports.index')
>>>>>>> 69dd7b719aabe53e6e754fd528ba9a08c3c7ab03
            </div>
        </div>

        <!-- My Tasks Content -->
        @include('admin.tasks.index')

        <!-- Attendance Content -->
        @include('admin.attendance.index')

        <!-- Task Assignment Content -->
        @include('admin.tasks.task_assignment')

        <!-- Reminders Content -->
        @include('admin.remainders.index')

        <!-- Performance Content -->
        @include('admin.performance.index')

        <!-- Settings Content -->
        @include('admin.settings.index')

        <!-- User Management Content (Admin) -->
        @include('admin.user_management.index')

        <!-- KPI Settings Content (Admin) -->
        @include('admin.kpis.index')

        <!-- Reports Content (Admin) -->
        @include('admin.reports.index')
    </div>
</div>
</div>
<script src="{{ asset('js/dashboard.js') }}"></script>

@endsection

@push('scripts')

<script>
   document.addEventListener("DOMContentLoaded", function () {
    let checkInRaw = @json($checkInRaw);   // e.g. "2025-08-13 15:11:00"
    let checkOutRaw = @json($checkOutRaw); // e.g. "2025-08-13 17:45:00"
    let timerEl = document.getElementById("attendance-timer");

    let checkInTimestamp = checkInRaw ? Math.floor(new Date(checkInRaw).getTime() / 1000) : null;
    let checkOutTimestamp = checkOutRaw ? Math.floor(new Date(checkOutRaw).getTime() / 1000) : null;

    if (checkInTimestamp && !checkOutTimestamp) {
        // Start live timer until user checks out
        startTimer(checkInTimestamp, timerEl);
    } 
    else if (checkInTimestamp && checkOutTimestamp) {
        // Already checked out → show total worked time
        let totalSeconds = checkOutTimestamp - checkInTimestamp;
        timerEl.textContent = formatTime(totalSeconds);
    } 
    else {
        // No check-in yet
        timerEl.textContent = "00:00:00";
    }
});

function startTimer(startTimestamp, displayEl) {
    function updateTimer() {
        let now = Math.floor(Date.now() / 1000);
        let totalSeconds = now - startTimestamp;
        displayEl.textContent = formatTime(totalSeconds);
    }
    updateTimer();              // Display immediately
    setInterval(updateTimer, 1000); // Update every second
}

function formatTime(seconds) {
    let hrs = Math.floor(seconds / 3600);
    let mins = Math.floor((seconds % 3600) / 60);
    let secs = seconds % 60;
    return String(hrs).padStart(2, '0') + ":" +
           String(mins).padStart(2, '0') + ":" +
           String(secs).padStart(2, '0');
}


</script>
@endpush