@extends('common.default')

@section('container')
    <div class="row" style="padding-top: 20px">
        @foreach($itemizes as $itemize)
            <div class="col-xs-12 col-md-4">
                <a href="{{ route('blog',['search' => $itemize->name]) }}" class="thumbnail">
                    <img src="uploads/{{ $itemize->image }}" style="max-height: 50%;max-width: 50%;display: block;" alt="...">
                </a>
            </div>
        @endforeach
    </div>
@endsection

@section('recommend')

@endsection

@section('style')
    .thumbnail{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 4px;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 4px;
        -webkit-transition: border .2s ease-in-out;
        -o-transition: border .2s ease-in-out;
        transition: border .2s ease-in-out;
        width:100%;
        height:300px;
    }
    .thumbnail:hover{
        border:1px solid #337ab7;
    }
@endsection
@section('script')

@endsection
