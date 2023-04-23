@extends('layouts.app')

@section('title', 'Listado de Mesas.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de Mesas</h2>
            <!-- <a href=" {{ url('admin/products/create') }}" class="btn btn-primary btn-round">Nuevo Producto</a> -->
            <div class="team">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="profile-tabs">
                        <div class="nav-align-center">
                            <div class="tab-content gallery">
                                <div class="tab-pane active" id="studio">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @foreach ($mesasImpar as $mesa)
                                            @if( $mesa->status == 'En Facturacion')
                                                <a href="#" class="btn btn-danger btn-round">{{ $mesa->id}}</a>
                                            @else
                                                <a href="{{ url('/user/mesas/'.$mesa->id) }}" class="btn btn-primary btn-round">{{ $mesa->id}} </a>
                                            @endif

                                            @endforeach
                                        </div>
                                        <div class="col-md-6">
                                            @foreach ($mesasPar as $mesa)
                                            @if( $mesa->status == 'En Facturacion')
                                                <a href="#" class="btn btn-danger btn-round">{{ $mesa->id}}</a>
                                            @else
                                                <a href="{{ url('/user/mesas/'.$mesa->id) }}" class="btn btn-primary btn-round">{{ $mesa->id}} </a>
                                            @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Profile Tabs -->
                </div>

                </div>
            </div>

        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
