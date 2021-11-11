<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //  __invoke メソッド作成がひとつのみの場合の書き方についてです

    public function __invoke()
    {

        $categories=Category::all();

        return view('welcome',compact('categories'));
    }
}
