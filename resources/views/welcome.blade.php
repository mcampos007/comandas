@extends('layouts.app')
@section('title', 'Bienvenido a App Virrey Spot.')
@section('body-class','landing-page')
@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
        } 
        .row > [class*='col-'] {
            display: flex;
            flex-direction: column;
        }
        .tt-query, /* UPDATE: newer versions use tt-input instead of tt-query */
        .tt-hint {
            width: 396px;
            height: 30px;
            padding: 8px 12px;
            font-size: 24px;
            line-height: 30px;
            border: 2px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        .tt-query {
          -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
             -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
                  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        }

        .tt-hint {
          color: #999
        }

        .tt-menu {    /* used to be tt-dropdown-menu in older versions */
          width: 222px;
          margin-top: 4px;
          padding: 4px 0;
          background-color: #fff;
          border: 1px solid #ccc;
          border: 1px solid rgba(0, 0, 0, 0.2);
          -webkit-border-radius: 4px;
             -moz-border-radius: 4px;
                  border-radius: 4px;
          -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
             -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
                  box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        .tt-suggestion {
          padding: 3px 20px;
          line-height: 24px;
        }

        .tt-suggestion.tt-cursor,.tt-suggestion:hover {
          color: #fff;
          background-color: #0097cf;

        }

        .tt-suggestion p {
          margin: 0;
        }
    </style>
@endsection
@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a App Virrey Spot.</h1>
                <h4>Realiza tus pedidos en línea y te contactaremos para coordinar la entrega.</h4>
                <br />
                <!-- <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> Watch video
                </a> -->
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">NUESTRAS PROMOS</h2>
                    <h5 class="description">.</h5>
                </div>
            </div>
            <div class="features">
                <div class="row">
                    @foreach($promos as $promo)
                     <div class="col-md-4">
                        <div class="team-player">
                           <img src="{{  $promo->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle" width="250">
                            <h4 class="title">{{ $promo->name }}<br />
                                <a href="{{ url('/products/'.$product->id )}}"> {{ $product->name }}<br /></a>
                                <small class="text-muted">{{$promo->category ? $promo->category->name : 'General'}}</small>
                                
                            </h4>
                            <p class="description">{{ $promo->description}}</p>
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-twitter"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon"><i class="fa fa-instagram"></i></a>
                            <a href="#pablo" class="btn btn-simple btn-just-icon btn-default"><i class="fa fa-facebook-square"></i></a>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Second Feature</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Third Feature</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="section text-center">
            <h2 class="title">Lo que tenemos para ofrecerte</h2>
            <form class="form-inline" method="GET" action="{{ url('/search')}}"> 
                <input type="´text" placeholder="¿Que estas buscando?" class="form-control typeahead" name="query" id="search">
               <button type="submit" class="btn btn-primary btn-just-icon">
                    <i class="material-icons">search</i>
                </button>
            </form>  
            <div class="team">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ $category->featured_image_url }}" alt="Imágen de la Categoría" class="img-raised img-circle">
                            <h4 class="title">
                                <a href="{{ url('/categories/'.$category->id ) }} "> {{ $category->name }}<br /></a>
                            </h4>

                        </div>
                    </div>
                    @endForeach
                </div>

            </div>
        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Nos interesa su opinión</h2>
                    <h4 class="text-center description">Nuestra pasión es crear experiencias gastronómicas excepcionales, y nos encantaría conocer su opinión sobre nuestro menú y servicio para seguir mejorando día a día.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tu nombre</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Tu correo electrónico</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Tu Opinión</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Enviar Tu Opinión
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@include('layouts.includes.footer')

@endsection
@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js')}}"></script>
    <script >
        $(function () {
            var products = new Bloodhound({
                prefetch: '{{ url("/products/json") }}',
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                datumTokenizer: Bloodhound.tokenizers.whitespace
            });
            $('#search').typeahead({
              hint: true,
              highlight: true,
              minLength: 1
            },
            {
              name: 'products',
              source: products
            });
        });
    </script>
@endsection