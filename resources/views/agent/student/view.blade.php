@extends('agent.layouts.app')
@section('title', 'View Student')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/lightgallery/css/lightgallery.min.css') }}">
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
		}
		.info p span{
			font-weight: 500;
		}
		.doc-file{
			border: 1px solid #d5d5d5;
		    border-radius: 5px;
		    font-size: 17px;
		    padding: 5px 12px;
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
		    height: 80px;
		    resize: none;
		    padding: 0 10px;
		    outline: none;
		}
		.send-sms-box {
		    display: flex;
		    align-items: center;
		    justify-content: end;
		}
		label {
		    display: block;
		    padding-bottom: 5px;
		}
		.attach-file {
		    font-size: 30px;
		    color: #444;
		    margin-right: 10px;
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
		    height: 38px;
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
		/*	display: flex;
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
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            
            @php
                error_reporting(0);
                $nationality = DB::table('countries')->where('id', $student->nationality)->first();
            @endphp
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    @if (!empty($student->photograph))
                                        <img class="img-fluid rounded-circle" src="{{ asset('backend/student/document/'.$student->photograph) }}" />
                                    @else
                                        <img class="img-fluid rounded-circle" src="{{ asset('backend/placeholder.jpg') }}" />
                                    @endif
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h4>
                                        <p>{{ $nationality->name }}</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ $student->email_address }}</h4>
                                        {{-- <p>Email</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @php
                error_reporting(0);
                $nationality = DB::table('countries')->where('id', $student->nationality)->first();
            @endphp

            <div class="row">
                <div class="col-md-12">
                    <div class="info std-id">
    					<p>Student ID :- <span>{{ $student->id }}</span></p>
    				</div>
                </div>
            </div>
            <div class="row">
    			<div class="col-md-12">
    				<div class="student-tab-box">
    					<ul class="nav nav-tabs top-main-nav mb-3">
    					  <li class="nav-item">
    					    <a class="nav-link active" data-toggle="tab" href="#std-info">Student Info</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#application">Applications</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#interview">Interview</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#status">Status</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#download">Download</a>
    					  </li>
    					</ul>
    
    					
    					<div class="tab-content">
    					  <div class="tab-pane active" id="std-info">
    					  	<div class="row">
    					  		<div class="col-md-12">
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Basic Info</h4>
    					  				<div class="info">
    					  					<p>Registration No : <span>{{ $student->registration_number }}</span></p>
    					  					<p>Frist Name : <span>{{ $student->first_name }}</span></p>
    					  					<p>Middl Name : <span>{{ $student->middle_name }}</span></p>
    					  					<p>Last Name : <span>{{ $student->last_name }}</span></p>
    					  					<p>Date of Birth : <span>{{ $student->date_of_birth }}</span></p>
    					  					<p>Gender : <span>{{ $student->gender }}</span></p>
    					  					<p>Nationality : <span>{{ $nationality->name }}</span></p>
    					  					<p>Passport Number : <span>{{ $student->passport_number }}</span></p>
    					  					<p>Email Address : <span>{{ $student->email_address }}</span></p>
    					  					<p>Contact Number : <span>{{ $student->contact_number }}</span></p>
    					  				</div>
    					  			</div>
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Education Info</h4>
    					  				<div class="info">
    					  					<div class="row">
    					  						<div class="col">
    					  							<h4 style="margin-left: 4px">Qualification 1</h4>
    					  							<p>Course Title : <span>{{ $student->qualification1_course_title }}</span></p>
    					  							<p>Course Level : <span>{{ $student->qualification1_course_level }}</span></p>
    					  							<p>Course Duration : <span>{{ $student->qualification1_course_duration }}</span></p>
    					  							<p>University or Organisation : <span>{{ $student->qualification1_university_or_organisation }}</span></p>
    					  							<p>Medium of Education : <span>{{ $student->qualification1_medium_of_education }}</span></p>
    					  							<p>Grade : <span>{{ $student->qualification1_grade }}</span></p>
    					  							<p>Year of Passing : <span>{{ $student->qualification1_year_of_passing }}</span></p>
    					  						</div>
    					  						<div class="col">
    					  							<h4 style="margin-left: 4px">Qualification 2</h4>
    					  							<p>Course Title : <span>{{ $student->qualification2_course_title }}</span></p>
    					  							<p>Course Level : <span>{{ $student->qualification2_course_level }}</span></p>
    					  							<p>Course Duration : <span>{{ $student->qualification2_course_duration }}</span></p>
    					  							<p>University or Organisation : <span>{{ $student->qualification2_university_or_organisation }}</span></p>
    					  							<p>Medium of Education : <span>{{ $student->qualification2_medium_of_education }}</span></p>
    					  							<p>Grade : <span>{{ $student->qualification2_grade }}</span></p>
    					  							<p>Year of Passing : <span>{{ $student->qualification2_year_of_passing }}</span></p>
    					  						</div>
    					  					</div>
    					  				</div>
    					  			</div>
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Emergency Contact Info</h4>
    					  				<div class="info">
    					  					<p>Contact name : <span>{{ $student->emergency_contact_name }}</span></p>
    					  					<p>Contact relationship : <span>{{ $student->emergency_contact_relationship }}</span></p>
    					  					<p>Contact number : <span>{{ $student->emergency_contact_number }}</span></p>
    					  				</div>
    					  			</div>

    					  			<div class="basic-info">
    					  				<h4 class="info-title">Address Info</h4>
    					  				<div class="info">
					  						<div class="row">
					  							<div class="col">
					  								<h4 style="margin-left: 4px">Permanent Address</h4>
					  								<p>Address line one : <span>{{ $student->permanent_address_line_one }}</span></p>
					  								<p>Address line two : <span>{{ $student->permanent_address_line_two }}</span></p>
					  								<p>Address country : <span>{{ $student->permanent_address_country }}</span></p>
					  								<p>Address state : <span>{{ $student->permanent_address_state }}</span></p>
					  								<p>Address city : <span>{{ $student->permanent_address_city }}</span></p>
					  								<p>Address pincode : <span>{{ $student->permanent_address_pincode }}</span></p>
					  							</div>
					  							<div class="col">
					  								<h4 style="margin-left: 4px">Communication Address</h4>
					  								<p>Address line one : <span>{{ $student->communication_address_line_one }}</span></p>
					  								<p>Address line two : <span>{{ $student->communication_address_line_two }}</span></p>
					  								<p>Address country : <span>{{ $student->communication_address_country }}</span></p>
					  								<p>Address state : <span>{{ $student->communication_address_state }}</span></p>
					  								<p>Address city : <span>{{ $student->communication_address_city }}</span></p>
					  								<p>Address pincode : <span>{{ $student->communication_address_pincode }}</span></p>
					  							</div>
					  						</div>
    					  				</div>
    					  			</div>
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Documents</h4>
    					  				<div class="info">

    					  					@if (!empty($student->photograph))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Photograph" target="_blank" href="{{ asset('/backend/student/document/'.$student->photograph) }}" class="doc-file">Photograph</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Photograph" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  					@if (!empty($student->passport))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Passport" target="_blank" href="{{ asset('/backend/student/document/'.$student->passport) }}" class="doc-file">Passport</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Passport" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  					@if (!empty($student->address_proof))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Address Proof" target="_blank" href="{{ asset('/backend/student/document/'.$student->address_proof) }}" class="doc-file">Address Proof</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Address Proof" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  					@if (!empty($student->qualifications))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Qualifications" target="_blank" href="{{ asset('/backend/student/document/'.$student->qualifications) }}" class="doc-file">Qualifications</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Qualifications" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  					@if (!empty($student->work_experience))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Work Experience" target="_blank" href="{{ asset('/backend/student/document/'.$student->work_experience) }}" class="doc-file">Work Experience</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Work Experience" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  					@if (!empty($student->cv))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="CV" target="_blank" href="{{ asset('/backend/student/document/'.$student->cv) }}" class="doc-file">CV</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="CV" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif


    					  					@if (!empty($student->personal_statement))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Personal Statement" target="_blank" href="{{ asset('/backend/student/document/'.$student->personal_statement) }}" class="doc-file">Personal Statement</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Personal Statement" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  					@if (!empty($student->any_other_supporting_documents))
    					  					    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Any other supporting documents" target="_blank" href="{{ asset('/backend/student/document/'.$student->any_other_supporting_documents) }}" class="doc-file">Any other supporting documents</a>
    					  					@else
    					  						<a data-bs-toggle="tooltip" data-bs-placement="top" title="Any other supporting documents" href="javascript::" class="doc-file">Not Provided</a>
    					  					@endif

    					  				</div>
    					  			</div>
    					  		</div>
    					  	</div>
    					  </div>
    					  <div class="tab-pane fade" id="application">
    					  	<div class="row">
    							<div class="col-md-12"> 
    								<ul class="program-ul actv-ul" style="padding-left: 0;">
    									<li id="apply" @if (request()->application) @else class="active1" @endif>Apply to Programs</li>	
    									<li id="applied" @if (request()->application) class="active1" @endif>Applied Programs</li>	
    								</ul>
    							</div>
    							<div class="col-md-12">
    								<div id="applied-content">
    									<div class="row">
    										<div class="col-md-5">
    											<div class="apply-list">
    												<ul>
    													@foreach ($applications as $key => $application)
    														@php
    														    error_reporting(0);
    														    
    														    $student = DB::table('students')->where('id', $application->student_id)->first();
    														    $campus = DB::table('campuses')->where('id', $application->campus_id)->first();
    														    $university = DB::table('universities')->where('id', $campus->university_id)->first();
    														    $course = DB::table('courses')->where('id', $application->course_id)->first();
    														    $intake = DB::table('intakes')->where('id', $application->intake_id)->first();


    														    error_reporting(0);
    														    $country = DB::table('countries')->where('id', $university->country)->first();
    														    $state = DB::table('states')->where('id', $university->state)->first();
    														    $city = DB::table('cities')->where('id', $university->city)->first();

    														@endphp
    														<li>
    															<a href="javascript::" class="applicationList" value="{{ $application->id }}">
    																<div class="left-apply-list">
    																	<div class="clg-logo-box">
    																		<img src="{{ asset('/backend/university/campus/logo/'.$campus->logo) }}" class="colleg-logo">
    																	</div>
    																	<div class="clg-des-box">
    																		<h5 class="mb-0">{{ $campus->name }}</h5>
    																		<p class="notfi-txt">{{$course->course_name}}</p>
    																		<p class="clg-txt">{{ date('d M Y, h:i A', strtotime($application->created_at)) }}</p>
    																	</div>
    																</div>
    															</a>
    														</li>
    													@endforeach
    													
    													

    												</ul>
    											</div>
    										</div>
    										<div class="col-md-7">
    											<h5 class="text-dark mb-2">Comments</h5>
    											<hr style="height: 2px;background: #49b0ff;">
    											
    											<div>
    												<div class="comnt-box mb-3">
    													<div style="margin-right: 10px;text-align: center;width: 75px;">
    														<p class="user-cmnt-box">AP</p>
    														<p>Avijit Pal</p>
    													</div>
    													<div class="msg-box">
    														<div class="top-cmnt-box">
    															<p>Re: <span>Remarks</span></p>
    															<p>October 14th 2022, <span>19:41</span></p>
    														</div>
    														<p class="sms-bg">Dear team, please find the acknowledgement email from the university which is attached in kc document email from the university which is attached in kc document.
    														</p>
    													</div>
    												</div>
    											</div>
    											<div>
    												<div class="comnt-box mb-3">
    													<div class="msg-box">
    														<div class="top-cmnt-box bg-grn">
    															<p>Re: <span>Remarks</span></p>
    															<p>October 14th 2022, <span>19:41</span></p>
    														</div>
    														<p class="sms-bg">Dear team, please find the acknowledgement email from the university which is attached in kc document email from the university which is attached in kc document.
    														</p>
    													</div>
    													<div style="margin-left: 10px;text-align: center;width: 75px;">
    														<p class="user-cmnt-box bg-grn">SD</p>
    														<p>Suvam Das</p>
    													</div>
    												</div>
    											</div>
    											<div class="comnt-box">
    												<div style="margin-right: 10px;text-align: center;width: 75px;">
    													<p class="user-cmnt-box">AP</p>
    													<p>Avijit Pal</p>
    												</div>
    												<div class="msg-box">
    													<div class="top-cmnt-box">
    														<p>Re: <span>Remarks</span></p>
    														<p>October 14th 2022, <span>19:41</span></p>
    													</div>
    													<textarea placeholder="Write comments" class="txtarea-box"></textarea>
    												</div>
    											</div>
    											<div class="send-sms-box mt-2">
    											
    												<label for="file-input">
    					                                <i class="bi bi-paperclip attach-file"></i>
    					                            </label>
    					                             <input id="file-input" type="file" class="d-none">
    												<button class="send-sms-btn"><i class="bi bi-send"></i> Send</button>
    											</div>
    										
    										</div>
    									</div>
    								</div>
    								<div class="apply-content">
    									
    								</div>
    							</div>
    						</div>
    					  </div>
    					  <div class="tab-pane fade" id="interview">
    					  	<div class="row">
    							<div class="col-md-12"> 
    								<ul class="program-ul actv-ul1 mt-3" style="padding-left: 0;">
    									<li id="inter-pre" class="active1">Interview Preparation</li>	
    									<li id="inter-cas">Pre-CAS offer Interview</li>	
    								</ul>
    							</div>
    							<div class="col-md-12">
    								<div id="inter-pre-content">
    									<div class="row">
    										<div class="col-md-4">
    											<div class="operating-lease">
    												<ul class="nav nav-tabs mb-3">
    													<li class="nav-item">
    													   <a class="nav-link active" data-toggle="tab" href="#inter-pre-inter1">Interview Schedule-1</a>
    													</li>
    													<li class="nav-item">
    													   <a class="nav-link" data-toggle="tab" href="#inter-pre-inter2">Interview Schedule-2</a>
    													</li>
    													<li class="nav-item">
    													   <a class="nav-link" data-toggle="tab" href="#inter-pre-inter3">Interview Schedule-3</a>
    													</li>
    												</ul>
    											</div>
    										</div>
    										<div class="col-md-8">
    											<div class="tab-content">
    												<div class="tab-pane active" id="inter-pre-inter1">
    													<div class="basic-info">
    										  				<h4 class="info-title">Date & Time</h4>
    										  				<div class="info">
    										  					<p>Date : <span>10th January 2023</span></p>
    										  					<p>Time : <span>10:15 AM - GMT</span></p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Comment</h4>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Status</h4>
    										  				<div>
    										  					<p class="staus acpt-status">Accepted</p>
    										  				</div>
    										  			</div>
    												</div>
    												<div class="tab-pane fade" id="inter-pre-inter2">
    													<div class="basic-info">
    										  				<h4 class="info-title">Date & Time</h4>
    										  				<div class="info">
    										  					<p>Date : <span>10th January 2023</span></p>
    										  					<p>Time : <span>10:15 AM - GMT</span></p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Comment</h4>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Status</h4>
    										  				<div>
    										  					<p class="staus pending-status">Pending</p>
    										  				</div>
    										  			</div>
    												</div>
    												<div class="tab-pane fade" id="inter-pre-inter3">
    													<div class="basic-info">
    										  				<h4 class="info-title">Date & Time</h4>
    										  				<div class="info">
    										  					<p>Date : <span>10th January 2023</span></p>
    										  					<p>Time : <span>10:15 AM - GMT</span></p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Comment</h4>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Status</h4>
    										  				<div>
    										  					<p class="staus cancel-status">Cancel</p>
    										  				</div>
    										  			</div>
    												</div>
    											</div>
    										</div>
    									</div>
    								</div>
    								<div id="inter-cas-content">
    									<div class="row">
    										<div class="col-md-4">
    											<div class="operating-lease">
    												<ul class="nav nav-tabs mb-3">
    													<li class="nav-item">
    													   <a class="nav-link active" data-toggle="tab" href="#inter-cas-inter1">Interview Schedule-1</a>
    													</li>
    													<li class="nav-item">
    													   <a class="nav-link" data-toggle="tab" href="#inter-cas-inter2">Interview Schedule-2</a>
    													</li>
    													<li class="nav-item">
    													   <a class="nav-link" data-toggle="tab" href="#inter-cas-inter3">Interview Schedule-3</a>
    													</li>
    												</ul>
    											</div>
    										</div>
    										<div class="col-md-8">
    											<div class="tab-content">
    												<div class="tab-pane active" id="inter-cas-inter1">
    													<div class="basic-info">
    										  				<h4 class="info-title">Date & Time</h4>
    										  				<div class="info">
    										  					<p>Date : <span>10th January 2023</span></p>
    										  					<p>Time : <span>10:15 AM - GMT</span></p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Comment</h4>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Status</h4>
    										  				<div>
    										  					<p class="staus acpt-status">Accepted</p>
    										  				</div>
    										  			</div>
    												</div>
    												<div class="tab-pane fade" id="inter-cas-inter2">
    													<div class="basic-info">
    										  				<h4 class="info-title">Date & Time</h4>
    										  				<div class="info">
    										  					<p>Date : <span>10th January 2023</span></p>
    										  					<p>Time : <span>10:15 AM - GMT</span></p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Comment</h4>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Status</h4>
    										  				<div>
    										  					<p class="staus pending-status">Pending</p>
    										  				</div>
    										  			</div>
    												</div>
    												<div class="tab-pane fade" id="inter-cas-inter3">
    													<div class="basic-info">
    										  				<h4 class="info-title">Date & Time</h4>
    										  				<div class="info">
    										  					<p>Date : <span>10th January 2023</span></p>
    										  					<p>Time : <span>10:15 AM - GMT</span></p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Comment</h4>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  				<div class="inter-comnt mb-3">
    										  					<p>Ready your Original Passport at the
    										  					time of interview.</p>
    										  					<p class="text-right pr-3">Thanks</p>
    										  				</div>
    										  			</div>
    										  			<div class="basic-info">
    										  				<h4 class="info-title">Status</h4>
    										  				<div>
    										  					<p class="staus cancel-status">Cancel</p>
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
    					  <div class="tab-pane fade" id="status">
    					  	<div class="row">
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Admission Status :</p>
    					  				<p class="staus acpt-status">Conditional Offer</p>
    					  			</div>
    					  		</div>
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Visa Applied Status :</p>
    					  				<p class="staus pending-status">Pending</p>
    					  			</div>
    					  		</div>
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Visa Status :</p>
    					  				<p class="staus cancel-status">Cancel</p>
    					  			</div>
    					  		</div>
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Enrolment Status :</p>
    					  				<p class="staus acpt-status">Enrolled</p>
    					  			</div>
    					  		</div>
    					  	</div>
    					  </div>
    					  <div class="tab-pane container fade" id="download">4</div>
    					</div>
    				</div>
    			</div>
    		</div>
            
        </div>
    </div>
@endsection
@section('js')
<script src="{{ asset('/backend/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>-->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$('.applicationList').click(function(){
		    var application_id = $(this).attr("value");
		    alert(application_id);
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