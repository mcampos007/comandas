<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $messages = [
            'name.required' => 'Debe Ingresar un nombre para el producto',
            'description.required' => 'Debe ingresar una descripción para el producto',
            'price.required' => 'Falta el precio del Producto',
            'name.min' => 'El nombre del producto debe tener al menos tres caracteres.',
            'description.max' => 'La descripción no puede tener más de 300 caracteres',
            'price.numeric' => 'El precio del producto debe ser un número',
            'price.min' => 'El precio del producto no puede ser negativo'
        ];
        $this->validate($request, $rules, $messages);
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->espromo = $request->input('espromo');
        $product->id_articul = $request->input('id_articul');
        if ($product->espromo==='on')
        {
            $product->espromo = 1;
        }
        //dd($product->espromo);
        $product->save();


        return redirect('admin/products');
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
        $product = Product::find($id);
        //dd($product);
        return view('admin.products.edit')->with(compact('product'));
    }

    // Form para visualizar el producto a eliminar
    public function delete($id)
    {
        //        dd($id);
        $product = Product::find($id);
        //dd($product);
        return view('admin.products.delete')->with(compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];
        $messages = [
            'name.required' => 'Debe Ingresar un nombre para el producto',
            'description.required' => 'Debe ingresar una descripción para el producto',
            'price.required' => 'Falta el precio del Producto',
            'name.min' => 'El nombre del producto debe tener al menos tres caracteres.',
            'description.max' => 'La descripción no puede tener más de 300 caracteres',
            'price.numeric' => 'El precio del producto debe ser un número',
            'price.min' => 'El precio del producto no puede ser negativo'
        ];
        $this->validate($request, $rules, $messages);
        //

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->espromo = $request->input('espromo');
        $product->id_articul = $request->input('id_articul');
        if ($product->espromo==='on')
        {
            $product->espromo = '1';
        }
       //dd($product->espromo);
        $product->save();

        return redirect('admin/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        dd($id);
        $product = Product::find($id);

        $imagenes = ProductImage::where('product_id',$id)->get();
        if ($imagenes)
        {
            $c = $imagenes->count();
            foreach($imagenes as $imagen)
            {
                $imagen->delete();
            }

        }

        $product->delete();

        return redirect('admin/products');

    }
}
