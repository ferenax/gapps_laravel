@extends('master')

@section('content')

    <div class="ui red card">
        <div class="image">
            <img src = "{{ \Helpers::fullsize_avatar($user->avatar) }}">
        </div>
        <div class="content">
            <a class="header">{{ $user->username }}</a>
            <div class="meta">
                <span class="date"><i class="mail icon"></i> {{ $user->email }} </span>
            </div>
            <div class="meta">
                <span class="date">Date d'inscription : {{ date('l, d F Y', strtotime($user->created_at)) }}</span>
            </div>
            <div class="meta">
                <span class="date">Google ID : {{ $user->gid }} </span>
            </div>
            <div class="description">
               {{ \Faker\Factory::create()->paragraph($nbSentences = 3) }}
            </div>
        </div>
        <div class="extra content">
            <a>
                <i class="user icon"></i>
                22 Friends
            </a>
        </div>
    </div>

@stop