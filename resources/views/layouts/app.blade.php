<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.min.css') }}">

  @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        
        
        <!-- Main Sidebar Container -->
        @include('parials.navbar')
        @include('parials.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{ $slot }}
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> --}}
  <!-- /.control-sidebar -->

        @include('parials.footer')
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>

@livewireScripts
<script>
  $(document).ready(function(){
    toastr.options = {
      "progressBar": true,
      "positionClass": "toast-bottom-right",
    }

  })

  window.addEventListener('hide-form', event => {
    $('#form').modal('hide');
    toastr.success(event.detail.message, 'Success');
  })
</script>
<script>
  window.addEventListener('show-form', event => {
    $('#form').modal('show');
  })
  window.addEventListener('show-delete-confrmation', event => {
    $('#deleteModal').modal('show');
  })
  window.addEventListener('hide-delete-confrmation', event => {
    $('#deleteModal').modal('hide');
    toastr.success(event.detail.message, 'Success');
  })



</script>
</body>
</html>
