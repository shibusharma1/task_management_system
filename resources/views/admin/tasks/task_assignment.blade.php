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