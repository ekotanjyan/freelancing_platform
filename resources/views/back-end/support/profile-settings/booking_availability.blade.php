@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-dbsectionspace wt-haslayout la-ed-freelancer">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-9">
                <div class="freelancer-profile" id="booking_availability">
                    @if (Session::has('message'))
                        <div class="flash_msg">
                            <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
                        </div>
                    @endif
                    @if ($errors->any())
                        <ul class="wt-jobalerts">
                            @foreach ($errors->all() as $error)
                                <div class="flash_msg">
                                    <flash_messages :message_class="'danger'" :time ='10' :message="'{{{ $error }}}'" v-cloak></flash_messages>
                                </div>
                            @endforeach
                        </ul>
                    @endif
                    <div class="wt-dashboardbox wt-dashboardtabsholder">
                        @if (file_exists(resource_path('views/extend/back-end/freelancer/profile-settings/tabs.blade.php')))
                            @include('extend.back-end.freelancer.profile-settings.tabs')
                        @else
                            @include('back-end.freelancer.profile-settings.tabs')
                        @endif
                            <div id="support_availability" class="scrolToCalend" style="margin:0 auto;">

                                <div class="wt-tabscontent tab-content">
                                    <vue-cal ref="vuecal" style="height: 650px"
                                             :time-from="0 * 60"
                                             :time-to="24 * 60"
                                             :disable-views="['years', 'year']"
                                             :selected-date="availability_selected_date"
                                             default-view="month"
                                             events-on-month-view="short"
                                             :events="events"
                                             :on-event-click="onEventClick"
                                             @cell-click="createNewEvent"
                                    >
                                    </vue-cal>
                                    <div class="wt-tabscontenttitle" style="margin-top: 50px; ">
                                        <h2>
                                            Green equals free this day<br>
                                            Blue equals booking on this day<br>
                                            Red equals away on holiday<br>
                                        </h2>
                                    </div>
                                    <div v-if="clickedDate != ''">
                                        <div class="wt-tabcompanyinfo wt-tabsinfo" style="margin-top:50px">
                                            <div class="wt-tabscontenttitle">
                                                <h2 v-if="event_id">Update availability</h2>
                                                <h2 v-if="!event_id">Create new availability</h2>
                                            </div>
                                        </div>
                                        <div class="wt-accordiondetails classScrollTo">
                                            <form id="availability_dashboard_form">

                                                <div class="form-group">
                                                    <label for="availability_title">Title:</label>
                                                    {!! Form::text( 'availability_title',null, ['class' =>'form-control', 'placeholder' => 'Availability Title', 'v-model'=>'availability_title', 'required'=>'required'] ) !!}
                                                </div>
                                                <div class="form-group">
                                                    <label for="availability_title">Content:</label>
                                                    {!! Form::text( 'availability_content',null, ['class' =>'form-control', 'placeholder' => 'Availability description', 'v-model'=>'availability_content', 'required'=>'required'] ) !!}
                                                </div>
                                                <div class="form-group"  id="listDates">
                                                    <div class="isDay">
                                                        <div class="form-group form-group-half">
                                                            <div class="wt-divtheme wt-userform wt-userformvtwo">
                                                                <div class="form-group">
                                    <span class="wt-select">
                                        <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" name="start_date[0]" placeholder="{{ trans('lang.start_date') }}" value="" v-model="availability_selected_date"></date-picker>
                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-half" v-if="availability_selected_date!=''">
                                                            <div class="wt-divtheme wt-userform wt-userformvtwo">
                                                                <div class="form-group">
                                    <span class="wt-select">
                                        <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" name="end_date[0]" placeholder="{{ trans('lang.end_date') }}" value="" v-model="availability_selected_end_date"></date-picker>
                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="getIsDay"  v-if="!event_id" v-for="d in 6" style="display:none">
                                                        <div class="form-group form-group-half">
                                                            <div class="wt-divtheme wt-userform wt-userformvtwo">
                                                                <div class="form-group">
                                        <span class="wt-select">
                                            <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" placeholder="{{ trans('lang.start_date') }}" value=""></date-picker>
                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-group-half">
                                                            <div class="wt-divtheme wt-userform wt-userformvtwo">
                                                                <div class="form-group">
                                        <span class="wt-select">
                                            <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" placeholder="{{ trans('lang.end_date') }}" value=""></date-picker>
                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button"  v-if="!event_id" class="wt-btn" v-on:click="createList" v-if="addDay!=6" id="addDay">add day</button>
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

                                                <div class="form-group" v-if="!event_id">
                                                    <div class="wt-tabscontenttitle">
                                                        <div class="float-left">
                                                            <h2>Recurring date</h2>
                                                        </div>
                                                        <div class="form-group form-group-half  float-right">
                                                            <switch_button v-model="is_recurring">Recurring Dates</switch_button>
                                                            <input type="hidden" :value="false">
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-half float-left" v-if="is_recurring != false && availability_selected_date >= availability_selected_end_date">
                                                        {!! Form::select('recurring_date', ['day'=>'day','week'=>'week','month'=>'month'], null, ['class' => 'form-control', 'placeholder' => "Recurring dates", 'v-model'=>'recurring_date']) !!}
                                                    </div>
                                                    <div class="form-group form-group-half float-left" v-if="is_recurring != false && availability_selected_date < availability_selected_end_date">
                                                        {!! Form::select('recurring_date', ['week'=>'week','month'=>'month'], null, ['class' => 'form-control', 'placeholder' => "Recurring dates", 'v-model'=>'recurring_date']) !!}
                                                    </div>

                                                    <div class="form-group form-group-half float-right" v-if="recurring_date != '' && is_recurring != false">
                                    <span class="wt-select">
                                    <date-picker :config="{format: 'YYYY-MM-DD'}" class="form-control" name="recurring_end_date" placeholder="Last date recurring" requare value="" v-model="recurring_end_date"></date-picker>
                                    </span>
                                                    </div>
                                                </div>
                                                <div class="wt-jobskills wt-tabsinfo la-jobedit"  id="post_job">
                                                    <div class="wt-tabscontenttitle">
                                                        <h2>{{ trans('lang.skills_req') }}</h2>
                                                    </div>
                                                    <div class="form-group">
                                                        {!! Form::select('skill_id', $skills, null, ['placeholder' => trans('lang.skills_req'), 'v-model'=>'skill_id']) !!}
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <input type="hidden" name="recurring_date" v-if="event_id" v-model="recurring_date">
                                                    <input type="hidden" name="class" v-if="event_class" v-model="event_class">
                                                    <input type="hidden" name="user_id" v-if="user_id" v-model="user_id">
                                                    <input type="hidden" name="event_id" v-if="event_id" v-model="event_id">
                                                    <button class="btn btn-success" v-if="!event_id" @click="saveNewEventAvailability">Create Availability</button>
                                                    <button class="btn btn-danger" v-if="!event_id" @click="saveNewEventBusy">Create Holiday/Busy</button>
                                                    <button class="btn btn-danger" v-if="event_id" @click="updateEvent">Update Availability</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('bootstrap_script')
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>

@stop
