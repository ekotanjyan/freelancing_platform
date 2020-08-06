@php
        $user = Auth::user();

        $arrAppo_slot_times = array(
            '10 minutes'=>'10 minutes',
            '15 minutes'=>'15 minutes',
            '20 minutes'=>'20 minutes',
            'Other'=>'Other'
        );
        if(!empty($user->appo_slot_times) && !isset($arrAppo_slot_times[$user->appo_slot_times]))
        {
            $arrAppo_slot_times[$user->appo_slot_times] = $user->appo_slot_times;
        }
        $recurringDates = [
            'day'=>'day',
            'week'=>'week',
            'month'=>'month'
        ];

        $homeVisits = [
            'Yes'=>'Yes',
            'No'=>'No',
            'N/A'=>'N/A'
        ];

        $arrBreaks = array(
            'Morning Break'=>'Morning Break',
            'Lunch Break'=>'Lunch Break',
            'Afternoon Break'=>'Afternoon Break',
            'Evening Break'=>'Evening Break',
            'Not Applicable' => 'Not Applicable',
        );
@endphp
@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="row" style="margin:0 auto;width: 850px;padding-top: 80px;">

        <div class="headingcenter text-center">
            <h2>Dashboard</h2>
            <div style="color:gray">Great! You're ready to go.</div>
        </div>

    </div>
    <section class="wt-haslayout wt-dbsectionspace wt-insightuser" id="dashboard">
        <div class="row">
                    <div class="wt-tabscontenttitle">
                        <h2>Your Updates</h2>
                    </div>
                    <div class="row newStyleBoxes" style="margin: 0 auto; display: block">


                        <div class="newBoxStyle">
                            <div class="firsthalf"><a href="{{{ route('employerManageJobs') }}}">Latest Proposals</a></div>
                            <div class="secondhalf">{{$latest_proposal}}</div>
                            {{--   {{ trans('lang.click_view') }}</a>--}}
                        </div>
                        <div class="newBoxStyle">
                            <div class="firsthalf"><a href="{{ url('message-center') }}">Messages</a></div>
                            <div class="secondhalf">{{$message_status}}</div>
{{--                            {{ trans('lang.click_view') }}--}}

                        </div>
                        @if ($access_type == 'jobs' || $access_type== 'both')

                            <div class="newBoxStyle">
                                <div class="firsthalf"><a href="{{{ route('employerManageJobs') }}}">Jobs</a></div>
                                <div class="secondhalf">{{$user->jobs()->count()}}</div>
                                {{--   <a href="{{{ url('employer/dashboard/manage-jobs') }}}">{{ trans('lang.click_view') }}</a>--}}
                            </div>
                        @endif
                    </div>

                        @if ($access_type == 'jobs' || $access_type== 'both')


                        @endif
                        @if ($access_type == 'services' || $access_type== 'both')

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="wt-insightsitem wt-dashboardbox">
                                    <figure class="wt-userlistingimg">
                                        {{ Helper::getImages('uploads/settings/icon',$ongoing_services_icon, 'gift') }}
                                    </figure>
                                    <div class="wt-insightdetails">
                                        <div class="wt-title">
                                            <h3>{{{ Auth::user()->purchasedServices->count() }}}</h3>
                                            <span>{{ trans('lang.total_ongoing_services') }}</span>
                                            <a href="{{{ url('employer/services/hired') }}}">{{ trans('lang.click_view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="wt-insightsitem wt-dashboardbox">
                                    <figure class="wt-userlistingimg">
                                        {{ Helper::getImages('uploads/settings/icon',$completed_services_icon, 'gift') }}
                                    </figure>
                                    <div class="wt-insightdetails">
                                        <div class="wt-title">
                                            <h3>{{{ Auth::user()->completedServices->count() }}}</h3>
                                            <span>{{ trans('lang.total_completed_services') }}</span>
                                            <a href="{{{ url('employer/services/completed') }}}">{{ trans('lang.click_view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                                <div class="wt-insightsitem wt-dashboardbox">
                                    <figure class="wt-userlistingimg">
                                        {{ Helper::getImages('uploads/settings/icon',$cancelled_services_icon, 'gift') }}
                                    </figure>
                                    <div class="wt-insightdetails">
                                        <div class="wt-title">
                                            <h3>{{{ Auth::user()->cancelledServices->count() }}}</h3>
                                            <span>{{ trans('lang.total_cancelled_services') }}</span>
                                            <a href="{{{ url('employer/services/cancelled') }}}">{{ trans('lang.click_view') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    {{--<div class="row page-group" style="margin-top: 30px">--}}
                        {{--<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ">--}}
                            {{--<div class="page-group-selectors bg-dark-blue">Contacts</div>--}}
                            {{--<div class="triangle"></div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">--}}
                            {{--<div class="page-group-selectors bg-light-blue">Details</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ">--}}
                            {{--<div class="page-group-selectors bg-specific-green">Requirements</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                {{--</div>--}}
        </div>
        @if ($access_type == 'jobs' || $access_type== 'both')
            <div class="row">
                {{--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
                    {{--<div class="wt-dashboardbox wt-ongoingproject la-ongoing-projects wt-earningsholder">--}}
                        {{--<div class="wt-dashboardboxtitle wt-titlewithsearch">--}}
                            {{--<h2>{{ trans('lang.ongoing_project') }}</h2>--}}
                        {{--</div>--}}
                        {{--@if (!empty($ongoing_jobs) && $ongoing_jobs->count() > 0)--}}
                            {{--<div class="wt-dashboardboxcontent wt-hiredfreelance">--}}
                                {{--<table class="wt-tablecategories wt-freelancer-table">--}}
                                    {{--<thead>--}}
                                        {{--<tr>--}}
                                            {{--<th>{{trans('lang.project_title')}}</th>--}}
                                            {{--<th>{{trans('lang.hired_freelancers')}}</th>--}}
                                            {{--<th>{{trans('lang.project_cost')}}</th>--}}
                                            {{--<th>{{trans('lang.actions')}}</th>--}}
                                        {{--</tr>--}}
                                    {{--</thead>--}}
                                    {{--<tbody>--}}
                                        {{--@foreach ($ongoing_jobs as $project)--}}
                                            {{--@php--}}
                                                {{--$proposal_freelancer = $project->proposals->where('status', 'hired')->pluck('freelancer_id')->first();--}}
                                                {{--$freelancer = \App\User::find($proposal_freelancer);--}}
                                                {{--$user_name = Helper::getUsername($proposal_freelancer);--}}
                                            {{--@endphp--}}
                                            {{--<tr>--}}
                                                {{--<td data-th="Project title"><span class="bt-content"><a target="_blank" href="{{{ url('job/'.$project->slug) }}}">{{{ $project->title }}}</a></span></td>--}}
                                                {{--<td data-th="Hired freelancer">--}}
                                                    {{--<span class="bt-content">--}}
                                                        {{--<a href="{{{url('profile/'.$freelancer->slug)}}}">--}}
                                                            {{--@if ($freelancer->user_verified)--}}
                                                                {{--<i class="fa fa-check-circle"></i>&nbsp;--}}
                                                            {{--@endif--}}
                                                            {{--{{{$user_name}}}--}}
                                                        {{--</a>--}}
                                                    {{--</span>--}}
                                                {{--</td>--}}
                                                {{--<td data-th="Project cost"><span class="bt-content">{{ !empty($symbol['symbol']) ? $symbol['symbol'] : '£' }}{{$project->price}}</span></td>--}}
                                                {{--<td data-th="Actions">--}}
                                                    {{--<span class="bt-content">--}}
                                                        {{--<div class="wt-btnarea">--}}
                                                            {{--<a href="{{{ url('employer/dashboard/job/'.$project->slug.'/proposals') }}}" class="wt-btn">{{ trans('lang.view_detail') }}</a>--}}
                                                        {{--</div>--}}
                                                    {{--</span>--}}
                                                {{--</td>--}}
                                            {{--</tr>--}}
                                        {{--@endforeach--}}
                                    {{--</tbody>--}}
                                {{--</table>--}}
                            {{--</div>--}}
                        {{--@else--}}
                            {{--@if (file_exists(resource_path('views/extend/errors/no-record.blade.php'))) --}}
                                {{--@include('extend.errors.no-record')--}}
                            {{--@else --}}
                                {{--@include('errors.no-record')--}}
                            {{--@endif--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="wt-tabscontenttitle" style="margin-top: 50px; ">
                    <h2>Your Calendar</h2>
                </div>

                <div id="post_job_dashboard"  class="scrolToCalend" style="margin:0 auto;">
                    <div class="wt-tabscontent tab-content">
                    <vue-cal ref="vuecal" style="height: 650px"
                             :time-from="0 * 60"
                             :time-to="24 * 60"
                             :disable-views="['years', 'year']"
                             default-view="month"
                             events-on-month-view="short"
                             :events="events"
                             :on-event-click="onEventClick"
                             @cell-click="changeSelectedDate"
                    >
                    </vue-cal>
                    {!! Form::open(['url' => url('job/post-job'), 'class' =>'post-job-form wt-haslayout', 'id' => 'post_job_dashboard_form',  '@submit.prevent'=>'submitJob']) !!}
                    <div class="wt-dashboardbox" v-if="clickedDate!=''">
                        <div class="wt-dashboardboxtitle text-center">
                            <div class="float-left" style="
                            border-right:4px solid #ffe188;
                            padding-right: 16px;
                            height: 36px;
                            padding-top: 5px;"><img src="{{url('images/icons/jobpost.png')}}" alt=""></div>
                            <h2   v-if="event_id != ''" style=" font-weight: bold; text-transform: uppercase; font-family: AganeLight; color:#263b65; margin: 7px 0;">Update post event</h2>
                            <h2   v-if="event_id == ''" style=" font-weight: bold; text-transform: uppercase; font-family: AganeLight; color:#263b65; margin: 7px 0;">{{ trans('lang.post_job') }}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent  classScrollTo">
                            <div class="form-group form-group-half">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.start_date') }}</h2>
                                </div>
                            </div>
                            <div class="form-group form-group-half">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.end_date') }}</h2>
                                </div>
                            </div>
                            <div class="form-group"  id="listDates">
                                <div class="isDay">
                                    <div class="form-group form-group-half">
                                        <div class="wt-divtheme wt-userform wt-userformvtwo">
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    <date-picker :config="{format: 'DD-MM-YYYY'}" class="form-control" name="start_date[0]" placeholder="{{ trans('lang.start_date') }}" value="" v-model="selecteddate"></date-picker>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-half" v-if="selecteddate!=''">
                                        <div class="wt-divtheme wt-userform wt-userformvtwo">
                                            <div class="form-group">
                                                <span class="wt-select">
                                                    <date-picker :config="{format: 'DD-MM-YYYY'}"  class="form-control" name="end_date[0]" placeholder="{{ trans('lang.end_date') }}" value="" v-model="selecteddate_end"></date-picker>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="getIsDay" v-if="event_id == ''"  v-for="d in 6" style="display:none">
                                    <div class="form-group form-group-half">
                                        <div class="wt-divtheme wt-userform wt-userformvtwo">
                                            <div class="form-group">
                                        <span class="wt-select">
                                            <date-picker :config="{format: 'DD-MM-YYYY'}" class="form-control" placeholder="{{ trans('lang.start_date') }}" value=""></date-picker>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group form-group-half">
                                        <div class="wt-divtheme wt-userform wt-userformvtwo">
                                            <div class="form-group">
                                        <span class="wt-select">
                                            <date-picker :config="{format: 'DD-MM-YYYY'}" class="form-control" placeholder="{{ trans('lang.end_date') }}" value=""></date-picker>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="wt-btn" v-if="event_id == ''" v-on:click="createList" v-if="addDay!=6" id="addDay">add day</button>
                            </div>


                            <div class="form-group form-group-half">
                                <div class="wt-tabscontenttitle">
                                    <h2>Start Time</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <vue-timepicker name="booking_start" required  format="HH:mm" v-model="start"></vue-timepicker>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-half">
                                <div class="wt-tabscontenttitle">
                                    <h2>End Time</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <vue-timepicker name="booking_end"  required   format="HH:mm"  v-model="end"></vue-timepicker>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" v-if="event_id == ''">
                                <div class="wt-tabscontenttitle" style="height: 40px;">
                                    <div class="float-left">
                                        <h2>Recurring date</h2>
                                    </div>
                                    <div class="form-group form-group-half  float-right">
                                        <switch_button v-model="is_recurring">Recurring Dates</switch_button>
                                        <input type="hidden" :value="false" name="recurring_date">
                                    </div>
                                </div>
                                <div class="form-group form-group-half float-left" v-if="is_recurring != false && selecteddate >= selecteddate_end">
                                    {!! Form::select('recurring_date', ['day'=>'day','week'=>'week','month'=>'month'], null, ['class' => 'form-control', 'placeholder' => "Recurring dates", 'v-model'=>'recurring_date']) !!}
                                </div>
                                <div class="form-group form-group-half float-left" v-if="is_recurring != false && selecteddate < selecteddate_end">
                                    {!! Form::select('recurring_date', ['week'=>'week','month'=>'month'], null, ['class' => 'form-control', 'placeholder' => "Recurring dates", 'v-model'=>'recurring_date']) !!}
                                </div>
                                <div class="form-group form-group-half float-right" v-if="recurring_date != '' && is_recurring != false">
                                    <span class="wt-select">
                                    <date-picker :config="{format: 'DD-MM-YYYY'}" class="form-control" name="recurring_end_date" placeholder="Last date recurring" requare value="" v-model="recurring_end_date"></date-picker>
                                    </span>
                                </div>
                            </div>


                            <div class="wt-jobdescription wt-tabsinfo" v-if="event_id == ''">
                                <div class="wt-tabscontenttitle">
                                    <h2>Other Appointment</h2>
                                </div>
                                <div class="form-group form-group-half">
                                    {!! Form::select('appo_slot_times[]', $arrAppo_slot_times, $user->appo_slot_times, array( 'placeholder' => "Appointment Slot Times",'v-model'=>'appo_slot_times')) !!}
                                </div>
                                <div class="form-group form-group-half" v-if="this.appo_slot_times=='Other'">
                                    <input id="other_appo" type="text"
                                           class="form-control"
                                           name="appo_slot_times[]">
                                </div>
                            </div>

                            <div class="wt-jobdescription wt-tabsinfo"   v-if="event_id == ''">
                                <div class="form-group form-group-half">
                                    {!! Form::select('adm_catch_time', array('Yes'=>'Yes', 'No'=>'No'), null, array('placeholder' => "Admin Catch Up Time Provided")) !!}
                                </div>
                                <div class="form-group form-group-half">
                                    {!! Form::select('breaks', $arrBreaks, $user->breaks, array('placeholder' => "Breaks")) !!}
                                </div>

                                <div class="form-group form-group-half">
                                    {!! Form::select('home_visits', $homeVisits, null, array('placeholder' => "Home visits",'v-model'=>'home_visits')) !!}
                                </div>
                            </div>

                            <div class="wt-jobskills wt-tabsinfo la-jobedit" v-if="event_id == ''">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.skills_req') }}</h2>
                                </div>
                                <div class="la-jobedit-content">
                                    <job_skills :placeholder="'select professions'"></job_skills>
                                </div>
                            </div>

                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.job_title') }}</h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="{{ trans('lang.job_title') }}" v-model="booking_title">
                                        </div>

                                        <div class="form-group">
                                            {!! Form::textarea('description', null, ['class' =>'form-control', 'placeholder' => trans('lang.job_dtl_note') , 'v-model'=>'booking_content']) !!}
                                        </div>

                                        <div class="form-group form-group-half"  v-if="event_id == ''">
                                            {!! Form::text('project_rates', null, array('class' => 'form-control halfWidth ratePicker', 'placeholder' => 'Your rate - per hour', 'min'=>'0')) !!}
                                        </div>

                                        {{--<div class="form-group form-group-half wt-formwithlabel job-rates-input">--}}
                                            {{--<span class="wt-select">--}}
                                            {{--{!! Form::select('project_rates_type', array('Per hour'=>'Per hour', 'Per day'=>'Per day', 'Per Month'=> 'Per Month'), array('class' => 'form-control', 'placeholder' => trans('lang.project_rates_type'))) !!}--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    </fieldset>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo calendarbookingform" style=" display: none;" @click.prevent="preventClick">
                                    <div class="form-group " style="margin-top: 25px;">
                                        <label>Booking Title / Job Title</label>
                                        <input type="text" name="booking_title" disabled class="form-control " placeholder="Booking Title" v-model="booking_title">
                                    </div>
                                    <div class="form-group" style="margin-top: 25px;">
                                        <label>Booking description</label>
                                        {!! Form::textarea('booking_content', null, ['placeholder' => 'Booking description' , 'v-model'=>'booking_content']) !!}
                                    </div>
                                    {{--<button @click="setBooking" class="wt-btn" style="margin-top: 25px;">See booking in calendar</button>--}}

                                </div>
                            </div>

                            <div class="wt-jobcategories wt-tabsinfo"  v-if="event_id == ''">
                                <div class="wt-tabscontenttitle">
                                    <h2>Direct Bookings</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        {!! Form::select('direct_booking', array('Yes'=>'yes', 'No'=>'no'), $user->direct_booking, array('placeholder' => "Direct Bookings")) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="wt-tabscontenttitle">
                                <h2>Booking Contact Details</h2>
                            </div>
                            <div class="wt-jobcategories wt-tabsinfo">

                                <div class="form-group form-group-half">
                                    {!! Form::text( 'first_name', $user->first_name, ['class' =>'form-control', 'placeholder' => trans('lang.ph_first_name')] ) !!}
                                </div>
                                <div class="form-group form-group-half">
                                    {!! Form::text( 'last_name', $user->last_name, ['class' =>'form-control', 'placeholder' => trans('lang.ph_last_name')] ) !!}
                                </div>
                                <div class="form-group form-group-half">
                                    {!! Form::email( 'email', $user->email, ['class' =>'form-control', 'placeholder' => trans('lang.ph_email')] ) !!}
                                </div>
                                <div class="form-group form-group-half">
                                    {!! Form::number( 'number', $user->number, ['class' =>'form-control', 'placeholder' => trans('lang.number')] ) !!}
                                </div>


                                {{--<div class="form-group form-group-half">--}}
                                    {{--{!! Form::text('emp_contact', $user->emp_contact, ['class' =>'form-control', 'placeholder' => trans('lang.emp_contact')] ) !!}--}}
                                {{--</div>--}}
                                {{--<div class="form-group form-group-half">--}}
                                    {{--{!! Form::tel('emp_telno', $user->emp_telno, ['class' =>'form-control', 'placeholder' => trans('lang.emp_telno')] ) !!}--}}
                                {{--</div>--}}
                                {{--<div class="form-group form-group-half">--}}
                                    {{--{!! Form::url('emp_pos', $user->emp_pos, ['class' =>'form-control', 'placeholder' => 'Position'] ) !!}--}}
                                {{--</div>--}}
                                {{--<div class="form-group form-group-half">--}}
                                    {{--{!! Form::email('emp_email', $user->emp_email, ['class' =>'form-control', 'placeholder' => 'Email'] ) !!}--}}
                                {{--</div>--}}

                                {{--<div class="form-group ">--}}
                                    {{--<input type="text" class="form-control" name="org_name" value="{{$user->emp_contact}}" placeholder="Organisation name">--}}
                                {{--</div>--}}
                                {{--<div class="form-group form-group-half">--}}
                                    {{--<input id="organisation_position" type="text" class="form-control" name="organisation_position" value="{{$user->emp_pos}}" placeholder="Position">--}}
                                {{--</div>--}}
                                {{--<div class="form-group form-group-half">--}}
                                    {{--<input id="organisation_email" type="email" class="form-control" name="organisation_email" value="{{$user->emp_email}}" placeholder="Email">--}}
                                {{--</div>--}}
                                {{--<div class="form-group form-group-half">--}}
                                    {{--<input id="organisation_contact" type="text" class="form-control" name="organisation_contact" value="{{$user->emp_telno}}" placeholder="Direct Contact No">--}}
                                {{--</div>--}}

                            </div>

                            {{--<div class="wt-jobcategories wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.job_cats') }}</h2>--}}
                            {{--</div>--}}
                            {{--<div class="wt-divtheme wt-userform wt-userformvtwo">--}}
                            {{--<div class="form-group">--}}
                            {{--<span class="wt-select">--}}
                            {{--{!! Form::select('categories[]', $categories, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_job_cats'))) !!}--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="wt-languages-holder wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.langs') }}</h2>--}}
                            {{--</div>--}}
                            {{--<div class="wt-divtheme wt-userform wt-userformvtwo">--}}
                            {{--<div class="form-group">--}}
                            {{--<span class="wt-select">--}}
                            {{--{!! Form::select('languages[]', $languages, null, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_lang'))) !!}--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="wt-jobdetails wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>Calendar Booking</h2>--}}
                            {{--</div>--}}
                            {{--<div class="wt-tabscontenttitle" style="margin-top: 20px; ">--}}
                            {{--<h2>--}}
                            {{--Green equals free this day<br>--}}
                            {{--Blue equals booking on this day<br>--}}
                            {{--Red equals away on holiday<br>--}}
                            {{--</h2>--}}
                            {{--</div>--}}

                            {{--</div>--}}
                            {{--<div class="wt-jobdetails wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.job_dtl') }}</h2>--}}
                            {{--</div>--}}
                            {{--<div class="wt-formtheme wt-userform wt-userformvtwo">--}}
                            {{--{!! Form::textarea('description', null, ['class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder' => trans('lang.job_dtl_note'), 'v-model'=>'description']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                            {{--<label for="hourly_rate_desc">Please enter--}}
                            {{--additional information in the--}}
                            {{--communication box if required</label>--}}
                            {{--<input id="hourly_rate_desc" type="text"--}}
                            {{--class="form-control"--}}
                            {{--name="hourly_rate_desc"--}}
                            {{--value="{{ $user->profile->hourly_rate_desc }}"--}}
                            {{--placeholder="Additional info">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="wt-jobskills wt-jobskills-holder wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.skills_req') }}</h2>--}}
                            {{--</div>--}}
                            {{--<job_skills :placeholder="'skills already selected'"></job_skills>--}}
                            {{--</div>--}}

                            {{--<div class="wt-joblocation wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.your_loc') }}</h2>--}}
                            {{--</div>--}}
                            {{--<div class="wt-formtheme wt-userform">--}}
                            {{--<div class="wt-tabsinfo">--}}
                            {{--<div class="form-group">--}}
                            {{--<input type="text" name="radius" class="form-control" placeholder="Radius" />--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group form-group-half">--}}
                            {{--<span class="wt-select">--}}
                            {{--{!! Form::select('locations', $locations, null, array('class' => 'skill-dynamic-field', 'placeholder' => trans('lang.select_locations'))) !!}--}}
                            {{--</span>--}}
                            {{--</div>--}}
                            {{--<location-selector></location-selector>--}}


                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="wt-featuredholder wt-tabsinfo">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.is_featured') }}</h2>--}}
                            {{--<div class="wt-rightarea">--}}
                            {{--<div class="wt-on-off float-right">--}}
                            {{--<switch_button v-model="is_featured">{{{ trans('lang.is_featured') }}}</switch_button>--}}
                            {{--<input type="hidden" :value="is_featured" name="is_featured">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="wt-attachmentsholder">--}}
                            {{--<div class="lara-attachment-files">--}}
                            {{--<div class="wt-tabscontenttitle">--}}
                            {{--<h2>{{ trans('lang.attachments') }}</h2>--}}
                            {{--<div class="wt-rightarea">--}}
                            {{--<div class="wt-on-off float-right">--}}
                            {{--<switch_button v-model="show_attachments">{{{ trans('lang.attachments_note') }}}</switch_button>--}}
                            {{--<input type="hidden" :value="show_attachments" name="show_attachments">--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<job_attachments :temp_url="'{{url('job/upload-temp-image')}}'"></job_attachments>--}}
                            {{--<div class="form-group input-preview">--}}
                            {{--<ul class="wt-attachfile dropzone-previews">--}}

                            {{--</ul>--}}
                            {{--</div>--}}
                            {{--</div>--}}

                            {{--</div>--}}



                            {{--</div>--}}




                        </div>
                        <div class="wt-updatall"   v-if="event_id != ''">
                            <input type="hidden" name="recurring_date" v-if="event_id" v-model="recurring_date">
                            <input type="hidden" name="job_id" v-if="job_id" v-model="job_id">
                            <input type="hidden" name="event_id" v-if="event_id" v-model="event_id">

                            <i class="ti-announcement"></i>
                            <span>{{{ trans('lang.save_changes_note') }}}</span>
                            {!! Form::submit(trans('lang.btn_save_update'), ['class' => 'wt-btn', '@click'=>'updateEvent', 'id'=>'submit-profile']) !!}

                        </div>
                        <div class="wt-updatall"   v-if="event_id == ''">
                            <i class="ti-announcement"></i>
                            <span>{{{ trans('lang.save_changes_note') }}}</span>
                            {!! Form::submit(trans('lang.post_job'), ['class' => 'wt-btn', 'id'=>'submit-profile']) !!}

                        </div>
                        {!! form::close(); !!}

                    </div>
                    </div>
                </div>
        @endif
    </section>
@endsection
