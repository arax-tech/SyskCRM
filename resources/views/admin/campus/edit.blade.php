@extends('admin.layouts.app')
@section('title', 'Update Campus')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Update Campus</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('admin/campus/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/campus/update/'.$campus->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Select Campus <span class="text-danger">*</span></label>
                                        <select name="university" class="form-control select2" required>
                                            <option selected disabled value="">Select Country</option>
                                            @foreach($universities as $university)
                                                <option value="{{ $university->id }}"
                                                    @if ($university->id == $campus->university_id)
                                                        selected 
                                                    @endif
                                                >{{ $university->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Campus Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" required value="{{ $campus->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Logo <span class="text-danger">*</span></label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Old</label> <br>
                                        @if (!empty($campus->logo))
                                            <img class="img-thumbnail me-2" width="40" src="{{ asset('backend/university/campus/logo/'.$campus->logo) }}" />
                                        @else
                                            <img class="img-thumbnail me-2" width="40" src="{{ asset('backend/placeholder.jpg') }}" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" required>{!! $campus->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Address Line One <span class="text-danger">*</span></label>
                                        <input type="text" name="add_line_one" value="{{ $campus->add_line_one }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Address Line Two </label>
                                        <input type="text" name="add_line_two" value="{{ $campus->add_line_two }}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Country <span class="text-danger">*</span></label>
                                        <select name="country"  id="country" class="form-control select2" required>
                                            <option selected disabled value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($campus->country == $country->id)
                                                        selected 
                                                    @endif
                                                >{{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @php
                                    error_reporting(0);
                                    $states = DB::table('states')->where('country_id', $campus->country)->get();
                                    $cities = DB::table('cities')->where('state_id', $campus->state)->get();
                                @endphp
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">State <span class="text-danger">*</span></label>
                                        <select class="form-control select2" name="state" id="state" required>
                                            <option selected disabled value="">Select State</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    @if ($state->id == $campus->state)
                                                        selected 
                                                    @endif
                                                >{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">City <span class="text-danger">*</span></label>
                                        <input type="hidden" name="city" id="new_Id" value="{{ $campus->city }}">
                                        <select  class="form-control select2" nam="city" id="city" required>
                                            <option selected disabled value="">Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    @if ($city->id == $campus->city)
                                                        selected 
                                                    @endif
                                                >{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Zip <span class="text-danger">*</span></label>
                                        <input type="text" name="zip" class="form-control" value="{{ $campus->zip }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary w-100" value="Update" />
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description' );
    </script>
@endsection