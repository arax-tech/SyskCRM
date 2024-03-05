@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'View Course')

<style type="text/css">
    .shrtlst-hdr {
        background: #b3ddfd;
        padding: 10px;
        border-bottom: 2px solid #49b0ff;
}

.slct-course-box {
    display: flex;
    flex-wrap: wrap;
}
.course-box {
    width: 100%;
}
.shrtlst-contnt {
    padding: 15px 15px 6px;
    border-bottom: 2px solid #acb5ff;
}

.apply-list {
    /* box-shadow: 0 0 7px #e1e4e6; */
    border-radius: 5px;
    border: 3px solid #eee;
}
.course-hdr {
    background: #e0eef8;
    border: none!important;
    padding: 6px;
    margin-bottom: 10px;
}
.left-apply-list {
    display: flex;
    flex-wrap: wrap;
}
.course-hdr .clg-logo-box {
    width: 45px;
}
.clg-logo-box {
    width: 60px;
    margin-right: 15px;
}
.colleg-logo {
    width: 100%;
}
.clg-des-box {
    width: calc(100% - 75px);
}
.notfi-txt {
    color: #544F65;
    font-weight: 400;
    font-size: 16px;
    padding: 0px 0 5px;
    line-height: 1.3;
}
.notfi-txt a {
    text-decoration: none;
}
.slct-course-txt {
    display: inline-block;
    border-bottom: 1px solid #ddd;
    padding-bottom: 8px;
    margin-right: 25px;
}

.unv-txt {
    font-size: 15px;
    margin-bottom: 15px;
}
.unv-txt i {
    line-height: 1.2;
    vertical-align: middle;
}
.unv-txt b{
    font-weight:500;
}
.unv-txt span{
    font-weight:bold;
}
.shrtlst-all {
    display: flex;
    align-items: center;
    justify-content: end;
    flex-direction: row;
}
    

    </style>
    
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
                                            
                                        </tr>


                                 


                                    @endforeach
                                    

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
        <!--------New Add------------->
        
        
        <div class="row">
            <div class="col-md-12">
                <div class="course-reslt" style="padding: 0;background:#fff;">
                    <div class="shrtlst-hdr">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h5 class="mb-0"><a href="#" class="dwnld-btn" style="font-size: 18px;">Graduate Certificate in Project Management</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="slct-course-box">
                        <div class="course-box">
                            <div class="shrtlst-contnt">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-globe"></i> <b>Country:</b> <span>Canada</span></p>
                                        
                                        
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-clock"></i> <b>Duration:</b> <span>12 Month</span>(s)</p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Application Fee:</b> <span>Cad $15,550</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Yearly Tution Fee:</b> <span>Cad $15,550</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Expected Commisson:</b> <span style="color: #0156c3">Cad $1500</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-calendar-check"></i> <b>Intakes:</b> <span class="month-bg">Sep</span> <span class="month-bg">Aug</span></p>
                                        <p class="unv-txt slct-course-txt" style="display:block"><i class="bi bi-hourglass-top"></i> <b>Course Description:</b>
                                        <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, quibusdam laborum iure provident dolorum perferendis, aspernatur harum placeat quis veritatis distinctio sint fugiat unde earum impedit fuga expedita laboriosam commodi?</h5>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary mb-3">Apply Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection