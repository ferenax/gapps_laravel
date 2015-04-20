@extends('master')

@section('content')
    <h3 class="ui header">
        <i class="users icon"></i>
        <div class="content">
            Contacts de {{\Auth::user()->email}}
        </div>
    </h3>
@if(\Helpers::getContactsNumber() != 0)
    <div class="ui three column grid">
        @foreach($contacts as $contact)
            <div class="column">
                <div class="ui red piled segment">
                    <div class="ui list">
                        @if(isset($contact->username))
                        <div class="item">
                            <div class="ui header" >
                                <i class="user icon"></i>
                                <div class="content">
                                    <h4 class="ui header">
                                        @if($contact->username == '') Aucun nom
                                        @else {{ $contact->username }}
                                        @endif
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($contact->phone))
                        <div class="item">
                            <i class="right triangle icon"></i>
                            <div class="content">
                                <div class="ui large label">
                                    <i class="text telephone icon"></i>
                                    @if($contact->phone == '') Aucun numéro
                                    @else {{ $contact->phone }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(isset($contact->email))
                        <div class="item">
                            <i class="right triangle icon"></i>
                            <div class="content">
                                <div class="ui large label">
                                    <i class="mail icon"></i>
                                    @if($contact->email == '') Aucun email
                                    @else {{ $contact->email }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
<div class="ui one column center aligned grid">
    <div class="column">
        <div id="paginator" class="ui pagination menu">
            <a href="{{ $contacts->previousPageUrl() }}" class="icon item">
                <i class="left arrow icon"></i>
            </a>
            <a class="active item">
                {{ $contacts->currentPage() }}
            </a>
            <a class="disabled item">
                ...
            </a>
            <a href="{{ $contacts->url($contacts->lastPage()) }}" class="item">
                {{ $contacts->lastPage() }}
            </a>
            <a href ="{{ $contacts->nextPageUrl() }}"class="icon item">
                <i class="right arrow icon"></i>
            </a>
        </div>
    </div>
</div>
@else
<div class="ui one column center aligned grid">
    <div class="column">
        <div class="ui huge red compact message">Pas de contacts pour {{\Auth::user()->email}}</div>
    </div>
</div>
@endif

@stop