@extends('master')

@section('content')

    <h3 class="ui header">
        <i class="dropbox icon"></i>
        <div class="content">
            Fichiers Dropbox de {{$info->email}}
        </div>
    </h3>

    @if(count($list->contents) > 0)
        <div class="ui three column grid">
            @foreach($list->contents as $p)
                <div class="column">
                    <div class="ui blue piled segment">
                        <div class="ui list">
                            @if(!empty($p->path))
                                <div class="item">
                                    <div class="ui header" >
                                        <div class="content"><h4 class="ui header">{{ \Helpers::stripSlash($p->path) }}</h4></div>
                                    </div>
                                </div>
                            @endif
                            @if(isset($p->size))
                                <div class="item">
                                    <i class="right triangle icon"></i>
                                    <div class="content ">
                                        <div class="ui large label">
                                            <i class="disk outline icon"></i> Taille : {{ $p->size }}

                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="ui one column center aligned grid">
                                <div class="column">
                                    <a href="/filedownload?path={{$p->path}}" class="ui middle floated primary button">
                                        Importer vers Drive
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="ui one column center aligned grid">
            <div class="column">
                <div class="ui red compact message">No files for {{$info->email}}</div>
            </div>
        </div>
    @endif
@stop