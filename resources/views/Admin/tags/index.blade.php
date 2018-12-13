@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="col-md-3 h3"> Lista de Etiquetas </span>
    <span class="col-md-3"> </span>
    <span class="col-md-6"> {{ $tags->render() }} </span>
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
            @foreach($tags as $tag)
            <tr>
                <td class="col-md-10">{{ $tag->name }}</td>
                <td class="col-md-1">
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Editar</a>
                </td>
                <td class="col-md-1">
                    {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
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
