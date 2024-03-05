@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'Course preference ')
@section('content')

@section('css')
<style type="text/css">
        .top-cmnt-box p, .inter-comnt p{
            margin: 0;
        }
        .std-id p{
            font-size:20px!important;
        }
        .std-id span{
            padding: 0px 14px;
            background: #acdafd;
            border-radius: 2px;
            margin-bottom: 25px;
            display: inline-block;
                }
        .text-right{
            text-align:right;
        }
        .tab-content{
            border: 1px solid #eee;
            padding: 15px;
            background:#fbfbfb;
        }
        .top-main-nav .nav-link.active{
            background: #49b0ff!important;
            border: none;
            color: #fff!important;
        }
        .top-main-nav .tab-pane.active{
            border: 1px solid #f7f7f7;
            box-shadow: 0px 2px 5px 0 rgb(82 63 105 / 5%);
        }
        .top-main-nav .nav-link{
            border: none;
            border-radius: 0;
            padding: 10px 4px 14px;
            font-size: 17px;
            color: #222;
            margin-bottom:0!important;
        }
        .nav-tabs{
            border: 1px solid #e3e0e0;
            padding: 1px;
        }
        .top-main-nav li.nav-item{
            width: 20%;
            text-align: center;
            background: #ebebeb;
        }
        .info-title{
            background: #ddecf7;
            color: #444;
            font-size: 19px;
            padding: 6px 11px 8px;
            border-radius: 2px;
        }
        .basic-info{
            /*padding: 15px;*/
            margin-bottom: 15px;
        }
        .info p{
            font-size: 15px;
            padding-left: 5px;
            margin-bottom: 4px;
            display:flex;
        }
        .info p span:first-child{
            font-weight: 600;
            width:30%;
        }
        .info p span:last-child{
            font-weight: 400;
            margin-left:10px;
        }
        .doc-file{
            border: 1px solid #d5d5d5;
            border-radius: 5px;
            font-size: 15px;
    padding: 3px 12px;
            display: inline-block;
            color: #333;
            font-weight: 400;
            background: #f2f9ff;
            margin: 5px 5px;
        }
        /*----Application----*/
        .apply-list {
            /* box-shadow: 0 0 7px #e1e4e6; */
            border-radius: 5px;
            border: 3px solid #eee;
        }
        .apply-list ul {
            margin: 0;
            padding: 0;
        }
        .apply-list ul li {
            list-style: none;
            position: relative;
        }
        .apply-list ul li a {
            text-decoration: none;
            padding: 11px 11px 11px 11px;
            display: block;
            border-bottom: 2px solid #F1F1F3;
            /* border-left: 3px solid #fff; */
        }
        .left-apply-list {
            display: flex;
            flex-wrap: wrap;
        }
        .clg-logo-box {
            width: 60px;
            margin-right: 15px;
        }
        .colleg-logo {
            width: 100%;
            border-radius: 50%;
        }
        .clg-des-box {
            width: calc(100% - 75px);
        }
        .clg-des-box h5{
            font-size:18px;
        }
        .notfi-txt {
            color: #544F65;
            font-weight: 400;
            font-size: 16px;
            padding: 0px 0 5px;
            line-height: 1.3;
            margin: 0;
        }
        .clg-txt {
            color: #4D4F5C;
            font-weight: 400;
            font-size: 14px;
            text-align: right;
            margin: 0;
        }
        .apply-list ul li:last-child a {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .apply-list-active {
            background: #E5ECF4;
        }
        .comnt-box {
            display: flex;
                font-size: 15px;
        }
        .user-cmnt-box {
            font-size: 15px;
            font-weight: 600;
            background: #49b0ff;
            width: 41px;
            height: 38px;
            border-radius: 50%;
            text-align: center;
            line-height: 38px;
            color: #fff;
            margin: 0 auto 3px;
            /* margin-right: 10px; */
            /* float: right; */
            /* margin-bottom: 5px; */
            /* margin-left: 10px; */
        }
        .msg-box {
            width: calc(100% - 75px);
        }
        .top-cmnt-box {
            background: #49b0ff;
            padding: 7px 5px;
            color: #fff;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            display: flex;
            justify-content: space-between;
            font-size: 15px;
        }
        .sms-bg {
            background: #e9ebff;
            padding: 12px 8px;
            color: #333;
            border-radius: 2px;
            margin: 0px 0 5px 0px;
            box-shadow: 0px 2px 6px #e6e6e6;
            line-height: 1.4;
            font-size: 15px;
        }
        .bg-grn {
            background: #0e9d0e;
        }
        .txtarea-box {
            width: 100%;
            border: 2px solid #eee;
            border-radius: 5px;
            border-top-left-radius: 0px;
            border-top-right-radius: 0;
            resize: none;
            padding: 2px;
            outline: none;
        }
        .send-sms-box {
            display: flex;
            align-items: center;
            justify-content: end;
        }
        

        .attach-file {
            font-size: 20px;
            color: #444;
            margin-right: 10px;
            margin-left: 10px;
        }
        .send-sms-btn {
            width: 120px;
            background: #49b0ff;
            padding: 0;
            border: none;
            color: #fff;
            border-radius: 2px;
            line-height: 1;
            font-weight: 500;
            
        }
        .program-ul {
            display: flex;
            margin-bottom: 25px;
        }
        .program-ul li {
            width: auto;
            display: inline-block;
            padding: 10px 50px;
            text-align: center;
            font-weight: 500;
            margin-right: 20px;
            border: 1px solid #c8cdfb;
            border-radius: 5px;
            cursor: pointer;
            font-size: 15px;
        }
        .program-ul li:last-child {
            margin-right: 0px;
        }
        .active1 {
            background: #49b0ff!important;
            color: #fff;
        }
        /*---Interview-----*/
        .operating-lease ul{
            display: block;
            border: none;
            padding-left: 0;
            padding-right: 0;
        }
        .operating-lease ul li{
            display: block;
            background-color: #f5f5f5;
            border-top: 1px solid #e6ecf0;
            padding: 0px 0px;
            position:relative;  
        }
        .operating-lease ul li:first-child{
            border-top: none;
        }
        .operating-lease ul li a::after{
            content:"";
            border-top:8px solid transparent;
            border-left:10px solid #b9dcf7;
            border-bottom:10px solid transparent;
            position:absolute;
            top:50%;
            left:100%;
            display: none;
            transform: translate(0,-50%);
        }
        .operating-lease ul li a.active::after{
            display: block;
        }
        .operating-lease ul li a{
            padding: 12px 15px;
            font-weight: 400;
            font-size: 16px;
            line-height: 30px;
            text-align: justify;
            color: #333;
            display: inline-block;
            border: none!important;
            border-left: 5px solid transparent!important;
            border-radius: 0!important;
            margin-bottom: 0!important;
            transition: 0.5s;
            width: 100%;
            text-decoration: none;

        }
        .operating-lease i{
            display: inline-block;
        }
        .operating-lease ul li a:hover{
            border-left: 5px solid #1c81d0!important;
            color: #000;
            background: #b9dcf7;
        }

        .operating-lease ul li a.active{
            color: #000!important;
            border-color: #1c81d0!important;
            background-color: #b9dcf7!important;
        }
        .tab_wrapper{
            width:100%;
            height: 100%;
        }

        .tab_panel p{
            padding-left: 50px;
            font-weight: 500;
            font-size: 16px;
            line-height: 30px;
            color: #303030;
            text-align: justify;
        }
        .tab_panel {
            width:100%;
            height: 100%;
        /*  display: flex;
            justify-content: center;
            align-items: center;*/
            font-size:18px;
            color:#000;
            padding: 24px 0px;
            border: 1px solid #F2F2F2;
        }
        .inter-comnt{
            /*border: 1px solid #d9eaf6;*/
            border-radius: 5px;
            /*box-shadow: 0px 1px 2px 1px #ebebeb85;*/
            padding: 10px;
            background: #e8f2fa;
            position: relative;
                font-size: 14px;
        }
        .inter-comnt::after{
            content: "";
            border-top: 14px solid #e8f2fa;
            border-left: 16px solid #b9dcf700;
            /* border-bottom: 10px solid black; */
            border-right: 16px solid #ff000000;
            position: absolute;
            bottom: -10px;
            right: 11px;
        }
        .staus{
            font-size: 17px;
            display: inline-block;
            color: #fff;
            padding: 5px 20px;
            border-radius: 2px;
            margin-top: 5px;
        }
        .acpt-status{
            background: #169a16;    
        }
        .pending-status{
            background: #f6a410;
        }
        .cancel-status{
            background: #ee0f0f;
        }
        .status-box{
            background: #ddecf7;
            text-align: center;
            padding: 10px 10px 18px;
            border-radius: 3px;
        }
        .status-box p:first-child{
            font-weight: 500;
            font-size: 17px;
            margin-bottom: 6px;
        }
        
        @media(max-width:575px){
            .top-main-nav .nav-link, .doc-file{
                font-size:15px;
            }
            .top-main-nav li.nav-item {
                width: 50%;
            }
            .program-ul li{
                width: 50%;
                padding: 8px 10px;
            }
            .top-cmnt-box{
                font-size:14px;
            }
            .top-cmnt-box p:last-child{
                text-align:right;
            }
            .operating-lease ul li a.active::after{
                display:none;
            }
            .status-box{
                margin-bottom:25px;
            }
        }
    </style>
@endsection


@php
    error_reporting(0);
    
    $student = DB::table('students')->where('id', $application->student_id)->first();
    $campus = DB::table('campuses')->where('id', $application->campus_id)->first();
    $university = DB::table('universities')->where('id', $campus->university_id)->first();
    $course = DB::table('courses')->where('id', $application->course_id)->first();
    $intakes = DB::table('intakes')->where('id', $application->intake_id)->get();
    


    error_reporting(0);
    $country = DB::table('countries')->where('id', $university->country)->first();
    $state = DB::table('states')->where('id', $university->state)->first();
    $city = DB::table('cities')->where('id', $university->city)->first();

@endphp
<div class="content-body">
    <div class="container-fluid">
        
      

        <div class="row">
            <div class="col-md-12">
                <div class="student-tab-box">
                    <ul class="nav nav-tabs top-main-nav mb-3">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#application-info">Application</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#student">Student</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#course">Course</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Uploaded_Documents">Uploaded Documents </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" target="_blank" href="{{ url('/export-excel?id='.$application->id) }}">Download</a>
                      </li>
                    </ul>

                    
                    <div class="tab-content">
                      <div class="tab-pane active" id="application-info">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="basic-info">
                                    <h4 class="info-title">Application Overview</h4>
                                    <div class="info">
                                        <p><span>Application ID </span>: <span>{{ $application->id }}</span></p>
                                        <p><span>Student Name </span>: <span>{{ $student->first_name }}</span></p>
                                        <p><span>University Name </span>: <span>{{ $university->name }}</span></p>
                                        <p><span>Campus Name </span>: <span>{{ $campus->name }}</span></p>
                                        <p><span>Application Status </span>: 
                                            @if ($application->status == "Pending")
                                                <span class="bg-primary text-white px-2 rounded">{{ $application->status }}</span>
                                            @elseif ($application->status == "Accepted")
                                                <span class="bg-success text-white px-2 rounded">{{ $application->status }}</span>
                                            @else
                                                <span class="bg-danger text-white px-2 rounded">{{ $application->status }}</span>
                                            @endif
                                        </p>
                                        <p><span>Payment Status </span>: 
                                            @if ($application->payment_status == "Paid")
                                                <span class="bg-success text-white px-2 rounded">{{ $application->payment_status }}</span>
                                            @else
                                                <span class="bg-danger text-white px-2 rounded">{{ $application->payment_status }}</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="student">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="basic-info">
                                    <h4 class="info-title">Applied Student Overview</h4>
                                    <div class="info">
                                        <p><span>Registration No </span>: <span>{{ $student->registration_number }}</span></p>
                                        <p><span>Frist Name </span>: <span>{{ $student->first_name }}</span></p>
                                        <p<span>>Middl Name </span>: <span>{{ $student->middle_name }}</span></p>
                                        <p><span>Last Name </span>: <span>{{ $student->last_name }}</span></p>
                                        <p><span>Date of Birth </span>: <span>{{ $student->date_of_birth }}</span></p>
                                        <p><span>Gender </span>: <span>{{ $student->gender }}</span></p>
                                        <p><span>Nationality </span>: <span>{{ $nationality->name }}</span></p>
                                        <p><span>Passport Number </span>: <span>{{ $student->passport_number }}</span></p>
                                        <p><span>Email Address </span>: <span>{{ $student->email_address }}</span></p>
                                        <p><span>Contact Number </span>: <span>{{ $student->contact_number }}</span></p>
                                    </div>
                                </div>
                                <div class="basic-info">
                                    <h4 class="info-title">Education Info</h4>
                                    <div class="info">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="margin-left: 4px">Qualification 1</h4>
                                                <p><span>Course Title </span>: <span>{{ $student->qualification1_course_title }}</span></p>
                                                <p><span>Course Level </span>: <span>{{ $student->qualification1_course_level }}</span></p>
                                                <p><span>Course Duration </span>: <span>{{ $student->qualification1_course_duration }}</span></p>
                                                <p><span>University or Organisation </span>: <span>{{ $student->qualification1_university_or_organisation }}</span></p>
                                                <p><span>Medium of Education </span>: <span>{{ $student->qualification1_medium_of_education }}</span></p>
                                                <p><span>Grade </span>: <span>{{ $student->qualification1_grade }}</span></p>
                                                <p><span>Year of Passing </span>: <span>{{ $student->qualification1_year_of_passing }}</span></p>
                                            </div>
                                            <div class="col">
                                                <h4 style="margin-left: 4px">Qualification 2</h4>
                                                <p><span>Course Title </span>: <span>{{ $student->qualification2_course_title }}</span></p>
                                                <p><span>Course Level </span>: <span>{{ $student->qualification2_course_level }}</span></p>
                                                <p><span>Course Duration </span>: <span>{{ $student->qualification2_course_duration }}</span></p>
                                                <p><span>University or Organisation </span>: <span>{{ $student->qualification2_university_or_organisation }}</span></p>
                                                <p><span>Medium of Education </span>: <span>{{ $student->qualification2_medium_of_education }}</span></p>
                                                <p><span>Grade </span>: <span>{{ $student->qualification2_grade }}</span></p>
                                                <p><span>Year of Passing </span>: <span>{{ $student->qualification2_year_of_passing }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="basic-info">
                                    <h4 class="info-title">Emergency Contact Info</h4>
                                    <div class="info">
                                        <p><span>Contact name </span>: <span>{{ $student->emergency_contact_name }}</span></p>
                                        <p><span>Contact relationship </span>: <span>{{ $student->emergency_contact_relationship }}</span></p>
                                        <p><span>Contact number </span>: <span>{{ $student->emergency_contact_number }}</span></p>
                                    </div>
                                </div>

                                <div class="basic-info">
                                    <h4 class="info-title">Address Info</h4>
                                    <div class="info">
                                        <div class="row">
                                            <div class="col">
                                                <h4 style="margin-left: 4px">Permanent Address</h4>
                                                <p><span>Address line one </span>: <span>{{ $student->permanent_address_line_one }}</span></p>
                                                <p><span>Address line two </span>: <span>{{ $student->permanent_address_line_two }}</span></p>
                                                <p><span>Address country </span>: <span>{{ $student->permanent_address_country }}</span></p>
                                                <p><span>Address state </span>: <span>{{ $student->permanent_address_state }}</span></p>
                                                <p><span>Address city </span>: <span>{{ $student->permanent_address_city }}</span></p>
                                                <p><span>Address pincode </span>: <span>{{ $student->permanent_address_pincode }}</span></p>
                                            </div>
                                            <div class="col">
                                                <h4 style="margin-left: 4px">Communication Address</h4>
                                                <p><span>Address line one </span>: <span>{{ $student->communication_address_line_one }}</span></p>
                                                <p><span>Address line two </span>: <span>{{ $student->communication_address_line_two }}</span></p>
                                                <p><span>Address country </span>: <span>{{ $student->communication_address_country }}</span></p>
                                                <p><span>Address state </span>: <span>{{ $student->communication_address_state }}</span></p>
                                                <p><span>Address city </span>: <span>{{ $student->communication_address_city }}</span></p>
                                                <p><span>Address pincode </span>: <span>{{ $student->communication_address_pincode }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="course">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="basic-info">
                                    <h4 class="info-title">Applied Course Overview</h4>
                                    <div class="info">
                                        <p><span>Course Name </span>: <span>{{ $course->course_name }}</span></p>
                                        <p><span>Tuition Fee </span>: <span>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</span></p>
                                        <p><span>Commission Amount </span>: <span>{{ $course->fee_and_commission_currency }} {{ $course->commission_fee }}</span></p>
                                        <p><span>Application Fee </span>: <span>{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}</span></p>
                                        <p><span>Duration </span>: <span>{{ $course->duration }}</span></p>
                                        <p><span>Intake </span>: <span>
                                            @foreach ($intakes as $intake)
                                                

                                                @if ($intake->status == "Active")
                                                    
                                                    <span class="bg-success text-white px-2 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Active Intakes">
                                                        <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }},</span>
                                                    </span>
                                                @elseif ($intake->status == "Open Soon")
                                                    <span class="bg-warning text-white px-2 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="Open Soon Intakes">
                                                        <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }}</span>
                                                    </span>
                                                @else
                                                    <span class="bg-danger text-white px-2 rounded" data-bs-toggle="tooltip" data-bs-placement="top" title="InActive Intakes">
                                                        <span class="month-bg">{{ $intake->year }}</span> <span class="month-bg">{{ $intake->month }},</span>
                                                    </span>
                                                @endif


                                            


                                            @endforeach
                                        </span></p>
                                        <p><span>Degree </span>: <span>{{ $course->degree_type }}</span></p>
                                        <p><span>Study Field </span>: <span>{{ $course->study_field }}</span></p>
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="Uploaded_Documents">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="basic-info">
                                    <h4 class="info-title">Uploaded Documents Overview</h4>
                                    <div class="info">
                                        <p><span>Student Image </span>: 
                                            <span>
                                                @if (!empty($student->photograph))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Photograph" target="_blank" href="{{ asset('/backend/student/document/'.$student->photograph) }}" class="doc-file">Photograph</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Photograph" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>
                                        
                                        <p><span>Passport </span>: 
                                            <span>
                                                @if (!empty($student->passport))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Passport" target="_blank" href="{{ asset('/backend/student/document/'.$student->passport) }}" class="doc-file">Passport</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Passport" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>


                                        <p><span>Address Proof </span>: 
                                            <span>
                                                @if (!empty($student->address_proof))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Address Proof" target="_blank" href="{{ asset('/backend/student/document/'.$student->address_proof) }}" class="doc-file">Address Proof</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Address Proof" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>


                                        <p><span>Qualifications </span>: 
                                            <span>
                                                @if (!empty($student->qualifications))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Qualifications" target="_blank" href="{{ asset('/backend/student/document/'.$student->qualifications) }}" class="doc-file">Qualifications</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Qualifications" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>


                                        <p><span>Work Experience </span>: 
                                            <span>
                                                @if (!empty($student->work_experience))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Work Experience" target="_blank" href="{{ asset('/backend/student/document/'.$student->work_experience) }}" class="doc-file">Work Experience</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Work Experience" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>


                                        <p><span>CV </span>: 
                                            <span>
                                                @if (!empty($student->cv))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="CV" target="_blank" href="{{ asset('/backend/student/document/'.$student->cv) }}" class="doc-file">CV</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="CV" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>


                                        <p><span>Personal Statement </span>: 
                                            <span>
                                                @if (!empty($student->personal_statement))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Personal Statement" target="_blank" href="{{ asset('/backend/student/document/'.$student->personal_statement) }}" class="doc-file">Personal Statement</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Personal Statement" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>



                                        <p><span>Any other supporting documents </span>: 
                                            <span>
                                                @if (!empty($student->any_other_supporting_documents))
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Any other supporting documents" target="_blank" href="{{ asset('/backend/student/document/'.$student->any_other_supporting_documents) }}" class="doc-file">Any other supporting documents</a>
                                                @else
                                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Any other supporting documents" href="javascript::" class="doc-file">Not Provided</a>
                                                @endif
                                            </span>
                                        </p>

                                        
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="download">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="basic-info">
                                      <h4 class="info-title">Application Related Documents Download</h4>
                                      <div class="info">
                                          <p>Doc not found for this application !!!</p>
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
</div>






