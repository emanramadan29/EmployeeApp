@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">
                @can('Add_Department')
                <div class="box-header with-border">
                    <a href="{{route('dept/create')}}" type="button" class="btn btn-info pull-right">Add Department</a>
                </div>
                @endcan
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="#example1" class="table table-bordered table-hover text-center">

                        <tbody>
                        <tr>
                            <th >ID</th>
                            <th >Name</th>
                        </tr>

                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->name}}</td>
                                <td>
                                    @can('Edit_Department')
                                    <a href="{{route('dept/edit',[$department['id']])}}" type="button" class="btn btn-info">Edit</a>
                                   @endcan
                                    @can('Delete_Department')
                                    <a class="btn">
                                        <form action="{{route('dept/delete',[$department['id']])}}" method="post" >
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

                    {!! $departments->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
