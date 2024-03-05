@php
    error_reporting(0);
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp
@extends('admin.layouts.app')
@section('title', 'Staff')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Staff</h4>
                        @if (in_array("StaffCreate", $permission))
                            <a class="btn btn-sm btn-primary float-right"  href="{{ url('/admin/staff/create') }}">
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
                                        <th><strong>Staff</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Designation</strong></th>
                                        <th><strong>Registerd</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr>
                                           


                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if (!empty($admin->image))
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/profile/'.$admin->image) }}" />
                                                    @else
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                    @endif


                                                    <span class="w-space-no">{{ $admin->name }}</span>
                                                </div>
                                            </td>



                                           
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->designation }}</td>
                                            <td>{{ date('d M Y', strtotime($admin->created_at)) }}</td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($admin->status == 1)
                                                        <i class="fa fa-circle text-success me-1"></i> Active
                                                    @else
                                                        <i class="fa fa-circle text-danger me-1"></i> InActive
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("StaffUpdate", $permission))
                                                        <a href="{{ url('/admin/staff/edit/'.$admin->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    @if (in_array("StaffDelete", $permission))
                                                        <a href="{{ url('/admin/staff/delete/'.$admin->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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