@extends('master')

@section('content')

    <p>Hi {{ $user->username }}, welcome back.</p>
    <p> Email : {{ $user->email }} </p>
    <p> ID : {{ $user->gid }} </p>
    <p><img src = "{{ $user->avatar }}" alt="Avatar" ></img></p>
    <p>{!! link_to('logout', 'Logout'); !!}</p>
@stop