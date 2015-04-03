@extends('master')

@section('content')

    <h2 class="ui center aligned icon header siteBody">
        <i class="circular file icon"></i>
        {{\Auth::user()->email}}'s Drive File List
    </h2>


    @if(isset($response['items']))
        <div class="ui three column grid">
            @foreach($response['items'] as $p)
                <div class="column">
                    <div class="ui segment">
                        <div class="ui list">
                            @if(!empty($p['title']))
                                <div class="item">
                                    <div class="ui header" >
                                        <a href="{{$p['alternateLink']}}"><img src="{{ $p['iconLink'] }}"> </a>
                                        <div class="content"><h4 class="ui header">{{ $p['title'] }}</h4></div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($p['fileSize']))
                                <div class="item">
                                    <i class="right triangle icon"></i>
                                    <div class="content ">
                                        <div class="ui large label">
                                            <i class="disk outline icon"></i> Taille : {{ \Helpers::format_num($p['fileSize']) }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($p['owners'][0]['displayName']))
                                <div class="item">
                                    <i class="right triangle icon"></i>
                                    <div class="content">
                                        <div class="ui large label">
                                            <i class="user icon"></i> Propriétaire : {{ $p['owners'][0]['displayName'] }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if(!empty($p['lastModifyingUserName']))
                                <div class="item">
                                    <i class="right triangle icon"></i>
                                    <div class="content">
                                        <div class="ui large label">
                                            <i class="edit icon"></i> Modifié par : {{ $p['lastModifyingUserName'] }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="ui pagination menu">
            <a class="icon item">
                <i class="left arrow icon"></i>
            </a>
            <a class="active item">
                1
            </a>
            <div class="disabled item">
                ...
            </div>
            <a class="item">
                10
            </a>
            <a class="item">
                11
            </a>
            <a class="item">
                12
            </a>
            <a class="icon item">
                <i class="right arrow icon"></i>
            </a>
        </div>
    @else
        <p>No contacts</p>
    @endif

@stop