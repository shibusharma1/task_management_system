<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | TaskFlow Pro</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }

        .login-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <div class="mx-auto w-16 h-16 rounded-lg bg-indigo-600 flex items-center justify-center mb-4">
                <i class="fas fa-tasks text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">TaskFlow Pro</h1>
            <p class="text-gray-600 mt-2">Inter-Office Task Management System</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white rounded-xl login-card overflow-hidden border border-gray-200">
            <div class="px-8 py-6">
                <h2 class="text-2xl font-semibold text-gray-800 text-center">Sign In</h2>
                <p class="text-gray-500 text-sm text-center mt-1">Enter your credentials to access your account</p>

                {{-- <form class="mt-6 space-y-5" onsubmit="event.preventDefault(); handleLogin();"> --}}
                    <form class="mt-6 space-y-5" id="login-form" action="{{ route('login.authenticate') }}" method="POST"
                        onsubmit="return handleLogin(event)">
                        @csrf
                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email
                                Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input id="email" name="email" type="email" required
                                    class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition input-focus"
                                    placeholder="your@email.com">
                            </div>
                            <p id="email-error" class="mt-1 text-sm text-red-600 hidden">Please enter a valid email
                                address</p>
                        </div>

                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-gray-400"></i>
                                </div>
                                <input id="password" name="password" type="password" required
                                    class="pl-10 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition input-focus"
                                    placeholder="••••••••">
                            </div>
                            <p id="password-error" class="mt-1 text-sm text-red-600 hidden">Password must be at least 8
                                characters</p>
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <input id="remember_me" name="remember" type="checkbox"
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                                    Remember me
                                </label>
                            </div>
                            <div class="text-sm">
                                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                                    Forgot password?
                                </a>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit"
                                class="w-full py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                                Sign In
                            </button>
                        </div>
                    </form>
            </div>

            <!-- Footer Links -->
            <div class="bg-gray-50 px-6 py-4 rounded-b-xl border-t border-gray-200">
                <div class="text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 ml-1">
                        Register here
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright Notice -->
        <div class="mt-8 text-center text-xs text-gray-500">
            &copy; {{ date('Y')}} TaskFlow Pro. All rights reserved.
        </div>
    </div>

    {{-- <script>
        function handleLogin() {
            // Simple validation
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');
            
            // Reset errors
            emailError.classList.add('hidden');
            passwordError.classList.add('hidden');
            
            let isValid = true;
            
            // Email validation
            if (!email || !email.includes('@') || !email.includes('.')) {
                emailError.classList.remove('hidden');
                isValid = false;
            }
            
            // Password validation
            if (!password || password.length < 8) {
                passwordError.classList.remove('hidden');
                isValid = false;
            }
            
            if (isValid) {
                // In a real app, you would submit the form here
                console.log('Login submitted with:', { email, password });
                alert('Login successful! Redirecting to dashboard...');
            }
        }
    </script> --}}
    <script>
        function handleLogin(event) {
        event.preventDefault(); // Stop the form from submitting by default

        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const emailError = document.getElementById('email-error');
        const passwordError = document.getElementById('password-error');

        emailError.classList.add('hidden');
        passwordError.classList.add('hidden');

        let isValid = true;

        // Email validation
        if (!email || !email.includes('@') || !email.includes('.')) {
            emailError.classList.remove('hidden');
            isValid = false;
        }

        // Password validation
        if (!password || password.length < 8) {
            passwordError.classList.remove('hidden');
            isValid = false;
        }

        // If valid, submit the form
        if (isValid) {
            document.getElementById('login-form').submit();
        }
    }
    </script>

</body>

</html>