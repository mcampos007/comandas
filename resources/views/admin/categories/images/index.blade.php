@extends('layouts.app')

@section('title', 'Imágenes de Productos.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Imágenes del Producto " {{$product->name}} "</h2>
           <form method="POST" action="" enctype="multipart/form-data">
                @csrf()
                <input type="file" name="photo" required>
                <button type="submit" class="btn btn-primary btn-round">Subir nueva imágen</button>
                <a href=" {{ url('admin/products')}}" class="btn btn-default btn-round">Volver al listado de Productos</a>
            </form>
            <hr>
            <div class="row">
                 @foreach($images as $image)
                <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <img src="{{ $image->url }}" width="250">
                        <form  method="POST" action="">
                            @csrf()
                            {{ method_field('DELETE')}}
                            <input type="hidden" name='id' value="{{$image->id}}">
                            <button type="submit" class="btn btn-danger btn-round">Eliminar Imágen</button>
                            @if ($image->featured)
                            <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imágen destacada de este producto">
                                <i class="material-icons">favorite</i>
                            </a >
                            @else
                            <a href="{{ url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                                <i class="material-icons">favorite</i>
                            </a >
                            @endif
                        </form>
                      </div>
                    </div>
                </div>
                 @endforeach'
            </div>
           
        </div>
    </div>
</div>
@include('layouts.includes.footer')

@endsection
