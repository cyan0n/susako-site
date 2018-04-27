<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="admin">
        <a href="{{ route('dashboard') }}" class="button">Dashboard</a>
        {{-- Content --}}
        <section id="main" class="section">
            {{-- TODO: Add breadcrumbs --}}
            @yield('content')
        </section>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://use.fontawesome.com/1de8b76bed.js"></script>
</body>
</html>
