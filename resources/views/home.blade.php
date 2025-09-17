<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TaskFlow - Modern Task Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        dark: '#1f2937',
                        light: '#f9fafb'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #7E22CE 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .testimonial-card {
            transition: all 0.3s ease;
        }
        .testimonial-card:hover {
            transform: scale(1.02);
        }
    </style>
</head>

<body class="bg-light text-dark font-sans antialiased">
    <!-- Navigation -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center text-white font-bold mr-3 shadow-md">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h1 class="text-xl font-bold text-transparent bg-clip-text gradient-bg">TaskFlow</h1>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Home</a>
                    <a href="#features" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Features</a>
                    <a href="#testimonials" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Testimonials</a>
                    <a href="#pricing" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Pricing</a>
                    <a href="#faq" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">FAQ</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium hidden md:block">Login</a>
                    <a href="{{ route('register') }}" class="bg-primary-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition duration-300 shadow-md hover:shadow-lg">Get Started</a>
                    
                    <!-- Mobile menu button -->
                    <button id="mobile-menu-button" class="md:hidden text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t py-4 px-4">
            <div class="flex flex-col space-y-4">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Home</a>
                <a href="#features" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Features</a>
                <a href="#testimonials" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Testimonials</a>
                <a href="#pricing" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Pricing</a>
                <a href="#faq" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">FAQ</a>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative gradient-bg text-white pt-16 pb-28 md:pt-24 md:pb-36 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full animate-float"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full animate-float" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center relative z-10">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">Streamline Your Workflow, <span class="text-secondary-400">Maximize Productivity</span></h2>
                <p class="text-lg md:text-xl mb-8 text-primary-100">TaskFlow helps individuals and teams organize tasks, track progress, and achieve goals faster with intuitive task management tools.</p>
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('register') }}" class="bg-white text-primary-600 px-6 py-4 rounded-lg font-semibold text-center shadow-lg hover:bg-gray-50 transition duration-300 flex items-center justify-center">
                        <span>Start Free Trial</span>
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    <a href="#demo" class="bg-transparent border-2 border-white text-white px-6 py-4 rounded-lg font-semibold text-center hover:bg-white hover:bg-opacity-10 transition duration-300 flex items-center justify-center">
                        <i class="fas fa-play-circle mr-2"></i>
                        <span>Watch Demo</span>
                    </a>
                </div>
                <p class="mt-4 text-primary-200 text-sm">No credit card required. Free 14-day trial.</p>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative w-full max-w-md">
                    <div class="bg-white rounded-2xl shadow-2xl p-6 text-dark">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="font-bold text-lg">Today's Tasks</h3>
                            <span class="text-xs bg-primary-100 text-primary-700 px-2 py-1 rounded-full">5 tasks</span>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition duration-300">
                                <input type="checkbox" class="rounded-full h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500">
                                <div class="ml-3">
                                    <p class="font-medium">Team meeting</p>
                                    <p class="text-xs text-gray-500">10:00 AM</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition duration-300">
                                <input type="checkbox" class="rounded-full h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500">
                                <div class="ml-3">
                                    <p class="font-medium">Project proposal</p>
                                    <p class="text-xs text-gray-500">12:00 PM</p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-3 rounded-lg hover:bg-gray-50 transition duration-300">
                                <input type="checkbox" class="rounded-full h-5 w-5 text-primary-600 border-gray-300 focus:ring-primary-500" checked>
                                <div class="ml-3">
                                    <p class="font-medium line-through text-gray-500">Email client</p>
                                    <p class="text-xs text-gray-500">Completed</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-200">
                            <div class="flex">
                                <input type="text" placeholder="Add new task..." class="flex-1 bg-gray-100 rounded-l-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                                <button class="bg-primary-600 text-white px-4 rounded-r-lg hover:bg-primary-700 transition duration-300">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="absolute -bottom-4 -left-4 h-24 w-24 rounded-lg bg-secondary-400 bg-opacity-20 -z-10"></div>
                    <div class="absolute -top-4 -right-4 h-20 w-20 rounded-full bg-primary-400 bg-opacity-20 -z-10"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6 rounded-lg hover:bg-gray-50 transition duration-300">
                    <p class="text-3xl md:text-4xl font-bold text-primary-600">50K+</p>
                    <p class="text-gray-600 mt-2">Active Users</p>
                </div>
                <div class="p-6 rounded-lg hover:bg-gray-50 transition duration-300">
                    <p class="text-3xl md:text-4xl font-bold text-primary-600">1M+</p>
                    <p class="text-gray-600 mt-2">Tasks Completed</p>
                </div>
                <div class="p-6 rounded-lg hover:bg-gray-50 transition duration-300">
                    <p class="text-3xl md:text-4xl font-bold text-primary-600">95%</p>
                    <p class="text-gray-600 mt-2">Satisfaction Rate</p>
                </div>
                <div class="p-6 rounded-lg hover:bg-gray-50 transition duration-300">
                    <p class="text-3xl md:text-4xl font-bold text-primary-600">24/7</p>
                    <p class="text-gray-600 mt-2">Support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16 bg-gray-50" id="features">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Powerful Features for Team Productivity</h3>
                <p class="text-gray-600">Everything you need to organize tasks, collaborate with your team, and hit deadlines</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="feature-card bg-white rounded-xl shadow-md p-6 transition duration-300">
                    <div class="w-14 h-14 rounded-lg bg-indigo-100 text-primary-600 flex items-center justify-center mb-4">
                        <i class="fas fa-tasks text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Intuitive Task Management</h4>
                    <p class="text-gray-600">Create, organize, and prioritize tasks with drag-and-drop simplicity.</p>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md p-6 transition duration-300">
                    <div class="w-14 h-14 rounded-lg bg-green-100 text-secondary-600 flex items-center justify-center mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Team Collaboration</h4>
                    <p class="text-gray-600">Assign tasks, share files, and communicate in real-time with your team.</p>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md p-6 transition duration-300">
                    <div class="w-14 h-14 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Progress Tracking</h4>
                    <p class="text-gray-600">Visualize your progress with charts and analytics to stay on target.</p>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md p-6 transition duration-300">
                    <div class="w-14 h-14 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Smart Reminders</h4>
                    <p class="text-gray-600">Never miss a deadline with customizable notifications and alerts.</p>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md p-6 transition duration-300">
                    <div class="w-14 h-14 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Calendar Integration</h4>
                    <p class="text-gray-600">Sync tasks with your calendar and plan your schedule efficiently.</p>
                </div>
                
                <div class="feature-card bg-white rounded-xl shadow-md p-6 transition duration-300">
                    <div class="w-14 h-14 rounded-lg bg-red-100 text-red-600 flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Mobile Access</h4>
                    <p class="text-gray-600">Manage tasks on the go with our iOS and Android mobile apps.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white" id="testimonials">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Trusted by Teams Worldwide</h3>
                <p class="text-gray-600">See what our users say about their experience with TaskFlow</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="testimonial-card bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center font-bold text-primary-700 mr-4">JD</div>
                        <div>
                            <h4 class="font-bold">John Doe</h4>
                            <p class="text-gray-500 text-sm">Project Manager</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"TaskFlow has transformed how our team works. We're 40% more productive since we started using it."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="testimonial-card bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center font-bold text-primary-700 mr-4">SM</div>
                        <div>
                            <h4 class="font-bold">Sarah Miller</h4>
                            <p class="text-gray-500 text-sm">Marketing Director</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"The collaboration features are fantastic. Our team is always on the same page now."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                
                <div class="testimonial-card bg-gray-50 rounded-xl p-6 border border-gray-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center font-bold text-primary-700 mr-4">RJ</div>
                        <div>
                            <h4 class="font-bold">Robert Johnson</h4>
                            <p class="text-gray-500 text-sm">Software Engineer</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"I've tried many task managers, but TaskFlow strikes the perfect balance between simplicity and power."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 gradient-bg text-white">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h3 class="text-3xl md:text-4xl font-bold mb-6">Ready to boost your productivity?</h3>
            <p class="text-lg mb-8 max-w-2xl mx-auto text-primary-100">Join thousands of teams who use TaskFlow to organize their work and get more done.</p>
            <a href="{{ route('register') }}" class="bg-white text-primary-600 px-8 py-4 rounded-lg font-bold text-lg shadow-lg hover:bg-gray-100 transition duration-300 inline-block">
                Get Started for Free
            </a>
            <p class="mt-4 text-primary-200 text-sm">No credit card required. Free 14-day trial.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center text-white font-bold mr-3">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h2 class="text-white text-xl font-bold">TaskFlow</h2>
                    </div>
                    <p class="mb-4">The modern task management platform for teams who want to achieve more.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition duration-300"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-white font-semibold mb-4">Product</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition duration-300">Features</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Pricing</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Templates</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Integrations</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-semibold mb-4">Resources</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition duration-300">Blog</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Webinars</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Documentation</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Support</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-white font-semibold mb-4">Company</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition duration-300">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Contact</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-sm text-center">
                <p>&copy; 2025 TaskFlow. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>