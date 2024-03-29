@extends('layouts.app')

@section('title', 'Listado de Productos.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de Productos</h2>
            <a href=" {{ url('admin/products/create')}}" class="btn btn-primary btn-round">Nuevo Producto</a>
            <div class="team">
                <div class="row">
                    @foreach($products as $product)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripción</th>
                                <th class="text-right">Precio</th>
                                <th class="col-md-1 text-center">Categoría</th>
                                <th class="col-md-1 text-center">Cod.Fact</th>
                                <th class="text-right">Acciones</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $product->id}}</td>
                                <td>{{ $product->name }}</td>
                                <td class="col-md-4">{{ $product->description }}</td>
                                <td class="text-right"> ${{ $product->price}}</td>
                                <td > {{ $product->category ? $product->category->name :"General" }} </td>
                                <td > {{ $product->id_articul }} </td>
                                <td class="td-actions text-right">
                                    
                                   <form method="POST" action="{{ url('/admin/products/'.$product->id) }}" >
                                    {{csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <a href=""  rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <a href=" {{ url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ url('/admin/products/'.$product->id.'/images')}}"  rel="tooltip" title="Imágenes del Producto" class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar Producto" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                   </form> 
                                   
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endForeach
                    {{ $products->links() }}
                </div>
            </div>

        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
