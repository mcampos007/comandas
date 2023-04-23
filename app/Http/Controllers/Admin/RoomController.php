<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $rooms = Room::paginate(5);
        return view('admin.rooms.index')->with(compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
                //Validación
        $rules = [
            'name' => 'required|min:3'
            /*'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'*/
        ];
        $messages = [
            'name.required' => 'Debe Ingresar un nombre para la habitación'
            /*'description.required' => 'Debe ingresar una descripción para el producto',
            'price.required' => 'Falta el precio del Producto',
            'name.min' => 'El nombre del producto debe tener al menos tres caracteres.',
            'description.max' => 'La descripción no puede tener más de 300 caracteres',
            'price.numeric' => 'El precio del producto debe ser un número',
            'price.min' => 'El precio del producto no puede ser negativo'*/
        ];
        $this->validate($request, $rules, $messages);
        //dd($request->all());
        $room = new Room();
        $room->name = $request->input('name');
        //dd($room->espromo);
        $room->save();


        return redirect('admin/rooms');
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
        //
        $room = Room::find($id);
        //dd($room);
        return view('admin.rooms.edit')->with(compact('room'));
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
            /*'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'*/
        ];
        $messages = [
            'name.required' => 'Debe Ingresar un nombre para la habitación'
            /*'description.required' => 'Debe ingresar una descripción para el producto',
            'price.required' => 'Falta el precio del Producto',
            'name.min' => 'El nombre del producto debe tener al menos tres caracteres.',
            'description.max' => 'La descripción no puede tener más de 300 caracteres',
            'price.numeric' => 'El precio del producto debe ser un número',
            'price.min' => 'El precio del producto no puede ser negativo'*/
        ];
        $this->validate($request, $rules, $messages);
        //dd($request->all());
        $room =  Room::find($id);   //       new Room();
        $room->name = $request->input('name');
        //dd($room->espromo);
        $room->save();


        return redirect('admin/rooms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $room = Room::find($id);
        $room->delete();
        return redirect('admin/rooms');
    }
}
