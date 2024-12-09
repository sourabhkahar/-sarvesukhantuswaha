<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? env('APP_NAME') }}</title>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <style>
            * {
                font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
                font-weight: 300;
                margin: 0;
            }
    
            html,
            body {
                height: 100vh;
                width: 100vw;
                margin: 0 0;
                display: flex;
                align-items: flex-start;
                justify-content: flex-start;
                background: #f3f2f2;
            }
        </style>
    </head>
    <body>
        <div class="session">
            {{ $slot }}
        </div>
    </body>
</html>
