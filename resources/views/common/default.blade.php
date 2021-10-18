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
    <div class="row">
        <div class="col-xl-9 col-12">
            @yield('content')
        </div>
        <div class="col-xl-3 d-none d-xl-block">
            @section('recommend')
                <div class="bg-white mt-3 bulletin">
                    <div class="bulletin-item">
                        <h2 class="h2-before">
                            随便看看
                        </h2>
                        <ul class="navbar-nav">
                            @for($i = 0; $i < 6 ;$i++)
                            <li>
                                <a href="" class="row">
                                    <div class="col-4 bulletin-item-left">
                                        <img src="/images/0.png" alt="">
                                    </div>
                                    <div class="col-8 bulletin-item-right">
                                        <h3>
                                            这里是标题这里是标题这里是标题
                                        </h3>
                                        <p>
                                            作者 <span> · </span> 时间
                                        </p>
                                    </div>
                                </a>
                            </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            @show
        </div>
    </div>
</div>
@include('common.footer')
</body>
@include('common.js')
</html>


