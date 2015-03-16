@extends('master')

@section('content')
	

	@foreach ($songs as $song)
        <li> {!! link_to_route('song_path', $song->title, [$song->slug]) !!} </li>
	@endforeach


@stop