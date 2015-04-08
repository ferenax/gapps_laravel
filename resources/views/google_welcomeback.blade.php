@extends('master')

@section('content')
<div class="ui one column grid">
    <div class="column">
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
                <a href="/contact_list">
                    <i class="user icon"></i>
                    {{ \Helpers::getContactsNumber() }} Contacts
                </a>
            </div>
        </div>
    </div>
</div>
@stop