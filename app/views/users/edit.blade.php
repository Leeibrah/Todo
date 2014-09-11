@extends('layouts.fundi')

@section('css')
        {{ HTML::style('/bootstrap/3.0.2/css/bootstrap.min.css') }}
        {{ HTML::style('assets/css/index.css') }}
        {{ HTML::style('assets/css/dashboard.css') }}
        {{ HTML::style(All::b().'assets/bootstrap-fileupload/bootstrap-fileupload.css') }}

@stop

@section('js')
    {{ HTML::script('js/jquery-1.10.2.min.js') }}
    {{ HTML::script(All::b().'assets/bootstrap-fileupload/bootstrap-fileupload.js') }}
    <!-- {{ HTML::script('js/jquery-1.10.2.min.js') }} -->
    
@stop

@section('main')



        <div class="mainsection">
            
            @include('partials.sidebar')

                

           <div id="dashboard_panels" style="float:left;">
                <h3>Edit User</h3>
                <!-- {{ Form::model($user, array('method' => 'put', 'route' => array('users.update', $user->id))) }} -->
                {{ Form::model($user, array('method' => 'put', 'route' => array('users.update', $user->id), 
                'files' => true, 'enctype' => 'multipart/form-data')) }}
                    <span class="pull-right">
                        {{-- Request::path() --}}
                        {{-- All::getDeleteLink($user) --}}

                        {{ link_to_route('change-email', 'Change Email', null, array('class' => 'btn btn-sm btn-primary')) }}
                        {{ link_to_route('change-password', 'Change Password', null, array('class' => 'btn btn-sm btn-primary')) }}
                    </span>
                    <ul>
                        <li>
                            {{ Form::label('firs_tname', 'Firstname:') }}
                            {{ Form::text('first_name') }}
                        </li>

                        <li>
                            {{ Form::label('last_name', 'Lastname:') }}
                            {{ Form::text('last_name') }}
                        </li>

                        <li>
                            <label class="control-label col-sm-12">* User Photo (200x200): </label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail">
                                <img src="{{ Input::old('image', All::getUpload($user, 'image')) }}" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail"></div>
                                <div>
                                 <span class="btn btn-white btn-file">
                                 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                 {{ Form::file('image', null, array('id' => 'image', 'class' => 'form-control', 'placeholder' => 'Image')) }}
                                 </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </li> 
                        <!-- <li>
                            {{ Form::label('image', 'Profile Picture:') }}
                            {{ Form::file('image', null, array('id' => 'image', 'class' => 'form-control', 'placeholder' => 'Image')) }}
                        </li> -->
                        <!-- <li>
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::text('email') }}
                        </li>

                        <li>
                            {{ Form::label('password', 'Password:') }}
                            {{ Form::text('password') }}
                        </li>

                        <li>
                            {{ Form::label('permissions', 'Permissions:') }}
                            {{ Form::text('permissions') }}
                        </li>

                        <li>
                            {{ Form::label('activated', 'Activated:') }}
                            {{ Form::checkbox('activated') }}
                        </li>

                        <li>
                            {{ Form::label('activation_code', 'Activation_code:') }}
                            {{ Form::text('activation_code') }}
                        </li>

                        <li>
                            {{ Form::label('last_login', 'Last_login:') }}
                            {{ Form::text('last_login') }}
                        </li>

                        <li>
                            {{ Form::label('reset_password', 'Reset_password:') }}
                            {{ Form::text('reset_password') }}
                        </li> -->
                        
                        <li>
                            {{ Form::label('phone', 'Phone:') }}
                            {{ Form::text('phone') }}
                        </li>
                        @if(Sentry::getUser()->hasAccess('user'))
                        <li>
                            <label class="control-label col-sm-12">* Business Logo (200x200): </label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail">
                                <img src="{{ Input::old('logo', '/uploads/businesses/logo/no_logo.png') }}" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail"></div>
                                <div>
                                 <span class="btn btn-white btn-file">
                                 <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select logo</span>
                                 <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                 {{ Form::file('image', null, array('id' => 'logo', 'class' => 'form-control', 'placeholder' => 'Logo')) }}
                                 </span>
                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </li> 
                        <li>
                            {{ Form::label('services', 'Services:') }}
                            {{ Form::text('services', null, array('class' => 'form-control', 'placeholder' => 'Add services you offer separated by a comma. eg Electronics, Plumbing')) }}
                        </li>

                        <li>
                            {{ Form::label('address', 'Address:') }}
                            {{ Form::text('address', null, array('class' => 'form-control', 'placeholder' => 'eg. Viewpark Towers, Utalii Lane, Nairobi')) }}
                        </li>

                        <li>
                            {{ Form::label('about', 'About:') }}
                            {{ Form::textarea('about', null, array('class' => 'form-control', 'placeholder' => 'About yourself...')) }}
                        </li>
                        @endif

                        <!-- <li>
                            {{ Form::label('location', 'Location:') }}
                            {{ Form::select('county', All::getCounties(), null, array('class'=>'form-control', 'id'=>'counties')) }}
                        </li> -->
                       <!--  <li>
                            {{ Form::label('public', 'Public:') }}
                            {{ Form::checkbox('public') }}
                        </li>

                        <li>
                            {{ Form::label('views', 'Views:') }}
                            {{ Form::checkbox('views') }}
                        </li>

                        <li>
                            {{ Form::label('status', 'Status:') }}
                            {{ Form::text('status') }}
                        </li>
 -->
                        <li>
                            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
                            {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
                        </li>
                    </ul>
                {{ Form::close() }}

                @if ($errors->any())
                    <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                @endif   

           </div> <!-- Dashboard panels -->

        </div>
            

@stop