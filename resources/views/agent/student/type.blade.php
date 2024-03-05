@extends('agent.layouts.app')
@section('title', 'Student TYpe')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                        <div class="card overflow-hidden">
                                            <div class="text-center p-5" style="background-image: url(images/big/img5.jpg);">
                                                
                                                
                                            </div>
                                            <div class="card-body">
                                                <div class="row text-center">
                                                    <div class="col-6">
                                                        <div class="bgl-primary rounded p-3">
                                                            <h4 class="mb-0">Female</h4>
                                                            <small>Patient Gender</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="bgl-primary rounded p-3">
                                                            <h4 class="mb-0">Age: 24</h4>
                                                            <small>Years Old</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer mt-0">                              
                                                <button class="btn btn-primary btn-lg btn-block">View Profile</button>      
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <a href="{{ url(strtolower(auth::user()->role.'/student/create?type=International')) }}">
                                            <div class="card">
                                                <div class="card-body px-4 pb-0 d-flex justify-content-center align-items-center p-5">
                                                    <h4 class="fs-30 font-w600 mb-5 text-nowrap">International Student </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>


                                    <div class="col-xl-6 col-sm-6">
                                        <a href="{{ url(strtolower(auth::user()->role.'/student/create?type=Local')) }}">
                                            <div class="card">
                                                <div class="card-body px-4 pb-0 d-flex justify-content-center align-items-center p-5">
                                                    <h4 class="fs-30 font-w600 mb-5 text-nowrap">Local Student </h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>                                    
                                    
                                </div>
                                
                            </div>
                       

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection