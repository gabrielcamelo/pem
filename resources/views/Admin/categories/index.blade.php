@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="col-md-3 h3"> Lista de Categorias </span>
    <span class="col-md-6"> </span>
    <span class="col-md-3">{{ $categories->render() }}</span>
@stop

@section('content')
    <table class="table table-striped" style="background: #fff;">
        <thead>
            <tr>
                <th>Nome</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td class="col-md-10">{{ $category->name }}</td>
                <td class="col-md-1">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Editar</a>
                </td>
                <td class="col-md-1">
                    {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                        <button class="btn btn-sm btn-danger">
                            Eliminar
                        </button>                           
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>   
    </table>        
@endsection
