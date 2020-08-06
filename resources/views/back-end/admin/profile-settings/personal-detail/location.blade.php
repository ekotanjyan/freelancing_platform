<div class="wt-tabscontenttitle">
    <h2>Your Location</h2>
</div>
<div class="wt-formtheme">
    <fieldset>
        <div class="form-group form-group-half">
            <span class="wt-select">
                {!! Form::select('location', $locations, Auth::user()->location_id ,array('class' => '', 'placeholder' => trans('lang.ph_select_location'))) !!}
            </span>
        </div>
        <location-selector latitude="{{ $latitude }}" longitude="{{ $longitude }}" address="{{ $address }}"></location-selector>
    </fieldset>
</div>
