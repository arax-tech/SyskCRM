@extends('layouts.app')
@section('title', 'Reset Password')
@section('css')
<style type="text/css">
    body {
        background: url('https://demos.themeselection.com/chameleon-admin-template/app-assets/images/backgrounds/bg-18.jpg') center center no-repeat fixed;
        -webkit-background-size: cover;
        background-size: cover;
    }
    

</style>
@endsection
@section('content')
<div class="authincation h-100">
    <div class="container h-100">

        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form" style="padding: 3rem 3.125rem 1rem 3.125rem !important;">
                                <div class="text-center mb-3">
                                    <a href="javascript::">
                                        {{-- <img src="{{ asset('/backend/images/logo-full.png') }}" alt=""> --}}
                                        <h2 class="font-weight-bolder">Reset Password</h2>
                                    </a>
                                </div>
                                <form class="auth-reset-password-form mt-2" method="post" action="{{ route('password.update') }}">
                                    @csrf
                                    
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input id="email" readonly="" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                                    </div>


                                    <div class="mb-3">
                                        <label class="mb-1"><strong>New Password</strong></label>
                                        <input class="form-control form-control-merge" id="reset-password-new" type="password" name="password" aria-describedby="password" autofocus="" tabindex="1" />
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Confirm Password</strong></label>
                                        <input class="form-control form-control-merge" id="password_confirmation" type="password" name="password_confirmation" aria-describedby="password_confirmation" tabindex="2" />
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Set New Password</button>
                                    </div>
                                </form>
                                

                                </div>

                                <center>
                                    <div class="new-account  mt-3">
                                        <p>Back to  <a class="text-primary" href="{{ url('/login') }}">Login</a></p>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
