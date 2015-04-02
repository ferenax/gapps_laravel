@extends('master')

@section('content')

@if(isset($response['feed']['entry']))
    @foreach($response['feed']['entry'] as $p)
        {{ $p['title']['$t']   }} </br>
        @if(isset($p['gd$phoneNumber']))
            {{ $p['gd$phoneNumber'][0]['$t'] }}
        @endif
        @if(isset($p['gd$email']))
            {{ $p['gd$email'][0]['address'] }}
        @endif
        </br></br>
    @endforeach
@else
      <p>No contacts</p>
@endif



@stop