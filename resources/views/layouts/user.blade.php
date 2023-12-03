<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">

    <title> Feane </title>

    @include('partials.style')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>
<body class="">
        @include('components.header')
        @yield('content')

    @include('components.footer')

    @include('partials.script')
</body>

</html>
