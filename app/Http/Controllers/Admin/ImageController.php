<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Illuminate\Support\Facades\File;
class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $product = Product::find($id);
        $images = $product->images()->orderBy('featured', 'desc')->get();
        return view('admin.products.images.index')->with(compact('product', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // guardar el archivo en el proyect
        
        $file = $request->file('photo');
        $path = public_path(). '/images/products';
        $fileName = uniqid().$file->getClientOriginalName();

        $moved = $file->move($path, $fileName);
        if ($moved){
            // Crar un registro en la tabla product_images
            $productImage = new ProductImage();
            $productImage->image = $fileName;
            //$productImage->featured = ;
            $productImage->product_id = $id;

            $productImage->save();
            
        }
        
        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //eliminar el archivo de la imagen
        $id_imagen = $request->input('id');
        $productimage = ProductImage::find($id_imagen);
       // dd($productimage);
        if (substr($productimage->image,0,4) ==="http"){
            $deleted=TRUE;
        }
        else{
            $fullpath = public_path() . '/images/products/'.$productimage->image;
            $deleted = File::delete($fullpath);
        }
        //Eliminar el Registro de la BD
        if ($deleted){
            $productimage->delete();
        }
        return back();

    }

    public function select( $id, $image)
    {
      ProductImage::where('product_id',$id)->update([
        'featured' => false
      ]);
      $productImage = ProductImage::find($image);
      $productImage->featured = true;
      $productImage->save();

      return back();

    }
}
