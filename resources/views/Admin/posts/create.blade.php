@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Criar post </span>
@stop

@section('content')
    <div class="bg-white p-3">
        {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
            
            @include('Admin.posts.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
