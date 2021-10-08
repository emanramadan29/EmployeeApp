@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">
                @can('Add_Employee')
                <div class="box-header with-border">
                    <a href="{{route('emp/create')}}" type="button" class="btn btn-info pull-right">Add Employee</a>
                </div>
                @endcan
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="#example1" class="table table-bordered table-hover text-center">

                        <tbody>
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                            <th >Email</th>
                            <th >Phone</th>
                            <th >Department</th>
                        </tr>

                        @foreach($employees as $employee)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $employee->name}}</td>
                                <td>{{ $employee->email}}</td>
                                <td>{{ $employee->phone}}</td>
                                <td>{{ $employee->dept->name}}</td>
                                <td>
                                    @can('Edit_Employee')
                                    <a href="{{route('emp/edit',[$employee['id']])}}" type="button" class="btn btn-info">Edit</a>
                                   @endcan
                                    @can('Delete_Employee')
                                    <a class="btn">
                                        <form action="{{route('emp/delete',[$employee['id']])}}" method="post" >
                                            @csrf @method('delete')
                                            <button  type="submit" class="btn btn-danger">Delete</button >

                                        </form>
                                   </a>
                                        @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {!! $employees->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
