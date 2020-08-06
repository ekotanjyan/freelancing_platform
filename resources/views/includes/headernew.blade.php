@if (Schema::hasTable('pages') || Schema::hasTable('site_managements'))
    @php
        $settings = array();
        $pages = App\Page::all();
        $setting = \App\SiteManagement::getMetaValue('settings');
        $logo = !empty($setting[0]['logo']) ? Helper::getHeaderLogo($setting[0]['logo']) : '/images/logo.png';
        $inner_header = !empty(Route::getCurrentRoute()) && Route::getCurrentRoute()->uri() != '/' ? 'wt-headervtwo' : '';
        $type = Helper::getAccessType();
        if(Auth::user())
        {
            $user_role_type = \App\User::getUserRoleType(Auth::user()->id);
            $user_role = $user_role_type->role_type;
        }


    @endphp
@endif
<header class="wt-header wt-haslayout {{$inner_header}}">
    <div class="container-fluid headernew">
        <div class="row ">
			<div class="logo-block">
				<div>
					<img style="" src="images/logo2.png"/>
				</div>
				<div class="logo-small-text">
					<small>Dedicated to Primary Health Care</small>
				</div>
			</div>
            <div class="mainhomeMenu">
                <ul id="newmenu" class="list-unstyled" style="list-style: none;">
                    <li><a href="{{url('/')}}">START BROWSING ADHOC STAFF</a></li>
                    <li><a href="{{url('page/how-it-works')}}">FIND TEMPORARY SHORT TERM WORK</a></li>
                    <li><a href="{{url('page/main')}}">FAQs</a></li>
                    <li style="border-right:none"><a href="{{ url('contact-us') }}" style="color:#2a3b65">CONTACT US<br> FOR INFORMATION</a>
                    </li>
                </ul>
            </div>
            {{--<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 telno" >--}}
            {{--<span>Email:info@staffbackup.co.uk</span>--}}
            {{--</div>--}}
        </div>
        <div class="row headernew-second">

            <div class="headingcenter text-center">
                <h2>Connecting Primary Health Care professionals with the adhoc & temp staff they need, when they need them</h2>
                <div>15 years professional clinical experience in Primary Health Care</div>
            </div>
            <div class="signupBtn">
                @if(!Auth::user())
                    <a href="{{{ url('login')}}}" style="background: #a1b1d8 !important; font-size: 14px;" class="loginbtnHome">Log In</a>
                @endif
                    <a href="{{{ Auth::user() ? url($user_role.'/dashboard') : url('register')}}}">{{Auth::user() ? "Dashboard" : "Sing Up"}}</a>
            </div>

        </div>


        <div class="newSignUp" id="searchHomePage" style="display: none">
            <form action="{{url('register')}}" method="GET">
                <input type="hidden" v-model="search_type" name="role">
            <div class="searchtop" >
                <div style="width: 33%" v-bind:class="{'searchtype':true, 'searchactive':(search_type === 'employer')}"
                     @click="changeSearchType('employer')">Organisation
                </div>

                <div   style="width: 33%" v-bind:class="{'searchtype':true, 'searchactive':(search_type === 'freelancer')}"
                     @click="changeSearchType('freelancer')">Professional
                </div>

                <div   style="width: 33%" v-bind:class="{'searchtype':true, 'searchactive':(search_type === 'support')}"
                     @click="changeSearchType('support')">Support Workers
                </div>
            </div>

            <div class="form-group" style="width: 15%;">
                <span class="wt-select">
                {!! Form::select('title', array("Mr"=>"Mr", "Ms"=>"Ms", "Mrs"=>"Mrs", "Dr"=>"Dr"), null, array('style'=>'background:white','placeholder' => trans('lang.title'), )) !!}
                    </span>

            </div>
            <div class="form-group form-group-half" style="width: 35%;padding-right: 3px;">
                <input type="text" name="first_name" class="form-control    "
                       placeholder="Firstname"
                >

            </div>
            <div class="form-group form-group-half" style="width: 50%">
                <input type="text" name="last_name" class="form-control"
                       placeholder="Surname"
                >

            </div>

            <div class="form-group form-group-half">
                <input id="number" type="text"
                       class="form-control"
                       name="number"
                       min="0"
                       placeholder="Telephone"
                >
            </div>
            <div class="form-group form-group-half">
                <input id="user_email" type="email" class="form-control" name="email"
                       placeholder="Email Address"
                >

            </div>
            <div class="form-group form-group-half">
                <input id="password" type="password" class="form-control"
                       name="password" placeholder="{{{ trans('lang.ph_pass') }}}">


            </div>
            <div class="form-group form-group-half">
                <input id="password-confirm" type="password"
                       class="form-control"
                       name="password_confirmation"
                       placeholder="{{{ trans('lang.ph_retry_pass') }}}">
            </div>
            <div class="form-group">
                <button type="submit"
                        class="continueSignUpBtn">CONTINUE SIGN-UP</button>
            </div>
            </form>
        </div>
    </div>

</header>
