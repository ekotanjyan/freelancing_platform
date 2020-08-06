<div class="wt-tabscontenttitle">
    <h2>{{trans('lang.your_address')}}</h2>
</div>
<div class="wt-tabsinfo">
    <div class="form-group">
        <input type="text" name="radius" class="form-control" placeholder="Radius" value="{{ $radius }}" />
    </div>
</div>
<div class="wt-formtheme">
    <fieldset>
        <location-selector latitude="{{ $latitude }}" longitude="{{ $longitude }}" address="{{ $address }}"></location-selector>
    </fieldset>
</div>
