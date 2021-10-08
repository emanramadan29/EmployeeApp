@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">
                @can('Add_Role')
                <div class="box-header with-border">
                    <a href="{{route('role/create')}}" type="button" class="btn btn-info pull-right">Add Role</a>
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

                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name}}</td>
                                <td>
                                    @can('Edit_Role')
                                    <a href="{{route('role/edit',[$role['id']])}}" type="button" class="btn btn-info">Edit</a>
                                   @endcan
                                    @can('Delete_Role')
                                    <a class="btn">
                                        <form action="{{route('role/delete',[$role['id']])}}" method="post" >
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

                    {!! $roles->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
