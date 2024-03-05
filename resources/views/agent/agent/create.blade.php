@php
    error_reporting(0);
@endphp
@extends('agent.layouts.app')
@section('title', 'Create Sub Agent')
@section('css')

@endsection
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Create Sub Agent</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('agent/sub/agent/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/agent/agent/store') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Email <span class="text-danger">*</span></label>
                                        <input type="text" name="email" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Password <span class="text-danger">*</span></label>
                                        <input type="text" name="password" class="form-control" required="">
                                    </div>
                                </div>

                                
                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Designation <span class="text-danger">*</span></label>
                                        <input type="text" name="designation" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Profile</label>
                                        <input type="file" name="profile" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                    </div>
                                </div>



                                
                                
                            </div>

                            <h3 class="my-4">
                                Permissions

                                <span style="float: right !important">
                                    <div class="form-check form-switch ">
                                        <input type="checkbox" class="form-check-input" name="permissions[]" id="All" value="All">
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
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentCreate">
                                                </div>
                                            </td>


                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentUpdate">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="AgentDelete">
                                                </div>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td>Students</td>
                                            <td>


                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="StudentView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="StudentCreate">
                                                </div>
                                            </td>


                                            <td></td>

                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td>Applications</td>
                                            <td>


                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="ApplicationView">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="ApplicationCreate">
                                                </div>
                                            </td>


                                            <td></td>

                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td>Search Program</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="SearchProgramView">
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
                                                    <input type="checkbox" class="form-check-input" name="permissions[]" value="CommissionView">
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