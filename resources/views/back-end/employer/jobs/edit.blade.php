@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
    <div class="wt-haslayout wt-dbsectionspace">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 float-left" id="post_job">
                @if (Session::has('error'))
                    <div class="flash_msg">
                        <flash_messages :message_class="'danger'" :time='5' :message="'{{{ Session::get('error') }}}'" v-cloak></flash_messages>
                    </div>
                @endif
                <div class="preloader-section" v-if="loading" v-cloak>
                    <div class="preloader-holder">
                        <div class="loader"></div>
                    </div>
                </div>
                <div class="wt-haslayout wt-post-job-wrap">
                    {!! Form::open(['url' => '', 'class' =>'post-job-form wt-haslayout', 'id' => 'job_edit_form', '@submit.prevent'=>'updateJob("'.$job->id.'")']) !!}
                        <div class="wt-dashboardbox">
                            <div class="wt-dashboardboxtitle">
                                <h2>{{ trans('lang.edit_job') }}</h2>
                            </div>
                            <div class="wt-dashboardboxcontent">
                                <div class="wt-jobdescription wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.job_desc') }}</h2>
                                    </div>
                                    <div class="wt-formtheme wt-userform wt-userformvtwo">
                                        <fieldset>
                                            <div class="form-group">
                                                {!! Form::text('title', $job->title, array('class' => 'form-control', 'placeholder' => trans('lang.job_title'))) !!}
                                            </div>
                                            <div class="form-group form-group-half wt-formwithlabel">
                                                <span class="wt-select">
                                                        {!! Form::select('project_levels', $project_levels , e($job->project_level)) !!}
                                                    </span>
                                            </div>
                                            {{--<div class="form-group form-group-half wt-formwithlabel">--}}
                                                {{--<span class="wt-select">--}}
                                                    {{--{!! Form::select('job_duration', $job_duration , e($job->duration)) !!}--}}
                                                {{--</span>--}}
                                            {{--</div>--}}
                                            <div class="form-group form-group-half wt-formwithlabel">
                                                <span class="wt-select">
                                                    {!! Form::select('freelancer_type', $freelancer_level_list, e($job->freelancer_type)) !!}
                                                </span>
                                            </div>
                                            <div class="form-group form-group-half wt-formwithlabel">
                                                <span class="wt-select">
                                                    {!! Form::select('english_level', $english_levels, e($job->english_level)) !!}
                                                </span>
                                            </div>
                                            {{--<div class="form-group form-group-half wt-formwithlabel job-cost-input">--}}
                                                {{--{!! Form::text('project_cost', $job->price, array('class' => 'form-control', 'placeholder' => trans('lang.project_cost'))) !!}--}}
                                            {{--</div>--}}
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="wt-jobdetails wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>Avilable days and hours</h2>
                                    </div>
                                    <div class="wt-formtheme wt-userform wt-userformvtwo">
                                        <div class="form-group form-group-half">
                                            <select id="multiselect" class="form-control" name="days_avail[]" data-dbValue="{{$job->days_avail}}" multiple="multiple">
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
                                                <input class="form-control" name="hours_avail" autocomplete="off" value="{{$job->hours_avail}}" type="text">
                                                <span class="input-group-addon" style="">
                                        </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="wt-jobskills wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.job_cats') }}</h2>
                                    </div>
                                    <div class="wt-divtheme wt-userform wt-userformvtwo">
                                        <div class="form-group">
                                            <span class="wt-select">
                                                {!! Form::select('categories[]', $categories, $job->categories, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_job_cats'))) !!}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="wt-jobskills wt-tabsinfo">--}}
                                    {{--<div class="wt-tabscontenttitle">--}}
                                        {{--<h2>{{ trans('lang.langs') }}</h2>--}}
                                    {{--</div>--}}
                                    {{--<div class="wt-divtheme wt-userform wt-userformvtwo">--}}
                                        {{--<div class="form-group">--}}
                                            {{--<span class="wt-select">--}}
                                                {{--{!! Form::select('languages[]', $languages, $job->languages, array('class' => 'chosen-select', 'multiple', 'data-placeholder' => trans('lang.select_lang'))) !!}--}}
                                            {{--</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="wt-jobdetails wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.job_dtl') }}</h2>
                                    </div>
                                    <div class="wt-formtheme wt-userform wt-userformvtwo">
                                        {!! Form::textarea('description', $job->description, ['class' => 'wt-tinymceeditor', 'id' => 'wt-tinymceeditor', 'placeholder'
                                        => trans('lang.job_dtl_note')]) !!}
                                    </div>
                                </div>
                                <div class="wt-jobskills wt-tabsinfo la-jobedit">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.skills_req') }}</h2>
                                    </div>
                                    <div class="la-jobedit-content">
                                        <job_skills :placeholder="'select skills'"></job_skills>
                                    </div>
                                </div>
                                <div class="wt-jobskills wt-tabsinfo la-location-edit">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.your_address') }}</h2>
                                    </div>
                                    <div class="wt-formtheme wt-userform">
                                        <fieldset>
                                            <location-selector latitude="{{ $job->latitude }}" longitude="{{ $job->longitude }}" address="{{ $job->address }}"></location-selector>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="wt-featuredholder wt-tabsinfo">
                                    <div class="wt-tabscontenttitle">
                                        <h2>{{ trans('lang.is_featured') }}</h2>
                                        <div class="wt-rightarea">
                                            <div class="wt-on-off float-right">
                                                <switch_button v-model="is_featured">{{{ trans('lang.make_job_featured') }}}</switch_button>
                                                <input type="hidden" :value="is_featured" name="is_featured">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wt-attachmentsholder">
                                    <div class="lara-attachment-files">
                                        <div class="wt-tabscontenttitle">
                                            <h2>{{ trans('lang.attachments') }}</h2>
                                            <div class="wt-rightarea">
                                                <div class="wt-on-off float-right">
                                                    <switch_button v-model="show_attachments">{{{ trans('lang.attachments_note') }}}</switch_button>
                                                    <input type="hidden" :value="show_attachments" name="show_attachments">
                                                </div>
                                            </div>
                                        </div>
                                        <job_attachments :temp_url="'{{url('job/upload-temp-image')}}'"></job_attachments>
                                        <div class="form-group input-preview">
                                            <ul class="wt-attachfile dropzone-previews">

                                            </ul>
                                        </div>
                                        @if (!empty($attachments))
                                            @php $count = 0; @endphp
                                            <div class="form-group input-preview">
                                                <ul class="wt-attachfile">
                                                    @foreach ($attachments as $key => $attachment)
                                                        <li id="attachment-item-{{$key}}">
                                                            <span>{{{Helper::formateFileName($attachment)}}}</span>
                                                            <em>
                                                                @if (Storage::disk('local')->exists('uploads/jobs/'.$job->user_id.'/'.$attachment))
                                                                    {{ trans('lang.file_size') }} {{{Helper::bytesToHuman(Storage::size('uploads/jobs/'.$job->user_id.'/'.$attachment))}}}
                                                                @endif
                                                                <a href="{{{route('getfile', ['type'=>'jobs','attachment'=>$attachment,'id'=>$job->user_id])}}}"><i class="lnr lnr-download"></i></a>
                                                                <a href="#" v-on:click.prevent="deleteAttachment('attachment-item-{{$key}}')"><i class="lnr lnr-cross"></i></a>
                                                            </em>
                                                            <input type="hidden" value="{{{$attachment}}}" class="" name="attachments[{{$key}}]">
                                                        </li>
                                                        @php $count++; @endphp
                                                    @endforeach
                                                    <div class="dropzone-previews"></div>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wt-updatall">
                            <i class="ti-announcement"></i>
                            <span>{{{ trans('lang.save_changes_note') }}}</span> {!! Form::submit(trans('lang.btn_save_update'), ['class' => 'wt-btn',
                            'id'=>'submit-profile']) !!}
                        </div>
                    {!! form::close(); !!}
                </div>
            </div>
        </div>
    </div>
@endsection
