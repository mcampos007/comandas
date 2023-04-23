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
                    <h2 class="title text-center" >EDICION DE HABITACION</h2>
                    <h3 class="description">{{ $room->name }}</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           <li>{{ $error}} </li>
                        @endforeach
                    </div>
                    @endif
                    <form method="POST" action=" {{ url('/admin/rooms/'.$room->id.'/edit')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de la Habitación</label>
                                    <input type="text" class="form-control"  name="name" value="{{ old('name',$room->name)}}">
                                </div>
                            </div>
                        </div>
                                                            
                       <button class="btn btn-primary" type="submit">Actualizar Habitación</button> 
                      <a href="{{ url('admin/rooms')}}" class="btn btn-default">Cancelar</a> 
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
