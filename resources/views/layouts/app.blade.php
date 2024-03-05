<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- PAGE TITLE HERE -->
    <title>@yield('title')</title>
    
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @yield('css')
</head>




<body class="vh-100">
    @yield('content')


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/dlabnav-init.js') }}"></script>


     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
          });
      </script>

    <script src="{{ asset('/toaster/dist/tata.js') }}"></script>

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
</body>

</html>

