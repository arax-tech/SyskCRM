@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'View University')


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


<style type="text/css">
    .project-image img{
        width: 80px !important; height: 80px !important;
    }
    .shrtlst-hdr {
        background: #b3ddfd;
        padding: 10px;
        border-bottom: 2px solid #49b0ff;
    }
    .shrtlst-all {
        display: flex;
        align-items: center;
        justify-content: end;
        flex-direction: row;
    }
    .filter-box {
       
        background: #fff;
        margin-bottom: 10px;
        border-bottom: 1px solid #dedede;
        padding: 12px;
    }
    .filter-title {
        font-size: 18px;
        padding-bottom: 2px;
        margin-bottom: 8px;
        font-weight: 600;
        border-bottom: 1px solid #eee;
    }
    .filter-content{
         height: 180px;
        overflow: auto;
    }
    .flter-txt {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        align-items: center;
        margin-bottom: 5px;
    }
    .flter-txt .unv-txt {
        margin-bottom: 0!important;
        width: 80%;
        line-height: 1.4;
    }
    .no-box {
        border: 1px solid #ccc;
        padding: 2px 3px;
        border-radius: 2px;
        display: inline-block;
        margin-bottom: 5px;
        min-width: 34px;
        text-align: center;
    }
    .flter-txt .unv-txt input{
        width: 18px;
        height: 18px;
        vertical-align: middle;
    }
    .dwnld-btn {
        font-size: 14px;
        text-decoration: none;
        line-height: 1;
        background: #49b0ff;
        color: #fff;
        border-radius: 40px;
        padding: 7px 12px;
        display: inline-block;
        margin: 0;
    }
    .clg-des-box h5{
        font-size:19px;
    }
    .shrtlst-all {
        display: flex;
        align-items: center;
        justify-content: end;
        flex-direction: row;
    }
    .chb {
      visibility: hidden;
    }

    .chb + label {
      position: relative;
      padding-right: 25px;
      font-size: 15px;
    }

    .chb + label::before {
      position: absolute;
      border-radius: 3px;
      content: "\f415";
      font-family: "bootstrap-icons";
      top: 1px;
      right: 0px;
      padding-bottom: 5px;
      color: #999;
      font-size: 15px;
      text-align: center;
      font-weight: bolder;
    }
    .chb:checked + label::before {
      content: "\f415";
     font-family: "bootstrap-icons";
      color: red;
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
            error_reporting(0);
            $country = DB::table('countries')->where('id', $university->country)->first();
            $state = DB::table('states')->where('id', $university->state)->first();
            $Unicampus = DB::table('campuses')->where('university_id', $university->id)->first();
            $AllCourses = DB::table('courses')->where('campus_name', $Unicampus->id)->paginate(9);
        @endphp
        <div class="row">
            <div class="col-md-12">
                <div class="course-reslt" style="padding: 0;background:#fff;">
                    <div class="shrtlst-hdr">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <h5 class="mb-0"><a href="#" class="dwnld-btn" style="font-size: 18px;">{{ $university->name }}</a></h5>
                            </div>
                        </div>
                    </div>
                    <div class="slct-course-box">
                        <div class="course-box">
                            <div class="shrtlst-contnt">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 col-12">
                                       
                                            @if (!empty($university->logo))
                                                <img class="shadow" style="width: 100% !important" src="{{ asset('backend/university/logo/'.$university->logo) }}" />
                                            @else
                                                <img class="shadow" src="{{ asset('backend/placeholder.jpg') }}" />
                                            @endif

                                    </div>
                                    <div class="col-lg-9 col-md-8 col-12">
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-globe"></i> <b>Country:</b> <span>{{ $country->name }}</span></p>
                                        
                                        
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-geo-alt"></i> <b>Address:</b> <span>{{ $university->add_line_one }} {{ $university->add_line_two }}</span></p>
                                        <p class="unv-txt slct-course-txt"><i class="bi bi-geo"></i> <b>Zip Code:</b> <span>{{ $university->zip }}</span></p>
                                        <p class="unv-txt slct-course-txt" style="display:block"><i class="bi bi-hourglass-top"></i> <b>Description:</b>
                                        <h5>{!! $university->description !!}</h5>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <br><br><br>
                <div class="course-reslt" style="padding: 0;background:#fff;">
                    <div class="shrtlst-hdr">
                        <div class="row">
                            <h2>{{ $university->name }} Courses</h2>
                        </div>
                    </div>
                    <div class="slct-course-box">
                        @foreach ($AllCourses as $course)

                            @php
                                error_reporting();
                                $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                $university = DB::table('universities')->where('id', $campus->university_id)->first();


                                error_reporting(0);
                                $country = DB::table('countries')->where('id', $university->country)->first();
                                $state = DB::table('states')->where('id', $university->state)->first();
                                $city = DB::table('cities')->where('id', $university->city)->first();


                                $intakes = DB::table('intakes')->where('course_id', $course->id)->get();

                            @endphp


                            <div class="course-box">
                                <div class="shrtlst-contnt">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="apply-list course-hdr">
                                                <div class="left-apply-list">
                                                    <div class="clg-logo-box">
                                                        <a target="_blank" href="{{ url('/agent/university/view/'.$university->id) }}">
                                                            @if (!empty($university->logo))
                                                                <img  class="colleg-logo" src="{{ asset('backend/university/logo/'.$university->logo) }}" />
                                                            @else
                                                                <img  class="colleg-logo" src="{{ asset('backend/placeholder.jpg') }}" />
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="clg-des-box">
                                                        <a target="_blank" href="{{ url('/agent/university/view/'.$university->id) }}">
                                                            <h5 class="mb-0">{{ $university->name }}</h5>
                                                        </a>
                                                        <p class="notfi-txt"><a target="_blank" href="{{ url('/agent/course/view/'.$course->id) }}">{{ $course->course_name }} <i class="bi bi-arrow-right"> </i></a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-10">
                                            <p class="unv-txt slct-course-txt"><i class="bi bi-globe"></i> <b>Country:</b> <span>{{ $country->name }}</span></p>
                                            
                                            
                                            <p class="unv-txt slct-course-txt"><i class="bi bi-clock"></i> <b>Duration:</b> <span>{{ $course->duration }}</span></p>
                                            <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Application Fee:</b> <span>{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}</span></p>
                                            <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Tution Fee:</b> <span>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</span></p>
                                            <p class="unv-txt slct-course-txt"><i class="bi bi-cash"></i> <b>Expected Commisson:</b> <span style="color: #0156c3"><b>{{ $course->fee_and_commission_currency }} {{ $course->commission_fee }}</b></span></p>
                                            <p class="unv-txt slct-course-txt"><i class="bi bi-calendar-check"></i> 
                                                <b>Intakes:</b>

                                                @foreach ($intakes as $intake)
                                                    

                                                    @if ($intake->status == "Active")
                                                        
                                                        <span class="bg-success text-white mx-1 px-1 rounded">
                                                            <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }}</span>
                                                        </span>
                                                    @elseif ($intake->status == "Open Soon")
                                                        <span class="bg-warning text-white mx-1 px-1 rounded"Intakes">
                                                            <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }}</span>
                                                        </span>
                                                    @else
                                                        <span class="bg-danger text-white mx-1 px-1 rounded">
                                                            <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }}</span>
                                                        </span>
                                                    @endif


                                                


                                                @endforeach


                                            </p>
                                        </div>
                                        
                                        <div class="col-12">
                                            <a href="{{ url('/agent/application/create?campus='.$campus->id.'&course='.$course->id) }}" class="btn btn-primary mb-3">Apply Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        

                        <div class="d-flex align-items-center justify-content-center p-2">
                            {{ $AllCourses->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection