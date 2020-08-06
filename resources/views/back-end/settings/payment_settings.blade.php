@extends(file_exists(resource_path('views/extend/back-end/master.blade.php')) ? 'extend.back-end.master' : 'back-end.master')
@section('content')
<?php
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
?>
    <div class="wt-haslayout wt-email-notification-settings wt-dbsectionspace" id="profile_settings">
        @if (Session::has('message'))
            <div class="flash_msg">
                <flash_messages :message_class="'success'" :time ='5' :message="'{{{ Session::get('message') }}}'" v-cloak></flash_messages>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                <div class="wt-dashboardbox wt-dashboardtabsholder wt-accountsettingholder">
                    @if (file_exists(resource_path('views/extend/back-end/settings/tabs.blade.php'))) 
                        @include('extend.back-end.settings.tabs')
                    @else 
                        @include('back-end.settings.tabs')
                    @endif
                    <div class="wt-tabscontent tab-content">
                        <div class="wt-emailnotiholder" id="wt-emailnoti">
                            <div class="wt-emailnoti">
                                <div class="wt-tabscontenttitle">
                                    <h2>Payment settings</h2>
                                </div>
                                <div class="wt-settingscontent">
                                    <div class="wt-description">
                                        <p>Check your payment options</p>
                                    </div>
                                    {!! Form::open(['url' => url('profile/settings/save-payment-settings'), 'class' =>'wt-formtheme wt-userform', 'id'=>'notifications'])!!}
                                        <fieldset>
                                            <div class="form-group">
                                                @if($user->user_role->name == 'employer')
                                                <label>Choosen subscription</label>
                                                {!! Form::select('plan_id', $subscribe_options, $user->plan_id, array('placeholder' => "Select subscription ", 'class' => 'form-group')) !!}
                                                <br>
                                                @endif
                                                <label>Choosen Payment Option</label>

                                                {!! Form::select('payment_option', $payment_options, $user->payment_option, array('placeholder' => "Select Payment Option", 'class' => 'form-group')) !!}

                                                <?php
                                                switch($user->payment_option){
                                                    case('Paypal'):?>
                                                    <br><label>Paypal address</label>

                                                    <input type="email" name="paypal" class="form-control" placeholder="Paypal email address"  value="{{{$user->paypal}}}" disabled/>
                                                    <?php break;

                                                    case('BACS'): ?>
                                                    @if(!empty($user->profile->p60))
                                                    <a href="{{{url('uploads/p60/'.$user->profile->p60)}}}" target="_blank">Open P60 form</a>
                                                    @endif

                                                    <?php break;

                                                    case('Cheque'): ?>
                                                    <br><label>Cheque address</label>
                                                    <input type="text" name="cheque" class="form-control" placeholder="Your current address details will be used" value="{{{$user->cheque}}}" disabled>
                                                    <?php break;
                                                }?>
                                                @if(!empty($user->limitied_company_number))
                                                    <br><label>Limited Company number</label>

                                                    <input type="text" name="limitied_company_number"
                                                       class="form-control" placeholder="Limited Company Number " value="{{{$user->limitied_company_number}}}" disabled>
                                                @endif

                                            </div>
                                        </fieldset>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
