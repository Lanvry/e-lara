<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduCampus - Platform E-Learning Kampus</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    {{-- @vite('resources/js/app.js') --}}
    @stack('styles')
    {{-- <script src="{{asset('js/config.js')}}"></script> --}}
</head>

<body class="@yield('body-class')">

    @yield('content')

    <script src="{{asset('js/script.js')}}"></script>
    @stack('scripts')
</body>

</html>