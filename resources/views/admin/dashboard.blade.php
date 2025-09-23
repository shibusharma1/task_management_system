@extends('layouts.admin.app')
@section('title', 'Admin Dashboard')

@push('styles')
    {{-- Additional Internal --}}
@endpush

@section('contents')
    <!-- Main content -->
    {{-- <div class="flex flex-col flex-1 overflow-hidden"> --}}
    <!-- Top navigation -->


    <!-- Main content area -->
<div class="flex-1 overflow-auto bg-gray-50">
    <!-- Dashboard Content -->
    <div id="dashboard-content" class="content-page p-4 md:p-6">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600">Welcome back! Here's your overview for today, <span id="current-date"
                        class="font-medium"></span>.</p>
            </div>
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
                                    <div class="text-2xl font-semibold text-gray-900">{{ $pendingTask }}</div>
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
                                    <div class="text-2xl font-semibold text-gray-900">{{ $completedTask }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- In Progress Tasks -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                            <i class="fas fa-spinner text-white"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">In Progress</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $inProgressTask ?? 0 }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Tasks -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                            <i class="fas fa-tasks text-white"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Tasks</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $totalTask ?? 0 }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Task Status Overview -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Pending Tasks Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200 bg-yellow-50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium leading-6 text-yellow-800">
                            <i class="fas fa-clock mr-2"></i>Pending Tasks
                        </h3>
                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            3
                        </span>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 max-h-80 overflow-y-auto">
                    <div class="px-4 py-4 sm:px-6 hover:bg-yellow-50 transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0 bg-yellow-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-hourglass-half text-yellow-600 text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">Design Homepage</p>
                                    <p class="text-xs text-gray-500 mt-1">Due: Sep 28, 2025</p>
                                </div>
                            </div>
                            <div class="ml-2 flex-shrink-0">
                                <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                    Pending
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-xs text-gray-500">
                            <i class="fas fa-user-tie mr-1"></i>
                            <span class="truncate">Assigned by: Admin</span>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right border-t border-gray-200">
                    <a href="#" class="text-sm font-medium text-yellow-600 hover:text-yellow-500">
                        View all pending tasks
                    </a>
                </div>
            </div>
        
            <!-- In Progress Tasks Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200 bg-blue-50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium leading-6 text-blue-800">
                            <i class="fas fa-spinner mr-2"></i>In Progress
                        </h3>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            2
                        </span>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 max-h-80 overflow-y-auto">
                    <div class="px-4 py-4 sm:px-6 hover:bg-blue-50 transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0 bg-blue-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-play-circle text-blue-600 text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">API Integration</p>
                                    <p class="text-xs text-gray-500 mt-1">Started: Sep 20, 2025</p>
                                </div>
                            </div>
                            <div class="ml-2 flex-shrink-0">
                                <span class="px-2 py-1 text-xs font-medium bg-blue-100 text-blue-800 rounded-full">
                                    In Progress
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-xs text-gray-500">
                            <i class="fas fa-user-tie mr-1"></i>
                            <span class="truncate">Assigned by: Manager</span>
                        </div>
                        <div class="mt-2">
                            <div class="flex items-center justify-between text-xs text-gray-500 mb-1">
                                <span>Progress</span>
                                <span>65%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5">
                                <div class="bg-blue-600 h-1.5 rounded-full" style="width: 65%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right border-t border-gray-200">
                    <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                        View all in-progress tasks
                    </a>
                </div>
            </div>
        
            <!-- Completed Tasks Card -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200 bg-green-50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-medium leading-6 text-green-800">
                            <i class="fas fa-check-circle mr-2"></i>Completed
                        </h3>
                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                            4
                        </span>
                    </div>
                </div>
                <div class="divide-y divide-gray-200 max-h-80 overflow-y-auto">
                    <div class="px-4 py-4 sm:px-6 hover:bg-green-50 transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center flex-1 min-w-0">
                                <div class="flex-shrink-0 bg-green-100 rounded-full p-2 mr-3">
                                    <i class="fas fa-check text-green-600 text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate line-through">Setup Database</p>
                                    <p class="text-xs text-gray-500 mt-1">Completed: Sep 15, 2025</p>
                                </div>
                            </div>
                            <div class="ml-2 flex-shrink-0">
                                <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">
                                    Completed
                                </span>
                            </div>
                        </div>
                        <div class="mt-2 flex items-center text-xs text-gray-500">
                            <i class="fas fa-user-tie mr-1"></i>
                            <span class="truncate">Assigned by: Lead</span>
                        </div>
                        <div class="mt-2">
                            <p class="text-xs text-gray-600 truncate">
                                <i class="fas fa-sticky-note mr-1"></i>Database setup with migration completed.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right border-t border-gray-200">
                    <a href="#" class="text-sm font-medium text-green-600 hover:text-green-500">
                        View all completed tasks
                    </a>
                </div>
            </div>
        </div>
        

        <!-- Main Dashboard Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - 2/3 width -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Recent Tasks Section -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Recent Tasks</h3>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        @forelse($recentTasks as $task)
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <span class="ml-3 block font-medium {{ $task['status'] == 2 ? 'line-through' : '' }}">
                                        {{ $task['name'] }}
                                    </span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    @if($task['status'] == 0)
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded bg-yellow-100 text-yellow-800">
                                        Pending
                                    </span>
                                    @elseif($task['status'] == 1)
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded bg-blue-100 text-blue-800">
                                        Progress
                                    </span>
                                    @else
                                    <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                    @endif
                                    
                                    @php
                                    $dueDate = \Carbon\Carbon::parse($task['due_date']);
                                    $today = \Carbon\Carbon::today();
                                    @endphp

                                    <span class="px-2 py-1 rounded text-xs 
                                        @if($dueDate->isPast() && !$dueDate->isSameDay($today)) bg-red-500 text-white 
                                        @elseif($dueDate->isSameDay($today)) bg-yellow-400 text-black 
                                        @else bg-green-500 text-white 
                                        @endif">
                                        {{ $dueDate->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500">
                                <i class="fas fa-user-tie mr-1 text-gray-400"></i>
                                <span class="mr-3">Assigned By: {{ $task->assignee->name ?? 'N/A'}} ({{ $task->assignee->designation->designation_name ?? 'N/A'}})</span>
                                <i class="fas fa-project-diagram mr-1 text-gray-400"></i>
                                <span>{{ $task->assignee->department->department_name ?? 'N/A' }}</span>
                            </div>
                        </div>
                        @empty
                        <div class="flex items-center justify-center py-10">
                            <p class="text-gray-600 text-lg">No tasks found.</p>
                        </div>
                        @endforelse
                    </div>
                    <div class="px-4 py-4 sm:px-6 bg-gray-50 text-sm text-right">
                        <a href="{{ route('task.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            View all tasks
                        </a>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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

            <!-- Right Column - 1/3 width -->
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
                                @if($checkedIn && !$checkedOut)
                                <p id="attendance-status" class="text-[16px] font-semibold text-gray-900">
                                    Checked In: {{ $checkInFormatted }}
                                </p>
                                @elseif($checkedOut && $checkedIn)
                                <p id="attendance-status" class="text-[16px] font-semibold text-gray-900">
                                    Checked Out: {{ $checkOutFormatted }}
                                </p>
                                @else
                                <p id="attendance-status" class="text-[16px] font-semibold text-gray-900">
                                    Checked In: --:-- --
                                </p>
                                @endif
                            </div>
                            <div id="attendance-timer" class="text-xl font-bold text-indigo-600"></div>
                        </div>
                        <div class="border-t border-gray-200 pt-4">
                            <h4 class="text-sm font-medium text-gray-500 mb-2">This Week</h4>
                            @php
                            $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                            $todayIndex = now()->dayOfWeek;
                            @endphp

                            <div class="grid grid-cols-7 gap-1 text-center">
                                @foreach ($days as $index => $day)
                                <div class="py-1">
                                    <p class="text-xs text-gray-500">{{ $day }}</p>
                                    @if ($index < $todayIndex)
                                    <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                        <i class="fas fa-check text-green-600 text-xs"></i>
                                    </div>
                                    @elseif ($index === $todayIndex)
                                    @if ($todayIndex === 6)
                                    <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-red-100 flex items-center justify-center">
                                        <i class="fas fa-times text-red-600 text-xs"></i>
                                    </div>
                                    @else
                                    <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-yellow-100 flex items-center justify-center">
                                        <i class="fas fa-clock text-yellow-600 text-xs"></i>
                                    </div>
                                    @endif
                                    @else
                                    <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-gray-100 flex items-center justify-center">
                                        <i class="fas fa-minus text-gray-500 text-xs"></i>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reminders Section -->
                {{-- <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Reminders</h3>
                            <button class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                                <i class="fas fa-plus mr-1"></i> Add
                            </button>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <!-- Reminder items here -->
                    </div>
                </div> --}}

                <!-- Organization Hierarchy -->
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Organization Hierarchy</h3>
                    </div>
                    <div class="p-6 bg-gray-50">
                        <div class="space-y-4">
                            @php
                            function renderUsers($level, $usersByDesignation) {
                                if(!isset($usersByDesignation[$level])) return;
                                echo '<div class="ml-'.($level*8).' pl-4 border-l-4 border-gray-300 space-y-2">';
                                foreach($usersByDesignation[$level] as $user) {
                                    echo '<div class="flex items-center transform hover:scale-105 transition-transform duration-500">';
                                    echo '<div class="flex-shrink-0 w-8 h-8 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold">';
                                    echo $level+1;
                                    echo '</div>';
                                    echo '<div class="ml-3">';
                                    echo '<p class="text-sm font-medium text-gray-900">'.$user->name.'</p>';
                                    echo '<p class="text-xs text-gray-500">'.$user->designation->designation_name.'</p>';
                                    echo '</div>';
                                    echo '</div>';
                                    renderUsers($level+1, $usersByDesignation);
                                }
                                echo '</div>';
                            }
                            @endphp
                            @php renderUsers(0, $usersByDesignation); @endphp
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 text-left p-4 w-full">
        <p class="text-sm text-gray-600">&copy; {{ date('Y') }} Passion Chasers. All rights reserved.</p>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let checkInRaw = @json($checkInRaw); // e.g. "2025-08-13 15:11:00"
            let checkOutRaw = @json($checkOutRaw); // e.g. "2025-08-13 17:45:00"
            let timerEl = document.getElementById("attendance-timer");

            let checkInTimestamp = checkInRaw ? Math.floor(new Date(checkInRaw).getTime() / 1000) : null;
            let checkOutTimestamp = checkOutRaw ? Math.floor(new Date(checkOutRaw).getTime() / 1000) : null;

            if (checkInTimestamp && !checkOutTimestamp) {
                // Start live timer until user checks out
                startTimer(checkInTimestamp, timerEl);
            } else if (checkInTimestamp && checkOutTimestamp) {
                // Already checked out → show total worked time
                let totalSeconds = checkOutTimestamp - checkInTimestamp;
                timerEl.textContent = formatTime(totalSeconds);
            } else {
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
            updateTimer(); // Display immediately
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
