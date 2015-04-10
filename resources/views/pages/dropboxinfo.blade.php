@extends('master')

@section('content')
    <h3 class="ui header">
        <i class="dropbox icon"></i>
        <div class="content">
            Profil Dropbox de {{ $info->email }}
        </div>
    </h3>
    <div class="ui items">
        <div class="item">
            <div class="image">
                <img src="http://images.techhive.com/images/article/2012/09/dropbox-ico-100004576-large.png">
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

@stop
