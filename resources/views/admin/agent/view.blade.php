@php
    $title = $agent->name." - Info";
@endphp
@extends('admin.layouts.app')
@section('title', $title)

@section('content')

@section('css')
<style type="text/css">
        .previous {overflow:hidden !important;}
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
            font-size: 18px;
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
    
    $students = DB::table('students')->where('agent_id', $agent->id)->get();
    $Applications = DB::table('applications')->where('agent_id', $agent->id)->get();
    $subagents = DB::table('users')->where('agent_id', $agent->id)->get();
    // $campus = DB::table('campuses')->where('id', $application->campus_id)->first();
    // $university = DB::table('universities')->where('id', $campus->university_id)->first();
    // $course = DB::table('courses')->where('id', $application->course_id)->first();
    // $intakes = DB::table('intakes')->where('id', $application->intake_id)->get();
    


    // error_reporting(0);
    // $country = DB::table('countries')->where('id', $university->country)->first();
    // $state = DB::table('states')->where('id', $university->state)->first();
    // $city = DB::table('cities')->where('id', $university->city)->first();

@endphp


<div class="content-body">
    <div class="container-fluid">
        
      

        <div class="row">
            <div class="col-md-12">
                <div class="student-tab-box">
                    <ul class="nav nav-tabs top-main-nav mb-3">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#agent">Agent</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#BankInformation">Bank Information</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Students">Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Applications">Applications </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#SubAgent">Sub Agents </a>
                      </li>
                    </ul>

                    
                    <div class="tab-content">
                      <div class="tab-pane active" id="agent">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="basic-info">
                                    <h4 class="info-title">Agent Information</h4>

                                    @php
                                        error_reporting(0);
                                        $info = DB::table('agents')->where('id', $agent->table_id)->first();
                                        $infoCountry = DB::table('countries')->where('id',$info->country)->first();
                                    @endphp

                                    <div class="info">
                                        <p><span>Agent ID </span>: <span> {{ $agent->id }}</span></p>
                                        <p><span>Name </span>: <span> {{ $agent->name }}</span></p>
                                        
                                        <p><span>Company Name </span>: <span> {{ $info->agent_company_name }}</span></p>
                                        
                                        <p><span>Main Contact First Name </span>: <span>{{ $info->contact_first_name }}</span></p>
                                        
                                        <p><span>Main Contact Last Name </span>: <span>{{ $info->contact_last_name }}</span></p>
                                        <p><span>Main Contact Email </span>: <span>{{ $info->contract_email_address }}</span></p>
                                        <p><span>Main Contact Contact Number </span>: <span>{{ $info->contract_contact_number }}</span></p>
                                        <p><span>City </span>: <span>{{ $info->city }}</span></p>
                                        <p><span>State </span>: <span>{{ $info->state }}</span></p>
                                        <p><span>Country </span>: <span>{{ $info->country }}</span></p>
                                        <p><span>Email </span>: <span>{{ $agent->email }}</span></p>
                                        <p><span>Contact Number </span>: <span>{{ $info->contact_number }}</span></p>
                                        <p><span>Designation </span>: <span>{{ $agent->designation }}</span></p>
                                        <p><span>Status </span>: 
                                            @if ($agent->status == 1)
                                                <span class="bg-success text-white px-2 rounded">Active</span>
                                            @else
                                                <span class="bg-danger text-white px-2 rounded">InActive</span>
                                            @endif
                                        </p>
                                        <p></p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="BankInformation">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="basic-info">
                                    <h4 class="info-title">Agent Banking Information</h4>
                                    <div class="info">
                                        <p><span>Bank Name </span>: <span>{{ $agent->bank_name }}</span></p>
                                        <p><span>Bank Address </span>: <span>{{ $agent->bank_address }}</span></p>
                                        <p><span>Institution Number </span>: <span>{{ $agent->institution_number }}</span></p>
                                        <p><span>Transit Number </span>: <span>{{ $agent->transit_number }}</span></p>
                                        <p><span>Account Number </span>: <span>{{ $agent->account_number }}</span></p>
                                        <p><span>Swift Code </span>: <span>{{ $agent->swift_code }}</span></p>
                                        <p><span>Comments </span>: <span>{{ $agent->comments }}</span></p>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="Students">
                        <div class="p-2">
                            <div class="table-responsive">
                                <table  id="myExample1" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Reg_No</strong></th>
                                            <th><strong>Student</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Phone</strong></th>
                                            <th><strong>Gender</strong></th>
                                            <th><strong>Nationality</strong></th>
                                            <th><strong></strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->registration_number }}</td>
                                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                                <td>{{ $student->email_address }} </td>
                                                <td>{{ $student->contact_number }} </td>
                                                <td>{{ $student->gender }} </td>
                                                <td>
                                                    @php
                                                        error_reporting(0);
                                                        $nationality = DB::table('countries')->where('id', $student->nationality)->first();
                                                    @endphp
                                                    {{ $nationality->name }} 
                                                </td>
                                                <td><a href="{{ url('/admin/student/view/'.$student->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a></td>
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                      </div>
                      <div class="tab-pane fade" id="Applications">
                        <div class="p-2">
                            <div class="table-responsive">
                                <table  id="myExample2" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Student</strong></th>
                                            <th><strong>Course</strong></th>
                                            <th><strong>Intake</strong></th>
                                            <th><strong>University</strong></th>
                                            <th><strong>Status</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($Applications as $application)
                                            @php
                                                error_reporting(0);
                                                $student = DB::table('students')->where('id', $application->student_id)->first();
                                                $course = DB::table('courses')->where('id', $application->course_id)->first();
                                                $intake = DB::table('intakes')->where('id', $application->intake_id)->first();

                                                $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                                $university = DB::table('universities')->where('id', $campus->university_id)->first();
                                            @endphp
                                            <tr>
                                                
                                                <td>{{ $application->id }} </td>
                                                <td>{{ $student->first_name }} {{ $student->last_name }} </td>
                                                <td>{{ $course->course_name }} </td>
                                                <td>{{ $intake->month }} {{ $intake->year }} </td>
                                                <td>{{ $university->name }} </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        @if ($application->status == "Accepted")
                                                            <i class="fa fa-circle text-success me-1"></i> {{ $application->status }}
                                                        @elseif ($application->status == "Rejected")
                                                            <i class="fa fa-circle text-danger me-1"></i> {{ $application->status }}
                                                        @else
                                                            <i class="fa fa-circle text-primary me-1"></i> {{ $application->status }}
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
                      <div class="tab-pane fade" id="SubAgent">
                          <div class="p-2">
                              <div class="table-responsive">
                                  <table  id="myExample3" class="table table-striped table-responsive-md">
                                      <thead class="thead-primary">
                                          <tr>
                                              <th><strong>Agent</strong></th>
                                              <th><strong>Email</strong></th>
                                              <th><strong>Designation</strong></th>
                                              <th><strong>Registered</strong></th>
                                              <th><strong>Status</strong></th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($subagents as $agent)

                                              <tr>

                                               


                                                  <td>
                                                      <div class="d-flex align-items-center">

                                                          @if (!empty($agent->image))
                                                              <img class="rounded-lg me-2" width="24" src="{{ asset('backend/profile/'.$agent->image) }}" />
                                                          @else
                                                              <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                          @endif


                                                          <span class="w-space-no">{{ $agent->name }}</span>
                                                      </div>
                                                  </td>
                                            
                                                  
                                                  <td>{{ $agent->email }}</td>
                                                  <td>{{ $agent->designation }}</td>
                                                  <td>{{ date('d M Y', strtotime($agent->created_at)) }}</td>
                                                  <td>
                                                      <div class="d-flex align-items-center">
                                                          @if ($agent->status == 1)
                                                              <i class="fa fa-circle text-success me-1"></i> Active
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
            </div>
        </div>
        
    </div>
</div>






@endsection
@section('js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(function(){
        $(".apply-list ul li a").click(function(){
            $(".apply-list ul li a").removeClass("apply-list-active")
            $(this).addClass("apply-list-active")
        });
    });
</script>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        // myExample1
        

        // myExample2
        $('#myExample2').DataTable();

        // myExample3
        $('#myExample3').DataTable();

        // myExample4
        $('#myExample4').DataTable();

        // myExample5
        $('#myExample5').DataTable();



    } );
</script>
@endsection



