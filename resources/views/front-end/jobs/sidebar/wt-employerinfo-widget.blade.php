<div class="wt-widget la-empinfo-holder">
    <div class="wt-companysdetails">
        <figure class="wt-companysimg">
            <img src="{{{ asset(Helper::getUserProfileBanner($job->employer->id, 'small')) }}}" alt="{{ trans('lang.profile_img') }}">
        </figure>
        <div class="wt-companysinfo">
            <figure><img src="{{{asset(Helper::getProfileImage($job->employer->id))}}}" alt="{{ trans('lang.profile_img') }}"></figure>
            <div class="wt-title">
                @if ($job->employer->user_verified === 1)
                    <a href="{{{ url('profile/'.$job->employer->slug) }}}"><i class="fa fa-check-circle"></i> {{ trans('lang.verified_company') }}</a>
                @endif
                <a href="{{{ url('profile/'.$job->employer->slug) }}}"><h2>{{{ Helper::getUserName($job->employer->id) }}}</h2></a>
                @if (!empty(data_get($job, 'employer.profile.tagline')) )
                    <h4>{{ $job->employer->profile->tagline }}</h4>
                @endif
            </div>
            <ul class="wt-postarticlemeta">
                <li>
                    <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                        <span>{{ trans('lang.open_jobs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{{ url('profile/'.$job->employer->slug) }}}">
                        <span>{{ trans('lang.full_profile') }}</span>
                    </a>
                </li>
                @if (!empty($save_employers))
                    <li class="wt-btndisbaled">
                        <a href="javascript:void(0);">
                            <span v-cloak>{{trans("lang.following")}}</span>
                        </a>
                    </li>
                @else
                    <li v-bind:class="disable_follow">
                        <a href="javascript:void(0);" id="profile-{{$job->employer->id}}" @click.prevent="add_wishlist('profile-{{$job->employer->id}}', {{$job->employer->id}}, 'saved_employers', '{{trans("lang.following")}}')" v-cloak>
                            <span v-cloak>@{{follow_text}}</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
@if ($user->emp_contact != '' ||
                                $user->emp_telno != '' ||
                                $user->emp_website != '' ||
                                $user->emp_cqc_rating != '' ||
                                $user->setting != ''
                                )
    <div class="wt-widget">
        <div class="wt-widgettitle">
            <h2>{{ trans('lang.company_details') }}</h2>
        </div>
        <div class="wt-widgetcontent wt-comfollowers wt-verticalscrollbar">
            @if($user->emp_contact != '')
                <div>
                    <strong>{{ trans('lang.emp_contact') }}</strong><br>
                    <span>{{{ $user->emp_contact }}}</span>
                </div>
            @endif
            @if($user->emp_telno != '')
                <div>
                    <strong>{{ trans('lang.emp_telno') }}</strong><br>
                    <span>{{{ $user->emp_telno }}}</span>
                </div>
            @endif
            @if($user->emp_website != '')
                <div>
                    <strong>{{ trans('lang.emp_website') }}</strong><br>
                    <span>{{{ $user->emp_website }}}</span>
                </div>
            @endif
            @if($user->emp_cqc_rating != '')
                <div>
                    <strong>{{ trans('lang.emp_cqc_rating') }}</strong><br>
                    <span>{{{ $user->emp_cqc_rating }}}</span>
                </div>
            @endif
            @if($user->emp_cqc_rating_date != '')
                <div>
                    <strong>{{ trans('lang.emp_cqc_rating_date') }}</strong><br>
                    <span>{{{ $user->emp_cqc_rating_date }}}</span>
                </div>
            @endif
            @if($user->setting != '')
                <div>
                    <strong>{{ trans('lang.emp_clinical_setting') }}</strong><br>
                    <span>{{{ $user->setting }}}</span>
                </div>
            @endif
        </div>
    </div>
@endif