@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">




        $("#commentBox").hide();

        $('.applicationList').click(function(){
            var application_id = $(this).attr("value");
            $("#applicationId").val(application_id);
            getCommnets();
        });



        function getCommnets()
        {
            var application_id = $("input[name=applicationId").val();
            
            // alert(application_id);

            var uri = "{{ url('getCommnets/') }}"+"/"+application_id;
            $.ajax({
                url: uri,
                type: "get",
                success: function(response)
                {
                    // console.log(response);

                    $('#comments').empty(); // Empty <tbody>
                    $("#commentBox").show();
                    response.forEach(function(item){
                        // console.log(item);

                        var user_id = item.user_id;
                        var name = item.name;
                        var shortname = item.name;

                        

                        var designation = item.designation;
                        var image = item.image;
                        var comment = item.comment;
                        var documents = item.document;
                        var created_at = item.created_at;

                        var d = new Date(Date.parse(created_at.replace(/-/g, "/")));
                        var time = d.toLocaleTimeString();
                     
                        var imageUrl = '';
                       

                        if(image === null){
                            imageUrl = '{{ asset('/backend/placeholder.jpg') }}';
                        }else{
                            imageUrl = '{{ asset('/backend/profile/') }}'+"/"+image;

                        }
                        
                        var document1 = '';
                        if(documents === null){
                            document1 = ``;
                        }else{
                            document1 = `<a target="_blank" class="text-primary" href={{ asset('/backend/document/') }}/${documents}>View Documents<a>`;
                        }
                             var tr_str = '';
                            if('{{ auth::user()->id }}' == user_id){
                                tr_str = `

                                        <div>
                                            <div class="comnt-box mb-3">
                                                <div class="msg-box">
                                                    <div class="top-cmnt-box bg-grn">
                                                        <p>${designation} : <span>Remarks</span></p>
                                                        <p>${time}</p>
                                                    </div>
                                                    <p class="sms-bg">${comment}</p>
                                                    ${document1}
                                                </div>
                                                <div style="margin-left: 10px;text-align: center;width: 75px;">
                                                    <img class="user-cmnt-box bg-grn" src=${imageUrl}>
                                                    <p>${name}</p>
                                                </div>
                                            </div>
                                        </div>
                                `;
                            }else{
                                tr_str = `
                                    <div>
                                        <div class="comnt-box mb-3">
                                            <div style="margin-right: 10px;text-align: center;width: 75px;">
                                                <img class="user-cmnt-box" src=${imageUrl}>
                                                <p>${name}</p>
                                            </div>
                                            <div class="msg-box">
                                                <div class="top-cmnt-box">
                                                    <p>${designation} : <span>Remarks</span></p>
                                                    <p>${time}</p>
                                                </div>
                                                <p class="sms-bg">${comment}</p>
                                                ${document1}
                                            </div>
                                        </div>
                                    </div>
                                 `;
                                
                            }
                            
                            
                            
                        
                       
                        $("#comments").append(tr_str);

                    });
                    
                }

                  
            });
        }



        setInterval(function(){
            getCommnets();
        },700);



        $('button[name="commentBtn"]').on('click',function(e){
            e.preventDefault();
            e.stopImmediatePropagation();

            let application_id = $("input[name=applicationId]").val();
            let comment = $("#commentInp").val();

            var files = $('#file')[0].files;
            

            if (comment == "")
            {
                
                tata.error('Opps...', 'Comment is required...', {
                  position: 'tr',
                  duration: 3000,
                  animate: 'slide'
                })
                exit(); 
            }



            var form_data = new FormData();                  
            form_data.append('application_id', application_id);
            form_data.append('comment', comment);
            form_data.append('documentInput', files[0]);
            form_data.append('_token', "{{csrf_token()}}");
            var uri = "{{ url('comment') }}";
            $.ajax({
                url: uri,
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData:false,
                success:function(response){
                    getCommnets();
                    $("#commentInp").val('');
                    $("#file").val('');
                    console.log(response);
                },
                error:function(error){
                    alert('Error');
                }

            });

       });







        $('.actv-ul li').click(function(){
            $('.actv-ul li').removeClass("active1");
            $(this).addClass("active1");
        });
        $('.actv-ul1 li').click(function(){
            $('.actv-ul1 li').removeClass("active1");
            $(this).addClass("active1");
        });

        $("#applied-content").hide();
        $("#apply-content").show();

        $("#applied").click(function(){
          $("#applied-content").show();
          $("#apply-content").hide();
          
        });
        $("#apply").click(function(){
          $("#applied-content").hide();
          $("#apply-content").show();
        });

        /*---Interview-pre-interview-----*/
        $("#inter-cas-content").hide();
        $("#inter-pre-content").show();
        
        $("#inter-pre").click(function(){
          $("#inter-pre-content").show();
          $("#inter-cas-content").hide();
          
        });
        $("#inter-cas").click(function(){
          $("#inter-pre-content").hide();
          $("#inter-cas-content").show();
        });
    </script>

    <script type="text/javascript">
        $(function(){
            $(".apply-list ul li a").click(function(){
                $(".apply-list ul li a").removeClass("apply-list-active")
                $(this).addClass("apply-list-active")
            });
        });
    </script>
@endsection