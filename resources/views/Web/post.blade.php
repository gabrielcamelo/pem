@extends('layouts.home')

@section('content')

    <h2 class="py-1 text-dark text-center"> {{ $post->name }} </h2>

    <div class="text-muted d-flex justify-content-around w-50 mx-auto py-3 info-post">
        <span>Josi Beatriz</span>/
        <span>{{  date('d / m / Y', strtotime($post->publish_in)) }}</span>
        <!-- <span><i class="fa fa-comment-o"></i> 343</span> -->
    </div>

    <div class="panel-body">
        <a href="post.html" class="">
            @if($post->file) 
                <img src="{{ $post->file }}" class="img-fluid mx-auto d-block"> 
            @endif
        </a>
        
        <p class="text-justify m-auto pb-4">{!! $post->body !!}</p>

        <div class="d-flex flex-row-reverse w-100">
            <a class="badge badge-pill badge-dark" href="{{ route('category', $post->category->slug) }}">
                {{ $post->category->name }}
            </a>
            @foreach($post->tags as $tag)
                <a class="badge badge-pill badge-warning mx-1" href="{{ route('tag', $tag->slug) }}">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>

@stop