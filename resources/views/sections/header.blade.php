
<div id="siteBanner" class="ui fixed sticky top">
@if(\Auth::check())
<div id="tog" class="menuButton">
    <div class="ui big animated button">
        <div class="visible content"><i class="content icon"></i></div>
        <div class="hidden content">
            Menu
        </div>
    </div>
</div>
@endif
    <div class="ui page grid">
        <div class ="row">
            <div class="three column row">
                <div class="left floated right aligned column">
                    <h2 class="ui header">
                        <a href="/"><img class="homeLink" alt="Google" src="/images/Google.png" >
                        <div class="content homeLink">
                            <div id="appsfw">Apps For Work</div>
                        </div>
                        </a>
                    </h2>
                </div>
                <div class="right floated right aligned column">
                    @if(\Auth::check())
                        <div class="left floated column">
                            <div class="row bannerRight">{{ \Auth::user()->email }}</div>
                            <div class="row"><a id="signOut" href="/logout">se déconnecter</a></div>
                        </div>
                        <div class="right floated column">
                            <img alt="Thumbnail" src="{{ \Auth::user()->avatar }}" id="bannerAvatar" class="ui circular image" >
                        </div>
                    @else
                        <div class="right floated column">
                            <a href="/login" class="ui google plus button bannerRight">
                                <i class="google plus icon"></i>
                                Se connecter via Google
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

