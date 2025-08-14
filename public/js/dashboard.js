
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
    link.addEventListener('click', function (e) {
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
    taskRequestBtn.addEventListener('click', function (e) {
        e.preventDefault();
        taskRequestForm.classList.remove('hidden');
    });

    cancelRequestBtn.addEventListener('click', function (e) {
        e.preventDefault();
        taskRequestForm.classList.add('hidden');
    });
}

// New Reminder Form Toggle
const newReminderBtn = document.getElementById('new-reminder-btn');
const newReminderForm = document.getElementById('new-reminder-form');
const cancelReminderBtn = document.getElementById('cancel-reminder');

if (newReminderBtn && newReminderForm && cancelReminderBtn) {
    newReminderBtn.addEventListener('click', function (e) {
        e.preventDefault();
        newReminderForm.classList.remove('hidden');
    });

    cancelReminderBtn.addEventListener('click', function (e) {
        e.preventDefault();
        newReminderForm.classList.add('hidden');
    });
}

// KPI Form Toggle (Admin)
const newKpiBtn = document.querySelector('#kpi-settings-content button.bg-indigo-600');
const kpiForm = document.getElementById('kpi-form');
const cancelKpiBtn = document.getElementById('cancel-kpi');

if (newKpiBtn && kpiForm && cancelKpiBtn) {
    newKpiBtn.addEventListener('click', function (e) {
        e.preventDefault();
        kpiForm.classList.remove('hidden');
    });

    cancelKpiBtn.addEventListener('click', function (e) {
        e.preventDefault();
        kpiForm.classList.add('hidden');
    });
}

// Initialize attendance button on attendance page
const attendanceBtnPage = document.getElementById('attendance-btn-page');
if (attendanceBtnPage) {
    attendanceBtnPage.addEventListener('click', function () {
        if (isCheckedIn) {
            this.innerHTML = '<i class="fas fa-sign-out-alt mr-1"></i> Check Out';
            this.classList.remove('bg-green-600', 'hover:bg-green-700');
            this.classList.add('bg-red-600', 'hover:bg-red-700');
            document.getElementById('attendance-status-page').textContent = 'Checked Out: ' + new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
            document.getElementById('attendance-timer-page').textContent = '00:00:00';
        } else {
            this.innerHTML = '<i class="fas fa-sign-in-alt mr-1"></i> Check In';
            this.classList.remove('bg-red-600', 'hover:bg-red-700');
            this.classList.add('bg-green-600', 'hover:bg-green-700');
            document.getElementById('attendance-status-page').textContent = 'Checked In: ' + new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
            startTimer();
        }
        isCheckedIn = !isCheckedIn;
    });
}
