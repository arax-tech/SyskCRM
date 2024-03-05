@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('admin.layouts.app')
@section('title', 'Students')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Students</h4>
                        @if (in_array("StudentCreate", $permission))
                            <a class="btn btn-sm btn-primary float-right" href="{{ url(strtolower(auth::user()->role.'/student/type')) }}">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </a>
                        @endif
                    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="myExample1" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Reg_No</strong></th>
                                        <th><strong>Student</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Phone</strong></th>
                                        <th><strong>Gender</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>{{ $student->registration_number }}</td>
                                            <td>

                                                <div class="d-flex align-items-center">
                                                    @if (!empty($student->photograph))
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/student/document/'.$student->photograph) }}" />
                                                    @else
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                    @endif


                                                    <span class="w-space-no">{{ $student->first_name }} {{ $student->last_name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $student->email_address }} </td>
                                            <td>{{ $student->contact_number }} </td>
                                            <td>{{ $student->gender }} </td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("StudentView", $permission))
                                                        <a href="{{ url('/admin/student/view/'.$student->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    @endif

                                                    @if (in_array("StudentUpdate", $permission))
                                                        <a href="{{ url('/admin/student/edit/'.$student->id.'?type='.$student->type) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    
                                                    @if (in_array("StudentDelete", $permission))
                                                        <a href="{{ url('/admin/student/delete/'.$student->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
       
        </div>
    </div>
</div>


@endsection