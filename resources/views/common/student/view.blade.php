@php
	error_reporting(0);
	$array = auth::user()->permissions;
    $permission = explode(",", $array);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'View Student')

@section('css')
<style type="text/css">
		.top-cmnt-box p, .inter-comnt p{
			margin: 0;
		}
		.std-id p{
		    font-size:20px!important;
		}
		.std-id{
		    background: #acdafd;
		    padding:5px;
		    margin-bottom:25px;
		    border-radius: 4px;
		}
		.std-id span{
		    padding: 0px 14px;
            background: #acdafd;
            border-radius: 2px;
            margin-bottom: 0px;
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
			padding:  12px 18.5px !important;
			font-size: 14px;
			font-weight: 600;
			color: #222;
			position: 10px 20px;
			margin-bottom:0!important;
		}
		.nav-tabs{
			border: 1px solid #e3e0e0;
            padding: 1px;
		}
		.top-main-nav li.nav-item{
			
			width: auto;
			
			text-align: center;
			background: #ebebeb;
		}
		.info-title{
			background: #ddecf7;
		    color: #444;
		    font-size: 16px;
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
        .info p b.text-dark{
            font-weight: 600;
            width:30%;
        }
        .info p span{
            font-weight: 400;
            margin-left:10px;
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
		    font-size: 13px;
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
		    border-radius: 20px;
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
		        font-size:12px;
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


		.form-label{
			font-family: "Roboto", sans-serif !important;
		    font-size: 0.875rem !important;
		    font-weight: 400 !important;
		    line-height: 1.5 !important;
		    color: #393939 !important;
		}
		.w-35{width: 35% !important; text-align: center !important;}
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
            <!--<div class="row">
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
            </div>-->
            
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
    					    <a class="nav-link active" data-toggle="tab" href="#std-info">Information</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#application">Applications</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#interviewPreparation">Interview Preparation</a>
    					  </li>

    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#VisaAndSettlement">Visa and Settlement</a>
    					  </li>

						<li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#SFE">SFE</a>
    					  </li>

    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#InternalTraning">Internal Traning</a>
    					  </li>
    					  <li class="nav-item">
    					    <a class="nav-link" data-toggle="tab" href="#status">Status</a>
    					  </li>
					  	<li class="nav-item">
					  	  <a class="nav-link" target="_blank" href="{{ url('/export-student?id='.$student->id) }}">Download</a>
					  	</li>
    					</ul>
    
    					
    					<div class="tab-content">
    					  <div class="tab-pane active" id="std-info">
    					  	<div class="row">
    					  		<div class="col-md-12">
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Basic Info</h4>
    					  				<div class="info">
    					  					<p><b class="text-dark">Student Type</b> : <span>{{ $student->type }}</span></p>
    					  					<p><b class="text-dark">Registration No</b> : <span>{{ $student->registration_number }}</span></p>
    					  					<p><b class="text-dark">Frist Name</b> : <span>{{ $student->first_name }}</span></p>
    					  					<p><b class="text-dark">Middl Name</b> : <span>{{ $student->middle_name }}</span></p>
    					  					<p><b class="text-dark">Last Name</b> : <span>{{ $student->last_name }}</span></p>
    					  					<p><b class="text-dark">Date of Birth</b> : <span>{{ date('d M Y', strtotime($student->date_of_birth)) }}</span></p>
    					  					<p><b class="text-dark">Gender</b> : <span>{{ $student->gender }}</span></p>
    					  					<p><b class="text-dark">Nationality</b> : <span>{{ $nationality->name }}</span></p>
    					  					<p><b class="text-dark">Passport Number</b> : <span>{{ $student->passport_number }}</span></p>
    					  					<p><b class="text-dark">Passport Expiry Date</b> : <span>{{ date('d M Y', strtotime($student->passport_expiry_date)) }}</span></p>
    					  					@if (in_array("StudentUpdateValidation", $permission))
    					  					<form method="post" action="{{ url('/common/student/update/student/validation/'.$student->id) }}">
    					  						@csrf
    					  						
    					  						<div class="row"> 
    					  							<div class="col col-md-5"><p style="justify-content: space-between;"><b class="text-dark">Email Address</b> : {{ $student->email_address }}</p> </div>
    					  							<div class="col d-flex align-items-center">
    					  								<label for="invalid_email">Is valid &nbsp;</label>
    					  								<select class="form-control form-control-sm w-25" name="invalid_email" style="height:auto">
    					  									<option value="Yes"
    					  									@if ($student->invalid_email == "Yes")
    					  										selected 
    					  									@endif
    					  									>Yes</option>
    					  									<option value="No"
    					  									@if ($student->invalid_email == "No")
    					  										selected 
    					  									@endif
    					  									>No</option>
    					  								</select>
    					  							</div>
    					  							<div class="col"></div>
    					  						</div>

    					  						<div class="row"> 
    					  							<div class="col col-md-5"><p style="justify-content: space-between;"><b class="text-dark">Contact Number</b> : {{ $student->contact_number }}</p> </div>
    					  							<div class="col d-flex align-items-center">
    					  								<label for="invalid_mobile">Is valid &nbsp;</label>
    					  								<select class="form-control form-control-sm w-25" name="invalid_mobile" style="height:auto">
    					  									<option value="Yes"
    					  									@if ($student->invalid_mobile == "Yes")
    					  										selected 
    					  									@endif
    					  									>Yes</option>
    					  									<option value="No"
    					  									@if ($student->invalid_mobile == "No")
    					  										selected 
    					  									@endif
    					  									>No</option>
    					  								</select>
    					  							</div>
    					  						
    					  							<div class="col"></div>
    					  						</div>

    					  						<div class="row"> 
    					  							<div class="col">
    					  								<input type="submit" class="btn btn-primary" value="Save" style="padding: 0.7rem 3rem;">
    					  							</div>
    					  						</div>
    					  					</form>
    					  					@else
    					  					<p><b class="text-dark">Email Address</b> : {{ $student->email_address }}</p>
    					  					<p><b class="text-dark">Contact Number</b> : {{ $student->contact_number }}</p> 
    					  					@endif
    					  				</div>
    					  			</div>
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Education Info</h4>
    					  				<div class="info">
    					  				    <div class="row">
    					  				        <div class="col">
				  							<h3 style="margin-left: 4px">Qualification 1</h3>
				  							<p><b class="text-dark">Course Title </b>: {{ $student->qualification1_course_title }}</p>
				  							<p><b class="text-dark">Course Level </b>: {{ $student->qualification1_course_level }}</p>
				  							<p><b class="text-dark">Course Duration </b>: {{ $student->qualification1_course_duration }}</p>
				  							<p><b class="text-dark">University or Organisation </b>: {{ $student->qualification1_university_or_organisation }}</p>
				  							<p><b class="text-dark">Medium of Education </b>: {{ $student->qualification1_medium_of_education }}</p>
				  							<p><b class="text-dark">Grade </b>: {{ $student->qualification1_grade }}</p>
				  							<p><b class="text-dark">Year of Passing </b>: {{ $student->qualification1_year_of_passing }}</p>
				  						</div>
				  							
				  						<div class="col">	
				  							<h3 style="margin-left: 4px">Qualification 2</h3>
				  							<p><b class="text-dark">Course Title </b>: {{ $student->qualification2_course_title }}</p>
				  							<p><b class="text-dark">Course Level </b>: {{ $student->qualification2_course_level }}</p>
				  							<p><b class="text-dark">Course Duration </b>: {{ $student->qualification2_course_duration }}</p>
				  							<p><b class="text-dark">University or Organisation </b>: {{ $student->qualification2_university_or_organisation }}</p>
				  							<p><b class="text-dark">Medium of Education </b>: {{ $student->qualification2_medium_of_education }}</p>
				  							<p><b class="text-dark">Grade </b>: {{ $student->qualification2_grade }}</p>
				  							<p><b class="text-dark">Year of Passing </b>: {{ $student->qualification2_year_of_passing }}</p>
    					  				</div>
    					  			</div>
    					  			</div>
    					  			</div>


    					  			<div class="basic-info">
    					  				<h4 class="info-title">English Language Assessment</h4>
    					  				<div class="info">
    					  					@if ($student->type == "International")
    					  						<p><b class="text-dark">Test Name </b>: {{ $student->test_name }}</p>
    					  						<p><b class="text-dark">Overall Score </b>: {{ $student->over_all_socre }}</p>
    					  						<p><b class="text-dark">Speaking </b>: {{ $student->speaking }}</p>
    					  						<p><b class="text-dark">Listening </b>: {{ $student->listening }}</p>
    					  						<p><b class="text-dark">Reading </b>: {{ $student->reading }}</p>
    					  						<p><b class="text-dark">Writing </b>: {{ $student->writing }}</p>
    					  					@else
    					  						<p><b class="text-dark">English Level </b>: {{ $student->english_level }}</p>
    					  						<p><b class="text-dark">Student Finance </b>: {{ $student->student_finance }}</p>
    					  						<p><b class="text-dark">CNR No </b>: {{ $student->cnr_no }}</p>

    					  					@endif
    					  				</div>
    					  			</div>


    					  			<div class="basic-info">
    					  				<h4 class="info-title">Emergency Contact Info</h4>
    					  				<div class="info">
    					  					<p><b class="text-dark">Contact name </b>: {{ $student->emergency_contact_name }}</p>
    					  					<p><b class="text-dark">Contact relationship </b>: {{ $student->emergency_contact_relationship }}</p>
    					  					<p><b class="text-dark">Contact number </b>: {{ $student->emergency_contact_number }}</p>
    					  				</div>
    					  			</div>

    					  			<div class="basic-info">
    					  				<h4 class="info-title">Address Info</h4>
    					  				<div class="info">
					  						<div class="row">
					  							<div class="col">
					  								<h4 style="margin-left: 4px">Permanent Address</h4>
					  								<p><b class="text-dark">Address line one </b>: {{ $student->permanent_address_line_one }}</p>
					  								<p><b class="text-dark">Address line two </b>: {{ $student->permanent_address_line_two }}</p>
					  								<p><b class="text-dark">Address country </b>: 
					  									@php
					  										error_reporting(0);
					  										$country0 = DB::table('countries')->where('id', $student->permanent_address_country)->first();
					  									@endphp
					  									{{ $country0->name }}
					  								</p>
					  								<p><b class="text-dark">Address state </b>: {{ $student->permanent_address_state }}</p>
					  								<p><b class="text-dark">Address city </b>: {{ $student->permanent_address_city }}</p>
					  								<p><b class="text-dark">Address pincode </b>: {{ $student->permanent_address_pincode }}</p>
					  							</div>
					  							<div class="col">
					  								<h4 style="margin-left: 4px">Communication Address</h4>
					  								<p><b class="text-dark">Address line one </b>: {{ $student->communication_address_line_one }}</p>
					  								<p><b class="text-dark">Address line two </b>: {{ $student->communication_address_line_two }}</p>
					  								<p><b class="text-dark">Address country </b>: 
					  									@php
					  										error_reporting(0);
					  										$country01 = DB::table('countries')->where('id', $student->communication_address_country)->first();
					  									@endphp
					  									{{ $country01->name }}
					  								</p>
					  								<p><b class="text-dark">Address state </b>: {{ $student->communication_address_state }}</p>
					  								<p><b class="text-dark">Address city </b>: {{ $student->communication_address_city }}</p>
					  								<p><b class="text-dark">Address pincode </b>: {{ $student->communication_address_pincode }}</p>
					  							</div>
					  						</div>
    					  				</div>
    					  			</div>
    					  			<div class="basic-info">
    					  				<h4 class="info-title">Documents</h4>
    					  				<div class="info">

    					  					<form method="post" action="{{ url('/common/student/update/document/validation/'.$student->id) }}">
    					  						@csrf
    					  						
	    					  					<table class="table table-sm table-striped">
	    					  						<tr>
	    					  							<th>S#</th>
	    					  							<th>Document Type</th>
	    					  							<th>Download Document</th>
	    					  							<th>Is Document Valid</th>
	    					  						</tr>
	    					  						<tr>
	    					  							<td>1</td>
	    					  							<td>Photograph</td>
	    					  							<td>
	    					  								@if (!empty($student->photograph))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Photograph" target="_blank" href="{{ asset('/backend/student/document/'.$student->photograph) }}" class="doc-file">Download <i class="fa fa-download"></i> </a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Photograph" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_photograph">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_photograph == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_photograph == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>
		    					  							</td>
		    					  						@else
		    					  						<td>
		    					  							@if ($student->invalid_photograph == "No")
		    					  								Yes
		    					  							@else 
		    					  								No
		    					  							@endif
		    					  						</td>
		    					  						@endif
		    					  					</tr>


	    					  						<tr>
	    					  							<td>2</td>
	    					  							<td>Passport</td>
	    					  							<td>
	    					  								@if (!empty($student->passport))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Passport" target="_blank" href="{{ asset('/backend/student/document/'.$student->passport) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Passport" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif

	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_passport">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_passport == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_passport == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>
		    					  							</td>
		    					  						@else
		    					  						<td>
		    					  							@if ($student->invalid_passport == "No")
		    					  								Yes
		    					  							@else 
		    					  								No
		    					  							@endif
		    					  						</td>
		    					  						@endif
		    					  					</tr>


	    					  						<tr>
	    					  							<td>3</td>
	    					  							<td>Proof of Address</td>
	    					  							<td>
	    					  								@if (!empty($student->address_proof))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Address Proof" target="_blank" href="{{ asset('/backend/student/document/'.$student->address_proof) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Address Proof" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_address_proof">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_address_proof == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_address_proof == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>
		    					  							</td>
		    					  						@else
		    					  						<td>
		    					  							@if ($student->invalid_address_proof == "No")
		    					  								Yes
		    					  							@else 
		    					  								No
		    					  							@endif
		    					  						</td>
		    					  						@endif
		    					  					</tr>

		    					  					@if (in_array("StudentUpdateValidation", $permission))

	    					  						<tr>
	    					  							<td></td>
	    					  							 <td >
	    					  							 	<div class="col-lg-8 mb-2" id="proof_of_address_type_select">
	    					  							 	    <div class="mb-3">
	    					  							 	        <label class="text-label form-label">Proof of Address Type<span class="text-danger">*</span></label>
	    					  							 	        <select name="proof_of_address_type" class="form-control bg-white">
	    					  							 	            <option selected disabled value>Choose...</option>
	    					  							 	            <option value="Utility bills (electricity, gas, or water bills)"
	    					  							 	            @if ($student->proof_of_address_type == "Utility bills (electricity, gas, or water bills)")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >Utility bills (electricity, gas, or water bills)</option>
	    					  							 	            <option value="Bank statement"
	    					  							 	            @if ($student->proof_of_address_type == "Bank statement")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >Bank statement</option>
	    					  							 	            <option value="Credit card statement"
	    					  							 	            @if ($student->proof_of_address_type == "Credit card statement")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >Credit card statement</option>
	    					  							 	            <option value="Tenancy agreement"
	    					  							 	            @if ($student->proof_of_address_type == "Tenancy agreement")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >Tenancy agreement</option>
	    					  							 	            <option value="Council Tax bill"
	    					  							 	            @if ($student->proof_of_address_type == "Council Tax bill")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >Council Tax bill</option>
	    					  							 	            <option value="UK Full valid driving licence"
	    					  							 	            @if ($student->proof_of_address_type == "UK Full valid driving licence")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >UK Full valid driving licence</option>

	    					  							 	            <option value="Other"
	    					  							 	            @if ($student->proof_of_address_type == "Other")
	    					  							 	                selected 
	    					  							 	            @endif
	    					  							 	            >Other</option>
	    					  							 	        </select>
	    					  							 	    </div>
	    					  							 	</div>
	    					  							 </td>



	    					  							 <td colspan="2">
	    					  							 	<div class="col-lg-8 mb-2">
	    					  							 	    <div class="mb-3">
	    					  							 	        <label class="text-label form-label">Proof of Address Expiry Date <span class="text-danger">*</span></label>
	    					  							 	        <input type="date" name="proof_of_address_expiry_date" value="{{ $student->proof_of_address_expiry_date }}" class="form-control bg-white">
	    					  							 	    </div>
	    					  							 	</div>
	    					  							 </td>
	    					  						</tr>
	    					  						@else
	    					  						<tr>
	    					  							<td></td>
	    					  							<td> <b>Proof of Address Type</b> : {{ $student->proof_of_address_type ? $student->proof_of_address_type : 'Null' }}</td>
	    					  							<td><b>Proof of Address Expiry Date</b> : {{ $student->proof_of_address_expiry_date ? date('d M Y', strtotime($student->proof_of_address_expiry_date)) : 'Null' }}</td>
	    					  							<td></td>
	    					  						</tr>
	    					  						@endif
	    					  						<tr>
	    					  							<td>4</td>
	    					  							<td>Qualifications</td>
	    					  							<td>
	    					  								@if (!empty($student->qualifications))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Qualifications" target="_blank" href="{{ asset('/backend/student/document/'.$student->qualifications) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Qualifications" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_qualifications">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_qualifications == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_qualifications == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>

		    					  							</td>
		    					  						@else
		    					  							<td>
		    					  								@if ($student->invalid_qualifications == "No")
		    					  									Yes
		    					  								@else
		    					  									No
		    					  								@endif
		    					  							</td>
		    					  						</tr>
		    					  					@endif


	    					  						<tr>
	    					  							<td>5</td>
	    					  							<td>Work Experience</td>
	    					  							<td>
	    					  								@if (!empty($student->work_experience))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Work Experience" target="_blank" href="{{ asset('/backend/student/document/'.$student->work_experience) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Work Experience" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_work_experience">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_work_experience == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_work_experience == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>
		    					  							</td>
		    					  						@else
		    					  							<td>
		    					  								@if ($student->invalid_work_experience == "No")
		    					  									Yes
		    					  								@else
		    					  									No
		    					  								@endif
		    					  							</td>
		    					  						</tr>
		    					  					@endif


	    					  						<tr>
	    					  							<td>6</td>
	    					  							<td>CV</td>
	    					  							<td>
	    					  								@if (!empty($student->cv))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="CV" target="_blank" href="{{ asset('/backend/student/document/'.$student->cv) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="CV" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_cv">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_cv == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_cv == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>
		    					  							</td>
		    					  						@else
		    					  							<td>
		    					  								@if ($student->invalid_cv == "No")
		    					  									Yes
		    					  								@else
		    					  									No
		    					  								@endif
		    					  							</td>
		    					  						</tr>
		    					  					@endif

	    					  						<tr>
	    					  							<td>7</td>
	    					  							<td>Personal Statement</td>
	    					  							<td>
	    					  								@if (!empty($student->personal_statement))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Personal Statement" target="_blank" href="{{ asset('/backend/student/document/'.$student->personal_statement) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Personal Statement" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_personal_statement">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_personal_statement == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_personal_statement == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>
		    					  							</td>
		    					  						@else
		    					  							<td>
		    					  								@if ($student->invalid_personal_statement == "No")
		    					  									Yes
		    					  								@else
		    					  									No
		    					  								@endif
		    					  							</td>
		    					  						</tr>
		    					  					@endif

	    					  						<tr>
	    					  							<td>8</td>
	    					  							<td>Any Other Supporting Documents</td>
	    					  							<td>
	    					  								@if (!empty($student->any_other_supporting_documents))
	    					  								    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Any other supporting documents" target="_blank" href="{{ asset('/backend/student/document/'.$student->any_other_supporting_documents) }}" class="doc-file">Download <i class="fa fa-download"></i></a>
	    					  								@else
	    					  									<a data-bs-toggle="tooltip" data-bs-placement="top" title="Any other supporting documents" href="javascript::" class="doc-file">Not Provided</a>
	    					  								@endif
	    					  							</td>
	    					  							@if (in_array("StudentUpdateValidation", $permission))
		    					  							<td>
		    					  								<select class="form-control form-control-sm w-35" name="invalid_any_other_supporting_documents">
		    					  									<option value="Yes"
		    					  									@if ($student->invalid_any_other_supporting_documents == "Yes")
		    					  										selected 
		    					  									@endif
		    					  									>Yes</option>
		    					  									<option value="No"
		    					  									@if ($student->invalid_any_other_supporting_documents == "No")
		    					  										selected 
		    					  									@endif
		    					  									>No</option>
		    					  								</select>

		    					  								{{-- <div class="form-check form-switch">
		    					  								    <input type="checkbox" class="form-check-input" name="invalid_any_other_supporting_documents" @if ($student->invalid_any_other_supporting_documents == "No")  checked @endif value="No">
		    					  								</div> --}}
		    					  							</td>
		    					  						@else
		    					  							<td>
		    					  								@if ($student->invalid_any_other_supporting_documents == "No")
		    					  									Yes
		    					  								@else
		    					  									No
		    					  								@endif
		    					  							</td>
		    					  						@endif
	    					  						</tr>
	    					  						@if (in_array("StudentUpdateValidation", $permission))
	    					  						<tr>
	    					  							<td colspan="4">
	    					  								<input type="submit" class="btn btn-primary w-100" value="Update">
	    					  							</td>
	    					  						</tr>
	    					  						@endif


	    					  					</table>
    					  					</form>

    					  					

    					  					
    					  					

    					  					

    					  					

    					  					


    					  					

    					  					

    					  				</div>
    					  			</div>







    					  			<div class="basic-info">

					  					<h4 class="info-title d-flex align-items-center justify-content-between">
    					  					<span>Other Information</span>

    					  					@if (in_array("StudentUpdateInfo", $permission))
    					  						<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#UpdateInfo">
    					  							Update Info
    					  						</button>
    					  					@endif


    					  					

    					  					

    					  					<!-- Modal -->
    					  					<div class="modal fade" id="UpdateInfo">
    					  					    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    					  					        <div class="modal-content">
    					  					            <div class="modal-header bg-light">
    					  					                <h5 class="modal-title">Update Info</h5>
    					  					                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    					  					            </div>
    					  					            <div class="modal-body">
    					  					                <form method="post" action="{{ url('/common/student/update/other/info/'.$student->id) }}">
    					  					                	@csrf

    					  					                	<div class="row">
    					  					                		
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">University Reference Number </label>
    					  					                		        <input type="text" name="university_reference_number" value="{{ $student->university_reference_number }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		

    					  					                		

    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Commission (Amount)</label>
    					  					                		        <input type="text" name="commission_amount" value="{{ $student->commission_amount }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Commission Received From University</label>
    					  					                		        <input type="text" name="commission_received_fom_university" value="{{ $student->commission_received_fom_university }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Any Deduction</label>
    					  					                		        <input type="text" name="any_deduction" value="{{ $student->any_deduction }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Agent Commission</label>
    					  					                		        <input type="text" name="agent_commission" value="{{ $student->agent_commission }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Incentive to Staff</label>
    					  					                		        <input type="text" name="incentive" value="{{ $student->incentive }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Commission From L-3 Funding </label>
    					  					                		        <input type="text" name="commission_from_l_3_funding" value="{{ $student->commission_from_l_3_funding }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Agent Commission L-3</label>
    					  					                		        <input type="text" name="agent_commission_l_3" value="{{ $student->agent_commission_l_3 }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>
    					  					                		<div class="col-lg-4 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Others Income</label>
    					  					                		        <input type="text" name="others_income" value="{{ $student->others_income }}" class="form-control">
    					  					                		    </div>
    					  					                		</div>

    					  					                	</div>

    					  					                	<div class="row">
    					  					                		<div class="col-lg-12 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Enrollment Comments</label>
    					  					                		        <textarea class="form-control" name="enrollment_comments" style="height: 120px" rows="4">{{ $student->enrollment_comments }}</textarea>
    					  					                		    </div>
    					  					                		</div>


    					  					                		<div class="col-lg-12 mb-2">
    					  					                		    <div class="mb-3">
    					  					                		        <label class="text-label form-label">Remarks</label>
    					  					                		        <textarea class="form-control" name="remarks" style="height: 120px" rows="4">{{ $student->remarks }}</textarea>
    					  					                		    </div>
    					  					                		</div>
    					  					                	</div>
    					  					                	<div class="row">
    					  					                	    <div class="col-12">
    					  					                	        <input type="submit" class="btn btn-primary w-100" value="Update Information" />
    					  					                	    </div>
    					  					                	</div>
    					  					                </form>
    					  					            </div>
    					  					        </div>
    					  					    </div>
    					  					</div>

    					  					
    					  				
    					  				</h4>


    					  				<div class="basic-info">
    					  					

    					  					<div class="info">
    					  						<p><b class="text-dark">University Reference Number</b> : {{ $student->university_reference_number }}</p>
    					  						<p><b class="text-dark">Commission (Amount)</b> : {{ $student->commission_amount }}</p>
    					  						<p><b class="text-dark">Commission Received From University</b> : {{ $student->commission_received_fom_university }}</p>
    					  						<p><b class="text-dark">Any Deduction</b> : {{ $student->any_deduction }}</p>
    					  						<p><b class="text-dark">Agent Commission</b> : {{ $student->agent_commission }}</p>
    					  						<p><b class="text-dark">Incentive to Staff</b> : {{ $student->incentive }}</p>
    					  						<p><b class="text-dark">Commission From L-3 Funding</b> : {{ $student->commission_from_l_3_funding }}</p>
    					  						<p><b class="text-dark">Agent Commission L-3</b> : {{ $student->agent_commission_l_3 }}</p>
    					  						<p><b class="text-dark">Others Income</b> : {{ $student->others_income }}</p>
    					  						<p><b class="text-dark">Enrollment Comments</b> : {{ $student->enrollment_comments }}</p>
    					  						<p><b class="text-dark">Remarks</b> : {{ $student->remarks }}</p>
    					  					</div>
    					  				</div>

    					  			</div>
    					  		</div>
    					  	</div>
    					  </div>
    					  <div class="tab-pane fade" id="application">
    					  	<div class="row">
    							<div class="col-md-12"> 
    								<ul class="program-ul actv-ul" style="padding-left: 0;">
    									@if (auth::user()->role == "Agent")
    										<a href="{{ url('/agent/application/create?student_id='.$student->id) }}"><li id="apply" @if (request()->application) @else class="active1" @endif>Apply to Programs</li>	</a>
    									@else
    										<a href=""><li id="apply" @if (request()->application) @else class="active1" @endif>Apply to Programs</li>	</a>
    									@endif
    									<li id="applied" @if (request()->application) class="active1" @endif>Applied Programs</li>	
    								</ul>
    							</div>
    							<div class="col-md-12">
    								<div id="applied-content">
    									<div class="row">
    										<div class="col-md-5">
    											<div class="apply-list">
    												<ul>
    													<input type="hidden" name="applicationId" id="applicationId" >
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
    											<div id="comments" style="height: 300px !important; overflow-y: scroll !important; overflow-x: hidden !important;">
													
													
    											</div>

    											<div id="commentBox">
    												<hr style="height: 2px;background: #49b0ff;">
	    												
    												<form class="mt-2 d-flex align-self-center justify-content-center">
    													<textarea placeholder="Write comments" name="comment" id="commentInp" class="txtarea-box"></textarea>
												
														<label for="file" class="my-0 mx-1 d-flex align-items-center justify-content-center" style="background-color: #e3e0e0; cursor: pointer;">
							                                <i class="bi bi-paperclip attach-file"></i>
							                            </label>
							                             <input type='file' id="file" name='file' class="d-none">
														<button type="button" name="commentBtn" class="send-sms-btn"><i class="bi bi-send"></i> Send</button>
    												</form>
    											</div>
    										
    										</div>
    									</div>
    								</div>
    								<div class="apply-content">
    									
    								</div>
    							</div>
    						</div>
    					  </div>

    					  <div class="tab-pane fade" id="interviewPreparation">
    					  	<div class="row">
    							<div class="col-md-12"> 
    								<ul class="program-ul actv-ul1 mt-3" style="padding-left: 0;">
    									<li id="inter-traning" class="active1">Traning</li>	
    									<li id="inter-pre">Interview Preparation</li>	
    									<li id="inter-cas">Pre-CAS offer Interview</li>	
    									
										@if (in_array("StudentAddInterviewAndTraning", $permission))
											<li data-bs-toggle="modal" data-bs-target="#CreateInterview">Add Traning / Interview</li>	
										@endif

    									

    									<!-- Modal -->
    									<div class="modal fade" id="CreateInterview">
    									    <div class="modal-dialog modal-dialog-centered" role="document">
    									        <div class="modal-content">
    									            <div class="modal-header bg-light">
    									                <h5 class="modal-title">Create</h5>
    									                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    									            </div>
    									            <div class="modal-body">
    									                <form method="post" action="{{ url('/schedule/interview') }}">
    									                	@csrf
    									                	
    									                    <div class="row"> 
    									                        
    									                    	<div class="col-lg-12">
    									                    	    <div class="mb-3">
    									                    	        <label class="text-black font-w600 form-label">Interview Type <span class="required">*</span></label>
    									                    	        <select class="form-control" required="" name="interview_type">
    									                    	        	<option selected disabled value="">Choose...</option>
    									                    	        	<option value="Interview Preparation">Interview Preparation</option>
    									                    	        	<option value="Pre-CAS offer Interview">Pre-CAS offer Interview</option>
    									                    	        	<option value="Traning">Traning</option>
    									                    	        	
    									                    	        </select>
    									                    	    </div>
    									                    	</div>

    									                        <input type="hidden" name="student_id" value="{{ $student->id }}">
    									                        <div class="col-lg-12">
    									                            <div class="mb-3">
    									                                <label class="text-black font-w600 form-label">Date & Time <span class="required">*</span></label>
    									                                <input type="datetime-local" class="form-control" name="date_and_time" required>
    									                            </div>
    									                        </div>


    									                        <div class="col-lg-12">
    									                            <div class="mb-3">
    									                                <label class="text-black font-w600 form-label">Comment <span class="required">*</span></label>
    									                                <input type="text" class="form-control" name="remarks" required>
    									                            </div>
    									                        </div>


    									                        <div class="col-lg-12">
    									                            <div class="mb-3">
    									                                <label class="text-black font-w600 form-label">Status <span class="required">*</span></label>
    									                                <select class="form-control" required="" name="status">
    									                                	<option selected disabled value="">Choose...</option>
    									                                	<option value="Passed Interview">Passed Interview</option>
    									                                	<option value="Failed Interview">Failed Interview</option>
    									                                	<option value="Reschedule Interview">Reschedule Interview</option>
    									                                	<option value="Not Attended Interview">Not Attended Interview</option>
    									                                </select>
    									                            </div>
    									                        </div>



    									                        
    									                        
    									                        <div class="col-lg-12">
    									                            <div class="mb-3 mb-0">
    									                                <input type="submit" value="Create" class="submit btn btn-primary btn-block" name="submit">
    									                            </div>
    									                        </div>
    									                    </div>
    									                </form>
    									            </div>
    									        </div>
    									    </div>
    									</div>



    								</ul>
    							</div>
    							<div class="col-md-12">

    								<div id="inter-traning-content">
    									<div class="row">
    										<div class="col-md-4">
    											<div class="operating-lease">
    												<ul class="nav nav-tabs mb-3">
    													@php
    														$TraningInterview = DB::table('interviews')->where(['student_id' => $student->id, 'interview_type' => 'Traning'])->get();
    													@endphp
    													@foreach ($TraningInterview as $key => $interview)
    														<li class="nav-item">
    														   <a class="nav-link @if ($key == 0) active @endif" data-toggle="tab" href="#inter-traning-{{ $interview->id }}">Traning-{{ $key+1 }}</a>
    														</li>
    													@endforeach
    												</ul>
    											</div>
    										</div>
    										<div class="col-md-8">
    											<div class="tab-content">
    												@foreach ($TraningInterview as $key => $interview)

														<div class="tab-pane @if ($key == 0) active @else fade @endif" id="inter-traning-{{ $interview->id }}">
															<div class="basic-info">
												  				
							  					  				<h4 class="info-title">Date & Time
							  				  						@if (in_array("StudentUpdateInterviewTraning", $permission))
							  				  							<button  type="button" class="btn btn-primary btn-sm float-end p-1 px-2" data-bs-toggle="modal" data-bs-target="#UpdateTraning{{ $interview->id }}">Update Traning</button>
							  				  						@endif
							  					  				</h4>

							  					  				<!-- Modal -->
							  					  				<div class="modal fade" id="UpdateTraning{{ $interview->id }}">
							  					  				    <div class="modal-dialog modal-dialog-centered" role="document">
							  					  				        <div class="modal-content">
							  					  				            <div class="modal-header bg-light">
							  					  				                <h5 class="modal-title">Update</h5>
							  					  				                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							  					  				            </div>
							  					  				            <div class="modal-body">
							  					  				                <form method="post" action="{{ url('/schedule/interview/update/'.$interview->id) }}">
							  					  				                	@csrf
							  					  				                	
							  					  				                    <div class="row"> 
							  					  				                        
							  					  				                    	
							  					  				                        <input type="hidden" name="student_id" value="{{ $student->id }}">

							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Interview Type <span class="required">*</span></label>
							  					  				                                <select class="form-control" required="" name="interview_type">
							  					  				                                	<option selected disabled value="">Choose...</option>
							  					  				                                	<option value="Interview Preparation"
							  					  				                                	@if ($interview->interview_type == "Interview Preparation")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Interview Preparation</option>
							  					  				                                	<option value="Pre-CAS offer Interview"
							  					  				                                	@if ($interview->interview_type == "Pre-CAS offer Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Pre-CAS offer Interview</option>

							  					  				                                	<option value="Traning"
							  					  				                                	@if ($interview->interview_type == "Traning")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Traning</option>
							  					  				                                </select>
							  					  				                            </div>
							  					  				                        </div>


							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Date & Time <span class="required">*</span></label>
							  					  				                                <input type="datetime-local" class="form-control" name="date_and_time" value="{{ $interview->date_and_time }}" required>
							  					  				                            </div>
							  					  				                        </div>


							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Comment <span class="required">*</span></label>
							  					  				                                <input type="text" class="form-control" name="remarks" value="{{ $interview->remarks }}" required>
							  					  				                            </div>
							  					  				                        </div>


							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Status <span class="required">*</span></label>
							  					  				                                <select class="form-control" required="" name="status">
							  					  				                                	<option selected disabled value="">Choose...</option>
							  					  				                                	<option value="Ready for Interview"
							  					  				                                	@if ($interview->status == "Ready for Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Ready for Interview</option>
							  					  				                                	<option value="Not Ready for Interview"
							  					  				                                	@if ($interview->status == "Not Ready for Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Not Ready for Interview</option>
							  					  				                                	<option value="Not Attended Training"
							  					  				                                	@if ($interview->status == "Not Attended Training")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Not Attended Training)</option>
							  					  				                                </select>
							  					  				                            </div>
							  					  				                        </div>



							  					  				                        
							  					  				                        
							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3 mb-0">
							  					  				                                <input type="submit" value="Update" class="submit btn btn-primary btn-block" name="submit">
							  					  				                            </div>
							  					  				                        </div>
							  					  				                    </div>
							  					  				                </form>
							  					  				            </div>
							  					  				        </div>
							  					  				    </div>
							  					  				</div>



												  				<div class="info">
												  					<p>Date : <span>{{ date('d M Y', strtotime($interview->date_and_time)) }}</span></p>
												  					<p>Time : <span>{{ date('h:i A', strtotime($interview->date_and_time)) }}</span></p>
												  				</div>
												  			</div>
												  			<div class="basic-info">
												  				<h4 class="info-title">Comment</h4>
												  				<div class="inter-comnt mb-3">
												  					<p>{{ $interview->remarks }}</p>
												  				</div>
												  			</div>
												  			<div class="basic-info">
												  				<h4 class="info-title">Status</h4>
												  				<div>
												  					@if ($interview->status == "Not Ready for Interview")
												  						<p class="staus pending-status">Not Ready for Interview</p>
												  					@elseif ($interview->status == "Ready for Interview")
												  						<p class="staus acpt-status">Ready for Interview</p>
												  					@else
												  						<p class="staus cancel-status">Not Attended Training</p>
												  					@endif
												  				</div>
												  			</div>
														</div>


    												@endforeach
    												
    											</div>
    										</div>
    									</div>
    								</div>

    								<div id="inter-pre-content">
    									<div class="row">
    										<div class="col-md-4">
    											<div class="operating-lease">
    												<ul class="nav nav-tabs mb-3">
    													@php
    														$InterviewPreparation = DB::table('interviews')->where(['student_id' => $student->id, 'interview_type' => 'Interview Preparation'])->get();
    													@endphp
    													@foreach ($InterviewPreparation as $key => $interview)
    														<li class="nav-item">
    														   <a class="nav-link @if ($key == 0) active @endif" data-toggle="tab" href="#inter-pre-{{ $interview->id }}">Preparation Schedule-{{ $key+1 }}</a>
    														</li>
    													@endforeach
    													
    													

    												</ul>
    											</div>
    										</div>
    										<div class="col-md-8">
    											<div class="tab-content">

    												@foreach ($InterviewPreparation as $key => $interview)

														<div class="tab-pane @if ($key == 0) active @else fade @endif" id="inter-pre-{{ $interview->id }}">
															<div class="basic-info">
												  				<h4 class="info-title">Date & Time
											  						@if (auth::user()->role == "Admin")
											  							@if (in_array("StudentUpdateInterviewPreparation", $permission))
											  								<button  type="button" class="btn btn-primary btn-sm float-end p-1 px-2" data-bs-toggle="modal" data-bs-target="#UpdateInterview{{ $interview->id }}">Update Interview</button>
											  							@endif
											  						@endif
												  				</h4>

												  				<!-- Modal -->
												  				<div class="modal fade" id="UpdateInterview{{ $interview->id }}">
												  				    <div class="modal-dialog modal-dialog-centered" role="document">
												  				        <div class="modal-content">
												  				            <div class="modal-header bg-light">
												  				                <h5 class="modal-title">Update</h5>
												  				                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
												  				            </div>
												  				            <div class="modal-body">
												  				                <form method="post" action="{{ url('/schedule/interview/update/'.$interview->id) }}">
												  				                	@csrf
												  				                	
												  				                    <div class="row"> 
												  				                        
												  				                    	<div class="col-lg-12">
												  				                    	    <div class="mb-3">
												  				                    	        <label class="text-black font-w600 form-label">Interview Type <span class="required">*</span></label>
												  				                    	        <select class="form-control" required="" name="interview_type">
												  				                    	        	<option selected disabled value="">Choose...</option>
												  				                    	        	<option value="Interview Preparation"
												  				                    	        	@if ($interview->interview_type == "Interview Preparation")
												  				                    	        		selected 
												  				                    	        	@endif
												  				                    	        	>Interview Preparation</option>
												  				                    	        	<option value="Pre-CAS offer Interview"
												  				                    	        	@if ($interview->interview_type == "Pre-CAS offer Interview")
												  				                    	        		selected 
												  				                    	        	@endif
												  				                    	        	>Pre-CAS offer Interview</option>

												  				                    	        	<option value="Traning"
												  				                    	        	@if ($interview->interview_type == "Traning")
												  				                    	        		selected 
												  				                    	        	@endif
												  				                    	        	>Traning</option>
												  				                    	        </select>
												  				                    	    </div>
												  				                    	</div>

												  				                        <input type="hidden" name="student_id" value="{{ $student->id }}">
												  				                        <div class="col-lg-12">
												  				                            <div class="mb-3">
												  				                                <label class="text-black font-w600 form-label">Date & Time <span class="required">*</span></label>
												  				                                <input type="datetime-local" class="form-control" name="date_and_time" value="{{ $interview->date_and_time }}" required>
												  				                            </div>
												  				                        </div>


												  				                        <div class="col-lg-12">
												  				                            <div class="mb-3">
												  				                                <label class="text-black font-w600 form-label">Comment <span class="required">*</span></label>
												  				                                <input type="text" class="form-control" name="remarks" value="{{ $interview->remarks }}" required>
												  				                            </div>
												  				                        </div>


												  				                        <div class="col-lg-12">
												  				                            <div class="mb-3">
												  				                                <label class="text-black font-w600 form-label">Status <span class="required">*</span></label>
												  				                                <select class="form-control" required="" name="status">
												  				                                	<option selected disabled value="">Choose...</option>
												  				                                	<option value="Passed Interview"
												  				                                	@if ($interview->status == "Passed Interview")
												  				                                		selected 
												  				                                	@endif
												  				                                	>Passed Interview</option>
												  				                                	<option value="Failed Interview"
												  				                                	@if ($interview->status == "Failed Interview")
												  				                                		selected 
												  				                                	@endif
												  				                                	>Failed Interview</option>
												  				                                	<option value="Reschedule Interview"
												  				                                	@if ($interview->status == "Reschedule Interview")
												  				                                		selected 
												  				                                	@endif
												  				                                	>Reschedule Interview</option>
												  				                                	<option value="Not Attended Interview"
												  				                                	@if ($interview->status == "Not Attended Interview")
												  				                                		selected 
												  				                                	@endif
												  				                                	>Not Attended Interview</option>
												  				                                </select>
												  				                            </div>
												  				                        </div>



												  				                        
												  				                        
												  				                        <div class="col-lg-12">
												  				                            <div class="mb-3 mb-0">
												  				                                <input type="submit" value="Update" class="submit btn btn-primary btn-block" name="submit">
												  				                            </div>
												  				                        </div>
												  				                    </div>
												  				                </form>
												  				            </div>
												  				        </div>
												  				    </div>
												  				</div>


												  				<div class="info">
												  					<p>Date : <span>{{ date('d M Y', strtotime($interview->date_and_time)) }}</span></p>
												  					<p>Time : <span>{{ date('h:i A', strtotime($interview->date_and_time)) }}</span></p>
												  				</div>
												  			</div>
												  			<div class="basic-info">
												  				<h4 class="info-title">Comment</h4>
												  				<div class="inter-comnt mb-3">
												  					<p>{{ $interview->remarks }}</p>
												  				</div>
												  			</div>
												  			<div class="basic-info">
												  				<h4 class="info-title">Status</h4>
												  				<div>
												  					@if ($interview->status == "Reschedule Interview")
												  						<p class="staus pending-status">Reschedule Interview</p>
												  					@elseif ($interview->status == "Passed Interview")
												  						<p class="staus acpt-status">Passed Interview</p>
												  					@elseif ($interview->status == "Not Attended Interview")
												  						<p class="staus cancel-status">Not Attended Interview</p>
												  					@else
												  						<p class="staus cancel-status">Failed Interview</p>
												  					@endif
												  				</div>
												  			</div>
														</div>


    												@endforeach

    											</div>
    										</div>
    									</div>
    								</div>
    								<div id="inter-cas-content">
    									<div class="row">
    										<div class="col-md-4">
    											<div class="operating-lease">
    												<ul class="nav nav-tabs mb-3">
    													@php
    														$PreCASofferInterview = DB::table('interviews')->where(['student_id' => $student->id, 'interview_type' => 'Pre-CAS offer Interview'])->get();
    													@endphp
    													@foreach ($PreCASofferInterview as $key => $interview)
    														<li class="nav-item">
    														   <a class="nav-link @if ($key == 0) active @endif" data-toggle="tab" href="#inter-pre-{{ $interview->id }}">Pre-CAS offer Schedule-{{ $key+1 }}</a>
    														</li>
    													@endforeach
    												</ul>
    											</div>
    										</div>
    										<div class="col-md-8">
    											<div class="tab-content">
    												@foreach ($PreCASofferInterview as $key => $interview)

														<div class="tab-pane @if ($key == 0) active @else fade @endif" id="inter-pre-{{ $interview->id }}">
															<div class="basic-info">
												  				
							  					  				<h4 class="info-title">Date & Time
							  				  						@if (in_array("StudentUpdatePreCASofferInterview", $permission))
							  				  							<button  type="button" class="btn btn-primary btn-sm float-end p-1 px-2" data-bs-toggle="modal" data-bs-target="#UpdateInterview{{ $interview->id }}">Update Interview</button>
							  				  						@endif
							  					  				</h4>

							  					  				<!-- Modal -->
							  					  				<div class="modal fade" id="UpdateInterview{{ $interview->id }}">
							  					  				    <div class="modal-dialog modal-dialog-centered" role="document">
							  					  				        <div class="modal-content">
							  					  				            <div class="modal-header bg-light">
							  					  				                <h5 class="modal-title">Update</h5>
							  					  				                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
							  					  				            </div>
							  					  				            <div class="modal-body">
							  					  				                <form method="post" action="{{ url('/schedule/interview/update/'.$interview->id) }}">
							  					  				                	@csrf
							  					  				                	
							  					  				                    <div class="row"> 
							  					  				                        
							  					  				                    	<div class="col-lg-12">
							  					  				                    	    <div class="mb-3">
							  					  				                    	        <label class="text-black font-w600 form-label">Interview Type <span class="required">*</span></label>
							  					  				                    	        <select class="form-control" required="" name="interview_type">
							  					  				                    	        	<option selected disabled value="">Choose...</option>
							  					  				                    	        	<option value="Interview Preparation"
							  					  				                    	        	@if ($interview->interview_type == "Interview Preparation")
							  					  				                    	        		selected 
							  					  				                    	        	@endif
							  					  				                    	        	>Interview Preparation</option>
							  					  				                    	        	<option value="Pre-CAS offer Interview"
							  					  				                    	        	@if ($interview->interview_type == "Pre-CAS offer Interview")
							  					  				                    	        		selected 
							  					  				                    	        	@endif
							  					  				                    	        	>Pre-CAS offer Interview</option>
							  					  				                    	        	<option value="Traning"
												  				                    	        	@if ($interview->interview_type == "Traning")
												  				                    	        		selected 
												  				                    	        	@endif
												  				                    	        	>Traning</option>
							  					  				                    	        </select>
							  					  				                    	    </div>
							  					  				                    	</div>

							  					  				                        <input type="hidden" name="student_id" value="{{ $student->id }}">
							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Date & Time <span class="required">*</span></label>
							  					  				                                <input type="datetime-local" class="form-control" name="date_and_time" value="{{ $interview->date_and_time }}" required>
							  					  				                            </div>
							  					  				                        </div>


							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Comment <span class="required">*</span></label>
							  					  				                                <input type="text" class="form-control" name="remarks" value="{{ $interview->remarks }}" required>
							  					  				                            </div>
							  					  				                        </div>


							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3">
							  					  				                                <label class="text-black font-w600 form-label">Status <span class="required">*</span></label>
							  					  				                                <select class="form-control" required="" name="status">
							  					  				                                	<option selected disabled value="">Choose...</option>
							  					  				                                	<option value="Passed Interview"
							  					  				                                	@if ($interview->status == "Passed Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Passed Interview</option>
							  					  				                                	<option value="Failed Interview"
							  					  				                                	@if ($interview->status == "Failed Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Failed Interview</option>
							  					  				                                	<option value="Reschedule Interview"
							  					  				                                	@if ($interview->status == "Reschedule Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Reschedule Interview</option>
							  					  				                                	<option value="Not Attended Interview"
							  					  				                                	@if ($interview->status == "Not Attended Interview")
							  					  				                                		selected 
							  					  				                                	@endif
							  					  				                                	>Not Attended Interview</option>
							  					  				                                </select>
							  					  				                            </div>
							  					  				                        </div>



							  					  				                        
							  					  				                        
							  					  				                        <div class="col-lg-12">
							  					  				                            <div class="mb-3 mb-0">
							  					  				                                <input type="submit" value="Update" class="submit btn btn-primary btn-block" name="submit">
							  					  				                            </div>
							  					  				                        </div>
							  					  				                    </div>
							  					  				                </form>
							  					  				            </div>
							  					  				        </div>
							  					  				    </div>
							  					  				</div>



												  				<div class="info">
												  					<p>Date : <span>{{ date('d M Y', strtotime($interview->date_and_time)) }}</span></p>
												  					<p>Time : <span>{{ date('h:i A', strtotime($interview->date_and_time)) }}</span></p>
												  				</div>
												  			</div>
												  			<div class="basic-info">
												  				<h4 class="info-title">Comment</h4>
												  				<div class="inter-comnt mb-3">
												  					<p>{{ $interview->remarks }}</p>
												  				</div>
												  			</div>
												  			<div class="basic-info">
												  				<h4 class="info-title">Status</h4>
												  				<div>
												  					@if ($interview->status == "Reschedule Interview")
												  						<p class="staus pending-status">Reschedule Interview</p>
												  					@elseif ($interview->status == "Passed Interview")
												  						<p class="staus acpt-status">Passed Interview</p>
												  					@elseif ($interview->status == "Not Attended Interview")
												  						<p class="staus cancel-status">Not Attended Interview</p>
												  					@else
												  						<p class="staus cancel-status">Failed Interview</p>
												  					@endif
												  				</div>
												  			</div>
														</div>


    												@endforeach
    												
    											</div>
    										</div>
    									</div>
    								</div>



    								




    							</div>
    						</div>
    					  </div>

    					  <div class="tab-pane fade" id="VisaAndSettlement">
    					  	<div class="row">
    							



    							<div class="basic-info">
				  					<h4 class="info-title d-flex align-items-center justify-content-between">
					  					<span>Visa Detail</span>

					  					@if (in_array("StudentUpdateVisaDetail", $permission))
					  						<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#UpdateVisaDetail">
					  							Update Info
					  						</button>
					  					@endif


					  					

					  					

					  					<!-- Modal -->
					  					<div class="modal fade" id="UpdateVisaDetail">
					  					    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					  					        <div class="modal-content">
					  					            <div class="modal-header bg-light">
					  					                <h5 class="modal-title">Update Info</h5>
					  					                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  					            </div>
					  					            <div class="modal-body">
					  					                <form method="post" action="{{ url('/common/student/update/visa/detail/'.$student->id) }}">
					  					                	@csrf

					  					                	<div class="row">
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">CAS Number </label>
					  					                		        <input type="text" name="cas_number" value="{{ $student->cas_number }}" class="form-control" autofocus="">
					  					                		    </div>
					  					                		</div>
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">CAS Issue Date</label>
					  					                		        <input type="date" name="cas_issue_date" value="{{ $student->cas_issue_date }}" class="form-control">
					  					                		    </div>
					  					                		</div>
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">CAS Expiry Date</label>
					  					                		        <input type="date" name="cas_expiry_date" value="{{ $student->cas_expiry_date }}" class="form-control">
					  					                		    </div>
					  					                		</div>
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Visa Applied</label>
					  					                		        <select class="form-control" name="visa_applied">
					  					                		        	<option value="Yes"
					  					                		        	@if ($student->visa_applied == "Yes")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Yes</option>
					  					                		        	<option value="No"
					  					                		        	@if ($student->visa_applied == "No")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>No</option>
					  					                		        </select>
					  					                		    </div>
					  					                		</div>

					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Visa Status</label>
					  					                		        <select class="form-control" name="visa_status">
					  					                		        	<option value="Applied"
					  					                		        	@if ($student->visa_status == "Applied")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Applied</option>
					  					                		        	<option value="Pending"
					  					                		        	@if ($student->visa_status == "Pending")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Pending</option>
					  					                		        	<option value="Approved"
					  					                		        	@if ($student->visa_status == "Approved")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Approved</option>
					  					                		        	<option value="Rejected"
					  					                		        	@if ($student->visa_status == "Rejected")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Rejected</option>
					  					                		        </select>
					  					                		    </div>
					  					                		</div>

					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Visa Expiry Date</label>
					  					                		        <input type="date" name="visa_expiry_date" value="{{ $student->visa_expiry_date }}" class="form-control">
					  					                		    </div>
					  					                		</div>
					  					                	</div>
					  					                	<div class="row">
					  					                	    <div class="col-12">
					  					                	        <input type="submit" class="btn btn-primary w-100" value="Update" />
					  					                	    </div>
					  					                	</div>
					  					                </form>
					  					            </div>
					  					        </div>
					  					    </div>
					  					</div>

					  					
					  				
					  				</h4>


					  				<div class="basic-info">
					  					

					  					<div class="info">
					  						<p><b class="text-dark">CAS Number</b> : {{ $student->cas_number }}</p>
					  						<p><b class="text-dark">CAS Issue Date</b> : {{ date('d M Y ', strtotime($student->cas_issue_date)) }}</p>
					  						<p><b class="text-dark">CAS Expiry Date</b> : {{ date('d M Y ', strtotime($student->cas_expiry_date))  }}</p>
					  						<p><b class="text-dark">Visa Applied</b> : {{ $student->visa_applied }}</p>
					  						<p><b class="text-dark">Visa Status</b> : 
					  							@if ($student->visa_status == "Pending")
					  								<span class="badge badge-warning">Pending</span>
					  							@elseif ($student->visa_status == "Approved")
					  								<span class="badge badge-success">Approved</span>
					  							@elseif ($student->visa_status == "Applied")
					  								<span class="badge badge-primary">Applied</span>
					  							@else
					  								<span class="badge badge-danger">Rejected</span>
					  							@endif
					  						</p>
					  						<p><b class="text-dark">Visa Expiry Date</b> : {{ date('d M Y ', strtotime($student->visa_expiry_date))  }}</p>
					  					</div>
					  				</div>
    							
    							</div>



    							<div class="basic-info">

				  					<h4 class="info-title d-flex align-items-center justify-content-between">
					  					<span>Settlement Detail</span>

					  					@if (in_array("StudentUpdateSettlementDetail", $permission))
					  						<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#UpdateSettlementDetail">
					  							Update Settlement
					  						</button>
					  					@endif


					  					

					  					

					  					<!-- Modal -->
					  					<div class="modal fade" id="UpdateSettlementDetail">
					  					    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					  					        <div class="modal-content">
					  					            <div class="modal-header bg-light">
					  					                <h5 class="modal-title">Update Settlement Detail</h5>
					  					                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  					            </div>
					  					            <div class="modal-body">
					  					                <form method="post" action="{{ url('/common/student/update/settlement/detail/'.$student->id) }}">
					  					                	@csrf

					  					                	<div class="row">
					  					                		
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Share Code</label>
					  					                		        <input type="text" name="share_code" value="{{ $student->share_code }}" maxlength="9" placeholder="Limit to 9 characters" value="{{ old('share_code') }}" class="form-control">
					  					                		    </div>
					  					                		</div>


					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Share Code Issue Date</label>
					  					                		        <input type="date" name="share_code_issue_date" value="{{ $student->share_code_issue_date }}" class="form-control">
					  					                		    </div>
					  					                		</div>

					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Share Code Expiry Date</label>
					  					                		        <input type="date" name="share_code_expiry_date" value="{{ $student->share_code_expiry_date }}" class="form-control">
					  					                		    </div>
					  					                		</div>

					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Is Valid </label>
					  					                		        <div class="form-check custom-checkbox ms-1">
					  					                		             <input type="checkbox" class="form-check-input" name="is_valid" @if ($student->is_valid == "Yes") checked  @endif  id="Is Valid" value="Yes">
					  					                		             <label class="form-check-label" for="Is Valid">Yes</label>
					  					                		         </div>
					  					                		    </div>
					  					                		</div>



					  					                		
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Settlement Status</label>
					  					                		        <select class="form-control" name="settlement_status">
					  					                		        	<option value="British Citizen"
					  					                		        	@if ($student->settlement_status == "British Citizen")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>British Citizen</option>
					  					                		        	<option value="Indefinite Leave to Remain"
					  					                		        	@if ($student->settlement_status == "Indefinite Leave to Remain")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Indefinite Leave to Remain</option>
					  					                		        	<option value="Pre-Settle Status"
					  					                		        	@if ($student->settlement_status == "Pre-Settle Status")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Pre-Settle Status</option>
					  					                		        	<option value="Awaiting Pre-Settle Status"
					  					                		        	@if ($student->settlement_status == "Awaiting Pre-Settle Status")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Awaiting Pre-Settle Status</option>
					  					                		        	<option value="Other"
					  					                		        	@if ($student->settlement_status == "Other")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Other</option>
					  					                		        </select>
					  					                		    </div>
					  					                		</div>

					  					                		

					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">National Insurance Number </label>
					  					                		        <input type="text" name="ni_number" value="{{ $student->ni_number }}" maxlength="9"  class="form-control" autofocus="">
					  					                		    </div>
					  					                		</div>

					  					                		
					  					                	</div>
					  					                	<div class="row">
					  					                	    <div class="col-12">
					  					                	        <input type="submit" class="btn btn-primary w-100" value="Update" />
					  					                	    </div>
					  					                	</div>
					  					                </form>
					  					            </div>
					  					        </div>
					  					    </div>
					  					</div>

					  					
					  				
					  				</h4>


				  					<div class="info">
				  						<p><b class="text-dark">Share Code</b> : {{ $student->share_code }}</p>
				  						<p><b class="text-dark">Share Code Issue Date</b> : {{ date('d M Y ', strtotime($student->share_code_issue_date)) }}</p>
				  						<p><b class="text-dark">Share Code Expiry Date</b> : {{ date('d M Y ', strtotime($student->share_code_expiry_date)) }}</p>
				  						<p><b class="text-dark">Is Valid</b> : {{ $student->is_valid }}</p>
				  						<p><b class="text-dark">Settlement Status</b> : {{ $student->settlement_status }}</p>
				  						<p><b class="text-dark">National Insurance Number</b> : {{ $student->ni_number }}</p>
				  					</div>
					  			



    								
    							</div>
    						</div>
    					  </div>

    					  <div class="tab-pane fade" id="SFE">
    					  	<div class="row">
    							
    							<div class="basic-info">

				  					<h4 class="info-title d-flex align-items-center justify-content-between">
					  					<span>SFE Detail</span>

					  					@if (in_array("StudentUpdateSFEDetail", $permission))
					  						<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#UpdateSFEDetail">
					  							Update SFE 
					  						</button>
					  					@endif


					  					

					  					

					  					<!-- Modal -->
					  					<div class="modal fade" id="UpdateSFEDetail">
					  					    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
					  					        <div class="modal-content">
					  					            <div class="modal-header bg-light">
					  					                <h5 class="modal-title">Update SFE Detils</h5>
					  					                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					  					            </div>
					  					            <div class="modal-body">
					  					                <form method="post" action="{{ url('/common/student/update/sfe/detail/'.$student->id) }}">
					  					                	@csrf

					  					                	<div class="row">
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Applied for SFE </label>
					  					                		        <select class="form-control" name="applied_for_sfe">
					  					                		        	<option value="Yes"
					  					                		        	@if ($student->applied_for_sfe == "Yes")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Yes</option>
					  					                		        	<option value="No"
					  					                		        	@if ($student->applied_for_sfe == "No")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>No</option>
					  					                		        </select>
					  					                		    </div>
					  					                		</div>
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">Custom Reference Number (CRN)</label>
					  					                		        <input type="text" name="custom_reference_number" value="{{ $student->custom_reference_number }}" maxlength="11" class="form-control">
					  					                		    </div>
					  					                		</div>
					  					                	

					  					                		
					  					                		<div class="col-lg-4 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">SFE Status</label>
					  					                		        <select class="form-control" name="sfe_status">
					  					                		        	<option value="Applied"
					  					                		        	@if ($student->sfe_status == "Applied")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Applied</option>
					  					                		        	<option value="Pending"
					  					                		        	@if ($student->sfe_status == "Pending")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Pending</option>
					  					                		        	<option value="Approved"
					  					                		        	@if ($student->sfe_status == "Approved")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Approved</option>
					  					                		        	<option value="Rejected"
					  					                		        	@if ($student->sfe_status == "Rejected")
					  					                		        		selected 
					  					                		        	@endif
					  					                		        	>Rejected</option>
					  					                		        </select>
					  					                		    </div>
					  					                		</div>



					  					                		<div class="col-lg-12 mb-2">
					  					                		    <div class="mb-3">
					  					                		        <label class="text-label form-label">SFE Comment</label>
					  					                		        <textarea class="form-control" name="sfe_comment" rows="4" style="height: 100px">{{ $student->sfe_comment }}</textarea>
					  					                		    </div>
					  					                		</div>
					  					                		
					  					                	</div>
					  					                	<div class="row">
					  					                	    <div class="col-12">
					  					                	        <input type="submit" class="btn btn-primary w-100" value="Update" />
					  					                	    </div>
					  					                	</div>
					  					                </form>
					  					            </div>
					  					        </div>
					  					    </div>
					  					</div>

					  					
					  				
					  				</h4>


				  					<div class="info">
				  						<p><b class="text-dark">Applied for SFE</b> : {{ $student->applied_for_sfe }}</p>
				  						<p><b class="text-dark">Custom Reference Number (CRN)</b> : {{ $student->custom_reference_number }}</p>
				  						<p><b class="text-dark">SFE Status</b> : {{ $student->sfe_status }}</p>
				  						<p><b class="text-dark">SFE Comment</b> : {{ $student->sfe_comment }}</p>
				  					</div>


    					
    							</div>
    						</div>
    					  </div>
    					  <div class="tab-pane fade" id="InternalTraning">
    					  	<div class="row">
    					  		<div class="basic-info">


	  			  					<h4 class="info-title d-flex align-items-center justify-content-between">
	  				  					<span>Internal Traning</span>

	  				  					@if (in_array("StudentUpdateInternalTraning", $permission))
	  				  						<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#UpdateInternalTraning">
	  				  							Update Internal Traning 
	  				  						</button>
	  				  					@endif


	  				  					

	  				  					

	  				  					<!-- Modal -->
	  				  					<div class="modal fade" id="UpdateInternalTraning">
	  				  					    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	  				  					        <div class="modal-content">
	  				  					            <div class="modal-header bg-light">
	  				  					                <h5 class="modal-title">Update Internal Traning </h5>
	  				  					                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	  				  					            </div>
	  				  					            <div class="modal-body">
	  				  					                <form method="post" action="{{ url('/common/student/update/internal/traning/'.$student->id) }}">
	  				  					                	@csrf

	  				  					                	<div class="row">
	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Course Type</label>
	  				  					                		        <select class="form-control" name="traning_course_type">
	  				  					                		        	<option value="Level 2"
	  				  					                		        	@if ($student->traning_course_type == "Level 2")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Level 2</option>
	  				  					                		        	<option value="Level 3"
	  				  					                		        	@if ($student->traning_course_type == "Level 3")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Level 3</option>
	  				  					                		        	<option value="Level 4"
	  				  					                		        	@if ($student->traning_course_type == "Level 4")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Level 4</option>
	  				  					                		        	<option value="Level 5"
	  				  					                		        	@if ($student->traning_course_type == "Level 5")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Level 5</option>
	  				  					                		        	<option value="Other"
	  				  					                		        	@if ($student->traning_course_type == "Other")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Other</option>
	  				  					                		        </select>
	  				  					                		    </div>
	  				  					                		</div>
	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Course Title</label>
	  				  					                		        <input type="text" name="traning_course_title" value="{{ $student->traning_course_title }}" class="form-control">
	  				  					                		    </div>
	  				  					                		</div>

	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Awarding Organisation</label>
	  				  					                		        <select class="form-control" name="traning_awarding_oganisation">
	  				  					                		        	<option value="ATHE"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "ATHE")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>ATHE</option>
	  				  					                		        	<option value="FOCUS"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "FOCUS")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>FOCUS</option>
	  				  					                		        	<option value="QUALIFI"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "QUALIFI")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>QUALIFI</option>
	  				  					                		        	<option value="PEARSON BTEC"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "PEARSON BTEC")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>PEARSON BTEC</option>
	  				  					                		        	<option value="TQ-UK"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "TQ-UK")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>TQ-UK</option>
	  				  					                		        	<option value="OTHM"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "OTHM")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>OTHM</option>
	  				  					                		        	<option value="IQF"
	  				  					                		        	@if ($student->traning_awarding_oganisation == "IQF")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>IQF</option>
	  				  					                		        </select>
	  				  					                		    </div>
	  				  					                		</div>
	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Start Date</label>
	  				  					                		        <input type="date" name="traning_start_date" value="{{ $student->traning_start_date }}" class="form-control">
	  				  					                		    </div>
	  				  					                		</div>

	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">End Date</label>
	  				  					                		        <input type="date" name="traning_end_date" value="{{ $student->traning_end_date }}" class="form-control">
	  				  					                		    </div>
	  				  					                		</div>
	  				  					                		
	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Certification Status</label>
	  				  					                		        <select class="form-control" name="traning_certification_status">
	  				  					                		        	<option value="Claimed"
	  				  					                		        	@if ($student->traning_certification_status == "Claimed")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Claimed</option>
	  				  					                		        	<option value="Issued"
	  				  					                		        	@if ($student->traning_certification_status == "Issued")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Issued</option>
	  				  					                		        	<option value="Awaiting"
	  				  					                		        	@if ($student->traning_certification_status == "Awaiting")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Awaiting</option>
	  				  					                		        </select>
	  				  					                		    </div>
	  				  					                		</div>
	  				  					                		
	  				  					                	</div>
	  				  					                	<div class="row">
	  				  					                	    <div class="col-12">
	  				  					                	        <input type="submit" class="btn btn-primary w-100" value="Update" />
	  				  					                	    </div>
	  				  					                	</div>
	  				  					                </form>
	  				  					            </div>
	  				  					        </div>
	  				  					    </div>
	  				  					</div>

	  				  					
	  				  				
	  				  				</h4>


	  			  					<div class="info">
	  			  						<p><b class="text-dark">Course Type</b> : {{ $student->traning_course_type }}</p>
	  			  						<p><b class="text-dark">Course Title</b> : {{ $student->traning_course_title }}</p>
	  			  						<p><b class="text-dark">Awarding Organisation</b> : {{ $student->traning_awarding_oganisation }}</p>
	  			  						<p><b class="text-dark">Start Date</b> : {{ date('d M Y', strtotime($student->traning_start_date)) }}</p>
	  			  						<p><b class="text-dark">End Date</b> : {{ date('d M Y', strtotime($student->traning_end_date)) }}</p>
	  			  						<p><b class="text-dark">Certification Status</b> : {{ $student->traning_certification_status }}</p>
	  			  					</div>


    								
    							</div>


						  		<div class="basic-info">
	  			  					<h4 class="info-title d-flex align-items-center justify-content-between">
	  				  					<span>Fee</span>

	  				  					@if (in_array("StudentUpdateFee", $permission))
	  				  						<button type="button" class="btn btn-primary btn-sm " data-bs-toggle="modal" data-bs-target="#UpdateFee">
	  				  							Update Internal Traning 
	  				  						</button>
	  				  					@endif


	  				  					

	  				  					

	  				  					<!-- Modal -->
	  				  					<div class="modal fade" id="UpdateFee">
	  				  					    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	  				  					        <div class="modal-content">
	  				  					            <div class="modal-header bg-light">
	  				  					                <h5 class="modal-title">Update Fee </h5>
	  				  					                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
	  				  					            </div>
	  				  					            <div class="modal-body">
	  				  					                <form method="post" action="{{ url('/common/student/update/fee/'.$student->id) }}">
	  				  					                	@csrf

	  				  					                	<div class="row">
	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Training Fee</label>
	  				  					                		        <input type="text" name="training_fee" value="{{ $student->training_fee }}" class="form-control">
	  				  					                		    </div>
	  				  					                		</div>

	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Payment Status</label>
	  				  					                		        <select class="form-control" name="payment_status">
	  				  					                		        	<option value="Paid"
	  				  					                		        	@if ($student->payment_status == "Paid")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Paid</option>
	  				  					                		        	<option value="UnPaid"
	  				  					                		        	@if ($student->payment_status == "UnPaid")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>UnPaid</option>
	  				  					                		        </select>
	  				  					                		    </div>
	  				  					                		</div>

	  				  					                		<div class="col-lg-4 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Commission Claimed</label>
	  				  					                		        <select class="form-control" name="commission_claimd">
	  				  					                		        	<option value="Claimed"
	  				  					                		        	@if ($student->commission_claimd == "Claimed")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Claimed</option>
	  				  					                		        	<option value="UnClaimed"
	  				  					                		        	@if ($student->commission_claimd == "UnClaimed")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>UnClaimed</option>
	  				  					                		        	<option value="Adjusted"
	  				  					                		        	@if ($student->commission_claimd == "Adjusted")
	  				  					                		        		selected 
	  				  					                		        	@endif
	  				  					                		        	>Adjusted</option>
	  				  					                		        </select>
	  				  					                		    </div>
	  				  					                		</div>
	  				  					                		

	  				  					                		<div class="col-lg-12 mb-2">
	  				  					                		    <div class="mb-3">
	  				  					                		        <label class="text-label form-label">Comment</label>
	  				  					                		        <textarea class="form-control" name="fee_comment" style="height: 100px" rows="4">{{ $student->fee_comment }}</textarea>
	  				  					                		    </div>
	  				  					                		</div>

	  				  					                		
	  				  					                	</div>
	  				  					                	<div class="row">
	  				  					                	    <div class="col-12">
	  				  					                	        <input type="submit" class="btn btn-primary w-100" value="Update" />
	  				  					                	    </div>
	  				  					                	</div>
	  				  					                </form>
	  				  					            </div>
	  				  					        </div>
	  				  					    </div>
	  				  					</div>

	  				  					
	  				  				
	  				  				</h4>


	  			  					<div class="info">
	  			  						<p><b class="text-dark">Training Fee</b> : {{ $student->training_fee }}</p>
	  			  						<p><b class="text-dark">Payment Status</b> : {{ $student->payment_status }}</p>
	  			  						<p><b class="text-dark">Commission Claimed</b> : {{ $student->commission_claimd }}</p>
	  			  						<p><b class="text-dark">Comment</b> : {{ $student->fee_comment }}</p>
	  			  					</div>


								</div>
    						</div>
    					  </div>
    					  <div class="tab-pane fade" id="status">
    					  	<div class="row">
    					  		<div class="col-lg-12 col-sm-12 mb-2">

	    					  		@if (auth::user()->role == "Admin")
	    					  			@if (in_array("StudentUpdateStatus", $permission))

		    					  			<button class="btn btn-sm btn-primary" style="width: 15%; float: right; margin-bottom: : 20px"  data-bs-toggle="modal" data-bs-target="#UpdateStatus">
		    					  			    <i class="fa fa-edit"></i>
		    					  			    <span>Update Status</span>
		    					  			</button>
		    					  		@endif



	    					  		@endif

	    					  		

	    					  		<!-- Modal -->
	    					  		<div class="modal fade" id="UpdateStatus">
    					  		    <div class="modal-dialog modal-dialog-centered" role="document">
    					  		        <div class="modal-content">
    					  		            <div class="modal-header bg-light">
    					  		                <h5 class="modal-title">Status</h5>
    					  		                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    					  		            </div>
    					  		            <div class="modal-body">
    					  		                <form method="post" action="{{ url('/common/student/update/status/'.$student->id) }}">
    					  		                	@csrf
    					  		                	
    					  		                    <div class="row"> 
    					  		                        
    					  		                    	


    					  		                        <div class="col-lg-12">
    					  		                            <div class="mb-3">
    					  		                                <label class="text-black font-w600 form-label">Application Status</label>
    					  		                                <select class="form-control" name="application_status">
    					  		                                	<option selected disabled value="">Choose...</option>
    					  		                                	<option value="Pending"
    					  		                                	@if ($student->application_status == "Pending")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Pending</option>
    					  		                                	<option value="Accepted"
    					  		                                	@if ($student->application_status == "Accepted")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Accepted</option>
    					  		                                	<option value="Rejected"
    					  		                                	@if ($student->application_status == "Rejected")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Rejected</option>
    					  		                                </select>
    					  		                            </div>
    					  		                        </div>

    					  		                        <div class="col-lg-12">
    					  		                            <div class="mb-3">
    					  		                                <label class="text-black font-w600 form-label">Admission Status</label>
    					  		                                <select class="form-control" name="admission_status">
    					  		                                	<option selected disabled value="">Choose...</option>
    					  		                                	<option value="Conditional Offer"
    					  		                                	@if ($student->admission_status == "Conditional Offer")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Conditional Offer</option>
    					  		                                	<option value="Unconditional Offer"
    					  		                                	@if ($student->admission_status == "Unconditional Offer")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Unconditional Offer</option>
    					  		                                	<option value="Pending"
    					  		                                	@if ($student->admission_status == "Pending")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Pending</option>
    					  		                                	<option value="Declined"
    					  		                                	@if ($student->admission_status == "Declined")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Declined</option>
    					  		                                </select>
    					  		                            </div>
    					  		                        </div>

    					  		                        <div class="col-lg-12">
    					  		                            <div class="mb-3">
    					  		                                <label class="text-black font-w600 form-label">Visa Status</label>
    					  		                                <select class="form-control" name="visa_status">
    					  		                                	<option selected disabled value="">Choose...</option>
    					  		                                	<option value="Pending"
    					  		                                	@if ($student->visa_status == "Pending")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Pending</option>
    					  		                                	<option value="Applied"
    					  		                                	@if ($student->visa_status == "Applied")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Applied</option>
    					  		                                	<option value="Approved"
    					  		                                	@if ($student->visa_status == "Approved")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Approved</option>
    					  		                                	<option value="Rejected"
    					  		                                	@if ($student->visa_status == "Rejected")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Rejected</option>
    					  		                                </select>
    					  		                            </div>
    					  		                        </div>

    					  		                        <div class="col-lg-12">
    					  		                            <div class="mb-3">
    					  		                                <label class="text-black font-w600 form-label">Enrolment Status</label>
    					  		                                <select class="form-control" name="enrolment_status">
    					  		                                	<option selected disabled value="">Choose...</option>
    					  		                                	<option value="Pending"
    					  		                                	@if ($student->enrolment_status == "Pending")
    					  		                                	    selected 
    					  		                                	@endif
    					  		                                	>Pending</option>
    					  		                                	<option value="Enrolled"
    					  		                                	@if ($student->enrolment_status == "Enrolled")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Enrolled</option>
    					  		                                	<option value="Deferred"
    					  		                                	@if ($student->enrolment_status == "Deferred")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Deferred</option>
    					  		                                	<option value="Withdrawn"
    					  		                                	@if ($student->enrolment_status == "Withdrawn")
    					  		                                		selected 
    					  		                                	@endif
    					  		                                	>Withdrawn</option>
    					  		                                </select>
    					  		                            </div>
    					  		                        </div>



    					  		                        

    					  		                       
    					  		                        
    					  		                        <div class="col-lg-12">
    					  		                            <div class="mb-3 mb-0">
    					  		                                <input type="submit" value="Update" class="submit btn btn-primary btn-block" name="submit">
    					  		                            </div>
    					  		                        </div>
    					  		                    </div>
    					  		                </form>
    					  		            </div>
    					  		        </div>
    					  		    </div>
    					  			</div>
    					  		</div>
    					  	</div>
    					  	<div class="row">
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Application Status :</p>
    					  				@if ($student->application_status == "Pending")
    					  					<p class="staus pending-status">Pending</p>
    					  				@elseif ($student->application_status == "Accepted")
    					  					<p class="staus acpt-status">Accepted</p>
    					  				@else
    					  					<p class="staus cancel-status">Rejected</p>
    					  				@endif
    					  			</div>
    					  		</div>
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Admission Status :</p>
    					  				@if ($student->admission_status == "Conditional Offer")
    					  					<p class="staus pending-status">Conditional Offer</p>
    					  				@elseif ($student->admission_status == "Unconditional Offer")
    					  					<p class="staus pending-status">Unconditional Offer</p>
    					  				@elseif ($student->admission_status == "Pending")
    					  					<p class="staus pending-status">Pending</p>
    					  				@elseif ($student->admission_status == "Accepted")
    					  					<p class="staus acpt-status">Accepted</p>
    					  				@else
    					  					<p class="staus cancel-status">Rejected</p>
    					  				@endif
    					  			</div>
    					  		</div>
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Visa Status :</p>
    					  				@if ($student->visa_status == "Pending")
    					  					<p class="staus pending-status">Pending</p>
    					  				@elseif ($student->visa_status == "Approved")
    					  					<p class="staus acpt-status">Approved</p>
    					  				@elseif ($student->visa_status == "Applied")
    					  					<p class="staus bg-primary">Applied</p>
    					  				@else
    					  					<p class="staus cancel-status">Rejected</p>
    					  				@endif
    					  			</div>
    					  		</div>
    					  		<div class="col-lg-3 col-sm-6">
    					  			<div class="status-box">
    					  				<p>Enrolment Status :</p>
    					  				@if ($student->enrolment_status == "Enrolled")
    					  					<p class="staus pending-status">Enrolled</p>
    					  				@elseif ($student->enrolment_status == "Deferred")
    					  					<p class="staus pending-status">Deferred</p>
    					  				@else
    					  					<p class="staus cancel-status">Withdrawn</p>
    					  				@endif
    					  			</div>
    					  		</div>
    					  	</div>
    					  	
    					  </div>
    					  <div class="tab-pane container fade" id="download">Comming Soon</div>
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
		$("#inter-traning-content").show();
		$("#inter-cas-content").hide();
	    $("#inter-pre-content").hide();
	    
		$("#inter-pre").click(function(){
	      $("#inter-pre-content").show();
	      $("#inter-cas-content").hide();
	      $("#inter-traning-content").hide();
	      
		});
		$("#inter-cas").click(function(){
	      $("#inter-pre-content").hide();
	      $("#inter-traning-content").hide();
	      $("#inter-cas-content").show();
		});

		$("#inter-traning").click(function(){
	      $("#inter-traning-content").show();
	      $("#inter-pre-content").hide();
	      $("#inter-cas-content").hide();
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