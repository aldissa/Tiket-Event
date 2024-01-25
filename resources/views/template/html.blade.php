<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('data/cdn.datatables.net_1.13.6_css_jquery.dataTables.min.css') }}">
</head>
<body>
    @yield('body')

    <script src="{{ asset('table/cdn.datatables.net_1.13.6_js_dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('table/code.jquery.com_jquery-3.7.0.js') }}"></script>
    <script>new DataTable('#example')</script>
</body>
</html>