@extends('agent.layouts.app')
@section('title', 'Search Programs')
@section('css')
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
@endsection
@section('content')

@php
    use App\Course;

    error_reporting(0);
    $course0 = $_REQUEST['course'];
    $country0 = $_REQUEST['country'];
    $university0 = $_REQUEST['university'];
    $degree_type0 = $_REQUEST['degree_type'];
    


    $countries = DB::table('countries')->get();
    $universities = DB::table('universities')->get();


    // Filter
    $AllCourses = Course::query();

    if ($course0)
    {
        $AllCourses->where('course_name','LIKE','%'.$course0.'%');
    }
    if ($country0)
    {
        $campus00 = DB::table('campuses')->where('country', $country0)->first();
        $AllCourses->where('campus_name', $campus00->id);
    }
    

    if($university0 && $degree_type0){
        $university00 = DB::table('campuses')->where('university_id', $university0)->first();
        $AllCourses->where(['campus_name' => $university00->id, 'degree_type' => $degree_type0]);
    }else{
        if ($university0)
        {
            $university00 = DB::table('campuses')->where('university_id', $university0)->first();
            $AllCourses->where('campus_name', $university00->id);
        }
        if ($degree_type0)
        {
            $AllCourses->where('degree_type', $degree_type0);
        }
    }

    $AllCourses = $AllCourses->paginate(3);



    if(!$country0 AND !$university0 && !$degree_type0 && !$course0){
        $AllCourses = DB::table("courses")->paginate(3);
    }
    


    $types = array("Volvo", "BMW", "Toyota");

    $types = array(
        1 => "Diploma",
        2 => "Advance Diploma",
        3 => "Associate Degree",
        4 => "Bachelor Degree",
        5 => "Certificate Program",
        6 => "Degree",
        7 => "Graduate Certificate",
        8 => "Masters",
        9 => "Post Graduate Certificate",
        10 => "Phd",
        11 => "Training and Internship",
    );

@endphp

<div class="content-body">
    <div class="container-fluid">
        
            <form method="get">
                <div class="row g-0 bg-white p-3">
                    

                    <div class="offset-md-2 col-lg-6 mb-2">
                        <input type="search" name="course" placeholder="Search Course..." @if ($course0) value="{{ $course0 }}"  @endif class="form-control" required style="border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important;height:3rem;">
                    </div>
                    <div class="col-2">
                        <input type="submit" class="btn btn-primary w-100" value="Search"  style="border-top-left-radius: 0px !important; border-bottom-left-radius: 0px !important;"/>
                    </div>
                    
                </div>
                

            <div class="row mt-2">
            <div class="col-md-4">
                <div style="background:#fff;">
                    <div class="shrtlst-hdr mb-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="shrtlst-all" style="justify-content: flex-start;">
                                    <h5 class="p-0">Filter</h5>
                                    <i class="bi bi-filter px-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter-box">
                        <h6 class="filter-title">Country </h6>
                        <div class="filter-content">
                            @foreach ($countries as $country)
                                @php

                                    error_reporting(0);
                                    $campus = DB::table('campuses')->where('country', $country->id)->first();
                                    $courses = DB::table('courses')->where('campus_name', $campus->id)->count();
                                @endphp
                                <div class="flter-txt">
                                    <label class="unv-txt" id="{{ $country->id }}">
                                        <input type="checkbox" onChange="this.form.submit()" name="country" value="{{ $country->id }}" for="{{ $country->id }}" @if ($country0 == $country->id) checked @endif> <span>{{ mb_strimwidth($country->name, 0, 25, "...") }}</span>
                                    </label>
                                    <p class="no-box">{{ $courses }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-box">
                        <h6 class="filter-title">University </h6>
                        <div class="filter-content">
                            @foreach ($universities as $university)

                                @php

                                    error_reporting(0);
                                    $campus0 = DB::table('campuses')->where('university_id', $university->id)->first();
                                    $courses0 = DB::table('courses')->where('campus_name', $campus0->id)->count();
                                @endphp


                                <div class="flter-txt">
                                    <label class="unv-txt" id="{{ $university->id }}">
                                        <input type="checkbox" onChange="this.form.submit()" name="university" value="{{ $university->id }}" for="{{ $university->id }}" @if ($university0 == $university->id) checked @endif> <span>{{ mb_strimwidth($university->name, 0, 25,"...") }}</span>
                                    </label>
                                    <p class="no-box">{{ $courses0 }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-box">
                        <h6 class="filter-title">Degree Types </h6>
                        <div class="filter-content">
                            
                            @foreach ($types as $key => $type)
                                <div class="flter-txt">
                                    @php
                                        error_reporting(0);
                                        $couse000 = DB::table('courses')->where('degree_type', $type)->count();
                                    @endphp
                                    <label class="unv-txt" id="{{ $type }}">
                                        <input type="checkbox" onChange="this.form.submit()" name="degree_type" value="{{ $type }}"  for="{{ $type }}"  @if ($degree_type0 == $type) checked @endif> <span>{{ $type }}</span>
                                    </label>

                                    <p class="no-box">{{ $couse000 }} </p>
                                </div>

                            @endforeach


                        </div>
                    </div>

                    <div class="filter-box">
                        <a class="btn btn-primary" href="{{ url('/agent/search/program') }}">Clear Filter</a>
                        
                    </div>
                </div>
            </div>
            </form>
            <div class="col-md-8">
                <form method="post" action="{{ url('/shortlist') }}">
                    @csrf
                    
                    <div class="course-reslt" style="padding: 0;background:#fff;">
                        <div class="shrtlst-hdr">
                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <h5 class="mb-0">
                                        <input class="btn dwnld-btn" type="submit" value="Download">
                                    </h5>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="txt-md-right shrtlst-all">
                                        <input type="checkbox" class="chb selectall" id="slctall" />
                                        <label for="slctall">Shortlist All</label>
                                    </div>
                                </div>
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
                                            <div class="col-md-10 col-10">
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
                                            <div class="col-md-2 col-2">
                                                <div class="txt-md-right shrtlst-all mb-3">

                                                    <input type="checkbox" name="shortlist[]" class="chb" id="Shortlist-{{ $course->id }}" value="{{ $course->id }}" />
                                
                                                    <label for="Shortlist-{{ $course->id }}">Shortlist</label>


                                                </div>
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
                </form>
            </div>
        </div>
        

    </div>
</div>




@endsection
@section('js')
    <script type="text/javascript">
        $(".selectall").click(function(){
            $(".individual").prop("checked",$(this).prop("checked"));
        });
    </script>
    <script type="text/javascript">
        $(".selectall").click(function(){
        $(".chb").prop("checked",$(this).prop("checked"));
        });

        $("#SearchForm").on("change", "input:checkbox", function(){
            $("#countryCheck").submit();
        });

    </script>
@endsection