<div class="bg-white mt-3 bulletin">
    <div class="bulletin-item">
        <h2 class="h2-before">
                随便看看
            </h2>
            <ul class="navbar-nav">
                @foreach($blog_rands as $blog_rand)
                    <li>
                        <a href="{{ route('blog.details',$blog_rand)   }}" target="_blank" class="row">
                            <div class="col-4 bulletin-item-left">
                                <img src="/images/0.png" alt="">
                            </div>
                            <div class="col-8 bulletin-item-right">
                                <h3>
                                    {{ $blog_rand->title }}
                                </h3>
                                <p>
                                    {{ $blog_rand->user->name }} <span> · </span> {{ $blog_rand->created_at->toDateString() }}
                                </p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

