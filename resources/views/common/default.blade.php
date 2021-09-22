<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('common.css')
</head>
<body>
@include('common.header')
<div class="container myContainer">
    <div class="row">
        <div class="col-lg-8">
            @yield('content')
        </div>
        <div class="col-lg-4">
            @yield('recommend')
        </div>
    </div>
</div>
@include('common.footer')
</body>
@include('common.js')
</html>


