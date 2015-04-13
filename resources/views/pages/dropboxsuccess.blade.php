@extends('master')

@section('content')
    <div class="ui success message">
        <i class="close icon"></i>
        <div class="header">
            Votre téléchargement de {{ \Helpers::stripSlash($response) }} s'est terminé avec succès.
        </div>
        <p>Pour finaliser votre import vers Google Drive, cliquez sur le bouton ci-dessous.</p>
    </div>

    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <div class="g-savetodrive"
         data-src="files{{$response}}"
         data-filename="{{ \Helpers::stripSlash($response) }}"
         data-sitename="Admin">
    </div>

@stop