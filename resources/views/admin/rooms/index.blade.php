@extends('layouts.app')

@section('title', 'Listado de Habitaciones.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center">
            <h2 class="title">Listado de Habitaciones</h2>
            <a href=" {{ url('admin/rooms/create')}}" class="btn btn-primary btn-round">Nueva Habitación</a>
            <div class="team">
                <div class="row">
                    @foreach($rooms as $room)
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Nombre</th>
<!--                            <th>Descripción</th>
                                <th class="text-right">Precio</th>
                                <th >Categoría</th>  -->
                                <th class="text-right">Acciones</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $room->id}}</td>
                                <td>{{ $room->name }}</td>
                                <!-- <td class="col-md-4">{{ $room->description }}</td>
                                <td class="text-right"> ${{ $room->price}}</td>
                                <td > ${{ $room->category ? $room->category->name :"General" }} </td> -->
                                <td class="td-actions text-right">
                                    
                                   <form method="POST" action="{{ url('/admin/rooms/'.$room->id) }}">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <a href=""  rel="tooltip" title="Ver Habitación" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <a href=" {{ url('/admin/rooms/'.$room->id.'/edit')}}" rel="tooltip" title="Editar Habitación" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar Habitación" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                   </form>      
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endForeach
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.includes.footer')

@endsection
