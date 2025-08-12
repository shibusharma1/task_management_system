<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/passionchasers.png')}}" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    @stack('styles')
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        @include('layouts.admin.partials.sidebar')
        @yield('contents')
        @stack('scripts')
        {{-- @include('layouts.admin.partials.footer') --}}
</body>

</html>