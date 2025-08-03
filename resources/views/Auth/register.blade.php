<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | TaskFlow Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
        .auth-bg {
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        }
        .auth-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            max-height: 95vh;
        }
        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3);
        }
    </style>
</head>
<body class="auth-bg flex items-center justify-center p-4 h-screen">
    <div class="w-full max-w-md mx-auto my-auto">
        <!-- Logo Header -->
        <div class="text-center mb-6">
            <div class="mx-auto w-14 h-14 rounded-lg bg-indigo-600 flex items-center justify-center mb-3">
                <i class="fas fa-tasks text-white text-xl"></i>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">TaskFlow Pro</h1>
            <p class="text-gray-500 text-sm mt-1">Inter-Office Task Management</p>
        </div>

        <!-- Registration Card -->
        <div class="bg-white rounded-lg auth-card border border-gray-200 overflow-hidden">
            <div class="px-6 py-5">
                <h2 class="text-xl font-semibold text-gray-800 text-center">Create Account</h2>
                <p class="text-gray-500 text-xs text-center mt-1">Join to access the dashboard</p>

                <form class="mt-4 space-y-3" onsubmit="event.preventDefault(); handleRegister();">
                    <!-- Full Name -->
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400 text-sm"></i>
                            </div>
                            <input id="fullName" type="text" required
                                class="text-sm pl-9 w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition input-focus"
                                placeholder="John Doe">
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input id="email" type="email" required
                                class="text-sm pl-9 w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition input-focus"
                                placeholder="you@example.com">
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input id="password" type="password" required
                                class="text-sm pl-9 w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition input-focus"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-xs font-medium text-gray-600 mb-1">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input id="confirmPassword" type="password" required
                                class="text-sm pl-9 w-full p-2.5 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition input-focus"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Terms -->
                    <div class="flex items-center pt-1">
                        <input id="terms" type="checkbox" 
                            class="h-3.5 w-3.5 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-xs text-gray-600">
                            I agree to the <a href="#" class="text-indigo-600 hover:underline">terms</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-2">
                        <button type="submit" 
                            class="w-full py-2.5 px-4 border border-transparent rounded-md text-xs font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-indigo-500 transition">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>

            <!-- Footer Links -->
            <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
                <div class="text-center text-xs text-gray-500">
                    Already registered? 
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 ml-1">
                        Sign in
                    </a>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="mt-4 text-center text-xs text-gray-400">
            &copy; 2023 TaskFlow Pro. All rights reserved.
        </div>
    </div>

    <script>
        function handleRegister() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                alert("Passwords don't match!");
                return;
            }
            
            console.log('Registration data:', { email, password });
            alert('Account created successfully!');
            // window.location.href = '/dashboard.html';
        }
    </script>
</body>
</html>