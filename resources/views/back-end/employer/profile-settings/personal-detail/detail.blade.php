@php

    $user = Auth::user();

    $cqc_ratings = array(
                              'Outstanding'=>'Outstanding',
                              'Good'=>'Good',
                              'Requires Improvement'=>'Requires Improvement',
                              'Inadequate'=> 'Inadequate'
                              );
      $cqc_ratings_date = array(
      '2015'=>'2015',
      '2016'=>'2016',
      '2017'=>'2017',
      '2018'=>'2018',
      '2019'=>'2019',

      );
      $payment_options = array(
      'Paypal'=>'Paypal',
      'BACS'=>'BACS',
      'Cheque'=>'Cheque'
      );
      $subscribe_options  = array(
      'plan_G6DvQf9zdEGczW'=>'6 Months',
      'plan_G6DvMJGDvP6wGz'=>'3 Months',
      'plan_G6DuLUGgkizyrs '=>'Monthly'
      );

      $arrSettings = array(
      'GP Surgery'=>'GP Surgery',
      'Walk-In centre'=>'Walk-In centre',
      'Urgent Care Centre'=>'Urgent Care Centre',
      'GP Out Of Hours'=>'GP Out Of Hours',
      'Community Service'=>'Community Service',
      'Other'=>'Other'
      );
      if(!isset($arrSettings[$user->setting]))
      {
        $arrSettings[$user->setting] = $user->setting;
      }

      $arrPaymentTerms = array(
      'Invoices usually paid within 7 days of receipt'=>'Invoices usually paid within 7 days of receipt',
      'Invoices usually paid within 14 days of receipt'=>'Invoices usually paid within 14 days of receipt',
      'Other'=>'Other',
      );
      if(!isset($arrPaymentTerms[$user->payment_terms]))
      {
        $arrPaymentTerms[$user->payment_terms] = $user->payment_terms;
      }

      $nationals = array(
          'Afghan',
          'Albanian',
          'Algerian',
          'American',
          'Andorran',
          'Angolan',
          'Antiguans',
          'Argentinean',
          'Armenian',
          'Australian',
          'Austrian',
          'Azerbaijani',
          'Bahamian',
          'Bahraini',
          'Bangladeshi',
          'Barbadian',
          'Barbudans',
          'Batswana',
          'Belarusian',
          'Belgian',
          'Belizean',
          'Beninese',
          'Bhutanese',
          'Bolivian',
          'Bosnian',
          'Brazilian',
          'British',
          'Bruneian',
          'Bulgarian',
          'Burkinabe',
          'Burmese',
          'Burundian',
          'Cambodian',
          'Cameroonian',
          'Canadian',
          'Cape Verdean',
          'Central African',
          'Chadian',
          'Chilean',
          'Chinese',
          'Colombian',
          'Comoran',
          'Congolese',
          'Costa Rican',
          'Croatian',
          'Cuban',
          'Cypriot',
          'Czech',
          'Danish',
          'Djibouti',
          'Dominican',
          'Dutch',
          'East Timorese',
          'Ecuadorean',
          'Egyptian',
          'Emirian',
          'Equatorial Guinean',
          'Eritrean',
          'Estonian',
          'Ethiopian',
          'Fijian',
          'Filipino',
          'Finnish',
          'French',
          'Gabonese',
          'Gambian',
          'Georgian',
          'German',
          'Ghanaian',
          'Greek',
          'Grenadian',
          'Guatemalan',
          'Guinea-Bissauan',
          'Guinean',
          'Guyanese',
          'Haitian',
          'Herzegovinian',
          'Honduran',
          'Hungarian',
          'I-Kiribati',
          'Icelander',
          'Indian',
          'Indonesian',
          'Iranian',
          'Iraqi',
          'Irish',
          'Israeli',
          'Italian',
          'Ivorian',
          'Jamaican',
          'Japanese',
          'Jordanian',
          'Kazakhstani',
          'Kenyan',
          'Kittian and Nevisian',
          'Kuwaiti',
          'Kyrgyz',
          'Laotian',
          'Latvian',
          'Lebanese',
          'Liberian',
          'Libyan',
          'Liechtensteiner',
          'Lithuanian',
          'Luxembourger',
          'Macedonian',
          'Malagasy',
          'Malawian',
          'Malaysian',
          'Maldivan',
          'Malian',
          'Maltese',
          'Marshallese',
          'Mauritanian',
          'Mauritian',
          'Mexican',
          'Micronesian',
          'Moldovan',
          'Monacan',
          'Mongolian',
          'Moroccan',
          'Mosotho',
          'Motswana',
          'Mozambican',
          'Namibian',
          'Nauruan',
          'Nepalese',
          'New Zealander',
          'Nicaraguan',
          'Nigerian',
          'Nigerien',
          'North Korean',
          'Northern Irish',
          'Norwegian',
          'Omani',
          'Pakistani',
          'Palauan',
          'Panamanian',
          'Papua New Guinean',
          'Paraguayan',
          'Peruvian',
          'Polish',
          'Portuguese',
          'Qatari',
          'Romanian',
          'Russian',
          'Rwandan',
          'Saint Lucian',
          'Salvadoran',
          'Samoan',
          'San Marinese',
          'Sao Tomean',
          'Saudi',
          'Scottish',
          'Senegalese',
          'Serbian',
          'Seychellois',
          'Sierra Leonean',
          'Singaporean',
          'Slovakian',
          'Slovenian',
          'Solomon Islander',
          'Somali',
          'South African',
          'South Korean',
          'Spanish',
          'Sri Lankan',
          'Sudanese',
          'Surinamer',
          'Swazi',
          'Swedish',
          'Swiss',
          'Syrian',
          'Taiwanese',
          'Tajik',
          'Tanzanian',
          'Thai',
          'Togolese',
          'Tongan',
          'Trinidadian/Tobagonian',
          'Tunisian',
          'Turkish',
          'Tuvaluan',
          'Ugandan',
          'Ukrainian',
          'Uruguayan',
          'Uzbekistani',
          'Venezuelan',
          'Vietnamese',
          'Welsh',
          'Yemenite',
          'Zambian',
          'Zimbabwean'
    );
      $arrNationals = array();
      foreach($nationals as $national)
      {
          $arrNationals[$national] = $national;
      }

      $arrPaymentMethods = array(
      'Limited Company'=>'Limited Company',
      'Self Employed'=>'Self Employed',
      '[DELETED]PAYE'=>'[DELETED]PAYE',
      );


 $arrOrgTypes = array(
        'NHS'=>'NHS',
        'Private organisation providing NHS care'=>'Private organisation providing NHS care',
        'Private organisation proving private healthcare'=>'Private organisation proving private healthcare',
    );

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
@endphp
<div class="wt-tabscontenttitle">
    <h2>{{{ trans('lang.address') }}}</h2>
