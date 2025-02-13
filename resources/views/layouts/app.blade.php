<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Domain Search')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <nav class="bg-black p-4 text-white">
        <div class="container mx-auto">
            <a href="{{ url('/') }}" class="text-lg font-bold">Domain Checker</a>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    <footer class="text-center p-4 bg-black text-white mt-6">
        <p>&copy; {{ date('Y') }} Domain Checker. All Rights Reserved.</p>
    </footer>

</body>
</html>
