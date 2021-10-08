@extends('admin.layouts.app')
@section('title', __('lang.users'))
@section('sitetitle', __('lang.users'))
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @lang('lang.Edit') 
    </h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> @lang('lang.Home')</a></li>
        <li class="active">@lang('lang.Edit')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div id="flash-msg">
    </div>
    @include('messages')
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">
        
        <div class="box-body">
            <div class="row">
                <div class="box-body">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">

                                <form role="form" method="POST" action="{{url(LaravelLocalization::getCurrentLocale().'/profile/update')}}"
                                    enctype="multipart/form-data" class="form-horizontal form-groups-bordered">
                                    <div class="modal-body">
                                        @csrf

                                        <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}"  autofocus type="email" placeholder="@lang('lang.email')">
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                            @if ($errors->has('email'))
                                                <span class="help-block ">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" value=""  autofocus type="password" placeholder="@lang('lang.password')">
                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                            @if ($errors->has('password'))
                                                <span class="help-block ">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">@lang('lang.Update')</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

@endsection