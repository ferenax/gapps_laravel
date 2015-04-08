@extends('master')

@section('content')

    <h3 class="ui header">
        <i class="disk outline icon"></i>
        <div class="content">
           Fichiers Google Drive de {{\Auth::user()->email}}
        </div>
    </h3>

    @if(isset($response['items']))
        <div class="ui three column grid">
            @foreach($response['items'] as $p)
                <div class="column">
                    <div class="ui blue piled segment">
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
    @else
        <div class="ui one column center aligned grid">
            <div class="column">
                <div class="ui red compact message">No files for {{\Auth::user()->email}}</div>
            </div>
        </div>
    @endif
@stop