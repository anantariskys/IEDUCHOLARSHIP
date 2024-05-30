<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>


            <footer class="flex px-4 sm:px-6 lg:px-8 bg-white border-t-2 items-center">
                <img src="{{ asset('images/logoWeb.png') }}" alt="Example Image" class="w-1/4  aspect-auto">
                <div class="flex items-start justify-evenly gap-3 w-full ">
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl font-bold">Help and Guidance</h3>
                        <p>Bantuan</p>
                        <p>Syarat dan ketentuan</p>
                        <p>Kebijakan Privasi</p>
                        <p>Mitra</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl font-bold">IEDUSCHOLARSHIP</h3>
                        <p>Tentang IEDUSCHOLARSHIP</p>
                        <p>Karir</p>
                        <p>Blog</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h3 class="text-2xl font-bold">Follow Us</h3>
                        <p>Facebook</p>
                        <p>Instagram</p>
                        <p>X</p>
                        <p>Linkedln</p>
                        <p>Youtube</p>
                   
                    </div>

                </div>

            </footer>
        </div>
    </body>
</html>
