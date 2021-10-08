@extends('admin.layouts.app')
@section('name',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-name">Upate Employee</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <form method="POST"  action="{{route('emp/update',[$employee['id']])}}" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="Put">
                    {{ csrf_field() }}

                    @csrf
                    <div class="form-group col-lg-6">
                        <label  for="filter">Department</label>
                        <select id="filter" name="department_id" class="form-control" style="height: 46px; width: 70%">
                            @foreach ($departments as $dept)
                                <option {{$dept->id=="$employee->department_id" ? "selected" : ""}} value="{{ $dept->id }}" >{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12 {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$employee->name}}" />
                        <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                    </div>


                    <div class="form-group col-lg-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="name">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$employee->email}}" />
                        <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                    </div>

                    <div class="form-group col-lg-12 {{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label for="name">Phone</label>
                        <input type="text" id="email" name="phone" class="form-control" value="{{$employee->phone}}" />
                        <span class="help-block">{{ $errors->first('phone', ':message') }}</span>
                    </div>
                    <hr>

                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="{{route('emp')}}" class="btn btn-block btn-danger" permission="button">Cancel</a>
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
