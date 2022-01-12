<?php

namespace App\Http\Controllers;

use App\Admin\Repositories\Web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    //
    public function web()
    {
        $list = \App\Models\Web::get()->toArray();
        $webs = Web::arr2tree($list,'id','parent_id');

        return view('index.web',['webs' => $webs]);
    }


}
