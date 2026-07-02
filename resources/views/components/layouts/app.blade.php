<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Nama Aplikasi' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <x-navbar></x-navbar>
    
    <main class="pt-32 pb-8 font-sans">
        {{ $slot }}
    </main>
    
    <x-footer></x-footer>
</body>

</html>