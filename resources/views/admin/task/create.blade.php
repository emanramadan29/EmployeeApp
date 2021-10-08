@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box box-default color-palette-box ">
            <div class="box-header with-border">
                <h3 class="box-title">Task</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form method="POST" action="{{route('task/store')}}"  enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group col-lg-6">
                        <label  for="filter">Employee</label>
                        <select id="filter" name="employee_id" class="form-control" style="height: 46px; width: 70%">
                            @foreach ($employees as $emp)
                                    <option value="{{ $emp->id }}" >{{ $emp->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-lg-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="name">Title</label>
                        <input type="text" id="name" name="title" class="form-control" value="{!! old('title') !!}" />
                        <span class="help-block">{{ $errors->first('title', ':message') }}</span>
                    </div>


                    <div class="form-group col-lg-12 {{ $errors->has('description') ? ' has-error' : '' }}">
                        <label for="name">Description</label>
                        <textarea type="text" id="email" name="description" class="form-control" value="{!! old('description') !!}"></textarea>
                        <span class="help-block">{{ $errors->first('description', ':message') }}</span>
                    </div>
        <hr>
                    <div class="form-group center">
                        <div class="col-md-offset-2 col-md-4">
                            <a href="{{route('task')}}" class="btn btn-block btn-danger" permission="button">Cancel</a>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-block btn-primary">Add</button>
                        </div>
                    </div>
            </form>
        </div>
        </div>
    </section>
@endsection
