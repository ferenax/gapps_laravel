@extends('master')

@section('content')
	
	<p> {{ $song->title }} </p>

	@if ($song->lyrics)
		<article class='lyrics'>

			{!! nl2br($song->lyrics) !!}

		</article>
	@endif

    {!! link_to_route('songs_path', 'Go back') !!}
@stop