@php
    $user = Auth::user();
    $arrProfReq = array(
        'GP'=>'GP',
        'Physicians Associate/Assistant'=>'Physicians Associate/Assistant',
        'Advanced Nurse Practitioner'=>'Advanced Nurse Practitioner',
        'Practice Nurse'=>'Practice Nurse',
        'Community Nurse'=>'Community Nurse',
        'District Nurse'=>'District Nurse',
        'Health Care Assistant'=>'Health Care Assistant',
        'Phlebotomist'=>'Phlebotomist',
        'Clinical Pharmacist'=>'Clinical Pharmacist',
        'Community Psychiatric Nurse'=>'Community Psychiatric Nurse',
        'Mental Health Nurse'=>'Mental Health Nurse',
        'Counsellor'=>'Counsellor',
        'Drug and Alcohol worker'=>'Drug and Alcohol worker',
        'Social Worker'=>'Social Worker',
    );

    $arrSpecialInterests = array(
    'Diabetes'=>'Diabetes',
    'Rhematology'=>'Rhematology',
    'Neurology'=>'Neurology',
    'Dermatology'=>'Dermatology',
    'Asthma'=>'Asthma',
    'Mental Health'=>'Mental Health',
    'Substance Misuse and Addictions'=>'Substance Misuse and Addictions',
    'MSK'=>'MSK',
    'Paediatrics'=>'Paediatrics',
    'Cardiology'=>'Cardiology',
    'Gastrointestinal'=>'Gastrointestinal',
    'Other'=>'Other',
    );
    if(!isset($arrSpecialInterests[$user->special_interests]))
    {
      $arrSpecialInterests[$user->special_interests] = $user->special_interests;
    }

    $arrAppo_slot_times = array(
    '10 minutes'=>'10 minutes',
    '15 minutes'=>'15 minutes',
    '20 minutes'=>'20 minutes',
    '30 minutes'=>'30 minutes',
    'Other'=>'Other',
    );
    if(!isset($arrAppo_slot_times[$user->appo_slot_times]))
    {
      $arrAppo_slot_times[$user->appo_slot_times] = $user->appo_slot_times;
    }

    $arrBreaks = array(
    'Morning Break'=>'Morning Break',
    'Lunch Break'=>'Lunch Break',
    'Afternoon Break'=>'Afternoon Break',
    'Evening Break'=>'Evening Break',
    'Not Applicable' => 'Not Applicable',
    );
