@extends('master')

@section('content')

    <h2 class="ui center aligned icon header siteBody">
        <i class="circular users icon"></i>
        {{\Auth::user()->email}}'s Contacts
    </h2>
@if(isset($response['feed']['entry']))
    <div class="ui three column grid">
        @foreach($response['feed']['entry'] as $p)
            <div class="column">
                <div class="ui segment">
                    <div class="ui list">
                        @if(!empty($p['title']['$t']))
                        <div class="item">
                            <div class="ui header" >
                                <i class="user icon"></i>
                                <div class="content"><h4 class="ui header">{{ $p['title']['$t'] }}</h4></div>
                            </div>
                        </div>
                        @endif
                        @if(isset($p['gd$phoneNumber']))
                        <div class="item">
                            <i class="right triangle icon"></i>
                            <div class="content">
                                <div class="ui large label">
                                    <i class="text telephone icon"></i> {{ $p['gd$phoneNumber'][0]['$t'] }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($p['gd$email']))
                        <div class="item">
                            <i class="right triangle icon"></i>
                            <div class="content">
                                <div class="ui large label">
                                    <i class="mail icon"></i> {{ $p['gd$email'][0]['address'] }}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
      <p>No contacts</p>
@endif

@stop