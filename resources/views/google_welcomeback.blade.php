@extends('master')

@section('content')

    <p>Hi {{ $user }}, welcome back.</p>
    <p>{!! link_to('logout', 'Logout'); !!}</p>
@stop