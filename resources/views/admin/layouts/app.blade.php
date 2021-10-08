@if(Auth::check())
{{--@if (Auth::user()->isSuperAdmin() OR Auth::user()->isAdmin() OR Auth::user()->isManager() )--}}
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

@include('admin.layouts.head')

<body class="hold-transition skin-yellow sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  {{-- header --}}

  @include('admin.layouts.header')

  <!-- =============================================== -->

  {{-- sidebar --}}

  @include('admin.layouts.aside')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
{{--    <section class="content-header">--}}
{{--      <h1>--}}
{{--        @yield('title')--}}
{{--        --}}{{-- <small>it all starts here</small> --}}
{{--      </h1>--}}
{{--      <ol class="breadcrumb">--}}
{{--        <li><a href="/home"><i class="fa fa-dashboard"></i> @lang('lang.Dashboard') </a></li>--}}
{{--        <li><a href="/home">@lang('lang.Admin')</a></li>--}}
{{--        <li class="active"> @yield('title')</li>--}}
{{--      </ol>--}}
{{--    </section>--}}
{{--    <div class="pad no-print">--}}
{{--       @include('messages')--}}
{{--    </div>--}}

    @yield('content')

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Development by <b><a href="" target="_blank">Employee App</a></b>
    </div>
    <strong>Copyright &copy; 2021 <a href="/">Employee App</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('admin/components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin/components/dist/js/bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
<script src="{{ asset('admin/components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin/components/fastclick/lib/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/components/distlte/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/components/distlte/js/demo.js')}}"></script>
<script src="{{ asset('admin/components/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('admin/components/jquery.dataTables.min.js')}}"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>

    @yield('js')

</body>

@endif
{{--@endif--}}

</html>
