@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('admin.layouts.app')
@section('title', 'Intakes')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Intakes</h4>
                        @if (in_array("IntakeCreate", $permission))
                            <button class="btn btn-sm btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#CreateIntake">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </button>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="CreateIntake">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Create</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/admin/intake/store') }}">
                                            @csrf
                                            
                                            <div class="row"> 
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-black font-w600 form-label">Select Course <span class="required">*</span></label>
                                                        <select class="form-control select2" name="course_id" required>
                                                            <option selected disabled value="">Choose...</option>
                                                            @foreach ($courses as $course)
                                                                @php
                                                                    error_reporting(0);
                                                                    $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                                                    $university = DB::table('universities')->where('id', $campus->university_id)->first();
                                                                @endphp
                                                                <option value="{{ $course->id }}">{{ $course->course_name }} | {{ $university->name }} | {{ $campus->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Month <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="intake_month" required>
                                                            <option selected disabled value="">Select Month</option>
                                                            <option value="January">January</option>
                                                            <option value="February">February</option>
                                                            <option value="March">March</option>
                                                            <option value="April">April</option>
                                                            <option value="May">May</option>
                                                            <option value="June">June</option>
                                                            <option value="July">July</option>
                                                            <option value="August">August</option>
                                                            <option value="September">September</option>
                                                            <option value="October">October</option>
                                                            <option value="November">November</option>
                                                            <option value="December">December</option>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Year <span class="text-danger">*</span></label>

                                                        <select class="form-control select2" name="intake_year" required>
                                                            <option selected disabled value="">Select Year</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                            <option value="2025">2025</option>
                                                            <option value="2026">2026</option>
                                                            <option value="2027">2027</option>
                                                            <option value="2028">2028</option>
                                                            <option value="2029">2029</option>
                                                            <option value="2030">2030</option>
                                                            <option value="2031">2031</option>
                                                            <option value="2032">2032</option>
                                                            <option value="2033">2033</option>
                                                            <option value="2034">2034</option>
                                                            <option value="2035">2035</option>
                                                            
                                                        </select>

                                                    </div>
                                                </div>



                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Start Date  <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="start_date"  />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Deadline  <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="deadline" />
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Status <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="intake_status" required>
                                                            <option value="">Select Status</option>
                                                            <option value="Active">Active</option>
                                                            <option value="InActive">InActive</option>
                                                            <option value="Open Soon">Open Soon</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="mb-3 mb-0">
                                                        <input type="submit" value="Create" class="submit btn btn-primary btn-block">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="example" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>University/Campus</strong></th>
                                        <th><strong>Course</strong></th>
                                        <th><strong>Year</strong></th>
                                        <th><strong>Month</strong></th>
                                        <th><strong>StartDate</strong></th>
                                        <th><strong>Deadline</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($intakes as $intake)
                                        @php
                                            error_reporting(0);
                                            $course = DB::table('courses')->where('id', $intake->course_id)->first();
                                            $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                            $university = DB::table('universities')->where('id', $campus->university_id)->first();


                                        @endphp
                                        <tr>
                                            
                                            <td>{{ $university->name }} / {{ $campus->name }} </td>
                                            <td>{{ $course->course_name }} </td>
                                            <td>{{ $intake->year }} </td>
                                            <td>{{ $intake->month }} </td>
                                            <td>{{ $intake->start_date ? date('d M Y', strtotime($intake->start_date)) : 'Not Provided' }} </td>
                                            <td>{{ $intake->deadline ? date('d M Y', strtotime($intake->deadline)) : 'Not Provided' }} </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($intake->status == "Active")
                                                        <i class="fa fa-circle text-success me-1"></i> Active
                                                    @elseif ($intake->status == "Open Soon")
                                                        <i class="fa fa-circle text-warning me-1"></i> Open Soon
                                                    @else
                                                        <i class="fa fa-circle text-danger me-1"></i> InActive
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("IntakeUpdate", $permission))
                                                        <a href="javascript::" class="btn btn-primary shadow btn-xs sharp me-1"  data-bs-toggle="modal" data-bs-target="#UpdateIntake{{ $intake->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    @if (in_array("IntakeDelete", $permission))
                                                        <a  href="{{ url('/admin/intake/delete/'.$intake->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="UpdateIntake{{ $intake->id }}">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('/admin/intake/update/'.$intake->id) }}">
                                                            @csrf
                                                            
                                                            <div class="row"> 
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Select Course <span class="required">*</span></label>
                                                                        <select class="form-control select2" name="course_id" required>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            @foreach ($courses as $course)
                                                                                <option value="{{ $course->id }}"


                                                                                    @php
                                                                                        error_reporting(0);
                                                                                        $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                                                                        $university = DB::table('universities')->where('id', $campus->university_id)->first();
                                                                                    @endphp
                                                                                    



                                                                                    @if ($course->id == $intake->course_id)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $course->course_name }} | {{ $university->name }} | {{ $campus->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Month <span class="text-danger">*</span></label>
                                                                        <select class="form-control select2" name="intake_month" required>
                                                                            <option value="">Select Month</option>
                                                                            <option value="January"
                                                                            @if ($intake->month == "January")
                                                                                selected 
                                                                            @endif
                                                                            >January</option>
                                                                            <option value="February"
                                                                            @if ($intake->month == "February")
                                                                                selected 
                                                                            @endif
                                                                            >February</option>
                                                                            <option value="March"
                                                                            @if ($intake->month == "March")
                                                                                selected 
                                                                            @endif
                                                                            >March</option>
                                                                            <option value="April"
                                                                            @if ($intake->month == "April")
                                                                                selected 
                                                                            @endif
                                                                            >April</option>
                                                                            <option value="May"
                                                                            @if ($intake->month == "May")
                                                                                selected 
                                                                            @endif
                                                                            >May</option>
                                                                            <option value="June"
                                                                            @if ($intake->month == "June")
                                                                                selected 
                                                                            @endif
                                                                            >June</option>
                                                                            <option value="July"
                                                                            @if ($intake->month == "July")
                                                                                selected 
                                                                            @endif
                                                                            >July</option>
                                                                            <option value="August"
                                                                            @if ($intake->month == "August")
                                                                                selected 
                                                                            @endif
                                                                            >August</option>
                                                                            <option value="September"
                                                                            @if ($intake->month == "September")
                                                                                selected 
                                                                            @endif
                                                                            >September</option>
                                                                            <option value="October"
                                                                            @if ($intake->month == "October")
                                                                                selected 
                                                                            @endif
                                                                            >October</option>
                                                                            <option value="November"
                                                                            @if ($intake->month == "November")
                                                                                selected 
                                                                            @endif
                                                                            >November</option>
                                                                            <option value="December"
                                                                            @if ($intake->month == "December")
                                                                                selected 
                                                                            @endif
                                                                            >December</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Year <span class="text-danger">*</span></label>
                                                                        

                                                                        <select class="form-control select2" name="intake_year" required>
                                                                            <option selected disabled value="">Select Year</option>
                                                                            <option value="2022"
                                                                            @if ($intake->year == "2022")
                                                                                selected 
                                                                            @endif
                                                                            >2022</option>
                                                                            <option value="2023"
                                                                            @if ($intake->year == "2023")
                                                                                selected 
                                                                            @endif
                                                                            >2023</option>
                                                                            <option value="2024"
                                                                            @if ($intake->year == "2024")
                                                                                selected 
                                                                            @endif
                                                                            >2024</option>
                                                                            <option value="2025"
                                                                            @if ($intake->year == "2025")
                                                                                selected 
                                                                            @endif
                                                                            >2025</option>
                                                                            <option value="2026"
                                                                            @if ($intake->year == "2026")
                                                                                selected 
                                                                            @endif
                                                                            >2026</option>
                                                                            <option value="2027"
                                                                            @if ($intake->year == "2027")
                                                                                selected 
                                                                            @endif
                                                                            >2027</option>
                                                                            <option value="2028"
                                                                            @if ($intake->year == "2028")
                                                                                selected 
                                                                            @endif
                                                                            >2028</option>
                                                                            <option value="2029"
                                                                            @if ($intake->year == "2029")
                                                                                selected 
                                                                            @endif
                                                                            >2029</option>
                                                                            <option value="2030"
                                                                            @if ($intake->year == "2030")
                                                                                selected 
                                                                            @endif
                                                                            >2030</option>
                                                                            <option value="2031"
                                                                            @if ($intake->year == "2031")
                                                                                selected 
                                                                            @endif
                                                                            >2031</option>
                                                                            <option value="2032"
                                                                            @if ($intake->year == "2032")
                                                                                selected 
                                                                            @endif
                                                                            >2032</option>
                                                                            <option value="2033"
                                                                            @if ($intake->year == "2033")
                                                                                selected 
                                                                            @endif
                                                                            >2033</option>
                                                                            <option value="2034"
                                                                            @if ($intake->year == "2034")
                                                                                selected 
                                                                            @endif
                                                                            >2034</option>
                                                                            <option value="2035"
                                                                            @if ($intake->year == "2035")
                                                                                selected 
                                                                            @endif
                                                                            >2035</option>
                                                                            
                                                                        </select>

                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Start Date  <span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="start_date" value="{{ $intake->start_date }}"  />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Deadline  <span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="deadline" value="{{ $intake->deadline }}" />
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Status <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="intake_status" required>
                                                                            <option value="">Select Status</option>
                                                                            <option value="Active"
                                                                            @if ($intake->status == "Active")
                                                                                selected 
                                                                            @endif
                                                                            >Active</option>
                                                                            <option value="InActive"
                                                                            @if ($intake->status == "InActive")
                                                                                selected 
                                                                            @endif
                                                                            >InActive</option>
                                                                            <option value="Open Soon"
                                                                            @if ($intake->status == "Open Soon")
                                                                                selected 
                                                                            @endif
                                                                            >Open Soon</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 mb-0">
                                                                        <input type="submit" value="Update" class="submit btn btn-primary btn-block" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


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