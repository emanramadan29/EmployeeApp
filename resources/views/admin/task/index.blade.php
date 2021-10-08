@extends('admin.layouts.app')
@section('title',__('lang.Home'))
@section('sitetitle',__('lang.Home'))


@section('content')
    <section class="content">
        <div class="box-default color-palette-box">
            <div class="box">
                @can('Add_Task')
                <div class="box-header with-border">
                    <a href="{{route('task/create')}}" type="button" class="btn btn-info pull-right">Add Task</a>
                </div>
                @endcan
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="#example1" class="table table-bordered table-hover text-center">

                        <tbody>
                        <tr>
                            <th >ID</th>
                            <th >title</th>
                            <th >employee</th>
                        </tr>

                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title}}</td>
                                <td>{{ $task->emp->name}}</td>
                                <td>
                                    @can('Edit_Task')
                                    <a href="{{route('task/edit',[$task['id']])}}" type="button" class="btn btn-info">Edit</a>
                                   @endcan
                                    @can('Delete_Task')
                                    <a class="btn">
                                        <form action="{{route('task/delete',[$task['id']])}}" method="post" >
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

                    {!! $tasks->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
@endsection
