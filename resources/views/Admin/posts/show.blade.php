@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="h2">
                Ver entrada
            </div>

            <div class="bg-white p-3">
                <p><strong>Nome</strong> {{ $post->name }}</p>
                <p><strong>Slug</strong> {{ $post->slug }}</p>
                <p><strong>Descrição</strong> {{ $post->body }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
