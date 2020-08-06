@extends('front-end.master', ['body_class' => 'wt-innerbgcolor'] )
@push('stylesheets')
<link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
@endpush
@section('title'){{ $user_name }} | {{ $tagline }} @stop
@section('description', "$desc")
@section('content')
    <div class="content-public-profile" id="user_profile">
        <div class="content-public-profile__wrapper">
            <section class="block-circles">
                <div class="block-circles__container">
                    <div class="block-circles__wrapper">
                        <div class="block-circles__item block-circles__item-cyan"></div>
                        <div class="block-circles__item block-circles__item-blue"></div>
                        <div class="block-circles__item block-circles__item-yellow"></div>
                    </div>
                </div>
            </section><!-- .circles -->

            <section class="content-public-profile__main-content">
                <div class="content-public-profile__main-content-wrapper">
                    <!-- Left content -->
                    <div class="content-public-profile__main-content-left">
                        <img class="content-public-profile__main-content-avatar" src="{{ !empty($avatar) ? asset($avatar) : '/images/user.jpg' }}" alt="{{ trans('lang.user_avatar') }}">
                        @if ($user->user_verified === 1)
                            <div>
                                <i class="fa fa-check-circle"></i> {{ trans('lang.verified_company') }}
                            </div>
                        @endif
                        <h2 class="content-public-profile__main-content-name mbottom35">@if (!empty($user_name)) {{ $user_name }} @else Undefined @endif</h2>
                        <div class="mbottom35">
                            <h4 class="content-public-profile__main-content-slag">{{ '@' }}{{ $user->slug }}</h4>
                        </div>

                        @if ($user->itsoftware != "" ||
                                $user->emp_contact != '' ||
                                $user->emp_telno != '' ||
                                $user->emp_website != '' ||
                                $user->emp_cqc_rating != ''
                                )
                            <div class="content-public-profile__main-content-separator"></div>
                            <div class="content-public-profile__main-content-text-block mtop35 mbottom35">
                                <span class="content-public-profile__main-content-title">{{ trans('lang.company_details') }}</span>
                            </div>
                            @if($user->itsoftware != "")
                                <div class="content-public-profile__main-content-text-block">
                                    <span class="content-public-profile__main-content-title">Computer Systems:</span>
                                    {{ implode(', ', $user->getItsoftware())  }}
                                </div>
                            @endif
                            @if($user->emp_contact != '')
                                <div class="content-public-profile__main-content-text-block">
                                    <span class="content-public-profile__main-content-title">{{ trans('lang.emp_contact') }}:</span>
                                    {{ $user->emp_contact }}
                                </div>
                            @endif
                            @if($user->emp_telno != '')
                                <div class="content-public-profile__main-content-text-block">
                                    <span class="content-public-profile__main-content-title">{{ trans('lang.emp_telno') }}:</span>
                                    {{ $user->emp_telno }}
                                </div>
                            @endif
                            @if($user->emp_website != '')
                                <div class="content-public-profile__main-content-text-block">
                                    <span class="content-public-profile__main-content-title">{{ trans('lang.emp_website') }}:</span>
                                    {{ $user->emp_website }}
                                </div>
                            @endif
                            @if($user->emp_cqc_rating != '')
                                <div class="content-public-profile__main-content-text-block">
                                    <span class="content-public-profile__main-content-title">{{ trans('lang.emp_cqc_rating') }}:</span>
                                    {{ $user->emp_cqc_rating }}
                                </div>
                            @endif
                            @if($user->emp_cqc_rating_date != '')
                                <div class="content-public-profile__main-content-text-block">
                                    <span class="content-public-profile__main-content-title">{{ trans('lang.emp_cqc_rating_date') }}:</span>
                                    {{ $user->emp_cqc_rating_date }}
                                </div>
                            @endif
                            <div class="mbottom35"></div>
                        @endif

                        <div class="content-public-profile__main-content-separator"></div>
                        <div class="content-public-profile__main-content-text-block mtop35 mbottom35">
                            <span class="content-public-profile__main-content-title">{{ trans('lang.my_skills') }}:</span>
                            @if (!empty($skills) && $skills->count() > 0)
                                <p>
                                    @foreach ($skills as $skill)
                                        <span>{{ $skill->title }},</span>
                                    @endforeach
                                </p>
                            @else
                                <p>{{ trans('lang.no_skills') }}</p>
                            @endif
                        </div>

                        <div class="content-public-profile__main-content-separator"></div>
                        <div class="wt-widget wt-reportjob mtop35 content-public-profile__reportjob">
                            <div class="wt-widgettitle">
                                <h2>{{ trans('lang.report_employer') }}</h2>
                            </div>
                            <div class="wt-widgetcontent">
                                {!! Form::open(['url' => '', 'class' =>'wt-formtheme wt-formreport', 'id' => 'submit-report',  '@submit.prevent'=>'submitReport("'.$profile->user_id.'","employer-report")']) !!}
                                <fieldset>
                                    <div class="form-group">
                                                <span class="wt-select">
                                                    {!! Form::select('reason', \Illuminate\Support\Arr::pluck($reasons, 'title'), null ,array('class' => '', 'placeholder' => trans('lang.select_reason'), 'v-model' => 'report.reason')) !!}
                                                </span>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::textarea( 'description', null, ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc'), 'v-model' => 'report.description'] ) !!}
                                    </div>
                                    <div class="form-group wt-btnarea">
                                        {!! Form::submit(trans('lang.btn_submit'), ['class' => 'wt-btn']) !!}
                                    </div>
                                </fieldset>
                                {!! form::close(); !!}
                            </div>
                        </div>

                    </div>

                    <!-- Right content -->
                    <div class="content-public-profile__main-content-right">


                        <div class="content-public-profile__main-content-text-block mtop35 mbottom35">
                            <span class="content-public-profile__main-content-title">{{ trans('lang.about') }} “{{ $user_name }}”</span>
                            @if (!empty($profile->description))
                                <div class="content-full-less">
                                    <div id="profile-description" class="content-full-less-paragraph">
                                        <p class="content-public-profile__main-content-description">
                                            {{ htmlspecialchars_decode(stripslashes($profile->description)) }}
                                        </p>
                                    </div>
                                    <div class="content-full-less_link-wrapper">
                                        <span class="content-full-less_link" data-more="Read More" data-less="Less" data-content="profile-description">Read More</span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="content-public-profile__main-content-separator content-public-profile__main-content-separator-blue"></div>
                        <div class="content-public-profile__main-content-text-block mtop35 mbottom35">
                            <span class="content-public-profile__main-content-title">Jobs:</span>
                        </div>
                        <div class="content-public-profile__main-content-text-block content-public-profile__main-content-text-block-job mbottom35">
                            @if (!empty($jobs) && $jobs->count() > 0)
                                @foreach ($jobs as $job)
                                    @php
                                        $job = \App\Job::find($job->id);
                                        $description = strip_tags(stripslashes($job->description));
                                        $featured_class = $job->is_featured == 'true' ? 'wt-featured' : '';
                                        $project_type  = Helper::getProjectTypeList($job->project_type);
                                        $job->skills = '';//($job->skills != "")?unserialize($job->skills):"";

                                    @endphp
                                        <div class="wt-userlistinghold wt-userlistingholdvtwo {{$featured_class}}" >
                                            @if ($job->is_featured == 'true')
                                                <span class="wt-featuredtag"><img src="{{{ asset('images/featured.png') }}}" alt="{{{ trans('lang.is_featured') }}}" data-tipso="Plus Member" class="template-content tipso_style"></span>
                                            @endif
                                            <div class="wt-userlistingcontent">
                                                <div class="wt-contenthead">
                                                    <div class="wt-title">
                                                        <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                                                            @if ($job->employer->user_verified === 1)
                                                                <i class="fa fa-check-circle"></i>
                                                            @endif
                                                            {{{$job->employer->first_name.' '.$job->employer->last_name}}}
                                                        </a>
                                                        <h2>{{{$job->title}}}</h2>
                                                    </div>
                                                    <div class="wt-description">
                                                        <p>@php echo htmlspecialchars_decode(stripslashes(str_limit($description, 200))); @endphp</p>
                                                    </div>
                                                    <div class="wt-tag wt-widgettag">
                                                        @if($job->skills != '')
                                                            @foreach ($job->skills as $skill )
                                                                <a href="{{{url('search-results?type=job&skills%5B%5D='.$skills[$skill['id']]->slug)}}}">{{$skills[$skill['id']]->title}}</a>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="wt-viewjobholder">
                                                    <ul>
                                                        <li><span><i class="wt-viewjobdollar">{{ !empty($symbol) ? $symbol['symbol'] : '£' }}</i>{{{$job->price}}}</span></li>
                                                        @if (!empty($job->location->title))
                                                            <li><span><img src="{{{asset(App\Helper::getLocationFlag($job->location->flag))}}}" alt="{{{ trans('lang.location') }}}"> {{{ $job->location->title }}}</span></li>
                                                        @endif
                                                        <li><span><i class="far fa-folder wt-viewjobfolder"></i>{{{ trans('lang.type') }}} {{{$project_type}}}</span></li>
                                                        <li><span><i class="fa fa-tag wt-viewjobtag"></i>{{{ trans('lang.job_id') }}} {{{$job->code}}}</span></li>

                                                        @if (!empty($save_jobs) && in_array($job->id, $save_jobs))
                                                            <li style="pointer-events: none;"><a href="javascript:void(0);" class="wt-clicklike wt-clicksave">
                                                                    <i class="fa fa-heart"></i> {{trans("lang.saved")}}</a>
                                                            </li>
                                                        @endif
                                                        <li class="wt-btnarea"><a href="{{url('job/'.$job->slug)}}" class="wt-btn">{{{ trans('lang.view_job') }}}</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                                @if ( method_exists($jobs,'links') )
                                    <div class="content-public-profile__main-content-text-block-job-pagination">
                                        {{ $jobs->links('pagination.custom') }}
                                    </div>
                                @endif
                            @else
                                @if (file_exists(resource_path('views/extend/errors/no-record.blade.php')))
                                    @include('extend.errors.no-record')
                                @else
                                    @include('errors.no-record')
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- .content-public-profile__main-content -->

            <section class="block-circles">
                <div class="block-circles__container block-circles__container-last">
                    <div class="block-circles__wrapper">
                        <div class="block-circles__item block-circles__item-blue"></div>
                        <div class="block-circles__item block-circles__item-blue"></div>
                        <div class="block-circles__item block-circles__item-blue"></div>
                    </div>
                </div>
            </section><!-- .circles -->
        </div>
    </div>
@endsection
