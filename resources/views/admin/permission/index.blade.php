@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">
                @can('Add_Permission')
                <div class="box-header with-border">
                    <a href="{{route('permission/create')}}" type="button" class="btn btn-info pull-right">Add Permission</a>
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

                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $permission->name}}</td>
                                <td>
                                    @can('Edit_Permission')
                                    <a href="{{route('permission/edit',[$permission['id']])}}" type="button" class="btn btn-info">Edit</a>
                                   @endcan
                                    @can('Delete_Permission')
                                    <a class="btn">
                                        <form action="{{route('permission/delete',[$permission['id']])}}" method="post" >
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

                    {!! $permissions->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
