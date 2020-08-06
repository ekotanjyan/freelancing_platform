@extends('layouts.main')

@section('title'){{ config('app.name') }} @stop

@section('content')
    <div class="wrapper">
        <div class="content">

            <div class="header-wrapper">
                <header class="header">
                    <div class="header__container index-main-container">
                        <div class="header-logo">
                            <a href="{{ url('/') }}">
                                <div class="header-logo__wrapper">
                                    <img class="header-logo__img" src="images/img/index-main/logo-3.png" alt="{{ trans('lang.site_logo') }}">
                                    <span class="header-logo__slogan">Dedicated to Primary Health Care</span>
                                </div><!-- .header-logo__wrapper -->
                            </a>
                        </div>

                        <div class="header-navigation">
                            <div class="header-navigation__menu-item-wrapper">
                                <a class="header-navigation__menu-item" href="{{ (Helper::getAuthRoleName()=='Organisation' || Helper::getAuthRoleName()=='') ? url('search-results?type=freelancer') : '' }}">START BROWSING ADHOC STAFF</a>
                            </div>
                            <div class="header-navigation__menu-item-wrapper">
                                <a class="header-navigation__menu-item" href="{{ (Helper::getAuthRoleName()!='Organisation') ? url('search-results?type=job') : '' }}">FIND TEMPORARY SHORT TERM WORK</a>
                            </div>
                            <div class="header-navigation__menu-item-wrapper">
                                <a class="header-navigation__menu-item" href="{{ url('/page/main') }}">FAQs</a>
                            </div>
                            <div class="header-navigation__menu-item-wrapper">
                                <a class="header-navigation__menu-item" href="{{ url('/contact-us') }}">CONTACT US FOR INFORMATION</a>
                            </div>
                        </div>

                    </div><!-- .header__container -->
                </header>

                <section class="hero">
                    <div class="header__container hero__container">
                        <div class="hero__wrapper">
                            <h1 class="hero__title">Connecting Primary Health Care professionals with the adhoc &amp; temp staff they need, when they need them</h1>
                            <div class="hero__experience">10 years professional clinical experience surgeries and healthcare stackeholders with adhoc and temporary staffing solutions.</div>
                            <div class="hero__buttons">
                                <a href="{{ url('/login') }}"><button class="hero__buttons-login">Log In</button></a>
                                <a href="{{ url('/register') }}" class="hero__buttons-signup-link"><button class="hero__buttons-signup">Sign Up</button></a>
                            </div>
                        </div><!-- .hero__wrapper -->
                    </div><!-- .hero__container -->
                </section><!-- .hero -->
            </div>

            <section class="header-sm-navigation">
                <div class="header-sm-navigation-wrapper index-main-container">
                    <div class="header-sm-navigation__menu-item-wrapper">
                        <a class="header-sm-navigation__menu-item" href="{{ (Helper::getAuthRoleName()=='Organisation' || Helper::getAuthRoleName()=='') ? url('search-results?type=freelancer') : '' }}">START BROWSING ADHOC STAFF</a>
                    </div>
                    <div class="header-sm-navigation__menu-item-wrapper">
                        <a class="header-sm-navigation__menu-item" href="{{ (Helper::getAuthRoleName()!='Organisation') ? url('search-results?type=job') : '' }}">FIND TEMPORARY SHORT TERM WORK</a>
                    </div>
                    <div class="header-sm-navigation__menu-item-wrapper">
                        <a class="header-sm-navigation__menu-item" href="{{ url('/page/main') }}">FAQs</a>
                    </div>
                    <div class="header-sm-navigation__menu-item-wrapper">
                        <a class="header-sm-navigation__menu-item" href="{{ url('/contact-us') }}">CONTACT US FOR INFORMATION</a>
                    </div>
                </div>
            </section><!-- .header-sm-navigation -->


        </div>

        <div class="footer">
            <section class="footer-cards">
                <div class="footer-cards-wrapper index-main-container">
                    <div class="footer-cards__item footer-cards__item-yellow">
                        <div class="footer-cards__item-top">
                            <div class="footer-cards__item-title">
                                <span>LOCATE</span>
                                <span>ADHOC</span>
                                <span>STAFF</span>
                            </div>
                            <div class="footer-cards__item-img">
                                <img class="footer-cards__item-img-yellow" src="/images/icons/Layer 89.png">
                            </div>
                        </div>
                        <p>
                            Search staff using loactions that suit you, actually need.
                        </p>
                    </div>
                    <div class="footer-cards__item footer-cards__item-blue">
                        <div class="footer-cards__item-top">
                            <div class="footer-cards__item-title">
                                <span>SHORT</span>
                                <span>NOTICE</span>
                                <span>BOOKINGS</span>
                            </div>
                            <div class="footer-cards__item-img">
                                <img class="footer-cards__item-img-blue" src="/images/icons/Layer 84.png">
                            </div>
                        </div>
                        <p>
                            Search staff using loactions that suit you, actually need.
                        </p>
                    </div>
                    <div class="footer-cards__item footer-cards__item-green">
                        <div class="footer-cards__item-top">
                            <div class="footer-cards__item-title">
                                <span>SKILLED</span>
                                <span>TEMP</span>
                                <span>STAFF</span>
                            </div>
                            <div class="footer-cards__item-img">
                                <img class="footer-cards__item-img-green" src="/images/icons/Layer 79.png">
                            </div>
                        </div>
                        <p>
                            Search staff using loactions that suit you, actually need.
                        </p>
                    </div>
                </div>
            </section><!-- .footer-cards-->

            <div class="footer-arc">
                <div class="footer-arc-social-wrapper">
                    <a href="#" class="footer-arc-social facebook_icon"><img src="/images/facebook.png"></a>
                    <a href="#" class="footer-arc-social linkedin_icon"><img src="/images/linkedin.png"></a>
                    <a href="#" class="footer-arc-social twitter_icon"><img src="/images/twitter.png"></a>
                    <a href="#" class="footer-arc-social footer-arc-social-last envelope_icon"><img src="/images/envelope.png"></a>
                </div>
                <div class="footer-copyright">
                    <p>
                        ALL COPYRIGHTS STAFFBACKUP LIMITED 2019 &#9400;
                    </p>
                </div>
            </div><!-- .footer-arc-->
        </div>

    </div>

@endsection