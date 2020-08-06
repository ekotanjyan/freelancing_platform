<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.profile_photo') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($avater))
            @php $image = '/uploads/users/'.Auth::user()->id.'/'.$avater; @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.uploaded_image">
                    <upload-image
                        :id="'avater_id'"
                        :img_ref="'avater_ref'"
                        :url="'{{url('freelancer/upload-temp-image')}}'"
                        :name="'hidden_avater_image'"
                        >
                    </upload-image>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure><img src="{{{asset($image)}}}" alt="{{{ trans('lang.profile_photo') }}}"></figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$avater}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeImage('hidden_avater')"></a></em>
                    </div>
                </div>
                <input type="hidden" name="hidden_avater_image" id="hidden_avater" value="{{{$avater}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image
                    :id="'avater_id'"
                    :img_ref="'avater_ref'"
                    :url="'{{url('freelancer/upload-temp-image')}}'"
                    :name="'hidden_avater_image'"
                    >
                </upload-image>
                <input type="hidden" name="hidden_avater_image" id="hidden_avater">
            </div>
        @endif
    </div>
</div>

<div class="wt-location wt-tabsinfo">
    <div class="wt-tabscontenttitle">
        <h2>{{{ trans('lang.profile_cv') }}}</h2>
    </div>
    <div class="wt-settingscontent">
        @if (!empty($cv))
            @php
                $image = '/uploads/cvs/'.$cv;
                $cv_ext = end($cv_ext);
            @endphp
            <div class="wt-formtheme wt-userform">
                <div v-if="this.uploaded_cv">
                    <upload-image-cv
                            :id="'cv'"
                            :img_ref="'cv_ref'"
                            :url="'{{url('freelancer/upload-temp-image')}}'"
                            :name="'hidden_cv_image'"
                    >
                    </upload-image-cv>
                </div>
                <div class="wt-uploadingbox" v-else>
                    <figure>
                        @if($cv_ext=='pdf' || $cv_ext=='doc' || $cv_ext=='docx')
                            <a href="{{url($image)}}" target="_blank">
                                <img src="{{ asset('images/save-1.png') }}" alt="{{{ trans('lang.profile_cv') }}}">
                                Click To open
                            </a>
                        @else
                            <img src="{{{asset($image)}}}" alt="{{{ trans('lang.profile_cv') }}}">
                        @endif
                    </figure>
                    <div class="wt-uploadingbar">
                        <div class="dz-filename">{{{$cv}}}</div>
                        <em>{{{ trans('lang.file_size') }}}<a href="javascript:void(0);" class="lnr lnr-cross" v-on:click.prevent="removeCv('hidden_cv')"></a></em>
                    </div>
                </div>
                <input type="hidden"  type="file" name="hidden_cv_image" id="hidden_cv" accept=".pdf, image/*,.doc,.docx" value="{{{$cv}}}">
            </div>
        @else
            <div class="wt-formtheme wt-userform">
                <upload-image-cv
                        :id="'cv_id'"
                        :img_ref="'cv_ref'"
                        :url="'{{url('freelancer/upload-temp-image')}}'"
                        :name="'hidden_cv_image'"
                >
                </upload-image-cv>
                <input type="hidden" name="hidden_cv_image" id="hidden_cv">
            </div>
        @endif
    </div>
</div>