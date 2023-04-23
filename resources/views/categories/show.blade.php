@extends('layouts.app')

@section('title', 'Categoría de Productos.')

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
                        <img src="{{ $category->featured_image_url }}" alt="Imágen de la Categoría" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">{{ $category->name }}</h3>
                    </div>
                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>{{ $category->description}}</p>
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



<!-- Modal Core -->
<div class="modal fade" id="modalAddtoCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Seleccione la cantidad que desea agregar</h4>
      </div>
      <form method="POST" action="{{url('/cart') }}">
        {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <input type="hidden" name="price" value="{{$product->price}}">
          <div class="modal-body">
            <input type="number" step="0.01" name="quantity" value = "1" class="form-control">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-info btn-simple">Añadir al Pedido</button>
          </div>
        </form>
    </div>
  </div>
</div>
@include('layouts.includes.footer')

@endsection
