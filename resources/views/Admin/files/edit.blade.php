@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Editar etiqueta </span>
@stop

@section('content')
    <div class="bg-white p-3">
        {!! Form::model($file, ['route' => ['tags.update', $file->id], 'method' => 'PUT', 'files' => true]) !!}
            
            @include('Admin.tags.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
