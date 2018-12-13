@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 offset-md-1">
            <div class="h2">
                Ver etiqueta
            </div>

            <div class="bg-white p-3">
                <p><strong>Nome</strong> {{ $tag->name }}</p>
                <p><strong>Slug</strong> {{ $tag->slug }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
