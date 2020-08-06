<aside id="wt-sidebar" class="wt-sidebar">
    {!! Form::open(['url' => url('search-results'), 'method' => 'get', 'class' => 'wt-formtheme wt-formsearch']) !!}
    <input type="hidden" value="{{$type}}" name="type">
    <div class="wt-widget wt-effectiveholder wt-startsearch">
        <div class="wt-widgettitle">
            <h2>{{ trans('lang.start_search') }}</h2>
        </div>
        <div class="wt-widgetcontent">
            <div class="wt-formtheme wt-formsearch">
                <fieldset>
                    <div class="form-group">
                        <input type="text" name="s" class="form-control"
                               placeholder="{{ trans('lang.ph_search_jobs') }}" value="{{$keyword}}">
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="wt-widget wt-effectiveholder">
        <div class="wt-widgettitle">
            <h2>{{ trans('lang.skills') }}</h2>
        </div>
        <div class="wt-widgetcontent">
            <fieldset>
                @if (!empty($skills))
                    <div class="wt-checkboxholder wt-verticalscrollbar">
                        @foreach ($skills as $key => $skill)
                            @php $checked = (!empty($_GET['skills']) && in_array($skill->slug, $_GET['skills'])) ? 'checked' : '' @endphp
                            <span class="wt-checkbox">
                                    <input id="skill-{{{ $key }}}" type="checkbox" name="skills[]"
                                           value="{{{$skill->slug}}}" {{$checked}} >
                                    <label for="skill-{{{ $key }}}">{{{ $skill->title }}}</label>
                                </span>
                        @endforeach
                    </div>
                @endif
            </fieldset>
        </div>
    </div>
    <div class="wt-widget wt-effectiveholder wt-startsearch">
        <div class="wt-widgettitle">
            <h2>Days and Hours Available</h2>
        </div>
        <div class="wt-widgetcontent">
            <div class="form-group form-group-half">
                <select id="multiselect" class="form-control" name="days_avail[]" multiple="multiple"
                        data-dbvalue="{{isset($_GET['days_avail']) && $_GET['days_avail'] ? json_encode($_GET['days_avail']) : ""}}">
                    <option>Monday</option>
                    <option>Tuesday</option>
                    <option>Wednesday</option>
                    <option>Thursday</option>
                    <option>Friday</option>
                    <option>Saturday</option>
                    <option>Sunday</option>
                </select>
            </div>
            <div class="form-group form-group-half">
                <div id="datetimepickerDate" class="input-group timerange">
                    <input class="form-control" name="hours_avail" type="text"
                           value="{{isset($_GET['hours_avail']) ? $_GET['hours_avail'] : "" }}" autocomplete="off">
                    <span class="input-group-addon" style="">
              </span>
                </div>

            </div>
        </div>
    </div>
    <div class="wt-widget wt-effectiveholder">
        <div class="wt-widgettitle">
            <h2>{{ trans('lang.locations') }}</h2>
        </div>
        <div class="wt-widgetcontent">
            <fieldset>
                <div class="form-group">
                    <input type="text" class="form-control filter-records"
                           placeholder="{{ trans('lang.ph_search_locations') }}">
                    <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                </div>
            </fieldset>
            <fieldset>
                @if (!empty($locations))
                    <div class="wt-checkboxholder wt-verticalscrollbar">
                        @foreach ($locations as $location)
                            @php $checked = ( !empty($_GET['locations']) && in_array($location->slug, $_GET['locations'])) ? 'checked' : '' @endphp
                            <span class="wt-checkbox">
                                    <input id="location-{{{ $location->slug }}}" type="checkbox" name="locations[]"
                                           value="{{{$location->slug}}}" {{$checked}} >
                                    <label for="location-{{{ $location->slug }}}"> <img
                                                src="{{{asset(Helper::getLocationFlag($location->flag))}}}"
                                                alt="{{ trans('lang.img') }}"> {{{ $location->title }}}</label>
                                </span>
                        @endforeach
                    </div>
                @endif
            </fieldset>
        </div>
    </div>
    <div class="wt-widget wt-effectiveholder">
        <div class="wt-widgettitle">
            <h2>{{ trans('lang.cats') }}</h2>
        </div>
        <div class="wt-widgetcontent">
            <fieldset>
                <div class="form-group">
                    <input type="text" class="form-control filter-records"
                           placeholder="{{ trans('lang.ph_search_cat') }}">
                    <a href="javascrip:void(0);" class="wt-searchgbtn"><i class="lnr lnr-magnifier"></i></a>
                </div>
            </fieldset>
            <fieldset>
                @if (!empty($categories))
                    <div class="wt-checkboxholder wt-verticalscrollbar">
                        @foreach ($categories as $category)
                            @php $checked = ( !empty($_GET['category']) && in_array($category->slug, $_GET['category'] )) ? 'checked' : ''; @endphp
                            <span class="wt-checkbox">
                                    <input id="cat-{{{ $category->slug }}}" type="checkbox" name="category[]"
                                           value="{{{ $category->slug }}}" {{$checked}} >
                                    <label for="cat-{{{ $category->slug }}}"> {{{ $category->title }}}</label>
                                </span>
                        @endforeach
                    </div>
                @endif
            </fieldset>
        </div>
    </div>


    <div class="wt-widget wt-effectiveholder">
        <div class="wt-widgetcontent">
            <div class="wt-applyfilters">
                <span>{{ trans('lang.apply_filter') }}<br> {{ trans('lang.changes_by_you') }}</span>
                {!! Form::submit(trans('lang.btn_apply_filters'), ['class' => 'wt-btn']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</aside>
