@extends('admin.layouts.app')
@section('title', __('lang.roles'))
@section('sitetitle', __('lang.roles'))
@section('roles', 'active ')
@section('css')
@endsection

@section('content')

<!-- Main content -->
@section('content')
    <section class="content">
    {{--    @include('messages')--}}
    <!-- COLOR PALETTE -->
        <div class="box box-default color-palette-box">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-solid">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-group" id="accordion">
                                @foreach ($roles as $role)

                                    {!! Form::model($role, ['method' => 'PUT', 'route' => ['rolePer/update',  $role->id ], 'class' => 'm-b']) !!}

                                    @include('shared._permissions', [
                                                'title' => $role->name .' Permissions',
                                                'model' => $role ])

                                    @can('Add_Role')
                                        <br>
                                        {!! Form::submit(('Save'), ['class' => 'btn btn-primary']) !!}
                                    @endcan
                                    {!! Form::close() !!}
                                    <br>
                                    <hr>
                                @endforeach

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>


@endsection

<!-- Modal -->

