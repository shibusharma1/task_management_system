                <div id="task-assignment-content" class="content-page hidden">
<!-- Existing task assignment content -->
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Task Assignment</h2>
        <p class="text-gray-600">Assign tasks to team members or request tasks from managers</p>
    </div>
    <div class="flex space-x-2">
        <button id="assign-task-button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
            <i class="fas fa-plus mr-1"></i> Assign Task
        </button>
        <button id="request-task-button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none">
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



                <!-- Assign Task Modal -->
<div id="assign-task-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <!-- Modal container -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Assign New Task</h3>
                <div class="mt-5">
                    <form id="assign-task-form">
                        <div class="mb-4">
                            <label for="assign-task-title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <input type="text" id="assign-task-title" name="assign-task-title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="assign-task-description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="assign-task-description" name="assign-task-description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="assign-task-due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                <input type="date" id="assign-task-due-date" name="assign-task-due-date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="assign-task-priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                <select id="assign-task-priority" name="assign-task-priority" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="low">Low</option>
                                    <option value="medium" selected>Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="assign-task-assignee" class="block text-sm font-medium text-gray-700">Assign To</label>
                            <select id="assign-task-assignee" name="assign-task-assignee" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Select team member</option>
                                <option value="michael">Michael Chen (Team Lead)</option>
                                <option value="david">David Wilson (Developer)</option>
                                <option value="emily">Emily Brown (Designer)</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="assign-task-department" class="block text-sm font-medium text-gray-700">Department</label>
                            <select id="assign-task-department" name="assign-task-department" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="development">Development</option>
                                <option value="marketing">Marketing</option>
                                <option value="finance">Finance</option>
                                <option value="hr">HR</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                <button id="confirm-assign-task" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                    Assign Task
                </button>
                <button id="cancel-assign-task" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Request Task Modal -->
<div id="request-task-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        
        <!-- Modal container -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Request New Task</h3>
                <div class="mt-5">
                    <form id="request-task-form">
                        <div class="mb-4">
                            <label for="request-task-title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <input type="text" id="request-task-title" name="request-task-title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                        </div>
                        
                        <div class="mb-4">
                            <label for="request-task-description" class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="request-task-description" name="request-task-description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="request-task-due-date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                <input type="date" id="request-task-due-date" name="request-task-due-date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="request-task-priority" class="block text-sm font-medium text-gray-700">Priority</label>
                                <select id="request-task-priority" name="request-task-priority" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="low">Low</option>
                                    <option value="medium" selected>Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="request-task-manager" class="block text-sm font-medium text-gray-700">Request From</label>
                            <select id="request-task-manager" name="request-task-manager" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="sarah">Sarah Johnson (Manager)</option>
                                <option value="john">John Doe (Director)</option>
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <label for="request-task-department" class="block text-sm font-medium text-gray-700">Department</label>
                            <select id="request-task-department" name="request-task-department" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="development">Development</option>
                                <option value="marketing">Marketing</option>
                                <option value="finance">Finance</option>
                                <option value="hr">HR</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                <button id="confirm-request-task" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                    Submit Request
                </button>
                <button id="cancel-request-task" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    // Debugging - verify script is loading
    console.log("Task assignment script loading...");
    
    document.addEventListener('DOMContentLoaded', function() {
        console.log("DOM fully loaded, attaching event listeners");
        
        // Assign Task Modal Elements
        const assignTaskButton = document.getElementById('assign-task-button');
        const assignTaskModal = document.getElementById('assign-task-modal');
        const cancelAssignTask = document.getElementById('cancel-assign-task');
        const confirmAssignTask = document.getElementById('confirm-assign-task');
        const assignTaskForm = document.getElementById('assign-task-form');
        
        // Request Task Modal Elements
        const requestTaskButton = document.getElementById('request-task-button');
        const requestTaskModal = document.getElementById('request-task-modal');
        const cancelRequestTask = document.getElementById('cancel-request-task');
        const confirmRequestTask = document.getElementById('confirm-request-task');
        const requestTaskForm = document.getElementById('request-task-form');
        
        // Debugging - verify elements exist
        console.log({
            assignTaskButton,
            requestTaskButton,
            assignTaskModal,
            requestTaskModal
        });
        
        // Show Assign Task modal
        assignTaskButton.addEventListener('click', function() {
            console.log("Assign task button clicked");
            assignTaskModal.classList.remove('hidden');
        });
        
        // Hide Assign Task modal
        cancelAssignTask.addEventListener('click', function() {
            console.log("Cancel assign task clicked");
            assignTaskModal.classList.add('hidden');
        });
        
        // Handle Assign Task form submission
        confirmAssignTask.addEventListener('click', function() {
            console.group('Assign Task Submission');
            try {
                if (assignTaskForm.checkValidity()) {
                    const formData = new FormData(assignTaskForm);
                    const taskData = Object.fromEntries(formData.entries());
                    
                    console.log('Task assigned:', taskData);
                    console.table(taskData);
                    
                    assignTaskModal.classList.add('hidden');
                    assignTaskForm.reset();
                    
                    alert('Task assigned successfully! Check console for details.');
                } else {
                    console.warn('Form validation failed');
                    assignTaskForm.reportValidity();
                }
            } catch (error) {
                console.error('Error in assign task handler:', error);
            }
            console.groupEnd();
        });
        
        // Show Request Task modal
        requestTaskButton.addEventListener('click', function() {
            console.log("Request task button clicked");
            requestTaskModal.classList.remove('hidden');
        });
        
        // Hide Request Task modal
        cancelRequestTask.addEventListener('click', function() {
            console.log("Cancel request task clicked");
            requestTaskModal.classList.add('hidden');
        });
        
        // Handle Request Task form submission
        confirmRequestTask.addEventListener('click', function() {
            console.group('Request Task Submission');
            try {
                if (requestTaskForm.checkValidity()) {
                    const formData = new FormData(requestTaskForm);
                    const taskData = Object.fromEntries(formData.entries());
                    
                    console.log('Task requested:', taskData);
                    console.table(taskData);
                    
                    requestTaskModal.classList.add('hidden');
                    requestTaskForm.reset();
                    
                    alert('Task requested successfully! Check console for details.');
                } else {
                    console.warn('Form validation failed');
                    requestTaskForm.reportValidity();
                }
            } catch (error) {
                console.error('Error in request task handler:', error);
            }
            console.groupEnd();
        });
        
        // Close modals when clicking outside
        [assignTaskModal, requestTaskModal].forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    console.log("Clicked outside modal - closing");
                    modal.classList.add('hidden');
                }
            });
        });
        
        console.log("All event listeners attached successfully");
    });
</script>