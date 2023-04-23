@extends('layouts.app')

@section('title', 'Resultado de la consulta.')

@section('body-class','profile-page')

@section('content')
@section('styles')
    <style >
        .team {
            padding-bottom: 50px;
        }
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }

        .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }

    </style>
@endsection

<div class="header header-filter" style="background-image: url('/img/portada.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="/img/search.png" alt="Imágen que representa lá páginade resultados" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">Resultado de Búsqueda</h3>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>Se encontraron {{$products->count() }} productos para el término {{ $query }}</p>
            </div>
            <div class="team text-center">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ $product->featured_image_url }}" alt="Imágen del producto" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/products/'.$product->id ) }} "> {{ $product->name }}<br /></a>
                                <small class="text-muted">{{ $product->category_name }}</small>       
                            </h4>
                            <p class="description"> {{ $product->description }} </p>

                        </div>
                    </div>
                    @endForeach
                </div>
                <div class="text-center">
                    {{  $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>




@include('layouts.includes.footer')

@endsection
