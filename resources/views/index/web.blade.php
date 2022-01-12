@extends('common.default')

@section('container')
    <body class="page-body">
    <!-- skin-white -->
    <div class="page-container" style="padding-top: 20px">
        <div class="main-content">
            @foreach($webs as $web)
                <h4 class="text-gray">
                    <svg class="icon" aria-hidden="true" style="margin:0 7px">
                        <use xlink:href="#icon-biaoqian"></use>
                    </svg>
                    {{ $web['title'] }}
                </h4>
                <div class="row">
                    @foreach($web['sub'] as $value)
                        <div class="col-3">
                            <div class="xe-widget xe-conversations box2 label-info"
                                 onclick='window.open("{{ $value['url'] }}", "_blank")' data-toggle="tooltip"
                                 data-trigger="hover" data-placement="bottom" title="{{ $value['url'] }}">
                                <div class="xe-comment-entry">
                                    <div class="xe-comment">
                                        <a href="#" class="xe-user-name overflowClip_1">
                                            <strong>{{ $value['title'] }}</strong>
                                        </a>
                                        <p class="overflowClip_2">{{ $value['remarks'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <br/>
            @endforeach
            <!-- 常用推荐 -->

            <!-- END 常用推荐 -->
        </div>
    </div>
    </body>
@endsection

@section('recommend')

@endsection

@section('style')
    .main-content{
    font-family: Arimo,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 13px;
    line-height: 1.42857143;
    }
    .xe-widget.xe-conversations{
    position: relative;
    background: #fff;
    margin-bottom: 0px;
    padding: 15px;
    }
    .box2{
    height: 86px;
    cursor: pointer;
    border-radius: 4px;
    padding: 0px 30px 0px 30px;
    background-color: #fff;
    border-radius: 4px;
    border: 1px solid #e4ecf3;
    margin: 20px 0 0 0;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    }
    .box2:hover{
    transform:translateY(-6px);
    box-shadow:0 26px 40px -24px rgba(0,36,100,0.5);
    transition:all 0.3s ease;
    }
    .xe-comment{
    transform: translateY(-50%);
    position: absolute;
    top: 50%;
    }
    .overflowClip_1{
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical;
    }
    .xe-comment a{
    margin:0 15px 0 0;
    color: #373e4a;
    }
    .xe-comment p{
    margin:6px 15px 0 0;
    color: #979898;
    }
@endsection
@section('script')
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
@endsection