</div>
<div class="lara-detail-form">
    <fieldset>
      <div class="form-group form-group-half">
          {!! Form::text( 'emp_website', e($emp_website), ['class' =>'form-control', 'placeholder' => trans('lang.emp_website')] ) !!}
      </div>
      <div class="form-group form-group-half">
          {!! Form::text( 'straddress', e($user->straddress), ['class' =>'form-control', 'placeholder' => 'Address'] ) !!}
      </div>
      <div class="form-group form-group-half">
          {!! Form::text( 'city', e($user->city), ['class' =>'form-control', 'placeholder' => trans('lang.city')] ) !!}
      </div>
      <div class="form-group form-group-half">
          {!! Form::text( 'postcode', e($user->postcode), ['class' =>'form-control', 'placeholder' => trans('lang.postcode')] ) !!}
      </div>
      {{--<div class="form-group">--}}
          {{--<location-selector latitude="{{ $latitude }}" longitude="{{ $longitude }}" address="{{ $address }}"></location-selector>--}}
      {{--</div>--}}
        <div class="form-group form-group-half">
            <input id="practice_code" type="text"
                   class="form-control"
                   name="practice_code"
                   placeholder="Practice Code"
                   value="{{ $user->practice_code }}">
        </div>
    </fieldset><br>
</div>

