@extends('layouts.app')

@section('title', 'Bienvenido a App Virrey Spot.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">
        <div class="section  section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title text-center" >DATOS DEL PRODUTO A ELIMINAR</h2>
                    <h3 class="description">{{ $product->name }}</h3>
                    <form method="POST" action=" {{ url('/admin/products/'.$product->id.'/delete')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del Producto</label>
                                    <input type="text" class="form-control"  name="name" value="{{ $product->name}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio del Producto</label>
                                    <input type="decimal" class="form-control"  name="price"
                                    value="{{$product->price}}">
                                </div>    
                            </div>
                        </div>
                        <div class="form-group label-floating">
                                <label class="control-label">Descripción corta</label>
                                <input type="text" class="form-control"  name="description"
                                value="{{ $product->description}}">
                        </div>
                        
                        <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description" >{{ $product->long_description }}</textarea >
                        
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"  {{$product->espromo===NULL ? '' :'checked'}} name="espromo" id="espromo">
                            Este Producto es una Promoción {{$product->espromo}}
                          </label>
                        </div>

                        
                       <button class="btn btn-primary" type="submit">Eliminar Producto</button> 
                      <a href="{{ url('admin/products')}}" class="btn btn-default">Cancelar</a> 
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
