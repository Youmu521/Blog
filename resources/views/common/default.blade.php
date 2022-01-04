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

    <div class="container my-container">
        @section('container')
        <div class="row">
            <div class="col-xl-9 col-12">
                @yield('content')
            </div>
            <div class="col-xl-3 d-none d-xl-block">
                @yield('recommend')
            </div>
        </div>
        @show
    </div>

@include('common.footer')
</body>
@include('common.js')
</html>


