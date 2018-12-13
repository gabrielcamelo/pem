@extends('adminlte::page')
@section('title', 'Sem title')
@section('content_header')
    <span class="h3"> Editar post </span>
@stop

@section('content')

    <div class="bg-white p-3">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
            
             @include('admin.posts.partials.form') 

        {!! Form::close() !!}
    </div>

@endsection
