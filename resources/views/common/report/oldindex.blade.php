@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'Reports')

@section('content')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
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

@if (auth::user()->role == "Admin")
    @php
        error_reporting(0);
        $students = DB::table('students')->get();
        $AcceptedStudents = DB::table('students')->where('application_status', 'Accepted')->get();
        $PendingStudents = DB::table('students')->where('application_status', 'Pending')->get();
        $PendingApplications = DB::table('applications')->where('status', 'Pending')->get();
        $AcceptedApplications = DB::table('applications')->where('status', 'Accepted')->get();
    @endphp
@elseif (auth::user()->role == "Agent")
    @php
        error_reporting(0);
        $students = DB::table('students')->where('agent_id', auth::user()->id)->get();
        $AcceptedStudents = DB::table('students')->where(['application_status' => 'Accepted', 'agent_id' => auth::user()->id])->get();
        $PendingStudents = DB::table('students')->where(['application_status' => 'Pending', 'agent_id' => auth::user()->id])->get();
        $PendingApplications = DB::table('applications')->where(['status' => 'Pending', 'agent_id' => auth::user()->id])->get();
        $AcceptedApplications = DB::table('applications')->where(['status' => 'Accepted', 'agent_id' => auth::user()->id])->get();
    @endphp
@endif
<div class="content-body">
    <div class="container-fluid">
        
      

        <div class="row">
            <div class="col-md-12">
                <div class="student-tab-box">
                    <ul class="nav nav-tabs top-main-nav mb-3">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#students">Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#AcceptedStudents">Accepted Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#PendingStudents">Pending Students</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#PendingApplications">Pending Applications </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#AcceptedApplications">Accepted Applications </a>
                      </li>
                    </ul>

                    
                    <div class="tab-content">
                      <div class="tab-pane active" id="students">
                        <div class="p-2">
                            @include('common.report.search')
                            <div class="table-responsive">
                                <table  id="myExample0" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Reg_No</strong></th>
                                            <th><strong>Student</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Phone</strong></th>
                                            <th><strong>Gender</strong></th>
                                            <th><strong>Nationality</strong></th>
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
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                      </div>
                      <div class="tab-pane fade" id="AcceptedStudents">
                        <div class="p-2">
                            <div class="table-responsive">
                                <table  id="myExample2" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Reg_No</strong></th>
                                            <th><strong>Student</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Phone</strong></th>
                                            <th><strong>Gender</strong></th>
                                            <th><strong>Nationality</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($AcceptedStudents as $student)
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
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                      </div>
                      <div class="tab-pane fade" id="PendingStudents">
                        <div class="p-2">
                            <div class="table-responsive">
                                <table  id="myExample3" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>ID</strong></th>
                                            <th><strong>Reg_No</strong></th>
                                            <th><strong>Student</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Phone</strong></th>
                                            <th><strong>Gender</strong></th>
                                            <th><strong>Nationality</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($PendingStudents as $student)
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
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                      </div>
                      <div class="tab-pane fade" id="PendingApplications">
                        <div class="p-2">
                            <div class="table-responsive">
                                <table  id="myExample4" class="table table-striped table-responsive-md">
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


                                        @foreach ($PendingApplications as $application)
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
                      <div class="tab-pane fade" id="AcceptedApplications">
                          <div class="p-2">
                              <div class="table-responsive">
                                  <table  id="myExample5" class="table table-striped table-responsive-md">
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


                                          @foreach ($AcceptedApplications as $application)
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



<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        // myExample1
        $('#myExample0').DataTable( {
            dom: 'Bfrtip',

            buttons: [
                'excel',
                'print',
            ]
        });



        // myExample2
        $('#myExample2').DataTable( {
            dom: 'Bfrtip',

            buttons: [
                'excel',
                'print',
            ]
        });



        // myExample3
        $('#myExample3').DataTable( {
            dom: 'Bfrtip',

            buttons: [
                'excel',
                'print',
            ]
        });



        // myExample4
        $('#myExample4').DataTable( {
            dom: 'Bfrtip',

            buttons: [
                'excel',
                'print',
            ]
        });



        // myExample5
        $('#myExample5').DataTable( {
            dom: 'Bfrtip',

            buttons: [
                'excel',
                'print',
            ]
        });



    } );
</script>
@endsection



