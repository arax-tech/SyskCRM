@extends('admin.layouts.app')
@section('title', 'States and Cities')
@php
    error_reporting(0);
    $countries = DB::table('countries')->get();
    $states = DB::table('states')->get();
    // $cities = DB::table('cities')->get();


@endphp
{{-- @foreach ($cities as $city)
    <li>{{ $city->name }}</li>
@endforeach --}}
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper p-3">
        
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <div class="row">
                
                <div class="col-md-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header bg-light mb-1">
                            <h4 class="card-title">States and Cities</h4>
                        </div>
                        <div class="card-body">

                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#states" data-bs-toggle="tab" class="nav-link active show">States</a></li>
                                        <li class="nav-item"><a href="#cities" data-bs-toggle="tab" class="nav-link">Cities</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        
                                        <div id="states" class="tab-pane fade active show">
                                            <div class="p-3 mt-4">
                                                <form method="post"  action="{{ url('admin/state/store/') }}">
                                                    @csrf
                                                    

                                                    <div class="row"> 
                                                        

                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Country <span class="text-danger">*</span></label>
                                                                <select name="country_id" class="form-control select2" required>
                                                                    <option selected disabled value="">Select Country</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}">{{ $country->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">State Name <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="name" autofocus="" required >
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3 mb-0">
                                                                <input type="submit" value="Create" class="btn btn-primary btn-block">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>

                                        <div id="cities" class="tab-pane fade">
                                            <div class="p-3 mt-4">
                                                <form method="post"  action="{{ url('admin/city/store/') }}">
                                                    @csrf
                                                    

                                                    <div class="row"> 
                                                        

                                                        
                                                        <div class="col-lg-6 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Country <span class="text-danger">*</span></label>
                                                                <select name="country"  id="country" class="form-control select2" required>
                                                                    <option selected disabled value="">Select Country</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}">{{ $country->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">State <span class="text-danger">*</span></label>
                                                                <select class="form-control select2" name="state" id="state" required>
                                                                    <option selected disabled value="">Select State</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-12">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">City Name <span class="text-danger">*</span></label>
                                                                <input class="form-control" name="name" autofocus="" required >
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-lg-12">
                                                            <div class="mb-3 mb-0">
                                                                <input type="submit" value="Create" class="btn btn-primary btn-block">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>
                                     

                                    </div>
                                </div>
                                
                            </div>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
@endsection
