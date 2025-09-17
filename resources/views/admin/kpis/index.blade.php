@extends('layouts.admin.app')
@section('title', 'Passion Chasers | Attendance')

@push( 'styles')
{{-- Additional Internal --}}

@endpush

@section( 'contents')
<div id="kpi-settings-content" class="content-page hidden">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">KPI Settings</h2>
            <p class="text-gray-600">Define and manage Key Performance Indicators for employee evaluation</p>
        </div>
        <button
            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
            <i class="fas fa-plus mr-1"></i> Add KPI
        </button>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Current KPIs -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Current KPIs</h3>
                </div>
                <div class="p-6">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    KPI Name
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Description
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Weight
                                                </th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Actions</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">Task Completion</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">Percentage of assigned tasks
                                                        completed on time</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">40%</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button
                                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">Attendance</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">Percentage of work days present
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">30%</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button
                                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">Quality</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">Quality of work based on peer
                                                        reviews</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">20%</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button
                                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">Collaboration</div>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="text-sm text-gray-500">Teamwork and collaboration
                                                        metrics</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">10%</div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button
                                                        class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</button>
                                                    <button class="text-red-600 hover:text-red-900">Delete</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Previous
                            </a>
                            <a href="#"
                                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                Next
                            </a>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Total weight: <span class="font-medium">100%</span>
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                    aria-label="Pagination">
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Previous</span>
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                    <a href="#" aria-current="page"
                                        class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        1
                                    </a>
                                    <span
                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                        ...
                                    </span>
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                        <span class="sr-only">Next</span>
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add/Edit KPI Form (Hidden by default) -->
            <div id="kpi-form" class="bg-white shadow rounded-lg overflow-hidden hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Add New KPI</h3>
                </div>
                <div class="p-6">
                    <form>
                        <div class="space-y-6">
                            <div>
                                <label for="kpi-name" class="block text-sm font-medium text-gray-700">KPI Name</label>
                                <input type="text" id="kpi-name" name="kpi-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="kpi-description"
                                    class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea id="kpi-description" name="kpi-description" rows="3"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>

                            <div>
                                <label for="kpi-weight" class="block text-sm font-medium text-gray-700">Weight
                                    (%)</label>
                                <input type="number" id="kpi-weight" name="kpi-weight" min="1" max="100"
                                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <div class="flex justify-end space-x-3">
                                <button type="button" id="cancel-kpi"
                                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save KPI
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- KPI Distribution -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">KPI Weight Distribution</h3>
                </div>
                <div class="p-6">
                    <div class="h-64">
                        <canvas id="kpiDistributionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- KPI Guidelines -->
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">KPI Guidelines</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Total Weight</h4>
                            <p class="mt-1 text-sm text-gray-500">The sum of all KPI weights must equal 100%. The system
                                will prevent saving if this condition is not met.</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-700">KPI Types</h4>
                            <p class="mt-1 text-sm text-gray-500">Consider including both quantitative (task completion,
                                attendance) and qualitative (quality, collaboration) metrics.</p>
                        </div>

                        <div>
                            <h4 class="text-sm font-medium text-gray-700">Role-Specific KPIs</h4>
                            <p class="mt-1 text-sm text-gray-500">You can assign different KPI sets to different roles
                                by creating role-specific KPI templates.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

@endpush