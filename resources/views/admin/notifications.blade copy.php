@extends('layouts.admin.app')
@section('title', 'Notifications')

@section('contents')
<div class="min-h-[calc(100vh-2rem)] p-4 bg-gray-50 overflow-y-auto">
    <div class="bg-white rounded-xl shadow-md max-w-5xl w-full mx-auto">

        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Notifications</h2>
            <p class="text-sm text-gray-500 mt-1">All your recent notifications are listed below</p>
        </div>

        <!-- Notifications Section -->
        <div class="p-6 space-y-6" id="notificationList">

            <!-- Notification 1 -->
            <div class="border rounded-lg p-4 flex items-start gap-4 relative unread notification-item">
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <img src="https://i.pravatar.cc/40?img=5" class="w-full h-full object-cover" alt="User Avatar">
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">Shikshya</span> commented on your task <span class="font-semibold">"Design Landing Page"</span>.
                    </p>
                    <p class="text-xs text-gray-500 mt-1">"I think the hero section could be larger to catch attention."</p>
                    <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                </div>
                <div class="flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View Task</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

            <!-- Notification 2 -->
            <div class="border rounded-lg p-4 flex items-start gap-4 relative unread notification-item">
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-users text-gray-500 text-lg"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">Admin</span> assigned you a new project <span class="font-semibold">"Website Redesign"</span>.
                    </p>
                    <p class="text-xs text-gray-500 mt-1">Deadline: 30th Sep 2025</p>
                    <p class="text-xs text-gray-400 mt-1">10 minutes ago</p>
                </div>
                <div class="flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View Project</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

            <!-- Notification 3 -->
            <div class="border rounded-lg p-4 flex items-start gap-4 relative unread notification-item">
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-comment text-gray-500 text-lg"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">Shubham</span> replied to your comment <span class="font-semibold">"Project Timeline"</span>.
                    </p>
                    <p class="text-xs text-gray-500 mt-1">"We can extend the deadline by 2 days."</p>
                    <p class="text-xs text-gray-400 mt-1">15 minutes ago</p>
                </div>
                <div class="flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View Comment</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

            <!-- Notification 4 -->
            <div class="border rounded-lg p-4 flex items-start gap-4 relative unread notification-item">
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-check text-gray-500 text-lg"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">System</span> marked your task <span class="font-semibold">"Database Backup"</span> as completed.
                    </p>
                    <p class="text-xs text-gray-400 mt-1">30 minutes ago</p>
                </div>
                <div class="flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View Task</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

            <!-- Additional notifications (hidden initially) -->
            <div class="border rounded-lg p-4 flex items-start gap-4 relative unread notification-item hidden">
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                <div class="w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-bell text-gray-500 text-lg"></i>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">Admin</span> sent you a system update notification.
                    </p>
                    <p class="text-xs text-gray-500 mt-1">Version 2.3 is now live.</p>
                    <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                </div>
                <div class="flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="flex justify-center p-3 border-t">
            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm" id="viewAllBtn">
                View All Notifications
            </button>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    // Mark as read functionality
    const markReadBtns = document.querySelectorAll(".mark-read-btn");
    markReadBtns.forEach(btn => {
        btn.addEventListener("click", (e) => {
            const notification = e.target.closest(".unread");
            if(notification){
                notification.classList.remove("unread");
                const dot = notification.querySelector("span.absolute");
                if(dot) dot.remove();
                e.target.remove();
                notification.classList.add("bg-gray-50");
            }
        });
    });

    // View all notifications
    const viewAllBtn = document.getElementById("viewAllBtn");
    viewAllBtn.addEventListener("click", () => {
        const hiddenNotifications = document.querySelectorAll(".notification-item.hidden");
        hiddenNotifications.forEach(item => item.classList.remove("hidden"));
        viewAllBtn.style.display = "none";
    });
});
</script>
@endsection
