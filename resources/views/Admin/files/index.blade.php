@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="col-md-3 h3"> Lista de Files </span>
    <span class="col-md-3"> </span>
    <span class="col-md-6"> {{ $files->render() }} </span>
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
            @foreach($files as $file)
            <tr>
                <td class="col-md-10">{{ $file->name }}</td>
                <td class="col-md-1">
                    <a href="{{ route('files.edit', $files->id) }}" class="btn btn-primary">Editar</a>
                </td>
                <td class="col-md-1">
                    {!! Form::open(['route' => ['files.destroy', $file->id], 'method' => 'DELETE']) !!}
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