@endphp
<div class="wt-tabcompanyinfo wt-tabsinfo">
    {{--<div class="wt-tabscontenttitle">--}}
    {{--<h2>{{{ trans('lang.company_details') }}}</h2>--}}
    {{--</div>--}}

    <h4>Backup Company contact</h4>
    <div class="form-group form-group-half">
        <input id="backup_emp_contact" type="text"
               class="form-control"
               name="backup_emp_contact"
               value="{{$user->backup_emp_contact}}"
               placeholder="Backup Company Contact"
        >
    </div>
    <div class="form-group form-group-half">
        <input id="backup_emp_email" type="email"
               class="form-control"
               name="backup_emp_email"
               value="{{$user->backup_emp_email}}"
               placeholder="Backup Company Email"
        >
    </div>
    <div class="form-group form-group-half">
        <input id="backup_emp_pos" type="text"
               class="form-control"
               name="backup_emp_pos"
               value="{{$user->backup_emp_pos}}"
               placeholder="Backup Company Position"
        >
    </div>
    <div class="form-group form-group-half">
        <input id="backup_emp_tel" type="number"
               class="form-control"
               name="backup_emp_tel"
               value="{{$user->backup_emp_tel}}"
               placeholder="Backup Company Tel"
        >
    </div>

    {{--<div class="form-group">--}}
        {{--<input id="emp_desc" type="text"--}}
               {{--class="form-control"--}}
               {{--name="emp_desc"--}}
               {{--value="{{$user->emp_desc}}"--}}
               {{--placeholder="Description"--}}
        {{-->--}}

    {{--</div>--}}



    <!-- New columns for sheet-->


    <div class="form-group form-group-half">
        <input type="text"
               class="form-control"
               value="{{$user->pin}}"
               name="pin"
               placeholder="Pin">
    </div>
    <div class="form-group form-group-half">
        <date-picker
                :config="{format: 'YYYY-MM-DD'}"
                class="form-control"
                value="{{$user->pin_date_revalid}}"
                name="pin_date_revalid"
                placeholder="Pin date of revalidation"
        ></date-picker>
    </div>
    <br>

    <div class="form-group ">
        <input type="text"
               class="form-control"
               name="policy_number"
               value="{{$user->policy_number}}"
               placeholder="Policy Number"/>
    </div>

    <div class="form-group">
        <label>Organisation Contact</label>
    </div>

    <div class="form-group form-group-half">
        <input id="organisation_position" type="text"
               class="form-control"
               name="organisation_position"
               value="{{$user->organisation_position}}"

               placeholder="Position">
    </div>
    <div class="form-group form-group-half">
        <input id="organisation_email" type="email"
               class="form-control"
               name="organisation_email"
               value="{{$user->organisation_email}}"

               placeholder="Email">
    </div>
    <div class="form-group form-group-half">
        <input id="organisation_contact" type="text"
               class="form-control"
               name="organisation_contact"
               value="{{$user->organisation_contact}}"
               placeholder="Direct Contact No">
    </div>


    <div class="form-group ">

        <strong>Professional Indemnity
            Certificate:</strong>
        @if(!empty($user->prof_ind_cert))
         <a href="{{url('uploads/files/'.$user->prof_ind_cert)}}" target="_blank">Click To open</a>
       @endif
        <input type="file" name="prof_ind_cert"
               class="form-control"
               accept=".pdf, image/*,.doc,.docx">
    </div>
    <div class="form-group">
        {!! Form::select('prof_required', $arrProfReq, $user->prof_required, array('placeholder' => "Professional Required")) !!}
    </div>
    <div class="form-group">
        {!! Form::select('special_interests[]', $arrSpecialInterests, $user->special_interests, array('placeholder' => "Special Interests")) !!}
    </div>
    <div class="form-group">
        <input type="text"
               class="form-control"
               name="special_interests[]"
               placeholder="Other Special Interest">
    </div>

    <div class="form-group">
        {!! Form::select('adm_catch_time', array('Yes'=>'Yes', 'No'=>'No'), null, array('placeholder' => "Admin Catch Up Time Provided")) !!}
    </div>
    <div class="form-group">
        {!! Form::select('time_allowed[]', $arrAppo_slot_times, $user->time_allowed, array('placeholder' => "Time Allocated")) !!}
    </div>
    <div class="form-group">
        <input id="other_time_allo" type="text"
               class="form-control"
               name="time_allowed[]"
               placeholder="Other Time Allocated">
    </div>
    <div class="form-group">
        {!! Form::select('breaks', $arrBreaks, $user->breaks, array('placeholder' => "Breaks")) !!}
    </div>
    <div class="form-group" >
        <input id="hourly_rate" type="number"
               class="form-control"
               name="hourly_rate"
               value="{{$hourly_rate}}"
               placeholder="Hourly Rate">
    </div>
    <div class="form-group form-group-half">
        <span class="wt-checkbox"
              style="    margin-left: 15px;    margin-top: 17px;">
            <span class="wt-checkbox">
                    <input id="hourly_rate_negotiable"
                           type="checkbox"
                           name="hourly_rate_negotiable"
                           {{$hourly_rate_negotiable=='on'? 'checked' : ''}}

                           >
                    <label for="hourly_rate_negotiable"><span> Hourly rate negotiable</span></label>
            </span>
        </span>
    </div>

    <div class="form-group">
        {!! Form::select('direct_booking', array('Direct Bookings accepted'=>'Direct Bookings accepted', 'Direct Bookings not accepted'=>'Direct Bookings not accepted'), $user->direct_booking, array('placeholder' => "Direct Bookings")) !!}
    </div>


    <div class="form-group">
        <label>Session Advertised By</label>
    </div>
    <div class="form-group form-group-half">
        <input id="session_ad_by" type="text"
               class="form-control"
               name="session_ad_by"
               value="{{$user->session_ad_by}}"
               placeholder="Name">
    </div>
    <div class="form-group form-group-half">
        <input id="session_ad_by_position" type="text"
               class="form-control"
               name="session_ad_by_position"
               value="{{$user->session_ad_by_position}}"
               placeholder="Position">
    </div>
    <div class="form-group form-group-half">
        <input id="session_ad_by_email" type="email"
               class="form-control"
               name="session_ad_by_email"
               value="{{$user->session_ad_by_email}}"
               placeholder="Email">
    </div>
    <div class="form-group form-group-half">
        <input id="session_ad_by_contact" type="text"
               class="form-control"
               name="session_ad_by_contact"
               value="{{$user->session_ad_by_contact}}"
               placeholder="Direct Contact No">
    </div>
</div>
