<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> {{ $title ?? 'ColtByte'}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen flex flex-col">
        <!-- Header -->
        <x-header/>

        <!-- Content -->
        <div class="min-h-screen bg-amber-100" style="background-image:linear-gradient(to right, rgba(0,0,0,.18) 1px, transparent 1px), linear-gradient(to bottom, rgba(0,0,0,.18) 1px, transparent 1px);background-size: 220px 220px;">  
            @yield('content')
        </div>
            
        <!-- Footer -->
        <x-footer/>
    </body>
</html>