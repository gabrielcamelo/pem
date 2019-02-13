@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Criar categoria </span>
@stop

@section('content')

    <div class="bg-white p-3">
        {!! Form::open(['route' => 'categories.store']) !!}
            
            @include('Admin.categories.partials.form')

        {!! Form::close() !!}
    </div>

@endsection
