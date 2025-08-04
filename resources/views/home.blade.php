<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" type="image/png" href="{{ asset('images/passionchasers.png')}}" />
    <title>Task Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">Task Manager</h1>
            <nav class="space-x-6 hidden md:flex">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600">Home</a>
                <a href="#features" class="text-gray-600 hover:text-indigo-600">Features</a>
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-indigo-600">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-indigo-600 text-white py-20">
        <div class="max-w-4xl mx-auto text-center px-4">
            <h2 class="text-4xl font-bold mb-4">Organize Your Tasks, Boost Your Productivity</h2>
            <p class="text-lg mb-6">Manage daily tasks, set deadlines, and collaborate with your team—all in one place.
            </p>
            <a href="{{ route('register') }}"
                class="bg-white text-indigo-600 px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-100 transition">Get
                Started</a>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16 bg-gray-100" id="features">
        <div class="max-w-6xl mx-auto px-4">
            <h3 class="text-3xl font-semibold text-center mb-12">Features</h3>
            <div class="grid md:grid-cols-3 gap-10">
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    <div class="text-indigo-600 text-4xl mb-4">📋</div>
                    <h4 class="text-xl font-bold mb-2">Task Creation</h4>
                    <p>Create and manage your to-do lists with ease.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    <div class="text-indigo-600 text-4xl mb-4">⏰</div>
                    <h4 class="text-xl font-bold mb-2">Reminders & Deadlines</h4>
                    <p>Set due dates and reminders to stay on track.</p>
                </div>
                <div class="bg-white rounded-lg shadow p-6 text-center">
                    <div class="text-indigo-600 text-4xl mb-4">👥</div>
                    <h4 class="text-xl font-bold mb-2">Team Collaboration</h4>
                    <p>Assign tasks and work together with teammates.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white py-6 border-t mt-12">
        <div class="max-w-7xl mx-auto text-center text-sm text-gray-500">
            &copy; 2025 TaskManager. All rights reserved.
        </div>
    </footer>

</body>

</html>