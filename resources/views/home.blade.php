@extends('layouts.app')

@section('title', 'App Virrey Spot. Dashboard')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">
        <div class="section">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-center" >Dashboard</h2>
                    <!-- <h5 class="description">.</h5> --> 
                   <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="active">
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Mi Pedido
                            </a>
                        </li>
                        <li>
                            <a href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos Realizados
                            </a>
                        </li>
                    </ul>
                    <hr>
                 <p class="alert alert-info">Tu Pedido contiene {{auth()->user()->cart->details->count() }} Artículos</p>   
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th >Precio</th>
                                <th >Cantidad</th>
                                <th >Importe</th>
                                <th class="text-right">Acciones</th>
                            </tr> 
                        </thead>
                        @foreach(auth()->user()->cart->details as $detail)
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src=" {{ $detail->product->featured_image_url }}" height="50px">
                                </td>
                                <td>
                                    <a href="{{ url('/products/'.$detail->product->id)}}" target="_blank">   {{ $detail->product->name }} </a>
                                </td>
                                <td > ${{ $detail->price}}</td>
                                <td > ${{ $detail->quantity}}</td>
                                <td > ${{ $detail->quantity * $detail->price }}</td>
                                
                                <td class="td-actions">
                                    
                                   <form method="POST" action="{{ url('/cart') }}" >
                                    {{csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">
                                    <a href="{{ url('/products/'.$detail->product->id)}}"  target="_blank"  rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar Item" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                   </form>     
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    

                </div>
        </div>
    </div>

</div>
@include('layouts.includes.footer')

@endsection
