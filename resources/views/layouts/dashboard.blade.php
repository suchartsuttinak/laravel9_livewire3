<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        {{--  @vite(['resources/js/app.js'])  --}}
        <link rel="stylesheet" href="{{ asset('admin-template/style.css') }}">

        <!-- Styles -->
        @livewireStyles

        <!-- Icons pack -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <!-- ChartJS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>



        @vite(['resources/js/app.js'])

        <script src="{{ asset('admin-template/dashboard.js') }}" defer></script>
        <script src="{{ asset('admin-template/dashboard-chart.js') }}"></script>


    </head>
    <body>

        @include('partials.sidebar')
          <main>
            @yield('content')
         </main>


        @stack('modals')

        @livewireScripts
    </body>
</html>
