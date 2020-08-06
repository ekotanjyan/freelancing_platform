@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.masternew')
@push('stylesheets')
    <link href="{{ asset('css/prettyPhoto-min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/newstyles.css') }}" rel="stylesheet">
@endpush
@php 
    $app_description =  env('APP_DESCRIPTION'); 
    $currency   = App\SiteManagement::getMetaValue('commision');
    $symbol = !empty($currency) && !empty($currency[0]['currency']) ? Helper::currencyList($currency[0]['currency']) : array();
@endphp
@section('title'){{ config('app.name') }} @stop
@section('description', "$app_description")
@section('content')
    @php
        $categories = App\Category::latest()->get()->take(8);
        $skills = App\Skill::latest()->get()->take(8);
        $locations = App\Location::latest()->get()->take(8);
        $languages = App\Language::latest()->get()->take(8);
        $type = Helper::getAccessType() == 'services' ? 'service' : 'job';
        if (Schema::hasTable('services') && Schema::hasTable('service_user')) {
            $services = App\Service::latest()->paginate(6);
        }
    @endphp
    <div id="homenew" class="la-home-page">
        {{--<div class="searchboxnew col-md-6" >--}}
            {{--<form method="get" action="{{url('search-results')}}">--}}
            {{--<select name="type" class="categorysearch">--}}
                {{--<option value="job">Jobs</option>--}}
                {{--<option value="freelancer">Staff</option>--}}
                {{--<option value="employer">Employers</option>--}}
            {{--</select>--}}
                {{--<div style="width: 87%;">--}}
                    {{--<input name="s" type="text">--}}
                    {{--<button type="submit" style="background: none; font-size:20px" class="searchicon"><i class="fa fa-search"></i></button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</div>--}}
        {{--<div class="simpletext col-md-5">--}}
            {{--<div><a href="#">It's as simple as 1,2,3</a></div>--}}
            {{--<div style="margin-top:6px"><span>SEARCH &nbsp;&nbsp;&nbsp;&nbsp; CONNECT &nbsp;&nbsp;&nbsp;&nbsp; HIRE!</span></div>--}}
        {{--</div>--}}
        <div class="footermargins">
            <div class="boxes3 bg-orange" >
                <div class="boxheading">Locate Adhoc Staff</div>
                <img src="{{url('images/icons/Layer 89.png')}}">
                <p>
                    Search staff using loactions that suit you, actually need.
                </p>
            </div>
            <div class="boxes3 bg-blue" style="height: 270px;padding-top: 50px;">
                <div class="boxheading">Short notice bookings</div>
                <img src="{{url('images/icons/Layer 84.png')}}">
                <p>
                    Search staff using loactions that suit you, actually need.
                </p>
            </div>
            <div class="boxes3 bg-green">
                <div class="boxheading">Skilled temp staff</div>
                <img src="{{url('images/icons/Layer 79.png')}}">
                <p>
                    Search staff using loactions that suit you, actually need.
                </p>
            </div>
        </div>

    </div>
    <style>
        .wt-wrapper{padding: 0px}
        .boxes3{
            margin-bottom: 0;
        }
    </style>

@endsection
@push('scripts')
    <script src="{{ asset('js/tilt.jquery.js') }}"></script>
    <script src="{{ asset('js/prettyPhoto-min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>

@endpush
