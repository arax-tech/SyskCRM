@php
    error_reporting(0);
@endphp
@extends('admin.layouts.app')
@section('title', 'Create Staff')
@section('css')
<style type="text/css">
    .custom_label{
        margin-top: 3px; margin-left: 10px; cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Create Staff</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('admin/staff/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/staff/store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Password <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="password" name="password" id="PasswordInput" class="form-control w-75" required="">
                                            <button type="button" class="form-control w-24" id="PasswordViewBtn"><i class="fa fa-eye"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Designation <span class="text-danger">*</span></label>
                                    
                                        <select name="designation" class="form-control" required="">
                                            <option value="Student Counsellor">Student Counsellor</option>
                                            <option value="Admission Executive">Admission Executive</option>
                                            <option value="Admin Manager">Admin Manager</option>
                                            <option value="Super Admin">Super Admin</option>
                                        </select>
                                        
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Contact <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Profile</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                </div>



                                <div class="col-lg-12 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary w-100" value="Create" />
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

        $("#All").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

    </script>
@endsection