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