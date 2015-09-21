<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    {{--<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">--}}
    {{--<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap-theme.min.css') !!}">--}}

    {{--Material Design Theme--}}
    <link rel="stylesheet" type="text/css" href="{!! asset('css/roboto.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/material.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/ripples.min.css') !!}">
</head>
<body>
@include('partials.navbar')

@yield('content')

<script src="{!! asset('js/jquery-1.11.3.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>

{{--Material Design Theme--}}
<script src="{!! asset('js/ripples.min.js') !!}"></script>
<script src="{!! asset('js/material.min.js') !!}"></script>
<script>
    $(document).ready(function(){
        $.material.init();
    });
</script>

</body>
</html>
