<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mesa;
use App\Product;

class SearchController extends Controller
{
    //
    public function show(Request $request)
    {
        
        $query = $request->input('query');
        $id = $request->mesa_id;
        $mesa = Mesa::find($id);
        $products = Product::where('name','like',"%$query%")->paginate(5);
        return view('user.mesas.nuevoitem')->with(compact('mesa','products'));
    }
}
