@php
    error_reporting(0);
    $setting = DB::table('settings')->where('id', 1)->first();
@endphp

@extends('layouts.app')
@section('title', 'Login')
@section('css')
<style type="text/css">
    body {
        background: url({{ asset('/backend/login_background/'.$setting->login_background) }}) center center no-repeat fixed;
        -webkit-background-size: cover;
        background-size: cover;
    }
    
    .social-icons{
        height: auto !important;
        width: 48px !important;
        border: none !important;
        outline: none !important;
    }
    .slick-dots{
        bottom: -50px !important
    }

    .my-slider{margin-right: 15%; width: 90%;
    height: 100px;}


    .authincation-content {
        background: rgba(0,0,0,0.4) !important;
    }
    strong{color: #fff !important}
    .form-check-label{color: #fff !important}
    .input{background:  #fff !important}

</style>

<link rel="stylesheet" type="text/css" href="{{ asset('/backend/slick/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/backend/slick/slick-theme.css') }}">
@endsection
@section('content')

<div class="d-flex justify-content-end p-3">
    @if ($setting->facebook != "null")
      <a class="btn btn-primary rounded-circle social-icons" style="background: #3b5998 !important" target="_blank" href="//{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>&nbsp;
    @endif
    @if ($setting->youtube != "null")
      <a class="btn btn-primary rounded-circle social-icons" style="background: #FF0000 !important" target="_blank" href="//{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>&nbsp;
    @endif
    @if ($setting->google_plus != "null")
      <a class="btn btn-primary rounded-circle social-icons" style="background: #db4a39 !important" target="_blank" href="//{{ $setting->google_plus }}"><i class="fab fa-google-plus-g"></i></a>&nbsp;
    @endif
    @if ($setting->twitter != "null")
      <a class="btn btn-primary rounded-circle social-icons" style="background: #00acee !important" target="_blank" href="//{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>&nbsp;
    @endif
    @if ($setting->instagram != "null")
      <a class="btn btn-primary rounded-circle social-icons" style="background: #fccc63 !important" target="_blank" href="//{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>&nbsp;
    @endif
    @if ($setting->pinterest != "null")
      <a class="btn btn-primary rounded-circle social-icons" style="background: #c8232c !important" target="_blank" href="//{{ $setting->pinterest }}"><i class="fab fa-pinterest-p"></i></a>&nbsp;
    @endif
</div>
<div class="authincation h-100">
    <div class="container h-100">

        <div class="row justify-content-center mb-3 mt-5 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form" style="padding: 3rem 3.125rem 1rem 3.125rem !important;">
                                <div class="text-center mb-3">
                                    <a target="_blank" href="https://www.sysksolutions.com">
                                        <img width="200" src="{{ asset('/backend/logo/'.$setting->logo) }}" alt="">
                                    </a>
                                </div>
                                <form action="{{ url('/login') }}" method="post">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input type="email" class=" input form-control" name="email" autofocus="" required="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Password</strong></label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="PasswordInput" class="input form-control w-75" required="" />
                                            <button type="button" class="input form-control w-24" id="PasswordViewBtn"><i class="fa fa-eye"></i></button>
                                        </div>

                                    </div>
                                    <div class="row mb-2 mt-4">
                                        <div class="col">
                                           <div class="form-check custom-checkbox ms-1">
                                                <input type="checkbox" class="form-check-input" checked id="basic_checkbox_1">
                                                <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <a class="float-end text-primary" href="{{ url('password/reset') }}">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                    </div>
                                </form>
                                

                                

                                <center>
                                    <div class="new-account  mt-3">
                                        <p><span class="text-white">Don't have an account?</span> <a class="text-primary" style="font-size: 13px;" href="{{ url('/agent/register') }}"><b>Sign Up as an Agent</b></a></p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="" style="padding: 20px 5px 5px 5px">
                                    <section class="center slider">
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (1).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (2).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (3).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (4).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (5).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (6).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (7).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (8).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (9).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (10).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (12).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (13).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (14).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (15).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (16).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (17).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (18).jpeg') }}"></div>
                                      <div><img class="img-thumbnail my-slider" src="{{ asset('/backend/images/universities/logo (19).jpeg') }}"></div>
                                    </section>
                                    
                                </div>
            </div>
        </div>

        <div class="d-flex flex-column align-items-center justify-content-center">
 <h2 style="margin-bottom: -5px">For business enquiries, technical support and any other enquiries please contact us</h2> <br>

            <h3>Email: eduagentcrm@sysksolutions.com  | Call: +447570041115 : <a target="_blank" class="text-primary" href="https://www.sysksolutions.com">www.sysksolutions.com</a></h3>
            <h4>Copyright © 2023 | All Rights Reserved | SYSK Solutions Ltd.</h4>
        </div>
    </div>
</div>
@endsection
@section('js')
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="{{ asset('/backend/slick/slick.js') }}" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">

    $(document).on('ready', function() {
      
      $("#PasswordViewBtn").click(function(){
          var current = $("#PasswordInput").get(0).type;
          if(current === "password"){
            $("#PasswordViewBtn").html('<i class="fa fa-eye-slash"></i>')
          }else{
            $("#PasswordViewBtn").html('<i class="fa fa-eye"></i>')
          }
          $('#PasswordInput').attr('type', current === "password" ? 'text' : 'password' );
      });


      $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });



      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
      })
    });



</script>


@endsection