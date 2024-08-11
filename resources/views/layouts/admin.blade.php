@props(['breadcrumbs' => []])

<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TIMID0x') }}</title>
    <meta name="title" content="TIMID0x: PokemonGO, TL50Data and more">
    <meta name="description"
        content="Try TL50Data, track your medals from PokemonGO with advanced stats. PvP Games, Blog, Friend codes, AR photos and more">
    <meta name="keywords" content="timid0x,TL50data,PokemonGO,AR,GOSnapshot,Blog,FriendCodes">
    <meta name="wot-verification" content="b163ac58f42ae0b0f594" />
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 days">
    <meta name="author" content="TIMID0x">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome icons (free version)-->
    <script src="https://kit.fontawesome.com/327a56441f.js" crossorigin="anonymous"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased" x-data="{
    sidebarOpen: false
}" :class="{
    'overflow-y-hidden': sidebarOpen
}">

    <div class="fixed  inset-0 bg-gray-900 bg-opacity-50 z-20 sm:hidden" style="display: none;" x-show="sidebarOpen"
        x-on:click="sidebarOpen = false">


    </div>

    @include('layouts.partials.admin.navigation')
    @include('layouts.partials.admin.sidebar')

    <div class="p-4 sm:ml-64">

        <div class="mt-14">
            <div class="flex justify-between items-center">
                @include('layouts.partials.admin.breadcrumb')

                @isset($action)
                    <div>
                        {{ $action }}
                    </div>
                @endisset
            </div>


            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

                {{ $slot }}

            </div>


        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @livewireScripts

    @stack('js')

    @if (session('swal'))
        <script>
            Swal.fire({!! json_encode(session('swal')) !!});
        </script>
    @endif

    <script>
        Livewire.on('swal', data =>{
            Swal.fire(data[0]);
        });
    </script>


</body>

</html>
