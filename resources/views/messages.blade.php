@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-2x fa-exclamation-circle"></i> Error</h4>
       {{$error}}
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert alert-success alert-dismissible" style="    background-color: #96beb4 !important;
    text-align: center;">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
     {{session('success')}}
  </div>
@endif
