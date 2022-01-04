<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/iconfont.css">
<link rel="stylesheet" href="/css/md.style.css">
<style>
    {{--  修改通用样式  --}}
    *{
        padding: 0;
        margin: 0;
    }
    ul,li{
        list-style-type:none;
    }
    *::selection{
        color: #48aec4;
        background: #dcdcdc;
    }
    a:hover{color: green;}
    a:link{color: red;}

    {{--  修改 h2 样式 --}}
    .h2-before{
        color: #666;
        text-indent: 10px;
        font-size: 16px;
        font-weight: 500;
        height: 30px;
        line-height: 30px;
        position: relative;
        margin-bottom: 10px;

    }
    .h2-before:before{
        content: "";
        background-color: #19bce7;
        position: absolute;
        left: 0;
        top: 5px;
        height: 20px;
        width: 5px;
        border-radius: 20px;
    }
    .h2-before:after{
        position: absolute;
        right: 0;
        bottom: -7px;
        left: 0;
        height: 1px;
        content: "";
        transform: scaleY(.2);
        background-color: rgba(200,199,204,.33725);
    }

    .bulletin{
        border-radius: 5px;
    }
    .bulletin-item{
        padding: 10px 15px;
    }
    .bulletin-p{
        padding: 10px 0 5px;
        font-size: 14px;
        color: #666;
    }
    .bulletin-item ul{
        padding: 10px 0;
    }

    .bulletin-item .row{
        text-decoration: none;
        height: 60px;
        margin: 0 0 15px;
        /*border: 1px solid #ccc;*/
        border-radius: 10px;
    }
    .bulletin-item-left{
        padding: 0;
    }
    .bulletin-item-left img{
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    .bulletin-item-right h3{
        font-weight: bold;
        font-size: 12px;
        max-height: 40px;
        line-height: 18px;
        color: #666;
        margin-bottom: 0;
    }
    .bulletin-item-right p{
        font-size: 12px;
        color: #666;
        margin-bottom: 0;
    }


    {{--  修改 头部 样式 --}}
    body{
        background: #eee;
    }
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
    .my-footer .container{
        font-size: 0.5rem;
    }
    {{--  修改 container 样式 --}}
    .my-container{
        min-height: calc(100vh - 121px);
    }
    {{--  icon 通用 样式 --}}
    .icon {
        width: 1em;
        height: 1em;
        vertical-align: -0.15em;
        fill: currentColor;
        overflow: hidden;
    }

    {{--  修改 bootstrap 样式 --}}
    @media screen and (min-width: 1600px) {
        .container{
            max-width: 1437px;
        }
    }

    {{--  修改 页码 样式 --}}
    .page-item{
        margin:0 5px;
        background: none;
        border-radius: 0;
    }

    .page-item:first-child .page-link{
        border-radius: 7px 0 7px 0;
    }
    .page-item:last-child .page-link{
        border-radius: 7px 0 7px 0;
    }
    .page-item .page-link{
        border-radius: 7px 0 7px 0;
        border: 1px solid hsla(0,0%,84.7%,.882353);
        padding: .25rem .75rem;
        font-size: 14px;
        color: #666;

    }
    .page-item.active .page-link{
        background-color: #19bce7;
        border:1px solid #19bce7;
        color: #fff;

    }
    .page-item:hover .page-link{
        background-color: #19bce7;
        border:1px solid #19bce7;
        color: #fff;
    }
    .page-item.disabled:hover .page-link{
        background-color: #fff;
        border: 1px solid hsla(0,0%,84.7%,.882353);
        color: #666;
    }

    body::-webkit-scrollbar{
        width: 4px;
        height: 1px;
    }
    body::-webkit-scrollbar-thumb{
        border-radius: 2px;
        -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.2);
        background: #797979;
    }
    body::-webkit-scrollbar-track{
        border-radius: 2px;
        -webkit-box-shadow: inset 0 0 1px rgba(0,0,0,0.2);
        background: #EDEDED;
    }
    @yield('style')
</style>
