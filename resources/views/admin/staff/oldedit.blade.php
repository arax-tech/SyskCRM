@php
    error_reporting(0);
@endphp
@extends('admin.layouts.app')
@section('title', 'Update Staff')

@php
    $array = $staff->permissions;
    $permission = explode(",", $array);
@endphp

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
                        <h4 class="card-title">Update Staff</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('admin/staff/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/staff/update/'.$staff->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ $staff->name }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" value="{{ $staff->email }}" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Password <span class="text-danger">*</span></label>
                                        <input type="text" name="password" class="form-control" data-bs-toggle="tooltip" data-bs-placement="top" title="If you want to update password then enter new password othereise leave this field blank...">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Designation <span class="text-danger">*</span></label>
                                        @if (auth::user()->designation == "RM")
                                            <select name="designation" class="form-control" required="">
                                                <option value="Student Counselor"
                                                @if ($staff->designation == "Student Counselor")
                                                    selected 
                                                @endif
                                                >Student Counselor</option>
                                                <option value="Admission Executive"
                                                @if ($staff->designation == "Admission Executive")
                                                    selected 
                                                @endif
                                                >Admission Executive</option>
                                                <option value="Admin Manager"
                                                @if ($staff->designation == "Admin Manager")
                                                    selected 
                                                @endif
                                                >Admin Manager</option>
                                            </select>
                                        @else
                                            <input type="text" name="designation" value="{{ $staff->designation }}" class="form-control" required>
                                        @endif
                                    </div>
                                </div>

                                 <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Contact <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="{{ $staff->phone }}" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Profile</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Old</label> <br>
                                        @if (!empty($staff->image))
                                            <img class="me-2" width="40" src="{{ asset('backend/profile/'.$staff->image) }}" />
                                        @else
                                            <img class="me-2" width="40" src="{{ asset('backend/placeholder.jpg') }}" />
                                        @endif
                                    </div>
                                </div>



                                <div class="col-lg-12 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1"
                                            @if ($staff->status == "1")
                                                selected 
                                            @endif
                                            >Active</option>
                                            <option value="0"
                                            @if ($staff->status == "0")
                                                selected 
                                            @endif
                                            >InActive</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <h3 class="my-4">
                                Permissions

                                <span style="float: right !important">
                                    <div class="form-check form-switch ">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="All" @if (in_array("All", $permission)) checked  @endif value="All">
                                        <label class="custom-control-label" for="All">All</label>
                                    </div>
                                </span>

                            </h3>

                            <div class="table-responsive">
                                <table class="table table-striped table-borderless">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Module</th>
                                            <th>View <span style="color: transparent !important;"> c</span></th>
                                            <th>Create</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Staff</td>
                                            <td>


                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StaffView" @if (in_array("StaffView", $permission)) checked  @endif value="StaffView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StaffCreate" @if (in_array("StaffCreate", $permission)) checked  @endif value="StaffCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StaffUpdate" @if (in_array("StaffUpdate", $permission)) checked  @endif value="StaffUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StaffDelete" @if (in_array("StaffDelete", $permission)) checked  @endif value="StaffDelete">
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Agents</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="AgentView" @if (in_array("AgentView", $permission)) checked  @endif value="AgentView">
                                                </div>
                                            </td>

                                            <td></td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="AgentUpdate" @if (in_array("AgentUpdate", $permission)) checked  @endif value="AgentUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="AgentDelete" @if (in_array("AgentDelete", $permission)) checked  @endif value="AgentDelete">
                                                </div>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td>Students</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StudentView" @if (in_array("StudentView", $permission)) checked  @endif value="StudentView">
                                                </div>
                                            </td>
                                            
                                                
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StudentCreate" @if (in_array("StudentCreate", $permission)) checked  @endif value="StudentCreate">
                                                </div>
                                            </td>

                                            <td>

                                                <p>
                                                    <div class="form-check form-switch">
                                                        <label for="StudentUpdate" class="custom_label">Update Student</label>
                                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="StudentUpdate" @if (in_array("StudentUpdate", $permission)) checked  @endif value="StudentUpdate">
                                                    </div>
                                                </p>
                                                <p>
                                                    <div class="form-check form-switch">
                                                        <label for="StudentUpdateInterview" class="custom_label">Update Interview</label>
                                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="StudentUpdateInterview" @if (in_array("StudentUpdateInterview", $permission)) checked  @endif value="StudentUpdateInterview">
                                                    </div>
                                                </p>

                                                <p>
                                                    <div class="form-check form-switch">
                                                        <label for="StudentUpdateStatus" class="custom_label">Update Status</label>
                                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="StudentUpdateStatus" @if (in_array("StudentUpdateStatus", $permission)) checked  @endif value="StudentUpdateStatus">
                                                    </div>
                                                </p>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="StudentDelete" @if (in_array("StudentDelete", $permission)) checked  @endif value="StudentDelete">
                                                </div>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td>Intakes</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="IntakeView" @if (in_array("IntakeView", $permission)) checked  @endif value="IntakeView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="IntakeCreate" @if (in_array("IntakeCreate", $permission)) checked  @endif value="IntakeCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="IntakeUpdate" @if (in_array("IntakeUpdate", $permission)) checked  @endif value="IntakeUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="IntakeDelete" @if (in_array("IntakeDelete", $permission)) checked  @endif value="IntakeDelete">
                                                </div>
                                            </td>
                                        </tr>





                                        <tr>
                                            <td>Courses</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CourseView" @if (in_array("CourseView", $permission)) checked  @endif value="CourseView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CourseCreate" @if (in_array("CourseCreate", $permission)) checked  @endif value="CourseCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CourseUpdate" @if (in_array("CourseUpdate", $permission)) checked  @endif value="CourseUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CourseDelete" @if (in_array("CourseDelete", $permission)) checked  @endif value="CourseDelete">
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Applications</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="ApplicationView" @if (in_array("ApplicationView", $permission)) checked  @endif value="ApplicationView">
                                                </div>
                                            </td>

                                            <td></td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="ApplicationUpdate" @if (in_array("ApplicationUpdate", $permission)) checked  @endif value="ApplicationUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="ApplicationDelete" @if (in_array("ApplicationDelete", $permission)) checked  @endif value="ApplicationDelete">
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Commissions</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CommissionView" value="CommissionView"  @if (in_array("CommissionView", $permission)) checked  @endif>
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td>Offers</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="OfferfView" @if (in_array("OfferfView", $permission)) checked  @endif value="OfferfView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="OfferfCreate" @if (in_array("OfferfCreate", $permission)) checked  @endif value="OfferfCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="OfferfUpdate" @if (in_array("OfferfUpdate", $permission)) checked  @endif value="OfferfUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="OfferfDelete" @if (in_array("OfferfDelete", $permission)) checked  @endif value="OfferfDelete">
                                                </div>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td>Universities</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="UniversityView" @if (in_array("UniversityView", $permission)) checked  @endif value="UniversityView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="UniversityCreate" @if (in_array("UniversityCreate", $permission)) checked  @endif value="UniversityCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="UniversityUpdate" @if (in_array("UniversityUpdate", $permission)) checked  @endif value="UniversityUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="UniversityDelete" @if (in_array("UniversityDelete", $permission)) checked  @endif value="UniversityDelete">
                                                </div>
                                            </td>
                                        </tr>



                                        <tr>
                                            <td>Campuses</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CampusView" @if (in_array("CampusView", $permission)) checked  @endif value="CampusView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CampusCreate" @if (in_array("CampusCreate", $permission)) checked  @endif value="CampusCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CampusUpdate" @if (in_array("CampusUpdate", $permission)) checked  @endif value="CampusUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="CampusDelete" @if (in_array("CampusDelete", $permission)) checked  @endif value="CampusDelete">
                                                </div>
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
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

        $("#All").click(function(){
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

    </script>
@endsection