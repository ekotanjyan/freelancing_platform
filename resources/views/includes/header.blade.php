@if (Schema::hasTable('pages') || Schema::hasTable('site_managements'))
    @php
        $settings = array();
        $pages = App\Page::all();
        $setting = \App\SiteManagement::getMetaValue('settings');
        $logo =  '/images/logo2.png';
        $inner_header = !empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' ? 'wt-headervtwo' : '';
        $type = Helper::getAccessType();
    @endphp
@endif
<div class="short-header-wrapper header-wrapper">
    <header class="header">
        @auth
            {{ Helper::displayEmailWarning() }}
        @endauth
        <div class="header__container index-main-container">
            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <div class="header-logo__wrapper">
                        <img class="header-logo__img" src="/images/img/index-main/logo-3.png" alt="{{ trans('lang.site_logo') }}">
                        <span class="header-logo__slogan">Dedicated to Primary Health Care</span>
                    </div><!-- .header-logo__wrapper -->
                </a>
            </div>

            <div class="header-navigation">
                @if ( Helper::getAuthRoleName()=='Organisation' || Helper::getAuthRoleName()=='')
                <div class="header-navigation__menu-item-wrapper">
                    <a class="header-navigation__menu-item" href="{{ url('search-results?type=freelancer') }}">START BROWSING ADHOC STAFF</a>
                </div>
                @endif
                @if ( Helper::getAuthRoleName()!='Organisation')
                <div class="header-navigation__menu-item-wrapper">
                    <a class="header-navigation__menu-item" href="{{ url('search-results?type=job')}}">FIND TEMPORARY SHORT TERM WORK</a>
                </div>
                @endif
                <div class="header-navigation__menu-item-wrapper">
                    <a class="header-navigation__menu-item" href="{{ url('/page/main') }}">FAQs</a>
                </div>
                <div class="header-navigation__menu-item-wrapper">
                    <a class="header-navigation__menu-item" href="{{ url('/contact-us') }}">CONTACT US FOR INFORMATION</a>
                </div>
            </div>

            @if(!\Auth::User())
                <div class="header__buttons">
                    <a href="{{ route('login') }}"><button class="hero__buttons-left">Sign In</button></a>
                    <a href="{{ route('register') }}" class="hero__buttons-right-link"><button class="hero__buttons-right">{{ trans('lang.join_now') }}</button></a>
                </div>
            @endif

        </div><!-- .header__container -->
    </header>

    <section class="hero">
        <div class="header__container hero__container">
            <div class="hero__wrapper">
                <h1 class="hero__title">Adhoc and temp staff are just a new steps away...</h1>
            </div><!-- .hero__wrapper -->
            @if(!\Auth::User())
                <div class="hero__buttons">
                    <a href="{{ route('login') }}"><button class="hero__buttons-left">Sign In</button></a>
                    <a href="{{ route('register') }}" class="hero__buttons-right-link"><button class="hero__buttons-right">{{ trans('lang.join_now') }}</button></a>
                </div>
            @endif
            @auth
                @php
                    $user = !empty(Auth::user()) ? Auth::user() : '';
                    $role = !empty($user) ? $user->getRoleNames()->first() : array();
                    $profile = \App\User::find($user->id)->profile;
                    $user_image = !empty($profile) ? $profile->avater : '';
                    $employer_job = \App\Job::select('status')->where('user_id', Auth::user()->id)->first();
                    $profile_image = !empty($user_image) ? '/uploads/users/'.$user->id.'/'.$user_image : 'images/user-login.png';
                    $payment_settings = \App\SiteManagement::getMetaValue('commision');
                    $payment_module = !empty($payment_settings) && !empty($payment_settings[0]['enable_packages']) ? $payment_settings[0]['enable_packages'] : 'true';
                    $employer_payment_module = !empty($payment_settings) && !empty($payment_settings[0]['employer_package']) ? $payment_settings[0]['employer_package'] : 'true';
                @endphp
                <div class="wt-userlogedin">
                    <div class="wt-userlogedin-wrap">
                    <figure class="wt-userimg" style="float:none">
                        <img src="{{{ asset($profile_image) }}}"
                             alt="{{{ trans('lang.user_avatar') }}}">
                    </figure>
                    <div class="wt-username" style="margin-top: 10px; text-align: center">
                        <h3 style="font-size: 13px;">{{{ Helper::getUserName(Auth::user()->id) }}}</h3>
                        <div style="font-size:10px;color:darkgrey">{{{ !empty(Auth::user()->profile->tagline) ? str_limit(Auth::user()->profile->tagline, 26, '') : Helper::getAuthRoleName() }}}</div>
                    </div>
                    @if (file_exists(resource_path('views/extend/back-end/includes/profile-menu.blade.php')))
                        @include('extend.back-end.includes.profile-menu')
                    @else
                        @include('back-end.includes.profile-menu')
                    @endif
                    </div>
                </div>
            @endauth
        </div><!-- .hero__container -->
    </section><!-- .hero -->

    <div class="header__container header-navigation header-sm-navigation">
        @if ( Helper::getAuthRoleName()=='Organisation' || Helper::getAuthRoleName()=='')
            <div class="header-navigation__menu-item-wrapper header-navigation__menu-item-wrapper-without-border">
                <a class="header-navigation__menu-item" href="{{url('search-results?type=freelancer')}}">START BROWSING ADHOC STAFF</a>
            </div>
        @endif
        @if (Helper::getAuthRoleName()!='Organisation')
        <div class="header-navigation__menu-item-wrapper">
            <a class="header-navigation__menu-item" href="{{url('search-results?type=job')}}">FIND TEMPORARY SHORT TERM WORK</a>
        </div>
        @endif
        <div class="header-navigation__menu-item-wrapper">
            <a class="header-navigation__menu-item" href="{{ url('/page/main') }}">FAQs</a>
        </div>
        <div class="header-navigation__menu-item-wrapper">
            <a class="header-navigation__menu-item" href="{{ url('/contact-us') }}">CONTACT US<br> FOR INFORMATION</a>
        </div>
    </div>
</div>



