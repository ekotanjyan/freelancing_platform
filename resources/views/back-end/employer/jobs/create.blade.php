@php
    $arrAppo_slot_times = array(
        '10 minutes'=>'10 minutes',
        '15 minutes'=>'15 minutes',
        '20 minutes'=>'20 minutes',
        '30 minutes'=>'30 minutes',
        'Other'=>'Other'
    );
    if(!isset($arrAppo_slot_times[$user->appo_slot_times]))
    {
        $arrAppo_slot_times[$user->appo_slot_times] = $user->appo_slot_times;
    }
@endphp
@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
<div class="wt-haslayout wt-dbsectionspace">
    <div class="row page-group" style="margin-top: 69px;margin-bottom: 14px;">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ">
            <div class="page-group-selectors bg-dark-blue">Description</div>
            <div class="triangle"></div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="page-group-selectors bg-light-blue">Dates</div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-3 ">
            <div class="page-group-selectors bg-specific-green">Requirements</div>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 float-left" id="post_job">
            @if (Session::has('payment_message'))
                @php $response = Session::get('payment_message') @endphp
                <div class="flash_msg">
                    <flash_messages :message_class="'{{{$response['code']}}}'" :time ='5' :message="'{{{ $response['message'] }}}'" v-cloak></flash_messages>
                </div>
            @endif
            @if (session()->has('type'))
                @php session()->forget('type'); @endphp
            @endif
            <div class="preloader-section" v-if="loading" v-cloak>
                <div class="preloader-holder">
                    <div class="loader"></div>
                </div>
            </div>
            <div class="wt-haslayout wt-post-job-wrap">

                {!! Form::open(['url' => url('job/post-job'), 'class' =>'post-job-form wt-haslayout', 'id' => 'post_job_form',  '@submit.prevent'=>'submitJob']) !!}
                    <div class="wt-dashboardbox">
                        <div class="wt-dashboardboxtitle text-center">
                            <div class="float-left" style="
                            border-right:4px solid #ffe188;
                            padding-right: 16px;
                            height: 36px;
                            padding-top: 5px;"><img src="{{url('images/icons/jobpost.png')}}" alt=""></div>
                            <h2 style="
                            font-weight: bold;
                             text-transform: uppercase;
                              font-family: AganeLight;
                              color:#263b65;
                              margin: 7px 0;">{{ trans('lang.post_job') }}</h2>
                        </div>
                        <div class="wt-dashboardboxcontent">
                            <div class="form-group form-group-half">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.start_date') }}</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" name="start_date" placeholder="{{ trans('lang.start_date') }}" value="" v-model="selecteddate"></date-picker>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-half">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.end_date') }}</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        <span class="wt-select">
                                            <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" name="end_date" placeholder="{{ trans('lang.end_date') }}" value="" v-model="selecteddate_end"></date-picker>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-featuredholder wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Recurring Dates</h2>
                                    <div class="wt-rightarea">
                                        <div class="wt-on-off float-right">
                                            <switch_button v-model="recurring_date">Recurring Dates</switch_button>
                                            <input type="hidden" :value="false" name="recurring_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wt-jobdetails wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Times</h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo calendarbookingform" @click.prevent="preventClick">
                                    {{--<button class="openCal wt-btn">Open Calendar</button>--}}

                                    {{--<vue-cal ref="vuecal" style="height: 650px"--}}
                                             {{--:time-from="0 * 60"--}}
                                             {{--:time-to="24 * 60"--}}
                                             {{--:disable-views="['years', 'year']"--}}
                                             {{--:events="events"--}}
                                             {{--:selected-date="selecteddate"--}}
                                             {{--default-view="month"--}}
                                             {{--@cell-click="changeSelectedDate"--}}
                                            {{--events-on-month-view="short"--}}

                                    {{-->--}}
                                    {{--</vue-cal>--}}
                                    <div class="form-group " style="margin-top: 25px; display: none;">
                                        <label>Booking Title / Job Title</label>

                                        <input type="text" name="booking_title" disabled class="form-control " placeholder="Booking Title" v-model="title">
                                    </div>
                                    <div class="form-group form-group-half classScrollTo" style="margin-top: 25px; display: none;">
                                        <label>Booking Date </label>

                                        <input type="text" disabled class="form-control " placeholder="Booking Date" v-model="selecteddate">
                                    </div>
                                    <div class="form-group form-group-half">
                                        <label>Start Time</label>
                                        <vue-timepicker name="booking_start" required  format="HH:mm" v-model="start"></vue-timepicker>
                                    </div>
                                    <div class="form-group form-group-half">
                                        <label>End Time</label>
                                        <vue-timepicker name="booking_end"  required   format="HH:mm"  v-model="end"></vue-timepicker>
                                    </div>
                                    <div class="form-group" style="margin-top: 25px;">
                                        <label>Booking description</label>
                                        {!! Form::textarea('booking_content', null, ['placeholder' => 'Booking description']) !!}
                                    </div>
                                    {{--<button @click="setBooking" class="wt-btn" style="margin-top: 25px;">See booking in calendar</button>--}}

                                </div>
                                {{--<div class="wt-formtheme wt-userform wt-userformvtwo">--}}
                                    {{--<div class="form-group form-group-half">--}}
                                        {{--<select id="multiselect" class="form-control" name="days_avail[]" multiple="multiple">--}}
                                            {{--<option>Monday</option>--}}
                                            {{--<option>Tuesday</option>--}}
                                            {{--<option>Wednesday</option>--}}
                                            {{--<option>Thursday</option>--}}
                                            {{--<option>Friday</option>--}}
                                            {{--<option>Saturday</option>--}}
                                            {{--<option>Sunday</option>--}}
                                        {{--</select>--}}

                                    {{--</div>--}}
                                    {{--<div class="form-group form-group-half">--}}
                                        {{--<div id="datetimepickerDate" class="input-group timerange">--}}
                                            {{--<input class="form-control" name="hours_avail" readonly="readonly" autocomplete="off" type="text">--}}
                                            {{--<span class="input-group-addon" style=""></span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            </div>

                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Other Appointment</h2>
                                </div>
                                <div class="form-group">
                                    {!! Form::select('appo_slot_times[]', $arrAppo_slot_times, $user->appo_slot_times, array( 'placeholder' => "Appointment Slot Times")) !!}
                                </div>
                                <div class="form-group">
                                    <input id="other_appo" type="text"
                                           class="form-control"
                                           name="appo_slot_times[]"
                                           placeholder="Other Appointment Slot Times">
                                </div>
                            </div>


                            <div class="wt-jobdescription wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>{{ trans('lang.job_title') }}</h2>
                                </div>
                                <div class="wt-formtheme wt-userform wt-userformvtwo">
                                    <fieldset>
                                        <div class="form-group">
                                            <input type="text" name="title" class="form-control" placeholder="{{ trans('lang.job_title') }}" v-model="title">
                                        </div>
                                        {{--<div class="form-group form-group-half wt-formwithlabel">--}}
                                        {{--<span class="wt-select">--}}
                                        {{--{!! Form::select('project_levels', $project_levels, null, array('class' => '', 'placeholder' => trans('lang.select_project_level'), 'v-model'=>'project_level')) !!}--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group form-group-half wt-formwithlabel">--}}
                                        {{--<span class="wt-select">--}}
                                        {{--{!! Form::select('job_duration', $job_duration, null, array('class' => '', 'placeholder' => trans('lang.select_job_duration'), 'v-model'=>'job_duration')) !!}--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group form-group-half wt-formwithlabel">--}}
                                        {{--<span class="wt-select">--}}
                                        {{--{!! Form::select('freelancer_type', $freelancer_level, null, array('placeholder' => trans('lang.select_freelancer_level'), 'class' => '', 'v-model'=>'freelancer_level')) !!}--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group form-group-half wt-formwithlabel">--}}
                                        {{--<span class="wt-select">--}}
                                        {{--{!! Form::select('english_level', $english_levels, null, array('class' => '', 'placeholder' => trans('lang.select_english_level'), 'v-model'=>'english_level')) !!}--}}
                                        {{--</span>--}}
                                        {{--</div>--}}
                                        <div class="form-group"></div>

                                        <div class="form-group form-group-half wt-formwithlabel job-rates-input">
                                            {!! Form::text('project_rates', null, array('class' => 'form-control halfWidth ratePicker', 'placeholder' => trans('lang.project_rates'), 'min'=>'0')) !!}
                                        </div>

                                        <div class="form-group form-group-half wt-formwithlabel job-rates-input">
                                            <span class="wt-select">
                                            {!! Form::select('project_rates_type', array('Per hour'=>'Per hour', 'Per day'=>'Per day', 'Per Month'=> 'Per Month'), array('class' => 'form-control', 'placeholder' => trans('lang.project_rates_type'))) !!}
                                            </span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>

                            <div class="wt-jobcategories wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Direct Bookings</h2>
                                </div>
                                <div class="wt-divtheme wt-userform wt-userformvtwo">
                                    <div class="form-group">
                                        {!! Form::select('direct_booking', array('Yes'=>'yes', 'No'=>'no'), null, array('placeholder' => "Direct Bookings")) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="wt-jobcategories wt-tabsinfo">
                                <div class="wt-tabscontenttitle">
                                    <h2>Organisation Booking Contact Details</h2>
                                </div>
                                <div class="form-group ">
                                    <input type="text"
                                           class="form-control"
                                           name="org_name"
                                           value="{{$user->emp_contact}}"
                                           placeholder="Organisation name">
                                </div>
                                <div class="form-group form-group-half">
                                    <input id="organisation_position" type="text"
                                           class="form-control"
                                           name="organisation_position"
                                           value="{{$user->emp_pos}}"

                                           placeholder="Position">
                                </div>
                                <div class="form-group form-group-half">
                                    <input id="organisation_email" type="email"
                                           class="form-control"
                                           name="organisation_email"
                                           value="{{$user->emp_email}}"

                                           placeholder="Email">
                                </div>
                                <div class="form-group form-group-half">
                                    <input id="organisation_contact" type="text"
                                           class="form-control"
                                           name="organisation_contact"
                                           value="{{$user->emp_telno}}"
                                           placeholder="Direct Contact No">
                                </div>


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
                                    {{--<h2>Profession</h2>--}}
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
                    <div class="wt-updatall">
                        <i class="ti-announcement"></i>
                        <span>{{{ trans('lang.save_changes_note') }}}</span>
                        {!! Form::submit(trans('lang.post_job'), ['class' => 'wt-btn', 'id'=>'submit-profile']) !!}

                    </div>
                {!! form::close(); !!}

            </div>

        </div>
    </div>
</div>
@endsection
