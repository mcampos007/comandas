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
                    <h2 class="title text-center" >EDICION DE LA CATEGORIA</h2>
                    <h3 class="description">{{ $category->name }}</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           <li>{{ $error}} </li>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action=" {{ url('/admin/categories/'.$category->id.'/edit')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de la categoría</label>
                                    <input type="text" class="form-control"  name="name" value="{{ old('name',$category->name)}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group label-floating">
                                <label class="control-label">Descripción corta</label>
                                <input type="text" class="form-control"  name="description"
                                value="{{ old('description',$category->description)}}">
                        </div>
                        <div class="col-md-4">
                            <div class="profile">
                                <div class="avatar">
                                    <img src="{{'/images/categories/'.$category->image}}" alt="Imágen de la Categoría" class="img-circle img-responsive img-raised">
                                </div>
                            </div>
                        </div>            
                       <a href="{{ url('/admin/categories/'.$category->id.'/images')}}" class="btn btn-primary">Cambiar Imágen</a> 
                       <button class="btn btn-primary" type="submit">Actualizar Categoría</button>

                      <a href="{{ url('admin/categories')}}" class="btn btn-default">Cancelar</a> 
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
