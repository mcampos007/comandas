<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mesa;
use App\Product;
use App\MesaDetail;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mesas = Mesa::all();
       // dd($mesas);
        $mesasImpar = collect();
        $mesasPar = collect();

        foreach ($mesas as $key => $mesa){
            if ($key%2==0)
                $mesasImpar->push($mesa);
            else
                $mesasPar->push($mesa);
        }
        return view('user.mesas.index')->with(compact('mesas','mesasPar', 'mesasImpar'));

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
        //
        $mesa_details = New MesaDetail();
        $mesa_details->mesa_id = $id;   //$request->input('mesa_id');
        $mesa_details->product_id = $request->input('product_id');
        $mesa_details->quantity = $request->input('quantity');
        $mesa_details->status = false;
        $mesa_details->save();
        return redirect('user/mesas/'.$mesa_details->mesa_id);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        //
        $mesa_id = $request->input('mesa_id');
        $detalle = MesaDetail::find($id);
        if ($mesa_id == $detalle->mesa_id)
            $detalle->delete();
        return redirect('user/mesas/'.$mesa_id);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function movimientos($id)
    {
        //
        $mesa = Mesa::find($id);
        $detalles = $mesa->details()->where('status',false)->get();
        //dd($mesa);
        $importet = 0;
        foreach($detalles as $detalle)
        {
            $importet = $importet + $detalle->quantity*$detalle->product->price;
        }
        return view('user.mesas.movimientos')->with(compact('mesa','detalles','importet'));
    }

    public function agregarproducto($id)
    {
        $mesa = Mesa::find($id);
        //$products = Product::where('status','false')->paginate(5);
        $products = Product::paginate(5);
        return view('user.mesas.nuevoitem')->with(compact('mesa','products'));
    }

    public function cerrarmesa($id)
    {
        //Cerrar la mesa y enviar a Facturación los items Seleccionados
        $mesa = Mesa::find($id);
        $detalles = $mesa->details()->where('status',false)->get();
        //dd($mesa);
        $importet = 0;
        foreach($detalles as $detalle)
        {
            $importet = $importet + $detalle->quantity*$detalle->product->price;
        }
        return view('user.mesas.cerrar')->with(compact('mesa','detalles','importet'));

    }

    public function cerrar(Request $request, $id)
    {
        //Pasar la mesa al modo en facturación
        $mesa = Mesa::find($id);
        $mesa->status = "En Facturacion";
        $mesa->save();
        $items = $request->input('facturar');
        if ($items)
        {
            foreach ($items as $item)
            {
                $detalle = MesaDetail::find($item);
                $detalle->status = true;
                $detalle->save();
            }
        }
        //Marcar los Items a Facturar
        return redirect('/user/mesas');
    }
}
