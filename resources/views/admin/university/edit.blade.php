@extends('admin.layouts.app')
@section('title', 'Update University')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Update University</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('admin/university/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/university/update/'.$university->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" required value="{{ $university->name }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Logo <span class="text-danger">*</span></label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-2 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Old</label> <br>
                                        @if (!empty($university->logo))
                                            <img class="img-thumbnail me-2" width="40" src="{{ asset('backend/university/logo/'.$university->logo) }}" />
                                        @else
                                            <img class="img-thumbnail me-2" width="40" src="{{ asset('backend/placeholder.jpg') }}" />
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" required>{!! $university->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Address Line One <span class="text-danger">*</span></label>
                                        <input type="text" name="add_line_one" value="{{ $university->add_line_one }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Address Line Two </label>
                                        <input type="text" name="add_line_two" value="{{ $university->add_line_two }}" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Country <span class="text-danger">*</span></label>
                                        <select name="country"  id="country" class="form-control select2" required>
                                            <option selected disabled value="">Select Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($university->country == $country->id)
                                                        selected 
                                                    @endif
                                                >{{ $country->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @php
                                    error_reporting(0);
                                    $states = DB::table('states')->where('country_id', $university->country)->get();
                                    $cities = DB::table('cities')->where('state_id', $university->state)->get();
                                @endphp
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">State <span class="text-danger">*</span></label>
                                        <select class="form-control select2" name="state" id="state" required>
                                            <option selected disabled value="">Select State</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    @if ($state->id == $university->state)
                                                        selected 
                                                    @endif
                                                >{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">City </label>
                                        <input type="text" name="city" class="form-control" value="{{ $university->city }}">
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Post / Pin Code <span class="text-danger">*</span></label>
                                        <input type="text" name="zip" class="form-control" value="{{ $university->zip }}" required>
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