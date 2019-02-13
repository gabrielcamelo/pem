@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Editar etiqueta </span>
@stop

@section('content')
    <div class="bg-white p-3">
        {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
            
            @include('Admin.tags.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
