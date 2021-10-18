@extends('common.default')

@section('content')
    <div class="row justify-content-between ml-1 mr-1">
        @for($i = 0; $i < 4 ;$i++)
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 p-3" >
                <div class="blog-list overflow-hidden">
                    <div class="overflow-hidden">
                        <a href="{{  route('blog.details')  }}" class=" d-block w-100 h-100">
                            <div class="w-100 h-100">
                                <h2 class="w-75 text-center">这里是标题这里是标题这里是标题这里是标题</h2>
                                <p class="w-75">这里是内容这里是内容这里是内容这里是内容这里是
                                    内容这里是内容这里是内容这里是内容这里是内容</p>
                            </div>
                        </a>
                    </div>
                    <div class="blog-info">
                        <ul class="navbar-nav d-flex flex-row">
                            <li class="ml-2 mr-2">
                                <img src=""  alt="">
                            </li>
                            <li class="ml-2 mr-2">
                                <div>
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-time-circle"></use>
                                    </svg>
                                    时间
                                </div>
                            </li>
                            <li class="ml-2 mr-2">
                                <div>
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-user"></use>
                                    </svg>
                                    用户名
                                </div>
                            </li>
                            <li class="ml-2 mr-2">
                                <div>
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-message"></use>
                                    </svg>
                                    评论
                                </div>
                            </li>
                            <li class="ml-2 mr-2">
                                <div>
                                    <svg class="icon" aria-hidden="true">
                                        <use xlink:href="#icon-eye"></use>
                                    </svg>
                                    曝光
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    <div class="d-none d-lg-block">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end ">
                <li class="page-item">
                    <a class="page-link" href="#">首页</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">上一页</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">下一页</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">尾页</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">共7页</a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('recommend')
    <div class="bg-white mt-3 bulletin">
        <div class="bulletin-item">
            <h2 class="h2-before">
                公告栏
            </h2>
            <p class="bulletin-p">
                测试版本
            </p>
        </div>
    </div>
    @parent
@endsection

@section('style')
    .blog-list{
        background: #fff;
        border-radius: 10px;
        transition:transform .3s ease;
    }
    .blog-list .overflow-hidden{
        height: 180px;
    }
    .blog-list .overflow-hidden a{
        text-decoration: none;
        color: #fff;
        background:url("images/0.png");
        position: relative;
    }
    .blog-list .overflow-hidden div{
        transition: .5s ease, .6s ease;
        background-color:rgba(0,0,0,.3);
    }
    .blog-list .overflow-hidden a h2{
        letter-spacing:1px;
        font-size:20px;
        line-height: 24px;
        text-shadow: 0 0 6px rgba(0,0,0,.6);
        transition:.3s ease-in,.2s ease-out;
        position: absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }
    .blog-list .overflow-hidden a p{
        letter-spacing:1px;
        font-size:14px;
        text-shadow: 0 0 6px rgba(0,0,0,.6);
        transition:.9s ease-in, .3s ease-out;
        position: absolute;
        top:85%;
        left:50%;
        transform:translate(-50%,-50%);
        opacity:0;
    }
    .blog-list:hover{
        transform:scale(1.03);
    }
    .blog-list:hover .overflow-hidden div{
        background-color:rgba(0,0,0,.4);
    }
    .blog-list:hover .overflow-hidden a h2{
        top:40%;
    }
    .blog-list:hover .overflow-hidden a p{
        top:70%;
        opacity:1;
    }
    .blog-info{
        height: 40px;
        line-height: 40px;
        font-size: 0.5rem;
    }
@endsection
