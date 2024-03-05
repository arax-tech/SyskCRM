@extends('layouts.app')
@section('title', 'Forgot Password')
@section('content')
<style type="text/css">
    body {
        background: url('https://demos.themeselection.com/chameleon-admin-template/app-assets/images/backgrounds/bg-18.jpg') center center no-repeat fixed;
        -webkit-background-size: cover;
        background-size: cover;
    }
    

</style>
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
                                        <h2 class="font-weight-bolder">Forgot Password</h2>
                                    </a>
                                </div>
                                <form class="auth-forgot-password-form mt-2" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="mb-1"><strong>Email</strong></label>
                                        <input class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    </div>


                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
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

