@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Editar categoria </span>
@stop

@section('content')
    <div class="bg-white p-3">
        {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
            
            @include('Admin.categories.partials.form')

        {!! Form::close() !!}
    </div>
@endsection
