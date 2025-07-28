<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 flex justify-center items-center min-h-screen p-4">
        <div class="bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-gray-200 w-full max-w-md">
            
            <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Welcome Back 👋</h2>
            <p class="text-gray-500 text-sm mt-2">Sign in to access your dashboard</p>
            </div>

            <form onsubmit="handleLogin(event)" class="space-y-5">
           
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" id="email" name="email" 
                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
                placeholder="you@example.com" required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" 
                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
                placeholder="••••••••" required>
            </div>

            <button type="submit" 
                class="w-full py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 shadow-md hover:shadow-lg transition">
                Login
            </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
            <p>
                Don't have an account? 
                <a href="/register" class="text-blue-600 hover:underline font-medium">Register</a>
            </p>
            <p class="mt-2">
                <a href="/forgot-password" class="text-blue-600 hover:underline font-medium">Forgot password?</a>
            </p>
            </div>
        </div>
    </div>

    <!-- <script>
        function handleLogin(event) {
            event.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            console.log('Login Data:', { email, password });
            alert('Login successful!');
        }
    </script> -->
</body>
</html>