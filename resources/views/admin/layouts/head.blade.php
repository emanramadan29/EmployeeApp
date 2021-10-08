
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('sitetitle')</title>
  <!-- Favicon  -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico')}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{-- @if(LaravelLocalization::getCurrentLocaleDirection() == 'en' ) --}}
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin/components/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/components/dataTables.bootstrap.min.css')}}">
  @if(App::getLocale() == 'en')
  @else
    <link rel="stylesheet" href="{{ asset('admin/RTL/bootstrap-rtl.min.css')}}">
  @endif

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('admin/components/Ionicons/css/ionicons.min.css')}}">

  @if(App::getLocale() == 'en')
  <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/components/distlte/css/AdminLTE.min.css')}}">
  @else
    <link rel="stylesheet" href="{{ asset('admin/RTL/AdminLTE-rtl.min.css')}}">
  @endif

  @if(App::getLocale() == 'en')
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/components/distlte/css/skins/_all-skins.min.css')}}">
  @else
    <link rel="stylesheet" href="{{ asset('admin/RTL/_all-skins-rtl.min.css')}}">
  @endif

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  @yield('css')

@if(App::getLocale() == 'en')
  
  @else
    <style>
      body {
            font-family: 'Cairo','Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
          }
    </style>
  @endif
    
</head>
