<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $setting->app_name }} - Modern Task Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @if($setting && $setting->favicon)
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('storage/' . $setting->favicon) }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $setting->favicon) }}">
    @else
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/passionchasers.png') }}">
    @endif

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

        /* Services Section Styles */
        .services-card {
            transition: all 0.3s ease;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            z-index: 1;
        }

        .services-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: linear-gradient(135deg, #4F46E5 0%, #7E22CE 100%);
            opacity: 0;
            transition: all 0.4s ease;
            z-index: -1;
        }

        .services-card:hover::before {
            height: 100%;
            opacity: 0.05;
        }

        .services-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(79, 70, 229, 0.25);
        }

        /* Features Section Styles */
        .features-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            background: linear-gradient(to bottom right, #ffffff, #f8fafc);
        }

        .features-card:hover {
            border-left-color: #4F46E5;
            transform: translateX(8px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Testimonials Section Styles */
        .testimonial-card {
            transition: all 0.3s ease;
            background: white;
            position: relative;
            overflow: hidden;
        }

        .testimonial-card::before {
            content: """;
 position: absolute;
            top: -20px;
            left: 10px;
            font-size: 120px;
            color: #4F46E5;
            opacity: 0.1;
            font-family: Arial;
            line-height: 1;
        }

        .testimonial-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .testimonial-avatar {
            transition: all 0.3s ease;
        }

        .testimonial-card:hover .testimonial-avatar {
            transform: scale(1.1);
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.2);
        }
    </style>
</head>

<body class="bg-light text-dark font-sans antialiased">
    <!-- Navigation -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center text-white font-bold mr-3 shadow-md">
                        <i class="fas fa-tasks"></i>
                    </div>
                    <h1 class="text-xl font-bold text-transparent bg-clip-text gradient-bg">{{ $setting->app_name }}
                    </h1>
                </div>

                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}"
                        class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Home</a>
                    <a href="#about"
                        class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">About</a>
                    <a href="#services"
                        class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Services</a>
                    <a href="#features"
                        class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Features</a>
                    <a href="#testimonials"
                        class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Testimonials</a>
                </nav>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}"
                        class="hidden md:flex gradient-bg text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition duration-300 shadow-md hover:shadow-lg">Login</a>

                        {{-- <a href="#"
                        class="hidden md:flex gradient-bg text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-700 transition duration-300 shadow-md hover:shadow-lg">Admin</a> --}}

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
                <a href="{{ route('home') }}"
                    class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Home</a>
                <a href="#about"
                    class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">About</a>
                <a href="#services"
                    class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Services</a>
                <a href="#features"
                    class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Features</a>
                <a href="#testimonials"
                    class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Testimonials</a>
                <a href="{{ route('login') }}"
                    class="text-gray-600 hover:text-primary-600 transition duration-300 font-medium">Login</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative gradient-bg text-white py-20 flex items-center justify-center overflow-hidden" id="home">
        <!-- Floating background shapes -->
        <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full animate-float"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-white rounded-full animate-float"
                style="animation-delay: 2s;"></div>
        </div>

        <!-- Centered Content -->
        <div class="max-w-3xl mx-auto px-6 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                Streamline Your Workflow,
                <span class="text-primary-400">Maximize Productivity</span>
            </h2>
            <p class="text-lg md:text-xl mb-8 text-primary-100">
                {{ $setting->app_name }} helps individuals and teams organize tasks, track progress, and achieve goals
                faster with intuitive task management tools.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('login') }}"
                    class="bg-white text-primary-600 px-6 py-4 rounded-lg font-semibold text-center shadow-lg hover:bg-gray-50 transition duration-300 flex items-center justify-center">
                    <span>Get Started</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
                <a href="#demo"
                    class="bg-transparent border-2 border-white text-white px-6 py-4 rounded-lg font-semibold text-center hover:bg-white hover:bg-opacity-10 transition duration-300 flex items-center justify-center">
                    <i class="fas fa-play-circle mr-2"></i>
                    <span>Watch Demo</span>
                </a>
            </div>

        </div>
    </section>


    <!-- Stats Section -->
    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="p-6 rounded-lg hover:bg-gray-50 transition duration-300">
                    <p class="text-3xl md:text-4xl font-bold text-primary-600">{{$userCount}}K+</p>
                    <p class="text-gray-600 mt-2">Active Users</p>
                </div>
                <div class="p-6 rounded-lg hover:bg-gray-50 transition duration-300">
                    <p class="text-3xl md:text-4xl font-bold text-primary-600">{{$taskCount}}M+</p>
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

    <!-- About Section -->
    <section class="py-16 bg-gray-50" id="about">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <div class="md:w-1/2">
                    <h3 class="text-3xl md:text-4xl font-bold mb-6">About {{ $setting->app_name }}</h3>
                    <p class="text-gray-600 mb-4">
                        {{ $setting->app_name }} was founded in 2020 with a simple mission: to help teams work more
                        efficiently by providing intuitive task management solutions.
                    </p>
                    <p class="text-gray-600 mb-6">
                        Our platform combines powerful features with an elegant interface, making it easy for teams of
                        all sizes to organize, track, and complete their projects successfully.
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center mr-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="font-medium">Award-winning platform</span>
                        </div>
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center mr-3">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="font-medium">Global team</span>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2">
                    <div class="rounded-xl overflow-hidden shadow-lg">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1000&q=80"
                            alt="Team collaborating" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-16 bg-white" id="services">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Our Services</h3>
                <p class="text-gray-600">We offer comprehensive task management solutions tailored to your team's needs
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="services-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <div
                        class="w-14 h-14 rounded-lg bg-indigo-100 text-primary-600 flex items-center justify-center mb-4">
                        <i class="fas fa-cogs text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Implementation</h4>
                    <p class="text-gray-600">Get started quickly with our expert implementation services and onboarding
                        support.</p>
                </div>

                <div class="services-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <div
                        class="w-14 h-14 rounded-lg bg-green-100 text-secondary-600 flex items-center justify-center mb-4">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Training</h4>
                    <p class="text-gray-600">Comprehensive training programs for your team to maximize {{
                        $setting->app_name }}'s potential.</p>
                </div>

                <div class="services-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <div class="w-14 h-14 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                        <i class="fas fa-headset text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Support</h4>
                    <p class="text-gray-600">24/7 customer support to help you resolve issues and answer questions
                        quickly.</p>
                </div>

                <div class="services-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <div
                        class="w-14 h-14 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                        <i class="fas fa-puzzle-piece text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Integration</h4>
                    <p class="text-gray-600">Seamlessly connect {{ $setting->app_name }} with your existing tools and
                        workflows.</p>
                </div>

                <div class="services-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <div
                        class="w-14 h-14 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4">
                        <i class="fas fa-chart-pie text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Custom Analytics</h4>
                    <p class="text-gray-600">Get tailored reports and analytics to track your team's performance
                        metrics.</p>
                </div>

                <div class="services-card bg-white rounded-xl shadow-md p-6 border border-gray-100">
                    <div class="w-14 h-14 rounded-lg bg-red-100 text-red-600 flex items-center justify-center mb-4">
                        <i class="fas fa-shield-alt text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Security</h4>
                    <p class="text-gray-600">Enterprise-grade security solutions to protect your data and workflows.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-indigo-50" id="features">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Powerful Features for Team Productivity</h3>
                <p class="text-gray-600">Everything you need to organize tasks, collaborate with your team, and hit
                    deadlines</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="features-card bg-white rounded-xl p-6 shadow-sm">
                    <div
                        class="w-14 h-14 rounded-lg bg-indigo-100 text-primary-600 flex items-center justify-center mb-4">
                        <i class="fas fa-tasks text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Intuitive Task Management</h4>
                    <p class="text-gray-600">Create, organize, and prioritize tasks with drag-and-drop simplicity.</p>
                </div>

                <div class="features-card bg-white rounded-xl p-6 shadow-sm">
                    <div
                        class="w-14 h-14 rounded-lg bg-green-100 text-secondary-600 flex items-center justify-center mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Team Collaboration</h4>
                    <p class="text-gray-600">Assign tasks, share files, and communicate in real-time with your team.</p>
                </div>

                <div class="features-card bg-white rounded-xl p-6 shadow-sm">
                    <div class="w-14 h-14 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Progress Tracking</h4>
                    <p class="text-gray-600">Visualize your progress with charts and analytics to stay on target.</p>
                </div>

                <div class="features-card bg-white rounded-xl p-6 shadow-sm">
                    <div
                        class="w-14 h-14 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center mb-4">
                        <i class="fas fa-bell text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Smart Reminders</h4>
                    <p class="text-gray-600">Never miss a deadline with customizable notifications and alerts.</p>
                </div>

                {{-- <div class="features-card bg-white rounded-xl p-6 shadow-sm">
                    <div
                        class="w-14 h-14 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center mb-4">
                        <i class="fas fa-calendar-alt text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Calendar Integration</h4>
                    <p class="text-gray-600">Sync tasks with your calendar and plan your schedule efficiently.</p>
                </div> --}}

                {{-- <div class="features-card bg-white rounded-xl p-6 shadow-sm">
                    <div class="w-14 h-14 rounded-lg bg-red-100 text-red-600 flex items-center justify-center mb-4">
                        <i class="fas fa-mobile-alt text-2xl"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2">Mobile Access</h4>
                    <p class="text-gray-600">Manage tasks on the go with our iOS and Android mobile apps.</p>
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white" id="testimonials">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-3xl md:text-4xl font-bold mb-4">Trusted by Teams Worldwide</h3>
                <p class="text-gray-600">See what our users say about their experience with {{ $setting->app_name }}</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="testimonial-card bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center font-bold text-primary-700 mr-4 testimonial-avatar">
                            SN</div>
                        <div>
                            <h4 class="font-bold">Shikshya Nepal</h4>
                            <p class="text-gray-500 text-sm">Project Manager</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"{{ $setting->app_name }} has transformed how our team works. We're 40%
                        more productive since we started using it."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center font-bold text-primary-700 mr-4 testimonial-avatar">
                            CS</div>
                        <div>
                            <h4 class="font-bold">Charu Shrestha</h4>
                            <p class="text-gray-500 text-sm">Marketing Director</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"The collaboration features are fantastic. Our team is always on the same
                        page now."</p>
                    <div class="mt-4 flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card bg-white rounded-xl p-6 border border-gray-200 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div
                            class="w-12 h-12 rounded-full bg-primary-100 flex items-center justify-center font-bold text-primary-700 mr-4 testimonial-avatar">
                            SS</div>
                        <div>
                            <h4 class="font-bold">Shibu Sharma</h4>
                            <p class="text-gray-500 text-sm">Software Engineer</p>
                        </div>
                    </div>
                    <p class="text-gray-700">"I've tried many task managers, but {{ $setting->app_name }} strikes the
                        perfect balance between simplicity and power."</p>
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div
                            class="w-10 h-10 rounded-lg gradient-bg flex items-center justify-center text-white font-bold mr-3">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h2 class="text-white text-xl font-bold">{{ $setting->app_name }}</h2>
                    </div>
                    <p class="mb-6">The modern task management platform for teams who want to achieve more.</p>
                    <div class="flex space-x-4">
                        <!-- Twitter (X) -->
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                            <span class="text-lg font-bold">𝕏</span>
                        </a>
                    
                        <!-- Facebook -->
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    
                        <!-- LinkedIn -->
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    
                        <!-- Instagram -->
                        <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-6 text-lg">Product</h3>
                    <ul class="space-y-4">
                        <li><a href="#home" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Home</a></li>
                        <li><a href="#features" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Features</a></li>
                        {{-- <li><a href="#pricing" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Pricing</a></li> --}}
                        <li><a href="#services" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Services</a></li>
                        <li><a href="#testimonials" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Testimonials</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-6 text-lg">Resources</h3>
                    <ul class="space-y-4">
                        {{-- <li><a href="#" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Blog</a></li> --}}
                        {{-- <li><a href="#" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Webinars</a></li> --}}
                        <li><a href="#faq" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Support</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-6 text-lg">Company</h3>
                    <ul class="space-y-4">
                        <li><a href="#about" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>About Us</a></li>
                        {{-- <li><a href="#" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Careers</a></li> --}}
                        <li><a href="#" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Contact</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-xs text-primary-600 mr-2"></i>Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter Subscription -->
            <div class="mt-16 pt-8 border-t border-gray-800">
                <div class="md:flex md:items-center md:justify-between">
                    <div class="md:w-1/2 mb-6 md:mb-0">
                        <h3 class="text-white text-lg font-semibold mb-2">Stay Updated</h3>
                        <p class="text-gray-500">Subscribe to our newsletter for the latest updates and features.</p>
                    </div>
                    <div class="md:w-1/2">
                        <form class="flex flex-col sm:flex-row gap-3">
                            <input type="email" placeholder="Your email address" 
                                class="flex-grow px-4 py-3 rounded-lg bg-gray-800 border border-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            <button type="submit" 
                                class="gradient-bg text-white px-6 py-3 rounded-lg font-medium hover:opacity-90 transition duration-300 shadow-md">
                                Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Copyright -->
            <div class="mt-8 pt-8 border-t border-gray-800 text-sm text-center">
                <p>&copy; {{ date('Y') }} {{ $setting->app_name }}. All rights reserved.</p>
                <p class="mt-2">Designed & Developed by Passion Chasers.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    const mobileMenu = document.getElementById('mobile-menu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });
    </script>
</body>

</html>