{{-- 头部文件 --}}
<header class="bg-dark">
    <nav class="navbar navbar-dark navbar-expand-lg container">
        <a href="#" class="navbar-brand col-1 pl-0 pr-0">
            <img class="p-0" src="/images/logo.jpg" alt="">
        </a>
        <button type="button" class="btn btn-light navbar-toggler" data-toggle="collapse"
                data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse navbar-expand-sm justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav col-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog') }}">博客 <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('itemize') }}">分类</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web') }}">常用网站</a>
                </li>
            </ul>
                <form class="input-group col-lg-4" style="padding: 0;" action="{{ route('blog') }}" method="get">
                    <input type="text" name="search" class="form-control" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-light" type="submit">
                            搜索
                        </button>
                    </div>
                </form>
        </div>
    </nav>
</header>

