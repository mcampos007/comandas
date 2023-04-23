<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function show($id)
    {
        $product = Product::find($id);
        $images = $product->images;

        $imagesLeft = collect();
        $imagesRigth = collect();
        //dd($imagesRigth);
        foreach ($images as $key => $image){
            if ($key%2==0)
                $imagesLeft->push($image);
            else
                $imagesRigth->push($image);
        }
        //dd($imagesRigth);
        return view('products.show')->with(compact('product','imagesLeft','imagesRigth'));
    }
}
