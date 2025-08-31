<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Lara | E-Learning Interaktif dengan AI Chatbot</title>
    <meta name="description"
        content="E-Lara adalah platform e-learning interaktif yang dikolaborasi dengan AI agent dan chatbot pintar untuk pengalaman belajar lebih mudah, cepat, dan personal.">
    <meta name="keywords"
        content="E-Lara, e-learning interaktif, chatbot AI, pembelajaran online, platform belajar digital, learning AI, belajar dengan chatbot, e-learning cerdas">
    <meta name="author" content="E-Lara Team">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="E-Lara | E-Learning Interaktif dengan AI Chatbot">
    <meta property="og:description"
        content="Platform e-learning interaktif yang memanfaatkan AI agent dan chatbot untuk mendukung pembelajaran yang lebih personal dan efektif.">
    <meta property="og:image" content="https://yourdomain.com/assets/e-lara-thumbnail.jpg">
    <meta property="og:url" content="https://yourdomain.com/">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="E-Lara | E-Learning Interaktif dengan AI Chatbot">
    <meta name="twitter:description"
        content="Belajar lebih interaktif dengan E-Lara: e-learning yang dikolaborasi dengan AI agent dan chatbot cerdas.">
    <meta name="twitter:image" content="https://yourdomain.com/assets/e-lara-thumbnail.jpg">
    {{--
    <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
    {{-- @vite('resources/js/app.js') --}}
    @stack('styles')
    {{--
    <script src="{{asset('js/config.js')}}"></script> --}}
</head>

<body class="@yield('body-class')">

    @yield('content')

    <script src="{{asset('js/script.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @stack('scripts')
</body>

</html>