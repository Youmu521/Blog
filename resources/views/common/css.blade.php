<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    {{--  修改 头部 样式 --}}
    header>nav>a>img{
        width: 5rem;
        border-radius: 10px;
    }
    @media screen and (max-width: 992px) {
        header>nav>div>.input-group{
            margin-top: 1rem;
        }
    }
    {{--  修改 腿部 样式 --}}
    .myFooter .container{
        font-size: 0.5rem;
    }
    {{--  修改 container 样式 --}}
    .myContainer{
        min-height: calc(100vh - 99px);
    }
    {{--  修改 bootstrap 样式 --}}
    @media screen and (min-width: 1600px) {
        .container{
            max-width: 1437px;
        }
    }
    @yield('style')
</style>
