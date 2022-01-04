<?php

namespace App\Http\Controllers;

use App\Models\Itemize;
use Illuminate\Http\Request;

class ItemizeController extends Controller
{
    //
    public function itemize()
    {
        $itemizes = Itemize::where('is_disable',0)->orderBy('created_at','asc')->get();

        return view('index.itemize',['itemizes'=> $itemizes]);
    }
}
