@extends('layouts.home')

@section('content')

        @foreach($posts as $post)
        <article class="mb-5 border border-top-0 border-right-0 border-left-0">
            <a href="{{ route('post', $post->slug) }}" class="">
                @if($post->file) 
                    <img src="{{ $post->file }}" class="img-fluid mx-auto d-block"> 
                @endif
            </a>
            <div class="py-4 text-center">
                <h2 class="py-1 name-post"><a href="{{ route('post', $post->slug) }}" class="text-dark" >{{ $post->name }}</a></h2>
                <div class="text-muted d-flex justify-content-around w-50 mx-auto py-3 info-post">
                    <span>Josi Beatriz</span>/
                    <span>{{  date('d / m / Y', strtotime($post->publish_in)) }}</span>
                    <!-- <span><i class="fa fa-comment-o"></i> 343</span> -->
                </div>
                <p class="text-justify m-auto blog-post-body pb-4">{{ $post->excerpt }}</p>

                <a href="{{ route('post', $post->slug) }}" class="btn btn-outline-warning w-25 my-4 shadow-md ler-mais">Ler mais</a>
            </div>

            <a class="d-flex flex-row-reverse w-100" href="{{ route('category', $post->category->slug) }}">
                <span class="">
                    <i class="fa fa-asterisk" aria-hidden="true" class="mx1"></i>
                    {{ $post->category->name }}
                </span>
            </a>
        </article>
        @endforeach
        {{ $posts->render() }}

@stop