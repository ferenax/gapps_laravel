@extends('master')

@section('content')
    <div class="ui horizontal divider">
        Tableau de bord
    </div>
    <div class="ui three column center aligned grid">
        <div class="column">
            <div class="ui horizontal segment">
                <a href="" class="ui small image">
                    <img src="http://www.theinquirer.net/IMG/853/275853/gmail-logo-2013.png">
                    <h2> Gmail </h2>
                </a>
            </div>
        </div>
        <div class="column">
            <div class="ui horizontal segment">
                <a href="/contact_list" class="ui small image">
                    <img src="http://icons.webpatashala.com/Icons/Circle-Icons-Martz/Png/contacts-icon21.PNG">
                    <h2> Contacts </h2>
                </a>
            </div>
        </div>
        <div class="column">
                <div class="ui horizontal segment">
                    <a href="" class="ui small image">
                        <img src="http://www.lawtechnologytoday.org/wp-content/uploads/2014/02/Hangouts-Logo.png">
                        <h2> Hangouts </h2>
                    </a>
                </div>
        </div>
    </div>

    <div class="ui three column center aligned grid">
        <div class="column">
            <div class="ui horizontal segment">
                <a href="drive_filelist" class="ui small image">
                    <img src="http://www.h3dwallpapers.com/wp-content/uploads/2014/09/Google_drive_logo-4.png">
                    <h2> Drive </h2>
                </a>
            </div>
        </div>
        <div class="column">
            <div class="ui horizontal segment">
                <a href="" class="ui small image">
                    <img src="http://www.netpublic.fr/wp-content/uploads/2012/01/googlesite.png">
                    <h2> Sites </h2>
                </a>
            </div>
        </div>
        <div class="column">
            <div class="ui horizontal segment">
                <a href="" class="ui small image">
                    <img src="http://cdn2.hubspot.net/hub/189007/file-409350520-jpg/Calendar-highres.jpg">
                    <h2> Calendar </h2>
                </a>
            </div>
        </div>
    </div>

@stop
