@extends('layouts.admin.app')
@section('title', 'All Notifications')

@section('contents')
<div class="min-h-[calc(100vh-2rem)] p-4 bg-gray-50 overflow-y-auto">
    <div class="bg-white rounded-xl shadow-md max-w-4xl w-full mx-auto">
        <!-- Header -->
        <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Notifications</h2>
            <p class="text-sm text-gray-500 mt-1">All your recent notifications are listed below</p>
        </div>

        <!-- Notifications List -->
        <div class="p-6 space-y-4 max-h-[75vh] overflow-y-auto" id="notificationList">
            
            <!-- Notification Item -->
            <div class="flex items-start gap-4 p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition relative unread">
                <!-- Unread Dot -->
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>

                <!-- Avatar -->
                <div class="flex-shrink-0 w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <img src="https://i.pravatar.cc/40?img=5" class="w-full h-full object-cover" alt="User Avatar">
                </div>

                <!-- Notification Content -->
                <div class="flex-1 space-y-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">Shikshya</span> commented on your task <span class="font-semibold">"Design Landing Page"</span>.
                    </p>
                    <p class="text-xs text-gray-500">"I think the hero section could be larger to catch attention."</p>
                    <span class="text-xs text-gray-400">2 minutes ago</span>
                </div>

                <!-- Action Buttons -->
                <div class="flex-shrink-0 flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View Task</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

            <div class="flex items-start gap-4 p-4 bg-white rounded-lg shadow-sm hover:bg-gray-50 transition relative unread">
                <span class="absolute top-3 left-3 w-2 h-2 bg-blue-500 rounded-full"></span>
                <div class="flex-shrink-0 w-12 h-12 rounded-full overflow-hidden bg-gray-100 flex items-center justify-center">
                    <i class="fas fa-users text-gray-500 text-lg"></i>
                </div>
                <div class="flex-1 space-y-1">
                    <p class="text-sm text-gray-700">
                        <span class="font-medium">Admin</span> assigned you a new project <span class="font-semibold">"Website Redesign"</span>.
                    </p>
                    <p class="text-xs text-gray-500">Deadline: 30th Sep 2025</p>
                    <span class="text-xs text-gray-400">10 minutes ago</span>
                </div>
                <div class="flex-shrink-0 flex flex-col gap-1">
                    <a href="#" class="text-blue-600 text-sm hover:underline">View Project</a>
                    <button class="text-xs text-gray-500 hover:underline mark-read-btn">Mark as Read</button>
                </div>
            </div>

            <!-- Add more notifications in same format -->
        </div>

        <!-- Footer -->
        <div class="flex justify-end p-6 border-t">
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm" id="clearAllBtn">Clear All Notifications</button>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const markReadBtns = document.querySelectorAll(".mark-read-btn");

    markReadBtns.forEach(btn => {
        btn.addEventListener("click", (e) => {
            const notification = e.target.closest(".unread");
            if(notification){
                notification.classList.remove("unread");
                notification.querySelector("span.absolute").remove(); // remove blue dot
                e.target.remove(); // remove the mark as read button
                notification.style.backgroundColor = "#f9fafb"; // light background for read
            }
        });
    });

    const clearAllBtn = document.getElementById("clearAllBtn");
    clearAllBtn.addEventListener("click", () => {
        document.getElementById("notificationList").innerHTML = "";
    });
});
</script>
@endsection
