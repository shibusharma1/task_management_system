@extends('layouts.admin.app')
@section('title', 'Passion Chasers | Attendance')

@push( 'styles')
{{-- Additional Internal --}}

@endpush

@section( 'contents')
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
                @endsection
                @push('scripts')
                    
                @endpush