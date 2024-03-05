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
            <div class="col-md-12">
                <div class="course-reslt" style="padding: 0;background:#fff;">
                    <div class="shrtlst-hdr">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h5 class="mb-0"><a href="" class="dwnld-btn" style="font-size: 18px;">{{ $course->course_name }}</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="slct-course-box">
                        <div class="course-box">
                            <div class="shrtlst-contnt">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-globe"></i> <b>Country:</b> <span>{{ $country->name }}</span></p>
                                        
                                        
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-clock"></i> <b>Duration:</b> <span>{{ $course->duration }}</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Application Fee:</b> <span>{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Tution Fee:</b> <span>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Commisson:</b> <span style="color: #0156c3">{{ $course->fee_and_commission_currency }} {{ $course->commission_fee }}</span></p>
                                        <p class="unv-txt slct-course-txt">
                                            <i class="bi bi-calendar-check"></i> <b>Intakes:</b>

                                            @foreach ($intakes as $intake)
                                                

                                                @if ($intake->status == "Active")
                                                    
                                                    <span class="text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Active Intakes">
                                                        <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }},</span>
                                                    </span>
                                                @elseif ($intake->status == "Open Soon")
                                                    <span class="text-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Soon Intakes">
                                                        <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }}</span>
                                                    </span>
                                                @else
                                                    <span class="text-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="InActive Intakes">
                                                        <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }},</span>
                                                    </span>
                                                @endif


                                            


                                            @endforeach


                                            
                                        </p>
                                        <p class="unv-txt slct-course-txt" style="display:block"><i class="bi bi-hourglass-top"></i> <b>Course Description:</b>
                                        <h5>{!! $course->course_description !!}</h5>
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        @if (auth::user()->role == "Agent")
                                            <button class="btn btn-primary mb-3">Apply Now</button>
                                        @endif
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