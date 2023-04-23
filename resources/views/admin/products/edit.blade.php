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
                    <h2 class="title text-center" >EDICION DEL PRODUCTO</h2>
                    <h3 class="description">{{ $product->name }}</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           <li>{{ $error}} </li>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action=" {{ url('/admin/products/'.$product->id.'/edit')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del Producto</label>
                                    <input type="text" class="form-control"  name="name" value="{{ old('name',$product->name)}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio del Producto</label>
                                    <input type="number" step="0.01" class="form-control"  name="price"
                                    value="{{old('price',$product->price)}}">
                                </div>    
                            </div>
                        </div>
                        <div class="form-group label-floating">
                                <label class="control-label">Descripción corta</label>
                                <input type="text" class="form-control"  name="description"
                                value="{{ old('description',$product->description)}}">
                        </div>
                        
                        <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5" name="long_description" >{{ old('long_description',$product->long_description) }}</textarea >
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Código p/Facturar</label>
                                    <input type="text" class="form-control"  name="id_articul" value="{{ old('id_articul',$product->id_articul)}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox"  {{$product->espromo===NULL ? '' :'checked'}} name="espromo" id="espromo">
                                    Este Producto es una Promoción {{$product->espromo}}
                                  </label>
                                </div>  
                            </div>
                        </div>
                        

                        
                       <button class="btn btn-primary" type="submit">Actualizar Producto</button> 
                      <a href="{{ url('admin/products')}}" class="btn btn-default">Cancelar</a> 
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
