<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Notice;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * 博客首页
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $blogs= Blog::with('user','itemize','label')
            ->when($search,function($query) use ($search){
                $query->where('title','like',"%{$search}%")
//                    ->orWhere('content','like',"%{$search}%")
                    ->orWhereHas('itemize',function($query) use ($search){
                        $query->where('name','like',"%{$search}%");
                    })
                    ->orWhereHas('label',function($query) use ($search){
                        $query->where('name','like',"%{$search}%");
                    });
            })
            ->where('is_open',1)
            ->orderBy('updated_at','desc')
            ->paginate(2);

        $notice = Notice::select('text')->orderBy('updated_at','desc')->first();
        $blog_rands = $this->default();

        return view('index.blog',['blogs' => $blogs,'notice' => $notice,'blog_rands' => $blog_rands]);
    }

    /**
     * 博客详情
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function details(Blog $blog)
    {
        $blog_rands = $this->default();
        return view('index.blog_details',['blog' => $blog,'blog_rands' => $blog_rands]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function default()
    {
        return Blog::with('user')->inRandomOrder()->take(6)->where('is_open',1)->get();
    }
}
