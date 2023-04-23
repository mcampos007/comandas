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
                    <h2 class="title text-center" >AGREGAR O CAMBIAR LA IMAGEN DE LA CATEGORIA</h2>
                    <h3 class="text-center">{{ $category->name }}</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           <li>{{ $error}} </li>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf()
                        <div class="col-md-6 col-md-offset-2" class="form-control" >
                            <input type="file" name="photo" required>
                        </div>
                        <div class="col-md-6 col-md-offset-2">
                                <button type="submit" class="btn btn-primary btn-round">Subir nueva imágen</button>
                                <a href="{{ url('admin/categories')}}" class="btn btn-default btn-round">Volver</a>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>
@include('layouts.includes.footer')

@endsection
