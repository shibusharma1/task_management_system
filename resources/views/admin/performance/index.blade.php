 @extends('layouts.admin.app')
@section('title', 'Passion Chasers | Attendance')

@push( 'styles')
{{-- Additional Internal --}}

@endpush

@section( 'contents')
 <div id="performance-content" class="content-page hidden">
                    <div class="mb-6 flex justify-between items-center">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Performance</h2>
                            <p class="text-gray-600">Track your performance metrics and KPIs</p>
                        </div>
                        <div class="flex space-x-2">
                            <div class="relative">
                                <select class="appearance-none bg-white border border-gray-300 rounded-md pl-3 pr-8 py-2 text-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                    <option>This Month</option>
                                    <option>Last Month</option>
                                    <option>This Quarter</option>
                                    <option>Last Quarter</option>
                                    <option>This Year</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
                        <!-- Left Column -->
                        <div class="lg:col-span-2 space-y-6">
                            <!-- Performance Summary -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Summary</h3>
                                </div>
                                <div class="p-6">
                                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                                        <!-- KPI 1 -->
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Task Completion</p>
                                            <p class="text-2xl font-semibold text-gray-900">85%</p>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="flex mb-2 items-center justify-between">
                                                        <div>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                                                +5% from last month
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                                        <div style="width:85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI 2 -->
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Attendance</p>
                                            <p class="text-2xl font-semibold text-gray-900">95%</p>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="flex mb-2 items-center justify-between">
                                                        <div>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                                                +2% from last month
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                                        <div style="width:95%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI 3 -->
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-sm font-medium text-gray-500">Quality</p>
                                            <p class="text-2xl font-semibold text-gray-900">78%</p>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="flex mb-2 items-center justify-between">
                                                        <div>
                                                            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-yellow-600 bg-yellow-200">
                                                                -2% from last month
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                                        <div style="width:78%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Performance Charts -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Trends</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-80">
                                        <canvas id="performanceTrendsChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- KPI Breakdown -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">KPI Breakdown</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Task Completion</p>
                                                <p class="text-sm font-medium text-gray-900">85% (Weight: 40%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-blue-200">
                                                        <div style="width:85%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Attendance</p>
                                                <p class="text-sm font-medium text-gray-900">95% (Weight: 30%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                                                        <div style="width:95%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Quality</p>
                                                <p class="text-sm font-medium text-gray-900">78% (Weight: 20%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-yellow-200">
                                                        <div style="width:78%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-yellow-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- KPI Item -->
                                        <div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm font-medium text-gray-700">Collaboration</p>
                                                <p class="text-sm font-medium text-gray-900">90% (Weight: 10%)</p>
                                            </div>
                                            <div class="mt-1">
                                                <div class="relative pt-1">
                                                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-purple-200">
                                                        <div style="width:90%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-purple-500"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Overall Performance -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Overall Performance</h3>
                                </div>
                                <div class="p-6">
                                    <div class="text-center">
                                        <div class="relative inline-block">
                                            <svg class="w-32 h-32" viewBox="0 0 36 36">
                                                <path d="M18 2.0845
                                                    a 15.9155 15.9155 0 0 1 0 31.831
                                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                                    fill="none"
                                                    stroke="#e6e6e6"
                                                    stroke-width="3"
                                                    stroke-dasharray="100, 100"
                                                />
                                                <path d="M18 2.0845
                                                    a 15.9155 15.9155 0 0 1 0 31.831
                                                    a 15.9155 15.9155 0 0 1 0 -31.831"
                                                    fill="none"
                                                    stroke="#4f46e5"
                                                    stroke-width="3"
                                                    stroke-dasharray="87, 100"
                                                />
                                                <text x="18" y="20.5" text-anchor="middle" font-size="8" fill="#4f46e5" font-weight="bold">87%</text>
                                            </svg>
                                        </div>
                                        <p class="mt-2 text-sm font-medium text-gray-700">Your current performance score</p>
                                        <p class="text-xs text-gray-500">Based on weighted KPI metrics</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Team Comparison -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Team Comparison</h3>
                                </div>
                                <div class="p-6">
                                    <div class="h-64">
                                        <canvas id="teamComparisonChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Performance Tips -->
                            <div class="bg-white shadow rounded-lg overflow-hidden">
                                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">Performance Tips</h3>
                                </div>
                                <div class="p-6">
                                    <div class="space-y-4">
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-lightbulb text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-700">Improve Task Completion</p>
                                                <p class="text-sm text-gray-500">Prioritize tasks with closer deadlines and break larger tasks into smaller steps.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-lightbulb text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-700">Enhance Quality</p>
                                                <p class="text-sm text-gray-500">Double-check your work before submission and ask for feedback from peers.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <i class="fas fa-lightbulb text-yellow-500"></i>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-700">Boost Collaboration</p>
                                                <p class="text-sm text-gray-500">Participate more in team discussions and offer help to colleagues when possible.</p>
                                            </div>
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