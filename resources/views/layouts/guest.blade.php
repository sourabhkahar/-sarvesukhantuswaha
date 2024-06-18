<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link type="image/x-icon" rel="shortcut icon" href="assets/images/logo.png" />
    <link href="{{asset('/css/swiper-bundle.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/aos.css')}}" />
    <link href="{{asset('/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('/css/responsive.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Scripts -->
    @vite([ 'resources/js/app.js'])
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

   
</head>

<body>
    <div class="wrapper">
        <livewire:layout.user.navigation />
            <div
                class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                {{ $slot }}
            </div>
        <livewire:layout.user.footer />
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- @push('scripts') --}}
    <script src="{{asset('/js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('/js/aos.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>
    {{-- @endpush --}}
</body>

</html>