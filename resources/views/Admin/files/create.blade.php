@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Criar files </span>
@stop

@section('content')
    <div class="bg-white p-3">
        {!! Form::open(['route' => 'files.store', 'files' => true]) !!}
            
            @include('Admin.files.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
