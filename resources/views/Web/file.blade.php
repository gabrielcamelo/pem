@extends('layouts.files')

@section('content')

	<section class="container-fluid">
		<div class="row mb-5 py-3 bg-dark text-white">
			<div class="col-md-5 pl-4"><img src="{{ asset('image/pem.png') }}" width="200" /></div>
			<h1 class="h2 col-md-7 pl-4 pt-2"> Preencha o formulário para receber os arquivos </h1>
		</div>
		<div class="row">
			<img src="{{ asset('image/download.png') }}" class="col-md-4 mx-5 rounded-circle img-thumbnail"> 
	        {!! Form::open(['route' => 'file.store', 'class' => 'col-md-5 px-5 mx-5']) !!}
	        	
	        	{{ Form::hidden('file', $file->image) }}
	        	{{ Form::hidden('link', $file->link) }}
				
				<div class="form-group">
					{{ Form::label('name', 'Nome') }}
					{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Exemplo: João']) }}
				</div>

				<div class="form-group">
					{{ Form::label('email', 'E - mail') }}
					{{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'exemplo@gmail.com']) }}
				</div>

				<div class="form-group">
					{{ Form::label('telefone', 'Telefone') }}
					{{ Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => '14999999999']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
				</div>

	        {!! Form::close() !!}
        </div>
	</section>

@stop