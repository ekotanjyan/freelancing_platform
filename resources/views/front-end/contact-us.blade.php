@extends(file_exists(resource_path('views/extend/front-end/master.blade.php')) ? 'extend.front-end.master' : 'front-end.master', ['needShortFooterCards' => true] )
@section('content')
    <div class="container">
        <div class="wt-main-section wt-haslayout wt-forgotpassword-holder">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                    <div class="card">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{!! implode('</p><p>', \Session::get('success')) !!}</p>
                            </div>
                        @endif
                        <div class="card-header"><a href="{{ url('contact-us') }}">CONTACT US</a></div>
                        <div class="card-body">
                            {!! Form::open(['url' => url('contact-us'), 'class' =>'wt-formtheme wt-userform'])!!}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'id' => 'name', 'required']) !!}
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="subject" class="col-md-4 col-form-label text-md-right">Subject</label>
                                <div class="col-md-6">
                                    {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject', 'id' => 'subject', 'required']) !!}
                                    @if ($errors->has('subject'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('subject') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email', 'required']) !!}
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                                <div class="col-md-6">
                                    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message', 'id' => 'message', 'required']) !!}
                                    @if ($errors->has('message'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary wt-btn">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
