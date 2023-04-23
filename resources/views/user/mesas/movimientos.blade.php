@extends('layouts.app')

@section('title', 'Detalle de la Mesa.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Detalle de la mesa N°{{$mesa->name }}</h2>
            <!-- <a href=" {{ url('admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a> -->
            <a href="{{ url('user/mesas/'.$mesa->id.'/products/agregar') }}" class="btn btn-primary btn-round">
                <i class="material-icons">add</i> Agregar Articulo
            </a>
            <a href="{{ url('/user/mesas')}}" class="btn btn-info btn-round">
                <i class="material-icons">list</i> Listado de Mesas
            </a>
            <div class="alert alert-success">
                <div class="container-fluid">
                  <div class="alert-icon">
                    <i class="material-icons">check</i>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                  <b>Detalle de la mesa:</b> Contiene {{$detalles->count() }} items, por un importe de <strong>  ${{$importet}}</strong>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"> Producto</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Importe</th>
                        <!-- <th class="text-center">Facturar</th> -->
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalles as $detalle)
                    <tr>
                        <td class="text-center">{{ $detalle->id}}</td>
                        <td>{{ $detalle->product->name}}</td>
                        <td>{{ $detalle->quantity}}</td>
                        <td>{{ $detalle->product->price}}</td>
                        <td>{{ $detalle->product->price * $detalle->quantity}}</td>
                        <!-- <td>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsCheckboxes" checked>
                                    Facturar
                                </label>
                            </div>
                        </td> -->
                        <td class="td-actions  text-right">
                            <!-- <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
                                <i class="fa fa-user"></i>
                            </button> -->
                            <form method="POST" action="{{ url('/user/mesas/'.$detalle->id.'/products/eliminiar') }}">
                                {{csrf_field()}}
                                {{ method_field('DELETE')}}
                                <input type="hidden" name="mesa_id" value="{{$mesa->id}}">
                                <!-- <button type="button" rel="tooltip" title="Edit Cantidad" class="btn btn-success btn-simple btn-xs">
                                    <i class="fa fa-edit"></i>
                                </button> -->  
                                <button type="submit" rel="tooltip" title="Quitar Producto" class="btn btn-danger btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ url('user/mesas/'.$mesa->id.'/cerrar') }}" class="btn btn-primary btn-round">
                <i class="material-icons">paid</i> Cerrar Mesa
            </a>
        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
