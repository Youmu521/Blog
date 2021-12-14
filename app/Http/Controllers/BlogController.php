<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Dcat\Admin\Widgets\Markdown;
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
    public function index()
    {
        $blogs= Blog::with('user')->where('is_open',1)->get();


        return view('index.blog',['blogs' => $blogs]);
    }

    /**
     * 博客详情
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function details(Blog $blog)
    {

        return view('index.blog_details',['blog' => $blog]);
    }
}
