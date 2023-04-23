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
            <h2 class="title">Agregar Item a la mesa </h2>
            <form class="form-inline" method="GET" action="{{ URL('user/products/search')}}">
                <input type="hidden" name="mesa_id" value="{{$mesa->id}}">
                <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query">
                <button class="btn btn-primary btn-just-icon">
                    <i class="material-icons">search</i>
                </button>
            </form >
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center"> Producto</th>
                        <th class="text-center">Precio</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <form method="POST" action="{{ url('/user/mesas/'.$mesa->id.'/products/agregar') }}">
                            {{csrf_field()}}
                            <input type="hidden"  name="product_id" value="{{ $product->id}}">
                            <input type="hidden"  name="quantity" value="1">
                            <td class="text-center">{{ $product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{ $product->price}}</td>
                            <td class="td-actions  text-right">
    <!--                        <button type="button" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
                                </button> -->
                                <button type="submit" rel="tooltip" title="Agregar a la Mesa" class="btn btn-success btn-simple btn-xs">
                                    <span class="material-icons">shopping_cart</span>
                                </button>
<!--                            <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                <i class="fa fa-times"></i>
                                </button> -->
                            </td>
                         </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links()}}
        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
