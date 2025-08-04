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