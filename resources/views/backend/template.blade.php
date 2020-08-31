<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Admin | @yield('ttitle')</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

        <!-- DataTables -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


        
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


        <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/jqvmap/jqvmap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.css">

        <link rel="stylesheet" href="{{asset('public/backend')}}/plugins/toastr/toastr.min.css">

        <script src="{{asset('public/backend')}}/plugins/jquery/jquery.min.js"></script>

        <!-- Select2 -->
        <script src="{{asset('public/backend')}}/plugins/select2/js/select2.full.min.js"></script>

        {{-- sweet alert css and js --}}
        <script src="{{asset('public/backend')}}/sweetalert/sweetalert.js"></script>

        <link rel="stylesheet" type="text/css" href="{{asset('public/backend')}}/sweetalert/sweetalert.css">

    </head>
    <body>
        <div class="container_12">
            @include('backend/header')
            @include('backend/sidebar')
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <!-- <h1 class="m-0 text-dark">@yield('title')</h1> -->
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                    </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
            
            @yield('content')
            </div>
            
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2020 
                    <a href="https://adminlte.io">AdminLTE.io</a>.
                </strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 3.1.0-pre
                </div>
            </footer>
        
   
    <!-- jQuery -->
    
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('public/backend')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>


        <!-- Bootstrap 4 -->
        <script src="{{asset('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


        <!-- ChartJS -->
        <script src="{{asset('public/backend')}}/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="{{asset('public/backend')}}/plugins/sparklines/sparkline.js"></script>


        <!-- JQVMap -->
        <script src="{{asset('public/backend')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>


        <!-- jQuery Knob Chart -->
        <script src="{{asset('public/backend')}}/plugins/jquery-knob/jquery.knob.min.js"></script>


        <!-- daterangepicker -->
        <script src="{{asset('public/backend')}}/plugins/moment/moment.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/daterangepicker/daterangepicker.js"></script>


        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('public/backend')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>


        <!-- Summernote -->
        <script src="{{asset('public/backend')}}/plugins/summernote/summernote-bs4.min.js"></script>
        <script>
            $(function () {
                // Summernote
                $('.textarea').summernote()
            })
        </script>

        
        <!-- overlayScrollbars -->
        <script src="{{asset('public/backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>


        <!-- DataTables -->
        <script src="{{asset('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        
        <!-- custom file input -->

        <script src="{{asset('public/backend')}}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


        <!-- jquery-validation -->
        <script src="{{asset('public/backend')}}/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="{{asset('public/backend')}}/plugins/jquery-validation/additional-methods.min.js"></script>


        <!-- AdminLTE App -->
        <script src="{{asset('public/backend')}}/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('public/backend')}}/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('public/backend')}}/dist/js/demo.js"></script>



        {{-- sweet alert --}}

        <script>
            $(document).ready(function(){
                $(document).on('click', '#approve', function(){
                    var actionTo = $(this).attr('href');
                    var token = $(this).attr('data-token');
                    var id = $(this).attr('data-id');
                    swal({
                        title: "Are you sure, to approve this order?",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'Yes',
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            $.ajax({
                                url:actionTo,
                                type: 'post',
                                data: {id:id, _token:token},
                                success: function(data){
                                    swal({
                                        title: "Approved",
                                        type: "success",
                                    },
                                    function(isConfirm){
                                        if(isConfirm){
                                            $('.' + id).fadeOut();
                                        }
                                    });
                                }
                            });
                        }else{
                            swal("Canceled", "", "error");
                        }
                    });
                    return false;
                });
            });
        </script>

        {{-- sweet alert --}}
        

        <!-- toastr Messages are shown -->
        <script src="{{asset('public/backend/plugins/toastr.min.js')}}" type="text/javascript"></script>
        <script>
            @if(Session::has('message'))
                var type="{{ Session::get('alert-type','info') }}"
                switch(type){
                    case 'info':
                        toastr.info("{{Session::get('message')}}");
                        break;
                    case 'success':
                        toastr.success("{{Session::get('message')}}");
                        break;
                    case 'warning':
                        toastr.warning("{{Session::get('message')}}");
                        break;
                    case 'error':
                        toastr.error("{{Session::get('message')}}");
                        break;
                }
            @endif
        </script>

    <!-- toastr Messages are shown -->

        
    <!-- On Page Image Show -->
        <script type="text/javascript">
            $(document).ready(function(){
                $('#image').change(function(e){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#showimage').attr('src',e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });

        </script>

    <!-- On Page Image Show -->

    <script>
        $(function () {
            $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            });
            $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            });
        });
    </script>
    
    </body>
</html>
