@extends('layouts.app')

@section('title', 'Listado de Categorias.')

@section('body-class','product-page')

@section('content')
<!-- <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');"> -->
<div class="header header-filter" style="background-image: url('/img/portada.jpg');">

</div>

<div class="main main-raised">
    <div class="container">

        <div class="section text-center">
            <h2 class="title">Listado de Categorias</h2>
            <a href=" {{ url('admin/categories/create')}}" class="btn btn-primary btn-round">Nueva Categoría</a>
            <div class="team">
                <div class="row">
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-4 text-center">Descripción</th>
                                <th class="text-right">Acciones</th>
                            </tr> 
                        </thead>
                        @foreach($categories as $category)
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $category->id}}</td>
                                <td>{{ $category->name }}</td>
                                <td class="col-md-4">{{ $category->description }}</td>
                                <td class="td-actions text-right">
                                    
                                   <form method="POST" action="{{ url('/admin/categories/'.$category->id) }}" >
                                    {{csrf_field()}}
                                    {{ method_field('DELETE')}}
                                    <a href=""  rel="tooltip" title="Ver Categoria" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <a href=" {{ url('/admin/categories/'.$category->id.'/edit')}}" rel="tooltip" title="Editar Categoria" class="btn btn-success btn-simple btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href=" {{ url('/admin/categories/'.$category->id.'/images')}}" rel="tooltip" title="Editar Imágen de la Categoria" class="btn btn-success btn-simple btn-xs">
                                        <span class="material-icons">
                                        panorama
                                        </span>
                                    </a>
                                    <button type="submit" rel="tooltip" title="Eliminar Categoría" class="btn btn-danger btn-simple btn-xs">
                                        <i class="fa fa-times"></i>
                                    </button>
                                   </form>  
                                </td>
                            </tr>
                        </tbody>
                        @endForeach
                    </table>
                    
                    {{ $categories->links() }}
                </div>
            </div>

        </div>

    </div>

</div>
@include('layouts.includes.footer')

@endsection
