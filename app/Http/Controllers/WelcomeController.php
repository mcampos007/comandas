<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductImage;
use App\Category;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function welcome(){
        $categories = Category::has('products')->get();
        $promos = Product::where('espromo',true)->get();
      //  $p = Product::find(1);
      // / dd($p->images()->first());
        return view('welcome')->with(compact('categories','promos'));
    }
}
