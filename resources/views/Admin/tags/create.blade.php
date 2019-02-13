@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Criar etiqueta </span>
@stop

@section('content')
    <div class="bg-white p-3">
        {!! Form::open(['route' => 'tags.store']) !!}
            
            @include('Admin.tags.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
