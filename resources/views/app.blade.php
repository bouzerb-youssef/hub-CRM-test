<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')

    </head>
    <body>
       {{-- modals html --}}
            @yield('content')
            @include('alert-delete-modal')
            @include('view-modal')
            @include('update-modal')
            
            @include('add-modal')
            @include('alert-delete-modal')
            
            <script src="{{asset('assets/js/jquery-3.7.0.min.js') }}"></script>
            {{-- scripts ajax --}}
            @yield('script')
             @include('scripts') 
            @vite('resources/js/app.js')
    </body>
</html>
