@extends('admin.layouts.app')
@section('title', __('lang.users'))
@section('sitetitle', __('lang.users'))
@section('users', 'active ')
@section('content')

<section class="content">
    <div class="box box-default color-palette-box">
        <div class="box-body">
            <div class="row">
            <div class="box-header">
                <h3 class="box-title">
                </h3>
                <div class="box-tools pull-right">
                    @can('Add_Users')
                        <a href="{{ route('users/create') }}" class="btn btn-primary">Add Users</a>
                    @endcan
                </div>
            </div>
                <div class="box-body">
                    <table class="table table-bordered text-center table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 3%">ID</th>
                                <th style="width: 15%">Name</th>
                                <th style="width: 15%">Email</th>
                                <th style="width: 15%">Roles</th>
                                <th style="width: 15%">Created</th>
                                <th style="width: 20%"></th>
                            </tr>
                            @if(count($result) > 0)
                                @foreach($result as $item)
                                    <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{ $item->roles->implode('name', ', ') }}</td>
                                    <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                        @can('Edit_Users')
                                        <td class="text-center">
                                            @include('shared._actions', [
                                                'entity' => 'users',
                                                'id' => $item->id
                                            ])
                                        </td>
                                    @endcan
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="box-footer clearfix">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
