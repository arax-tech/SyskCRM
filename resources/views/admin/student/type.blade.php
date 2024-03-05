@extends('admin.layouts.app')
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
                                        <a href="{{ url(strtolower(auth::user()->role.'/student/create?type=International')) }}">
                                            <div class="card overflow-hidden">
                                                <div class="text-center p-5" style="height: 250px; background-image: url({{ asset('backend/images/local.jpg') }});  background-position: center; background-repeat: no-repeat; background-size: cover;">
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h4 style="font-size: 20px">International Student </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="col-xl-6 col-lg-6 col-sm-12">
                                        <a href="{{ url(strtolower(auth::user()->role.'/student/create?type=Local')) }}">
                                            <div class="card overflow-hidden">
                                                <div class="text-center p-5" style="height: 250px; background-image: url({{ asset('backend/images/inter.jpg') }});  background-position: center; background-repeat: no-repeat; background-size: cover;">
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h4 style="font-size: 20px">Local Student </h4>
                                                    </div>
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