@extends('layouts.files')

@section('content')

	<section class="">
		<h1> Preencha o formulário para receber os arquivos </h1>
        {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
            
			<div class="form-group">
				{{ Form::label('name', 'Nome') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('email', 'E - mail') }}
				{{ Form::text('email', null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::label('telefone', 'Telefone') }}
				{{ Form::text('telefone', null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
			    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
			</div>

        {!! Form::close() !!}
	</section>

@stop