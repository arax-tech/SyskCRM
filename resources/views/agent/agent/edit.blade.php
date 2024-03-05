@php
    error_reporting(0);
@endphp
@extends('agent.layouts.app')
@section('title', 'Update Agent')
@section('css')

@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Update Agent</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('agent/sub/agent/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/agent/agent/update/'.$agent->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ $agent->name }}" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" value="{{ $agent->email }}" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Password <span class="text-danger">*</span></label>
                                        <input type="text" name="password" class="form-control" data-bs-toggle="tooltip" data-bs-placement="top" title="If you want to update password then enter new password othereise leave this field blank...">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1"
                                            @if ($agent->status == "1")
                                                selected 
                                            @endif
                                            >Active</option>
                                            <option value="0"
                                            @if ($agent->status == "0")
                                                selected 
                                            @endif
                                            >InActive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-10 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Profile</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-2 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Old</label> <br>
                                        @if (!empty($agent->image))
                                            <img class="me-2" width="40" src="{{ asset('backend/profile/'.$agent->image) }}" />
                                        @else
                                            <img class="me-2" width="40" src="{{ asset('backend/placeholder.jpg') }}" />
                                        @endif
                                    </div>
                                </div>



                                
                                
                            </div>

                            @php
                                $array = $agent->permissions;
                                $permission = explode(",", $array);
                            @endphp

                            <h3 class="my-4">
                                Permissions

                                <span style="float: right !important">
                                    <div class="form-check form-switch ">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="All"  @if (in_array("All", $permission)) checked  @endif value="All">
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
                                            <td>Agents</td>
                                            <td>


                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentView" @if (in_array("AgentView", $permission)) checked  @endif>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentCreate" @if (in_array("AgentCreate", $permission)) checked  @endif>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentUpdate" @if (in_array("AgentUpdate", $permission)) checked  @endif>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentDelete" @if (in_array("AgentDelete", $permission)) checked  @endif>
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Students</td>
                                            <td>


                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="StudentView" @if (in_array("StudentView", $permission)) checked  @endif>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="StudentCreate" @if (in_array("StudentCreate", $permission)) checked  @endif>
                                                </div>
                                            </td>


                                            <td></td>

                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td>Applications</td>
                                            <td>


                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="ApplicationView" @if (in_array("ApplicationView", $permission)) checked  @endif>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="ApplicationCreate" @if (in_array("ApplicationCreate", $permission)) checked  @endif>
                                                </div>
                                            </td>


                                            <td></td>

                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td>Search Program</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="SearchProgramView" @if (in_array("SearchProgramView", $permission)) checked  @endif>
                                                </div>
                                            </td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td>Commissions</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="CommissionView" @if (in_array("CommissionView", $permission)) checked  @endif>
                                                </div>
                                            </td>

                                            <td></td>
                                            <td></td>
                                            <td></td>
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