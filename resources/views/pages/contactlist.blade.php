@extends('master')

@section('content')

    <h2 class="ui center aligned icon header siteBody">
        <i class="circular users icon"></i>
        {{\Auth::user()->email}}'s Contacts
    </h2>

@if(isset($contacts))
    <div class="ui three column grid">
        @foreach($contacts as $contact)
            <div class="column">
                <div class="ui segment">
                    <div class="ui list">
                        @if(!empty($contact->username))
                        <div class="item">
                            <div class="ui header" >
                                <i class="user icon"></i>
                                <div class="content"><h4 class="ui header">{{ $contact->username }}</h4></div>
                            </div>
                        </div>
                        @endif
                        @if(isset($contact->phone))
                        <div class="item">
                            <i class="right triangle icon"></i>
                            <div class="content">
                                <div class="ui large label">
                                    <i class="text telephone icon"></i> {{ $contact->phone }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($contact->email))
                        <div class="item">
                            <i class="right triangle icon"></i>
                            <div class="content">
                                <div class="ui large label">
                                    <i class="mail icon"></i> {{ $contact->email }}
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
    <div class="ui red message">No contact entry for {{\Auth::user()->email}}</div>
@endif

@stop