{{--<div class="wt-tabscontenttitle">--}}
    {{--<h2>Company Contacts</h2>--}}
{{--</div>--}}
{{--<div class="lara-detail-form">--}}
    {{--<fieldset>--}}
      {{--<div class="form-group form-group-half">--}}
          {{--{!! Form::text( 'emp_contact', e($user->emp_contact), ['class' =>'form-control', 'placeholder' => trans('lang.emp_contact')] ) !!}--}}
      {{--</div>--}}
      {{--<div class="form-group form-group-half">--}}
          {{--{!! Form::tel( 'emp_telno', e($user->emp_telno), ['class' =>'form-control', 'placeholder' => trans('lang.emp_telno')] ) !!}--}}
      {{--</div>--}}
      {{--<div class="form-group form-group-half">--}}
          {{--{!! Form::url( 'emp_pos', e($user->emp_pos), ['class' =>'form-control', 'placeholder' => 'Position'] ) !!}--}}
      {{--</div>--}}
      {{--<div class="form-group form-group-half">--}}
          {{--{!! Form::email( 'emp_email', e($user->emp_email), ['class' =>'form-control', 'placeholder' => 'Email'] ) !!}--}}
      {{--</div>--}}
    {{--</fieldset>--}}
{{--</div>--}}

<label for="org_type" style="margin-top: 20px">Please indicate the organisation which best describes your service</label>

<div class="lara-detail-form">
    <fieldset>
        <div class="form-group">
            {!! Form::text('org_desc', $user->org_desc, ['class' => 'form-group', 'placeholder' => 'Organisation description']) !!}
        </div>
    </fieldset><br>
</div>
<div class="wt-tabscontenttitle">
    <h2>Certifications</h2>
</div>

<div class="lara-detail-form">
    <fieldset>
        <div class="form-group form-group-half">
            {!! Form::select('emp_cqc_rating_date', $cqc_ratings_date, $user->emp_cqc_rating_date, array('placeholder' => trans('lang.emp_cqc_rating_date'), 'class' => 'form-group')) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::select('emp_cqc_rating', $cqc_ratings, $user->emp_cqc_rating, array('placeholder' => trans('lang.emp_cqc_rating'), 'class' => 'form-group')) !!}
        </div>
        {{--<div class="form-group">--}}
        {{--{!! Form::select('org_type', $arrOrgTypes, $user->profile->org_type, array('class' => 'form-group', 'placeholder' => "Organisation type")) !!}--}}
        {{--</div>--}}


        {{--<div class="form-group ">--}}
        {{--{!! Form::select('setting[]', $arrSettings, $user->setting, array('class' => 'form-group',  'placeholder' => "Setting")) !!}--}}
        {{--</div>--}}
        {{--<div class="form-group ">--}}
        {{--<input id="other_setting" type="text"--}}
        {{--class="form-control"--}}
        {{--name="setting[]"--}}
        {{--placeholder="Other Setting">--}}
        {{--</div>--}}
        <div class="form-group form-group">
            <label for="insurance"
                   style="display: inline-block">Insurance  Details</label>
            <input
                    type="checkbox"
                    name="insurance"
                    {{$user->insurance=='on'? 'checked' : ''}}
                    placeholder="In surance"/>
        </div>
        <div class="form-group ">
            <input type="text"
                   class="form-control"
                   name="org_name"
                   value="{{$user->org_name}}"
                   placeholder="Organisation name">
        </div>
        <div class="form-group">
            {!! Form::text( 'tagline', e($tagline), ['class' =>'form-control', 'placeholder' => trans('lang.ph_add_tagline')] ) !!}
        </div>
        <div class="form-group">
            {!! Form::textarea( 'description', e($description), ['class' =>'form-control', 'placeholder' => trans('lang.ph_desc')] ) !!}
        </div>
    </fieldset>
    <br>
</div>



{{--<div class="wt-tabscontenttitle">--}}
    {{--<h2>Professional Required</h2>--}}
{{--</div>--}}
{{--<div class="lara-detail-form">--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::select('prof_required', \App\User::getProfessionsByRole('employer'), data_get($profile, 'user.prof_required', null), array('placeholder' => "Professional Required")) !!}--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="wt-tabscontenttitle">--}}
    {{--<h2>Certifications</h2>--}}
{{--</div>--}}
{{--<div class="lara-detail-form">--}}
    {{--<fieldset>--}}
      {{--<div class="form-group">--}}
          {{--<strong>Certificates –Vaccinations &--}}
              {{--immunisation--}}
              {{--(Measles/Mumps/Rubella/Hepatitis--}}
              {{--B/Varicella):</strong><br>--}}
          {{--@if(!empty($user->certs))--}}
              {{--<a href="{{url('uploads/files/'.$user->certs)}}" target="_blank">Click To open</a>--}}
          {{--@endif--}}
          {{--<input type="file" name="certs"--}}
                 {{--class="form-control"--}}
                 {{--accept=".pdf, image/*,.doc,.docx">--}}
      {{--</div>--}}
      {{--<div class="form-group">--}}
          {{--{!! Form::select('appo_slot_times[]', $arrAppo_slot_times, $user->appo_slot_times, array( 'placeholder' => "Appointment Slot Times")) !!}--}}
      {{--</div>--}}
      {{--<div class="form-group">--}}
            {{--<input id="other_appo" type="text"--}}
                 {{--class="form-control"--}}
                 {{--name="appo_slot_times[]"--}}
                 {{--placeholder="Other Appointment Slot Times">--}}
      {{--</div>--}}
      {{--<div class="form-group">--}}
          {{--{!! Form::select('payment_terms[]', $arrPaymentTerms, $user->payment_terms, array('placeholder' => "Payment Terms")) !!}--}}
      {{--</div>--}}
      {{--<div class="form-group">--}}
          {{--<input id="other_payment_terms" type="text"--}}
                 {{--class="form-control"--}}
                 {{--name="payment_terms[]"--}}
                 {{--placeholder="Other Payment terms">--}}
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
    {{--</fieldset>--}}
{{--</div>--}}

