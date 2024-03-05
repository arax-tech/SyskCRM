@php
    error_reporting(0);
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp


@extends('admin.layouts.app')
@section('title', 'Courses')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Courses</h4>

                        @if (in_array("CourseCreate", $permission))
                            <a class="btn btn-sm btn-primary float-right"  href="{{ url('/admin/course/create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </a>
                        @endif

                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="example" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>Course Name</strong></th>
                                        <th><strong>University</strong></th>
                                        <th><strong>Campus</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            @php
                                                error_reporting();
                                                $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                                $university = DB::table('universities')->where('id', $campus->university_id)->first();
                                            @endphp
                                            
                                            <td>{{ $course->course_name }} </td>
                                            <td>{{ $university->name }} </td>
                                            <td>{{ $campus->name }} </td>
                                            
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($course->status == "Active")
                                                        <i class="fa fa-circle text-success me-1"></i> Active
                                                    @else
                                                        <i class="fa fa-circle text-danger me-1"></i> InActive
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("CourseUpdate", $permission))
                                                        <a href="{{ url('/admin/course/edit/'.$course->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    <a href="{{ url('/admin/course/view/'.$course->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    @if (in_array("CourseDelete", $permission))
                                                        <a href="{{ url('/admin/course/delete/'.$course->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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