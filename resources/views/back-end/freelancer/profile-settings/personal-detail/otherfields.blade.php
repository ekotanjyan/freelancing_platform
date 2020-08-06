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
     'Other'=>'Other',

     );
     if(!isset($arrSettings[$user->setting]))
     {
       $arrSettings[$user->setting] = $user->setting;
     }


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
     );

@endphp
<div class="wt-tabscontenttitle">
    <h2>Other Details</h2>
</div>
<div class="wt-formtheme">
    <fieldset>
        <div class="form-group">
             <span class="wt-select">

                {!! Form::select('nationality', $arrNationals, $user->nationality, array('placeholder' => "Nationality")) !!}
            </span>
        </div>

        <div class="form-group">
            <span class="wt-select">

            {!! Form::select('right_of_work',  array('Yes'=>'Yes', 'No'=>'No'), $user->right_of_work, array('placeholder' => "Right to work")) !!}
            </span>
        </div>
        <div class="form-group ">
            <div class="wt-tabscontenttitle">
                <h2>Passport or Visa</h2>
            </div>
            @if(!empty($user->passport_visa))
                <a href="{{url('uploads/files/'.$user->passport_visa)}}" target="_blank">Click To open</a>
            @endif
            <input type="file" name="passport_visa"
                   class="form-control"
                   accept=".pdf, image/*,.doc,.docx">
        </div>
        <div class="form-group form-group">
            <div class="wt-tabscontenttitle">
                <h2>Professional Qualifications</h2>
            </div>

            <span class="text-right" id="plusQual" style="cursor:pointer;font-size: 16px; background-color: #fccf17;color:white;padding:7px;border-radius:5px">+</span>
        </div>
        @php
            $arrQualif = json_decode($user->prof_qualifications);
        @endphp
        <div class="profQualif_block">
            <table border="1">

            @if(!empty($arrQualif) && isset($arrQualif[0]) && isset($arrQualif[0][0]) && $arrQualif[0][0] != "")

            @foreach($arrQualif as $qualif)

                <tr>
                    <td> <input type="text"
                                class="form-control"
                                name="profQualLevel[]"
                                value="{{$qualif[0]}}"
                                placeholder="Level"></td>
                    <td> <input type="text"
                                class="form-control"
                                name="profQualName[]"
                                value="{{$qualif[1]}}"
                                placeholder="Name"></td>
                    <td> <input type="text"
                                class="form-control"
                                name="profQualPlace[]"
                                value="{{$qualif[2]}}"

                                placeholder="Place"></td>
                    <td> <input type="number"
                                class="form-control"
                                name="profQualYear[]"
                                value="{{$qualif[3]}}"

                                placeholder="Year"></td>
                </tr>
            @endforeach

        @endif
            </table>

        </div>


        <div class="form-group ">
            <div class="wt-tabscontenttitle">
                <h2>Professional Qualifications Certificate</h2>
            </div>
            @if(!empty($user->prof_qual_cert))
                <a href="{{url('uploads/files/'.$user->prof_qual_cert)}}" target="_blank">Click To open</a>
            @endif
            <input type="file" name="prof_qual_cert"
                   class="form-control"
                   accept=".pdf, image/*,.doc,.docx">
        </div>

        <div class="form-group ">
            <div class="wt-tabscontenttitle">
                <h2>Mandatory Training</h2>
            </div>
            @if(!empty($user->mand_training))
                <a href="{{url('uploads/files/'.$user->mand_training)}}" target="_blank">Click To open</a>
            @endif
            <input type="file" name="mand_training"
                   class="form-control"
                   accept=".pdf, image/*,.doc,.docx">
        </div>
        <div class="form-group ">
            <div class="wt-tabscontenttitle">
                <h2>Certificate of CRB/DBS</h2>
            </div>
            @if(!empty($user->cert_of_crbdbs))
                <a href="{{url('uploads/files/'.$user->cert_of_crbdbs)}}" target="_blank">Click To open</a>
            @endif
            <input type="file" name="cert_of_crbdbs"
                   class="form-control"
                   accept=".pdf, image/*,.doc,.docx">
        </div>
        <div class="form-group ">
            <div class="wt-tabscontenttitle">
                <h2>Occupational Health</h2>
            </div>
            @if(!empty($user->occup_health))
                <a href="{{url('uploads/files/'.$user->occup_health)}}" target="_blank">Click To open</a>
            @endif
            <input type="file" name="occup_health"
                   class="form-control"
                   accept=".pdf, image/*,.doc,.docx">
        </div>
        <div class="form-group">
        <span class="wt-select">

            {!! Form::select('special_interests[]', $arrSpecialInterests, $user->special_interests, array('placeholder' => "Special Interests")) !!}
            </span>
        </div>
        <div class="form-group">
            <input type="text"
                   class="form-control"
                   name="special_interests[]"
                   placeholder="Other Special Interest">
        </div>

        <div class="form-group form-group">

            <div class="wt-tabscontenttitle">
                <h2>Professional
                    Indemnity Insurance   <input
                            type="checkbox"
                            {{$user->insurance=='on'? 'checked' : ''}}

                            name="insurance"
                            placeholder="Insurance"></h2>
            </div>


        </div>
        <div class="form-group ">
            <input type="text"
                   class="form-control"
                   name="org_name"
                   value="{{$user->org_name}}"

                   placeholder="Organisation name">
        </div>
        <div class="form-group ">
            <input  type="text"
                    class="form-control"
                    name="policy_number"
                    value="{{$user->policy_number}}"

                    placeholder="Insurance Policy Number">
        </div>
        <div class="form-group ">
            <div class="wt-tabscontenttitle">
                <h2>Professional Indemnity Certificate</h2>
            </div>
            @if(!empty($user->prof_ind_cert))
                <a href="{{url('uploads/files/'.$user->prof_ind_cert)}}" target="_blank">Click To open</a>
            @endif
            <input type="file" name="prof_ind_cert"
                   class="form-control"
                   accept=".pdf, image/*,.doc,.docx">
        </div>
        <div class="form-group">
        <span class="wt-select">

            {!! Form::select('direct_booking', array('Direct Bookings accepted'=>'Direct Bookings accepted', 'Direct Bookings not accepted'=>'Direct Bookings not accepted'), $user->direct_booking, array('placeholder' => "Direct Bookings")) !!}
            </span>
        </div>
        {{--<div class="form-group">--}}
            {{--<span class="wt-select">--}}
                {{--{!! Form::select('c_payment_methods',$arrPaymentMethods, $user->c_payment_methods, array('placeholder' => "Company Status")) !!}--}}
            {{--</span>--}}
        {{--</div>--}}
        @if($user->c_payment_methods == 'Limited Company')
        <div class="form-group ">
            <input id="c_ltd_comp_name" type=" text"
                   class="form-control"
                   name="c_ltd_comp_name"
                   value="{{$user->c_ltd_comp_name}}"

                   placeholder="LTD Company">
        </div>
        @endif
    </fieldset>
</div>
