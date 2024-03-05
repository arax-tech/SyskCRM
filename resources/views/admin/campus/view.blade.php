@extends('admin.layouts.app')
@section('title', 'View Campus')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">View Campus</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('admin/campus/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>

                    @php
                        error_reporting(0);
                        $country = DB::table('countries')->where('id', $campus->country)->first();
                        $state = DB::table('states')->where('id', $campus->state)->first();
                        $city = DB::table('cities')->where('id', $campus->city)->first();
                        $university = DB::table('universities')->where('id', $campus->university_id)->first();
                    @endphp
                    <div class="card-body">

                        
                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-6">
                                <label class="mb-1 text-uppercase font-weight-bolder">University Name</label><br>
                                <label class="mb-1">{{ $university->name }}</label>
                            </div>

                            <div class="col-md-6">
                                <label class="mb-1 text-uppercase font-weight-bolder">Campus Name</label><br>
                                <label class="mb-1">{{ $campus->name }}</label>
                            </div>
                        </div>

                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Address Line One </label><br>
                                <label class="mb-1">{{ $campus->add_line_one }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Address Line Two</label><br>
                                <label class="mb-1">{{ $campus->add_line_one }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Zip</label><br>
                                <label class="mb-1">{{ $campus->zip }}</label>
                            </div>
                        </div>


                        


                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Country</label><br>
                                <label class="mb-1">{{ $country->name }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">State</label><br>
                                <label class="mb-1">{{ $state->name }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">City</label><br>
                                <label class="mb-1">{{ $city->name }}</label>
                            </div>
                        </div>

                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-12">
                                <label class="mb-1 text-uppercase font-weight-bolder">Description</label><br>
                                <label class="mb-1">{!! $campus->description !!}</label>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection