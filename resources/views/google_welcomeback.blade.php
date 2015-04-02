@extends('master')

@section('content')
                <p>Hi {{ $user->username }}, welcome back.</p>
                <p> Email : {{ $user->email }} </p>
                <p> ID : {{ $user->gid }} </p>
                <p><img src = "{{ $user->avatar }}" alt="Avatar" ></img></p>
                <a href="/contact_list" class="positive ui button">Get my Contact list</a>
@stop