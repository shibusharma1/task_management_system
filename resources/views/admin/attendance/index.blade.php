@extends('layouts.admin.app')
@section('title', 'Passion Chasers | Attendance')

@push( 'styles')
{{-- Additional Internal --}}

@endpush

@section( 'contents')
<div class="flex-1 overflow-auto p-4 md:p-6 bg-gray-50">
    <div id="attendance-content" class="content-page">
        <div class="mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Attendance</h2>
                <p class="text-gray-600">Track your check-in/check-out times and attendance history</p>
            </div>
            <div class="flex space-x-2">
                <div class="relative">
                    <select
                        class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
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
            <div class="lg:col-span-2 space-y-6">                
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Current Status</h3>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            
                        @if($checkedIn && !$checkedOut)

                        <div>
                            <p class="text-sm font-medium text-gray-500">Today's Status</p>
                            <p id="attendance-status-page" class="text-lg font-semibold text-gray-900">Checked In: {{
                                $checkInFormatted }}</p>
                        </div>
                        @elseif($checkedOut && $checkedIn)
                        
                        <div>
                            <p class="text-sm font-medium text-gray-500">Today's Status</p>
                            <p id="attendance-status-page" class="text-lg font-semibold text-gray-900">Checked Out: {{
                                $checkOutFormatted }}</p>
                        </div>
                        @else
                        <p class="text-sm font-medium text-gray-500">Today's Status</p>
                        <p id="attendance-status-page" class="text-lg font-semibold text-gray-900">Checked In:
                            --:-- -- </p>
                        @endif
                        <div id="attendance-timer-page" class="text-xl font-bold text-indigo-600"></div>

                        
                        @if(!$checkedIn)
                        <!-- Show Check In button -->
                        <form action="{{ route('attendance.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="in">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none">
                                <i class="fas fa-sign-in-alt mr-1"></i> Check In
                            </button>
                        </form>
                        @elseif($checkedIn && !$checkedOut)
                        <!-- Show Check Out button -->
                        <form action="{{ route('attendance.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="out">
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none">
                                <i class="fas fa-sign-out-alt mr-1"></i> Check Out
                            </button>
                        </form>
                        @else
                        <!-- Already checked in and out -->
                        <button disabled
                            class="px-3 py-1 text-sm font-medium rounded-md text-white bg-gray-400 cursor-not-allowed">
                            Attendance Marked
                        </button>
                        @endif

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
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Check In</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Check Out</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Hours Worked</th>
                                                <th
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach($attendanceHistory as $attendance)
                                            <tr>
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{
                                                    $attendance['date'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $attendance['check_in'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $attendance['check_out'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $attendance['hours_worked'] }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @php
                                                    $colorClass = match($attendance['status_color']) {
                                                    'green' => 'bg-green-100 text-green-800',
                                                    'yellow' => 'bg-yellow-100 text-yellow-800',
                                                    'red' => 'bg-red-100 text-red-800',
                                                    default => 'bg-gray-100 text-gray-800',
                                                    };
                                                    @endphp
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $colorClass }}">
                                                        {{ $attendance['status'] }}
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="px-4 py-4 bg-gray-50">
                        {{-- {{ $attendance->links() }} --}}
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
                        
                    </div>
                    <div class="mt-6">
                        <h4 class="text-sm font-medium text-gray-500 mb-2">This Week</h4>
                       
                        @php
                        
                        $days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

                        // Get today's weekday number (0 = Sunday, 6 = Saturday)
                        $todayIndex = now()->dayOfWeek;
                        @endphp

                        <div class="grid grid-cols-7 gap-1 text-center">
                            @foreach ($days as $index => $day)
                            <div class="py-1">
                                <p class="text-xs text-gray-500">{{ $day }}</p>

                                @if ($index < $todayIndex)  
                                <div
                                    class="w-6 h-6 mx-auto mt-1 rounded-full bg-green-100 flex items-center justify-center">
                                    <i class="fas fa-check text-green-600 text-xs"></i>
                            </div>
                            @elseif ($index === $todayIndex)
                            @if ($todayIndex === 6)
                            
                            <div class="w-6 h-6 mx-auto mt-1 rounded-full bg-red-100 flex items-center justify-center">
                                <i class="fas fa-times text-red-600 text-xs"></i>
                            </div>
                            @else
                            
                            <div
                                class="w-6 h-6 mx-auto mt-1 rounded-full bg-yellow-100 flex items-center justify-center">
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
@endsection
@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let checkInRaw = @json($checkInRaw);   // e.g. "2025-08-13 15:11:00"
    let checkOutRaw = @json($checkOutRaw); // e.g. "2025-08-13 17:45:00"
    let timerEl = document.getElementById("attendance-timer-page");

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