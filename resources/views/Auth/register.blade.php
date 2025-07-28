<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="bg-gradient-to-br from-blue-50 to-blue-100 flex justify-center items-center min-h-screen p-4">
        <div class="bg-white/80 backdrop-blur-md w-full max-w-md p-8 rounded-2xl shadow-xl border border-gray-200">
            
            <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Create Your Account</h2>
            <p class="text-gray-500 text-sm mt-2">Join us to unlock all features</p>
            </div>

            <form onsubmit="handleRegister(event)" class="space-y-5">
            
            <div>
                <label for="fullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="fullName" name="fullName"
                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
                placeholder="Enter your name" required>
            </div>

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

            <div>
                <label for="confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword"
                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 focus:border-blue-400 outline-none transition"
                placeholder="••••••••" required>
            </div>

            <button type="submit"
                class="w-full py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 shadow-md hover:shadow-lg transition">
                Register
            </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
            <p>
                Already have an account? 
                <a href="/login" class="text-blue-600 hover:underline font-medium">Login here</a>
            </p>
            </div>
        </div>
    </div>

  <!-- <script>
    function handleRegister(event) {
      event.preventDefault();
      const fullName = document.getElementById('fullName').value;
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('confirmPassword').value;

      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return;
      }

      console.log('Registration Data:', { fullName, email, password });
      alert('Registration successful!');
    }
  </script> -->
</body>
</html>