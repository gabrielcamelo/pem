@extends('layouts.home')

@section('content')

	<section class="row m-3 bg-white">
		<h1 class="h5 p-3 d-flex flex-column w-100"><strong>Mais recentes</strong></h1>
		<div class="d-flex">
			@foreach($posts as $post)
				<article class="d-flex flex-column flex-wrap justify-content-between mx-2" width="200px">
					<a href="{{ route('post', $post->slug) }}" class="">
		                @if($post->file) 
		                    <img src="{{ $post->file }}" class="img-fluid"> 
		                @endif
		            </a>
		            <a href="{{ route('post', $post->slug) }}" class="" >{{ $post->name }}</a>
<a class="badge badge-pill badge-dark" href="{{ route('category', $post->category->slug) }}">
                {{ $post->category->name }}
            </a>
	            </article>
			@endforeach
		</div>
	</section>

@stop