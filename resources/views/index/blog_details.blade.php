@extends('common.default')
@section('content')
    <div class="col bg-white mt-3 article_content p-4">
        <div class="article_info">
            <h1>
                {{ $blog->title }}
            </h1>
            <ul class="row">
                <li class="mr-3">
                    <div>
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-time-circle"></use>
                        </svg>
                        {{ $blog->created_at->diffForHumans() }}
                    </div>
                </li>
                <li class="mr-3">
                    <div>
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-user"></use>
                        </svg>
                        {{ $blog->user->name }}
                    </div>
                </li>
                <li class="mr-3">
                    <div>
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-eye"></use>
                        </svg>
                        {{ $blog->exposure }}
                    </div>
                </li>
            </ul>
        </div>

        <article id="content" class="md">

            {{ $blog->content }}
        </article>
    </div>
    <div class="article_page row">
        <div class="col-6">
            <a href="#" class="mr-3">
                <p>上一篇</p>
                <h4>这是标题</h4>
            </a>
        </div>
        <div class="col-6">
            <a href="#" class="ml-3">
                <p>下一篇</p>
                <h4>这是标题</h4>
            </a>
        </div>
    </div>
@endsection
@section('style')
    .article_content{
        border-radius: 5px;
    }
    .article_info{
        border-bottom: 1px solid hsla(0,0%,84.7%,.882353);
        margin-bottom: 10px;
    }
    .article_info>h1{
        text-align: left;
        font-size: 24px;
        height: 42px;
        line-height: 42px;
        font-weight: 500;
        color: #666;
    }
    .article_info>ul{
        overflow: hidden;
        height: 30px;
        line-height: 30px;
        padding:0 15px 5px 15px;
        margin-bottom:0;
    }
    .article_info>ul li{
        float: left;
        margin-right: 20px;
        color: #666;
        font-size: 12px
    }
    .article_page{
        margin: 20px auto;
        height: 100px;
    }
    .article_page>div{
        height: 100px;
        padding:0;
    }
    .article_page>div a{
        display: block;
        padding:20px;
        color: #666;
        background-color: #fff;
        border-radius: 5px;
        overflow: hidden;
    }
    .article_page>div p{
        text-indent: 30px;
        font-weight: 700;
        line-height: 30px;
        margin-bottom:0;
    }
    .article_page>div h4{
        text-indent: 30px;
        font-weight: 400;
        font-size: 16px;
        line-height: 30px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        -webkit-line-clamp: 1;
        margin-bottom: 0;
    }
    .article_page>div a:hover{
        background-color: #19bce7;
        color: #fff;
    }
@endsection
@section('script')

    var md = $("#content").html();
    console.log(md);
    $("#content").html(marked(md));
@endsection
