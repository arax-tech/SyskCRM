@extends('admin.layouts.app')
@section('title', 'View Course')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        @php
            error_reporting();
            $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
            $university = DB::table('universities')->where('id', $campus->university_id)->first();


            error_reporting(0);
            $country = DB::table('countries')->where('id', $university->country)->first();
            $state = DB::table('states')->where('id', $university->state)->first();
            $city = DB::table('cities')->where('id', $university->city)->first();

        @endphp
        <div class="row">
            
            <div class="col-xl-4 col-lg-6 col-sm-12">
                <div class="card overflow-hidden" style="height: 390px !important">
                    <div class="card-header bg-light" style="height: 75px">
                        <h4 class="card-title">University</h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <div class="profile-photo">

                                @if (!empty($university->logo))
                                    <img width="100" class="img-fluid rounded-circle" src="{{ asset('backend/university/logo/'.$university->logo) }}" />
                                @else
                                    <img width="100" class="img-fluid rounded-circle" src="{{ asset('backend/placeholder.jpg') }}" />
                                @endif
                            </div>
                            <h3 class="mt-4 mb-1">{{ $university->name }}</h3>
                            <p class="text-muted">{{ $university->add_line_one }}, {{ $university->add_line_two }} </p>
                        </div>
                    </div>
                    
                    <div class="card-footer pt-0 pb-0 text-center">
                        <div class="row">
                            <div class="col-6 pt-3 pb-3 border-end">
                                <h3 class="mb-1">{{ DB::table('campuses')->where('university_id', $university->id)->count() }}</h3><span>Campuses</span>
                            </div>
                            <div class="col-6 pt-3 pb-3">
                                <h3 class="mb-1">1</h3><span>Courses</span>
                            </div>
                            
                        </div>
                    </div>
                </div>



                <div class="card" style="height: 390px !important">
                    <div class="card-header border-0 pb-0">
                        <h2 class="card-title">about university</h2>
                    </div>
                    <div class="card-body pb-0">
                        {!! $university->description !!}
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Name</strong>
                                <span class="mb-0">{{ $university->name }}</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Address</strong>
                                <span class="mb-0">{{ $university->add_line_one }}, {{ $university->add_line_two }}</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>Country</strong>
                                <span class="mb-0">{{ $country->name }}</span>
                            </li>
                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>State</strong>
                                <span class="mb-0">{{ $state->name }}</span>
                            </li>

                            <li class="list-group-item d-flex px-0 justify-content-between">
                                <strong>City</strong>
                                <span class="mb-0">{{ $city->name }}</span>
                            </li>
                        </ul>
                    </div>
                    
                </div>




            </div>
            <div class="col-xl-8 col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Course Detail</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('admin/course/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>

                   
                    <div class="card-body">

                        
                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Course Name</label><br>
                                <label class="mb-1">{{ $course->course_name }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">University Name</label><br>
                                <label class="mb-1">{{ $university->name }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Campus Name</label><br>
                                <label class="mb-1">{{ $campus->name }}</label>
                            </div>

                            
                        </div>

                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">tuition fee</label><br>
                                <label class="mb-1">{{ $course->tuition_fee }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">commission fee</label><br>
                                <label class="mb-1">{{ $course->commission_fee }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">application fee</label><br>
                                <label class="mb-1">{{ $course->application_fee }}</label>
                            </div>
                        </div>



                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">currency</label><br>
                                <label class="mb-1">{{ $course->fee_and_commission_currency }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">duration</label><br>
                                <label class="mb-1">{{ $course->duration }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">degree type</label><br>
                                <label class="mb-1">{{ $course->degree_type }}</label>
                            </div>
                        </div>



                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-8">
                                <label class="mb-1 text-uppercase font-weight-bolder">study field</label><br>
                                <label class="mb-1">{{ $course->study_field }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">study type</label><br>
                                <label class="mb-1">{{ $course->study_type }}</label>
                            </div>

                           
                        

                            <div class="col-md-8">
                                <label class="mb-1 text-uppercase font-weight-bolder">fees per year</label><br>
                                <label class="mb-1">{{ $course->fees_per_year }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">year</label><br>
                                <label class="mb-1">{{ $course->year }}</label>
                            </div>

                        </div>


                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">test name</label><br>
                                <label class="mb-1">{{ $course->test_name }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">over all socre</label><br>
                                <label class="mb-1">{{ $course->over_all_socre }}</label>
                            </div>
                        
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">speaking</label><br>
                                <label class="mb-1">{{ $course->speaking }}</label>
                            </div>
                        </div>


                        <div class="row mb-4 custom_bottom_border">

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">listening</label><br>
                                <label class="mb-1">{{ $course->listening }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">reading</label><br>
                                <label class="mb-1">{{ $course->reading }}</label>
                            </div>
                        
                            <div class="col-md-12">
                                <label class="mb-1 text-uppercase font-weight-bolder">writing</label><br>
                                <label class="mb-1">{{ $course->writing }}</label>
                            </div>

                            
                        </div>


                        


                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-12">
                                <label class="mb-1 text-uppercase font-weight-bolder">course description</label><br>
                                <label class="mb-1">{!! $course->course_description !!}</label>
                            </div>
                           
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label class="mb-1 text-uppercase font-weight-bolder">education requirement</label><br>
                                <label class="mb-1">{!! $course->education_requirement !!}</label>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Intakes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="example" class="table table-striped table-responsive-md">
                                <thead>
                                    <tr>
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
                                        @endphp
                                        <tr>
                                            
                                            <td>{{ $course->course_name }} </td>
                                            <td>{{ $intake->year }} </td>
                                            <td>{{ $intake->month }} </td>
                                            <td>{{ date('d M Y', strtotime($intake->start_date)) }} </td>
                                            <td>{{ date('d M Y', strtotime($intake->deadline)) }} </td>
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
                                                    <a href="javascript::" class="btn btn-primary shadow btn-xs sharp me-1"  data-bs-toggle="modal" data-bs-target="#UpdateIntake{{ $intake->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                    <a  href="{{ url('/admin/intake/delete/'.$intake->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
                                                                            <option selected disabled value=""></option>
                                                                            @foreach ($courses as $course)
                                                                                <option value="{{ $course->id }}"
                                                                                    @if ($course->id == $intake->course_id)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $course->course_name }}</option>
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
                                                                        <input type="text" class="form-control" name="intake_year" value="{{ $intake->year }}" required  />
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Start Date  <span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="start_date" value="{{ $intake->start_date }}"  required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Deadline  <span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="deadline" value="{{ $intake->deadline }}" required />
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