<div class="wt-tabscontenttitle">
    <h2>Computer System in use</h2>
</div>
<div class="wt-formtheme">
    <div class="form-group ">
      <multiselect v-model="itsoftware"
                   :options="itsoftware_options"
                   :searchable="false"
                   :close-on-select="false"
                   :clear-on-select="false"
                   :preserve-search="false"
                   :show-labels="false"
                   :multiple="true" placeholder="Computer Systems" name="itsoftware" class="multiselect-upd" ref="input"
                   data-value="{{ json_encode(@unserialize($user->itsoftware) !== false ? unserialize($user->itsoftware) : [$user->itsoftware]) }}">
          <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single" v-if="values.length &amp;&amp; !isOpen">@{{ values.length }} option@{{ values.length != 1 ? 's' : '' }} selected</span></template>
      </multiselect>
      <select name="itsoftware[]" style="display:none;" multiple>
          <option v-for="value in itsoftware" :value="value" selected></option>
      </select>
    </div>
</div>


{{--<div class="wt-tabscontenttitle">
    <h2>Company Contacts</h2>
</div>
<div class="lara-detail-form">
    <fieldset>
        <div class="form-group form-group-half">
            {!! Form::text( 'emp_contact', e($user->emp_contact), ['class' =>'form-control', 'placeholder' => trans('lang.emp_contact')] ) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::tel( 'emp_telno', e($user->emp_telno), ['class' =>'form-control', 'placeholder' => trans('lang.emp_telno')] ) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::url( 'emp_pos', e($user->emp_pos), ['class' =>'form-control', 'placeholder' => 'Position'] ) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::email( 'emp_email', e($user->emp_email), ['class' =>'form-control', 'placeholder' => 'Email'] ) !!}
        </div>
    </fieldset>
</div>--}}

<div class="wt-tabscontenttitle">
    <h2>Contact Information</h2>
</div>
<div class="lara-detail-form">
    <fieldset>
        <div class="form-group form-group-20">
            <span class="wt-select">{!! Form::select('title', ['Mr' => 'Mr', 'Ms' => 'Ms', 'Mrs' => 'Mrs', 'Dr' => 'Dr'], $user->title, ['placeholder' => trans('lang.title')]) !!}</span>
        </div>
        <div class="form-group form-group-40">
            {!! Form::text( 'first_name', e($user->first_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_first_name')] ) !!}
        </div>
        <div class="form-group form-group-40">
            {!! Form::text( 'last_name', e($user->last_name), ['class' =>'form-control', 'placeholder' => trans('lang.ph_last_name')] ) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::email( 'email', e($user->email), ['class' =>'form-control', 'placeholder' => trans('lang.ph_email')] ) !!}
        </div>
        <div class="form-group form-group-half">
            {!! Form::number( 'number', e($user->number), ['class' =>'form-control', 'placeholder' => trans('lang.number')] ) !!}
        </div>
        <div class="form-group">
            {{--        {!! Form::select('plan_id', $subscribe_options, $user->plan_id, array('placeholder' => "Select subscription ", 'v-model'=>'subscription' ,'class' => 'form-group',  'v-on:change' => 'selectedSubscription(subscription)')) !!}--}}
            {!! Form::select('plan_id', $subscribe_options, $user->plan_id, array('placeholder' => "Select subscription ",'class' => 'form-group')) !!}
        </div>
    </fieldset>
</div>
