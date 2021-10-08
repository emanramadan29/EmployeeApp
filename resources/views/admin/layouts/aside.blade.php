<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">@lang('lang.dashboard')</li>

            @can(['Add_Role','Edit_Role','Delete_Role'])
            <li class="@yield('roles')"><a href="{{route('role')}}">
                    <i class="fa fa-key"></i> Role</a>
            </li>
            @endcan

            @can(['Add_Permission','Edit_Permission','Delete_Permission'])
            <li class="@yield('permissions')"><a href="{{route('permission')}}">
                    <i class="fa fa-key"></i> Permission</a>
            </li>
            @endcan

            @can(['Add_Role','Edit_Role','Delete_Role','Add_Permission','Edit_Permission','Delete_Permission'])
            <li class="@yield('permissions')"><a href="{{route('rolePer')}}">
                    <i class="fa fa-key"></i> Role Has Permission</a>
            </li>
            @endcan

            @can(['Add_Department','Edit_Department','Delete_Department'])
            <li class="@yield('permissions')"><a href="{{route('dept')}}">
                    <i class="fa fa-key"></i>Departments</a>
            </li>
            @endcan

            @can(['Add_Employee','Edit_Employee','Delete_Employee'])
            <li class="@yield('emp')"><a href="{{route('emp')}}">
                    <i class="fa fa-key"></i>Employees</a>
            </li>
            @endcan

            @can(['Add_Task','Edit_Task','Delete_Task'])
            <li class="@yield('task')"><a href="{{route('task')}}">
                    <i class="fa fa-key"></i>Tasks</a>
            </li>
            @endcan

            @can(['Add_Users','Edit_Users','Delete_Users'])
            <li class="@yield('task')"><a href="{{route('users')}}">
                    <i class="fa fa-key"></i>Users</a>
            </li>
            @endcan

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

