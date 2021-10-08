@extends('admin.layouts.app')
@section('title', __('lang.users'))
@section('sitetitle', __('lang.users'))
@section('users', 'active ')


@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Edit</h1>
    <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Users</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">

        <div class="box-body">
            <div class="row">
                <div class="box-body">

                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                {!! Form::model($user, ['method' => 'PUT','files'=>true, 'route' => ['users/update',  $user->id ] ]) !!}

                                @include('user._form')
                                    <!-- Submit Form Button -->
                                    {!! Form::submit(__('lang.Save'), ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
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
