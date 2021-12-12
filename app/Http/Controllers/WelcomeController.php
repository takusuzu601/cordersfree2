<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //  __invoke メソッド作成がひとつのみの場合の書き方についてです

    public function __invoke()
    {
       if(auth()->user()){
        $pendient = Order::where('status', 1)->where('user_id', auth()->user()->id)->count();

        if ($pendient) {

            $mensaje="現在 $pendient 件の保留中の注文があります . <a class='font-bold' href='".route('orders.index')."?status=1'> コチラ </a>";
            session()->flash('flash.banner', $mensaje);
        }
       }

        $categories = Category::all();

        return view('welcome', compact('categories'));
    }
}
