<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/visitor.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

        <title>Admin - Public Resource Drive</title>
    </head>
    <body class="antialiased">
        <div id="app">
        </div>

        @include('partials.footer')

        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="/js/bootstrap.js"></script>
    </body>
</html>
