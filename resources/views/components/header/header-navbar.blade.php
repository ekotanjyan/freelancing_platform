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
<header id="wt-header" class="wt-header wt-haslayout {{$inner_header}}">
    <div class="wt-navigationarea">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wt-rightarea" style="height: 0px;">
                        <nav id="wt-nav" class="wt-nav navbar-expand-lg">
                            <div class="collapse navbar-collapse wt-navigation" id="navbarNav2" style="margin-top: 0px; align-items:normal">

                                @if(!\Request::is('search-results') && !\Request::is('register') && Auth::User())
                                    <ul class="navbar-nav" style="margin-top: 5px;">
                                        @if (!empty($pages) || Schema::hasTable('pages'))
                                            @foreach ($pages as $key => $page)
                                                @php
                                                    $page_has_child = App\Page::pageHasChild($page->id); $pageID = Request::segment(2);
                                                    $show_page = \App\SiteManagement::where('meta_key', 'show-page-'.$page->id)->select('meta_value')->pluck('meta_value')->first();
                                                @endphp
                                                @if ($page->relation_type == 0 && $show_page == 'true')
                                                    <li class="{{!empty($page_has_child) ? 'menu-item-has-children page_item_has_children' : '' }} @if ($pageID == $page->slug ) current-menu-item @endif">
                                                        <a href="{{url('page/'.$page->slug)}}">{{{$page->title}}}</a>
                                                        @if (!empty($page_has_child))
                                                            <ul class="sub-menu">
                                                                @foreach($page_has_child as $parent)
                                                                    @php $child = App\Page::getChildPages($parent->child_id);@endphp
                                                                    <li class="@if ($pageID == $child->slug ) current-menu-item @endif">
                                                                        <a href="{{url('page/'.$child->slug.'/')}}">
                                                                            {{{$child->title}}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        @endif
                                    <!--
                                    <li>
                                        <a href="{{url('search-results?type=freelancer')}}">
                                            {{{ trans('lang.view_freelancers') }}}
                                        </a>
                                    </li>

                                    -->
                                        @if (($type =='jobs' || $type == 'both') && ( Helper::getAuthRoleName() != 'Organisation'))
                                            <li>
                                                <a href="{{url('search-results?type=job')}}">
                                                    {{{ trans('lang.browse_jobs') }}}
                                                </a>
                                            </li>
                                        @endif

                                        @if ($type =='services' || $type == 'both')
                                            <li>
                                                <a href="{{url('search-results?type=service')}}">
                                                    {{{ trans('lang.browse_services') }}}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
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
                                @endauth
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
