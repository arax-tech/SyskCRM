<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>
    
    <!-- FAVICONS ICON -->
    <link rel="stylesheet" href="{{ asset('backend/vendor/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendor/nouislider/nouislider.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('backend/vendor/datatables/css/jquery.dataTables.min.css') }}">
    
    <!-- Style css -->
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="{{ asset('/backend/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') }}">


    
    <!-- Daterange picker -->
    <link href="{{ asset('/backend/vendor/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{ asset('/backend/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{ asset('/backend/vendor/jquery-asColorPicker/css/asColorPicker.min.css') }}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{ asset('/backend/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
    
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ asset('/backend/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('/backend/vendor/pickadate/themes/default.date.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('backend/vendor/jquery-nice-select/css/nice-select.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
    <style type="text/css">
        .previous {overflow:hidden !important;}
        table.dataTable thead th{
            padding: 9px !important
        }
    </style>
    
    @yield('css')
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="main-wrapper">

        
        

        <!--**********************************
            Header start
        ***********************************-->
        @include('agent.layouts.include.header')
        <!--**********************************
            Header end
        ***********************************-->


        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('agent.layouts.include.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
        




        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->
        


        
        <!--**********************************
            Footer start
        ***********************************-->
        @include('agent.layouts.include.footer')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>


    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    
    <!-- Apex Chart -->
    <script src="{{ asset('backend/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('backend/js/dlabnav-init.js') }}"></script>
    
    <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    
    <!-- Chart piety plugin files -->
    <script src="{{ asset('backend/vendor/peity/jquery.peity.min.js') }}"></script>
    <!-- Dashboard 1 -->
    
    <script src="{{ asset('backend/vendor/owl-carousel/owl.carousel.js') }}"></script>
    
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('backend/js/demo.js') }}"></script>
    


    <!-- Datatable -->
    <script src="{{ asset('backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init/datatables.init.js') }}"></script>


    <script src="{{ asset('backend/vendor/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>

    <script src="{{ asset('/toaster/dist/tata.js') }}"></script>


   
    <script src="{{ asset('backend/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- clockpicker -->
    <script src="{{ asset('backend/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <!-- asColorPicker -->
    <script src="{{ asset('backend/vendor/jquery-asColor/jquery-asColor.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-asGradient/jquery-asGradient.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js') }}"></script>
    <!-- Material color picker -->
    <script src="{{ asset('backend/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
    <!-- pickdate -->
    <script src="{{ asset('backend/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('backend/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('backend/vendor/pickadate/picker.date.js') }}"></script>



    <!-- Daterangepicker -->
    <script src="{{ asset('backend/js/plugins-init/bs-daterange-picker-init.js') }}"></script>
    <!-- Clockpicker init -->
    <script src="{{ asset('backend/js/plugins-init/clock-picker-init.js') }}"></script>
    <!-- asColorPicker init -->
    <script src="{{ asset('backend/js/plugins-init/jquery-asColorPicker.init.js') }}"></script>
    <!-- Material color picker init -->
    <script src="{{ asset('backend/js/plugins-init/material-date-picker-init.js') }}"></script>
    <!-- Pickdate -->
    <script src="{{ asset('backend/js/plugins-init/pickadate-init.js') }}"></script>

    <script src="{{ asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();


            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            
        });
    </script>

    
    @yield('js')
        
    @if (Session::has('flash_message_error'))
        <script>
            tata.error('Opps...', '{!! session('flash_message_error') !!}', {
              position: 'tr',
              duration: 10000,
              animate: 'slide'
            })
        </script>
    @endif

    @if (Session::has('flash_message_success'))
        <script>
            tata.success('Success...', '{!! session('flash_message_success') !!}', {
              position: 'tr',
              duration: 10000,
              animate: 'slide'
            })

        </script>
    @endif

    @error('email'))
        <script>
            tata.error('Opps...', '{{ $message }}', {
              position: 'tr',
              duration: 10000,
              animate: 'slide'
            })

        </script>
    @enderror

    @error('password')
        <script>
            tata.error('Opps...', '{{ $message }}', {
              position: 'tr',
              duration: 10000,
              animate: 'slide'
            })

        </script>
    @enderror

    @if (session('status'))
        <script>
            tata.success('Success...', '{!! session('status') !!}', {
              position: 'tr',
              duration: 10000,
              animate: 'slide'
            })

        </script>
    @endif



    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            // myExample1
            $('#myExample1').DataTable( {
                dom: 'Bfrtip',

                buttons: [
                    'excel',
                    'print',
                ]
            });

        } );
    </script>

</body>

</html>