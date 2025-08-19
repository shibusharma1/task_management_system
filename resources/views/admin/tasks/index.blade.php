<div id="tasks-content" class="content-page hidden">
    <!-- Existing task management content -->
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">My Tasks</h2>
            <p class="text-gray-600">View and manage all your assigned tasks</p>
        </div>
        <div class="flex space-x-2">
            <button id="new-task-button"
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                <i class="fas fa-plus mr-1"></i> New Task
            </button>
            <div class="relative">
                <select
                    class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
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
                    <button
                        class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <button
                        class="inline-flex items-center px-2 py-1 border border-transparent text-xs font-medium rounded text-gray-700 bg-gray-100 hover:bg-gray-200">
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
                        <input type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-3 block font-medium">Complete quarterly financial report</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
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
                        <input type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" checked>
                        <span class="ml-3 block font-medium line-through">Review employee performance metrics</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
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
                        <input type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-3 block font-medium">Prepare presentation for client meeting</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">In
                            Progress</span>
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
                        <input type="checkbox"
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-3 block font-medium">Update project documentation</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Overdue</span>
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



<!-- New Task Modal (hidden by default) -->
<div id="new-task-modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal container -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">Create New Task</h3>
                <div class="mt-5">
                    <form id="task-form">
                        <div class="mb-4">
                            <label for="task-title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <input type="text" id="task-title" name="task-title"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="task-description"
                                class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea id="task-description" name="task-description" rows="3"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="task-due-date" class="block text-sm font-medium text-gray-700">Due
                                    Date</label>
                                <input type="date" id="task-due-date" name="task-due-date"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>
                            <div>
                                <label for="task-status" class="block text-sm font-medium text-gray-700">Status</label>
                                <select id="task-status" name="task-status"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="pending">Pending</option>
                                    <option value="in-progress">In Progress</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="task-assignee"
                                    class="block text-sm font-medium text-gray-700">Assignee</label>
                                <select id="task-assignee" name="task-assignee"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="john">John Doe</option>
                                    <option value="jane">Jane Smith</option>
                                    <option value="mike">Mike Johnson</option>
                                </select>
                            </div>
                            <div>
                                <label for="task-department"
                                    class="block text-sm font-medium text-gray-700">Department</label>
                                <select id="task-department" name="task-department"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="development">Development</option>
                                    <option value="marketing">Marketing</option>
                                    <option value="finance">Finance</option>
                                    <option value="hr">HR</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="task-priority" class="block text-sm font-medium text-gray-700">Priority</label>
                            <select id="task-priority" name="task-priority"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="low">Low</option>
                                <option value="medium" selected>Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                <button id="create-task-button" type="button"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:col-start-2 sm:text-sm">
                    Create Task
                </button>
                <button id="cancel-task-button" type="button"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get modal elements
        const newTaskButton = document.getElementById('new-task-button');
        const newTaskModal = document.getElementById('new-task-modal');
        const cancelTaskButton = document.getElementById('cancel-task-button');
        const createTaskButton = document.getElementById('create-task-button');
        const taskForm = document.getElementById('task-form');
        
        // Show modal when New Task button is clicked
        newTaskButton.addEventListener('click', function() {
            newTaskModal.classList.remove('hidden');
        });
        
        // Hide modal when Cancel button is clicked
        cancelTaskButton.addEventListener('click', function() {
            newTaskModal.classList.add('hidden');
        });
        
        // Handle form submission
        createTaskButton.addEventListener('click', function() {
            if (taskForm.checkValidity()) {
                // Here you would typically send the data to your backend
                // For now, we'll just log it and close the modal
                const formData = new FormData(taskForm);
                const taskData = Object.fromEntries(formData.entries());
                console.log('New task created:', taskData);
                
                // Close the modal
                newTaskModal.classList.add('hidden');
                
                // Reset the form
                taskForm.reset();
                
                // In a real app, you would add the new task to the list here
                // or refresh the task list from the server
            } else {
                taskForm.reportValidity();
            }
        });
        
        // Close modal when clicking outside the modal content
        newTaskModal.addEventListener('click', function(e) {
            if (e.target === newTaskModal) {
                newTaskModal.classList.add('hidden');
            }
        });
    });
</script>