<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //
        $categories = Category::paginate(10);
        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.categories.create');
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
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'Debe Ingresar un nombre para el producto',
            'name.min' => 'El nombre del producto debe tener al menos tres caracteres.'
        ];
        $this->validate($request, $rules, $messages);
        //dd($request->all());
        $category = new Category();
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        
        //dd($category->espromo);
        $category->save();


        return redirect('admin/categories');
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
        $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category'));
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
            'name' => 'required|min:3'
        ];
        $messages = [
            'name.required' => 'Debe Ingresar un nombre para la categoría',
            'name.min' => 'El nombre de la categoría debe tener al menos tres caracteres.'
        ];
        $this->validate($request, $rules, $messages);
        //

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        
       //dd($product->espromo);
        $category->save();

        return redirect('admin/categories');

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
        $category = Category::find($id);

        $category->delete();

        return redirect('admin/categories');
    }

    public function editimage($id)
    {
        //
        $category = Category::find($id);
        return view('admin.categories.editimage')->with(compact('category'));
    }

    public function storeimage(Request $request, $id)
    {

        $file = $request->file('photo');
        $path = public_path(). '/images/categories';
        $fileName = uniqid().$file->getClientOriginalName();

        $moved = $file->move($path, $fileName);
        if ($moved){
            // Crar un registro en la tabla product_images
            $category = Category::find($id);
            $category->image = $fileName;
            
            $category->save();
            
        }
        
        return redirect('/admin/categories');
    
    }
    
}
