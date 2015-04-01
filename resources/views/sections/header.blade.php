<div class="sitebanner">
    <div class="ui page grid">
        <div class ="row">
            <div class="two column row">
                <div class="left floated right aligned six wide column">
                    <h2 class="ui header">
                        <a href="/"><img class="homelink" alt="Google" src="//www.google.com/images/logos/google_logo_41.png" ></a>
                        <div class="content homelink">
                            Apps For Work
                        </div>
                    </h2>
                </div>
                <div class="right floated right aligned six wide column">

                    @if(\Auth::check())
                        <div class="left floated column">
                            <div class="row bannerright">{{ \Auth::user()->email }}</div>
                            <div class="row"><a class="signout" href="/logout">sign out</a></div>
                        </div>
                        <div class="right floated column">
                            <img alt="Thumbnail" src="{{ \Auth::user()->avatar }}" class="ui circular image banneravatar" >
                        </div>
                    @else
                        <div class="right floated column">
                            <a href="/login" class="ui google plus button bannerright">
                                <i class="google plus icon"></i>
                                Login with Google
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>