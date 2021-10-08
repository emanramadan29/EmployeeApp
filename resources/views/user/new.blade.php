@extends('admin.layouts.app')
@section('title', __('lang.users'))
@section('sitetitle', __('lang.users'))
@section('users', 'active ')

@section('content')


<!-- Main content -->
<section class="content">
    <!-- COLOR PALETTE -->
    <div class="box box-default color-palette-box">

        <div class="box-body">
            <div class="row">
                <div class="box-body">

                    <div class="col-lg-12">
                        {!! Form::open(array('route'=>'users/store','files'=>true)) !!}

                        @include('user._form')
                            <!-- Submit Form Button -->
                            {!! Form::submit(('Add'), ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</section>

@endsection
