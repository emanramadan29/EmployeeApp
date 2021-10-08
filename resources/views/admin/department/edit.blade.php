@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">Upate Department</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{route('dept/update',[$department['id']])}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="Put">
                    {{ csrf_field() }}

                    @csrf
                    <div class="form-group col-lg-12 {{ $errors->has('Name') ? ' has-error' : '' }}">
                        <label for="Name">Name</label>
                        <input type="text" id="Name" name="name" class="form-control" value="{{$department->name}}" />
                        <span class="help-block">{{ $errors->first('Name', ':message') }}</span>
                    </div>

                    <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="{{route('dept')}}" class="btn btn-block btn-danger" permission="button">Cancel</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-primary">update</button>
                        </div>
                    </div>

            </form>
        </div>
        </div>
    </section>
@endsection
