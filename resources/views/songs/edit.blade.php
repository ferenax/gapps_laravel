@extends('master')

@section('content')
	
	<h2> {{ $song->title }} </h2>

	{!! Form::model($song , ['url' => 'http://www.google.com']) !!}

		<div class="form-group">
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::textarea('lyrics', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Update song', ['class' => 'btn btn-primary']) !!}
		</div>

	{!! Form::close() !!}

@stop