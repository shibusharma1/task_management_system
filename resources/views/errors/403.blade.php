{{-- resources/views/errors/403.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>403 — Unauthorized</title>
  <!-- ✅ Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 to-gray-50 p-4 font-sans">
  <div class="max-w-2xl w-full bg-white rounded-2xl shadow-2xl p-8 text-center animate-fadeIn">
    
    <!-- Error Code -->
    <div class="text-[120px] font-extrabold bg-gradient-to-r from-indigo-600 to-indigo-400 bg-clip-text text-transparent leading-none mb-4">
      403
    </div>

    <!-- Title -->
    <h1 class="text-2xl md:text-3xl font-bold text-indigo-600 mb-3">Unauthorized Access</h1>

    <!-- Description -->
    <p class="text-gray-600 text-base md:text-lg mb-6">
      You don’t have permission to access this page or perform this action. <br>
      Please check your account privileges.
    </p>

    <!-- Buttons -->
    <div class="flex flex-wrap justify-center gap-4">
      <a href="{{ url()->previous() ?? route('home') }}"
         class="px-5 py-3 rounded-xl border border-gray-300 bg-gray-50 text-gray-700 font-semibold text-sm hover:bg-gray-100 transition flex items-center gap-2">
        ⬅ Go Back
      </a>

      @auth
        <a href="{{ route('dashboard') }}"
           class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold text-sm shadow-md hover:bg-indigo-700 hover:shadow-lg transition flex items-center gap-2">
          🏠 Dashboard
        </a>
      @else
        <a href="{{ route('login') }}"
           class="px-5 py-3 rounded-xl bg-indigo-600 text-white font-semibold text-sm shadow-md hover:bg-indigo-700 hover:shadow-lg transition flex items-center gap-2">
          🔑 Login
        </a>
      @endauth
    </div>

    <!-- Hint -->
    <p class="mt-6 text-sm text-gray-500">
      If you believe this is an error, please contact support or your system administrator.
    </p>
  </div>

  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .animate-fadeIn {
      animation: fadeIn 0.6s ease forwards;
    }
  </style>
</body>
</html>
