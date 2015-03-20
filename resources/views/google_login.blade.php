@extends('master')

@section('content')

    <p>Hi guest, welcome to our website</p>
    <p>{!! link_to('login', 'Login with Google'); !!}</p>

@stop