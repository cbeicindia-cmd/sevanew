<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEVA SETU KENDRA</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
<nav class="bg-blue-900 text-white p-4">
    <div class="max-w-7xl mx-auto font-bold">SEVA SETU KENDRA — Connecting Citizens with Government Opportunities</div>
</nav>
<main class="max-w-7xl mx-auto p-6">
    @if(session('status'))
        <div class="mb-4 rounded bg-green-100 p-3 text-green-800">{{ session('status') }}</div>
    @endif
    @yield('content')
</main>
</body>
</html>
