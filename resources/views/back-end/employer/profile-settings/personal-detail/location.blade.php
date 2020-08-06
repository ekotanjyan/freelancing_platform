<?php
$user = Auth::user();
?><div class="wt-tabscontenttitle">
    <h2>{{ trans('lang.ph_your_address') }}</h2>
</div>
<div class="wt-formtheme">
    <div class="form-group  form-group-half">
        <input id="straddress" type="text"
               class="form-control"
               name="straddress"
               value="{{$user->straddress}}"

               placeholder="Address"
        >
    </div>
    <div class="form-group  form-group-half">
        <input id="city" type="text"
               class="form-control"
               name="city"
               value="{{$user->city}}"

               placeholder="{{{ trans('lang.city') }}}"
        >
    </div>
    <div class="form-group">
        <input id="postcode" type="text"
               class="form-control"
               name="postcode"
               value="{{$user->postcode}}"
               placeholder="{{{ trans('lang.postcode') }}}"
        >
    </div>
    <div class="form-group">
        <fieldset>
            <location-selector latitude="{{ $latitude }}" longitude="{{ $longitude }}" address="{{ $address }}"></location-selector>
        </fieldset>
    </div>

</div>
