@extends('master')

@section('content')

    <div class="ui top attached tabular menu">
        <a class="active item" data-tab="first">Liste des fichiers</a>
        <a class="item" data-tab="second">Infos</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
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
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
        <h3 class="ui header">
            <i class="dropbox icon"></i>
            <div class="content">
                Profil Dropbox de {{ $info->email }}
            </div>
        </h3>
        <div class="ui items">
            <div class="item">
                <div class="image">
                    <img src="images/Dropbox.png">
                </div>
                <div class="content">
                    <a class="header">{{ $info->display_name }}</a>
                    <div class="meta">
                        <span>{{ $info->email }}</span>
                    </div>
                    <div class="description">
                        <p>Country : {{ $info->country }}</p>
                    </div>
                    <div class="extra">
                        Language : {{ $info->locale }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop