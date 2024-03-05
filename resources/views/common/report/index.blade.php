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



        .select2-container--default .select2-selection--multiple{
            display: block !important;
            width: 100% !important;
            padding: 0.9rem 0.75rem !important;
            font-size: 0.875rem !important;
            font-weight: 400 !important;
            line-height: 1.5 !important;
            color: #393939 !important;
            background-color: #6e6e6e !important !important;
            background-clip: padding-box !important;
            border: 1px solid #f5f5f5 !important;
            appearance: none !important;
            border-radius: 1.25rem !important;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
        }
    </style>
@endsection


<div class="content-body">
    <div class="container-fluid">
        
      

        <div class="row">
            <div class="col-md-12">
                <div class="student-tab-box">
                    <ul class="nav nav-tabs top-main-nav mb-3">
                      <li class="nav-item">
                        <a class="nav-link @if (request()->is('student/report/search')) active @elseif (request()->is('application/report/search')) @else active @endif" data-toggle="tab" href="#students">Students</a>
                      </li>
              

                      <li class="nav-item">
                        <a class="nav-link @if (request()->is('application/report/search')) active @endif " data-toggle="tab" href="#applications">Applications </a>
                      </li>

                      {{-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Commissions">Commissions </a>
                      </li> --}}
                      
                    </ul>

                    
                    <div class="tab-content">
                      <div class="tab-pane @if (request()->is('student/report/search')) active @elseif (request()->is('application/report/search')) @else active @endif" id="students">
                        <div class="p-2">
                            
                            @php
                                error_reporting(0);
                                use App\University;
                                $countries = DB::table('countries')->get();
                                $campuses = DB::table('campuses')->get();
                                $intakes = DB::table('intakes')->get();
                                foreach ($campuses as $key => $value)
                                {
                                    $university = University::find($value->university_id);
                                    $campuses[$key]->university_id = $university->id;
                                    $campuses[$key]->university_name = $university->name;
                                }
                            @endphp

                            <form method="get" action="{{ url('/student/report/search') }}">
                                <div class="row">
                                    
                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">By Date Range </label>
                                            {{-- <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="{{ date('d M Y') }} - 01/31/2015"> --}}

                                            <div class="input-group">
                                                <input type="date" name="start_date" class="form-control" @if (request()->start_date) value="{{ request()->start_date }}" @endif>
                                                <input type="date" name="end_date" class="form-control" @if (request()->end_date) value="{{ request()->end_date }}" @endif>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Nationality </label>
                                            <select class="form-control select2" name="nationality">
                                                <option value="">Choose...</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        @if (request()->nationality)
                                                            @if (request()->nationality == $country->id)
                                                                selected 
                                                            @endif
                                                        @endif
                                                    >{{ $country->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                  


                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Application Status </label>
                                            <select class="form-control select2" name="application_status[]" multiple="">
                                                <option value="Pending"
                                                @if (request()->application_status)
                                                    @if (in_array("Pending", request()->application_status))
                                                        selected 
                                                    @endif
                                                @endif
                                                >Pending</option>
                                                <option value="Accepted"
                                                @if (request()->application_status)
                                                    @if (in_array("Accepted", request()->application_status))
                                                        selected 
                                                    @endif
                                                @endif
                                                >Accepted</option>
                                                <option value="Rejected"
                                                @if (request()->application_status)
                                                    @if (in_array("Rejected", request()->application_status))
                                                        selected 
                                                    @endif
                                                @endif
                                                >Rejected</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Commission Claimed</label>
                                            <select class="form-control select2" name="commission_claimd[]" multiple="">
                                                <option value="Claimed"
                                                @if (request()->commission_claimd)
                                                    @if (in_array("Claimed", request()->commission_claimd))
                                                        selected 
                                                    @endif
                                                @endif
                                                >Claimed</option>
                                                <option value="UnClaimed"
                                                @if (request()->commission_claimd)
                                                    @if (in_array("UnClaimed", request()->commission_claimd))
                                                        selected 
                                                    @endif
                                                @endif
                                                >UnClaimed</option>
                                                <option value="Adjusted"
                                                @if (request()->commission_claimd)
                                                    @if (in_array("Adjusted", request()->commission_claimd))
                                                        selected 
                                                    @endif
                                                @endif
                                                >Adjusted</option>
                                            </select>
                                        </div>
                                    </div>

                                     <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Validation</label>
                                            <div class="input-group">
                                                <select class="form-control w-75" name="validation">
                                                    <option selected="" disabled="" value="">Choose...</option>
                                                    <option value="invalid_passport"
                                                        @if (request()->validation == "invalid_passport")
                                                            selected 
                                                        @endif
                                                    >Is Valid passport</option>
                                                    <option value="invalid_address_proof"
                                                        @if (request()->validation == "invalid_address_proof")
                                                            selected 
                                                        @endif
                                                    >Is Valid address_proof</option>
                                                    <option value="invalid_qualifications"
                                                        @if (request()->validation == "invalid_qualifications")
                                                            selected 
                                                        @endif
                                                    >Is Valid qualifications</option>
                                                    <option value="invalid_work_experience"
                                                        @if (request()->validation == "invalid_work_experience")
                                                            selected 
                                                        @endif
                                                    >Is Valid work_experience</option>
                                                    <option value="invalid_cv"
                                                        @if (request()->validation == "invalid_cv")
                                                            selected 
                                                        @endif
                                                    >Is Valid cv</option>
                                                    <option value="invalid_email"
                                                        @if (request()->validation == "invalid_email")
                                                            selected 
                                                        @endif
                                                    >Is Valid email</option>
                                                    <option value="invalid_mobile"
                                                        @if (request()->validation == "invalid_mobile")
                                                            selected 
                                                        @endif
                                                    >Is Valid mobile</option>
                                                    <option value="invalid_personal_statement"
                                                        @if (request()->validation == "invalid_personal_statement")
                                                            selected 
                                                        @endif
                                                    >Is Valid personal_statement</option>
                                                    <option value="invalid_any_other_supporting_documents"
                                                        @if (request()->validation == "invalid_any_other_supporting_documents")
                                                            selected 
                                                        @endif
                                                    >Is Valid any other supporting documents</option>
                                                </select>
                                                <select class="form-control w-25" name="validation_value">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label " style="color: transparent !important;">s</label>
                                            @if (request()->is('student/report/search'))
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input type="submit" value="Search" class="btn btn-primary w-75">
                                                    <a href="{{ url('/report') }}" class="btn btn-dark w-25">Clear</a>
                                                </div>
                                            @else
                                                <input type="submit" value="Search" class="btn btn-primary w-100">
                                            @endif
                                        </div>
                                    </div>


                                    
                                </div>
                                
                            </form>


                            <div class="table-responsive">
                                <table  id="myExample0" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>Agent</strong></th>
                                            <th><strong>Student Type</strong></th>
                                            <th><strong>Student ID</strong></th>
                                            <th><strong>Student Ref No</strong></th>
                                            <th><strong>Student Name</strong></th>
                                            <th><strong>Date of Birth</strong></th>
                                            <th><strong>Nationality</strong></th>
                                            <th><strong>Email Address</strong></th>
                                            <th><strong>Phone</strong></th>
                                            <th><strong>Application Status</strong></th>
                                            <th><strong>Enrolment Status</strong></th>
                                            
                                            @if (request()->commission_claimd)
                                                <th><strong>Commission Amount</strong></th>
                                                <th><strong>Commission Claimed</strong></th>
                                            @endif
                                            @if (request()->validation)
                                                @if (request()->validation == "invalid_passport")
                                                    <th><strong>Passport Number</strong></th>
                                                    <th><strong>Passport Expiry Date</strong></th>
                                                    <th><strong>Passport Is Valid</strong></th>

                                                @elseif(request()->validation == "invalid_address_proof")
                                                    <th><strong>Proof of Address Type</strong></th>
                                                    <th><strong>Proof of Address Expiry Date</strong></th>
                                                    <th><strong>Proof of Address Is Valid</strong></th>

                                                @elseif(request()->validation == "invalid_qualifications")        
                                                    <th><strong>Qualifications Is Valid</strong></th>
                                                
                                                @elseif(request()->validation == "invalid_work_experience")        
                                                    <th><strong>Work Experience Is Valid</strong></th>
                                                
                                                @elseif(request()->validation == "invalid_cv")        
                                                    <th><strong>CV Is Valid</strong></th>

                                                @elseif(request()->validation == "invalid_email")        
                                                    <th><strong>Email Is Valid</strong></th>


                                                @elseif(request()->validation == "invalid_mobile")        
                                                    <th><strong>Mobile Is Valid</strong></th>
                                            
                                                @elseif(request()->validation == "invalid_personal_statement")        
                                                    <th><strong>Personal Statement Is Valid</strong></th>
                                                @else
                                                    <th><strong>Any other supporting documents Is Valid</strong></th>
                                                @endif
                                            
                                            

                                            @endif
                                            <th><strong>Created Date</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($students as $student)
                                            @php
                                                error_reporting(0);
                                                $agent = DB::table('users')->where('id', $student->agent_id)->first();
                                                $nationality = DB::table('countries')->where('id', $student->nationality)->first();
                                            @endphp
                                            <tr>
                                                <td>{{ $agent->name }}</td>
                                                <td>{{ $student->type }}</td>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->registration_number }}</td>
                                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                                <td>{{ date('d M Y', strtotime($student->date_of_birth)) }} </td>
                                                <td>{{ $nationality->name }}</td>
                                                <td>{{ $student->email_address }} </td>
                                                <td>{{ $student->contact_number }} </td>
                                                <td>{{ $student->application_status === null ? "Pending" : $student->application_status }} </td>
                                                <td>{{ $student->enrolment_status === null ? "Pending" : $student->enrolment_status }} </td>
                                                @if (request()->commission_claimd)
                                                    <td>{{ $student->commission_amount === null ? 0 : $student->commission_amount }} </td>
                                                    <td>{{ $student->commission_claimd === null ? "UnClaimed" : $student->commission_claimd }} </td>
                                                @endif



                                                @if (request()->validation)
                                                    @if (request()->validation == "invalid_passport")
                                                        <td>{{ $student->passport_number }} </td>
                                                        <td>{{ date('d M Y', strtotime($student->passport_expiry_date)) }} </td>
                                                        <td>{{ $student->invalid_passport }} </td>

                                                    @elseif(request()->validation == "invalid_address_proof")
                                                        <td>{{ $student->proof_of_address_type  === null ? 'Null' : $student->proof_of_address_type }} </td>
                                                        <td>{{ date('d M Y', strtotime($student->proof_of_address_expiry_date)) }} </td>
                                                        <td>{{ $student->invalid_address_proof === null ? 'Yes' : $student->invalid_address_proof }} </td>

                                                    @elseif(request()->validation == "invalid_qualifications")        
                                                        <td>{{ $student->invalid_qualifications}} </td>
                                                    
                                                    @elseif(request()->validation == "invalid_work_experience")        
                                                        <td>{{ $student->invalid_work_experience }} </td>
                                                    
                                                    @elseif(request()->validation == "invalid_cv")        
                                                        <td>{{ $student->invalid_cv }} </td>

                                                    @elseif(request()->validation == "invalid_email")        
                                                        <td>{{ $student->invalid_email }} </td>


                                                    @elseif(request()->validation == "invalid_mobile")        
                                                        <td>{{ $student->invalid_mobile }} </td>
                                                
                                                    @elseif(request()->validation == "invalid_personal_statement")        
                                                        <td>{{ $student->invalid_personal_statement }} </td>

                                                    @else
                                                        <td>{{ $student->invalid_any_other_supporting_documents }} </td>
                                                
                                                    @endif

                                                @endif




                                                
                                               

                                                
                                                

                                                <td>{{ date('d M Y', strtotime($student->created_at)) }} </td>
                                                
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                      </div>
                     

                      <div class="tab-pane @if (request()->is('application/report/search')) active @endif" id="applications">
                        <div class="p-2">
                            {{-- @include('common.report.search') --}}


                            <form method="get" action="{{ url('/application/report/search') }}">
                                <div class="row">
                                    
                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">By Date Range </label>
                                            {{-- <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="{{ date('d M Y') }} - 01/31/2015"> --}}

                                            <div class="input-group">
                                                <input type="date" name="app_start_date" class="form-control" @if (request()->app_start_date) value="{{ request()->app_start_date }}" @endif>
                                                <input type="date" name="app_end_date" class="form-control" @if (request()->app_end_date) value="{{ request()->app_end_date }}" @endif>
                                            </div>

                                        </div>
                                    </div>

                                  



                                    <div class="col-lg-6 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Campus/University </label>
                                            <select class="form-control select2" name="app_campus">
                                                <option value="">Choose...</option>
                                                @foreach ($campuses as $campus)
                                                <option value="{{ $campus->id }}"
                                                    @if (request()->app_campus)
                                                        @if (request()->app_campus == $campus->id)
                                                            selected 
                                                        @endif
                                                    @endif
                                                >{{ $campus->name }} | {{ $campus->university_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Intake </label>
                                            <select name="app_intakes[]"  id="intake" class="form-control select2" multiple>
                                                @foreach($intakes as $intake)
                                                    <option value="{{ $intake->id }}"
                                                        @if (request()->app_intakes)
                                                            @if (in_array($intake->id, request()->app_intakes))
                                                                selected 
                                                            @endif
                                                        @endif
                                                    >{{ $intake->month }} {{ $intake->year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label">Status </label>
                                            <select class="form-control select2" name="app_application_status[]" multiple>
                                                <option value="Pending"
                                                    @if (request()->app_application_status)
                                                        @if (in_array("Pending", request()->app_application_status))
                                                            selected 
                                                        @endif
                                                    @endif
                                                >Pending</option>
                                                <option value="Accepted"
                                                    @if (request()->app_application_status)
                                                        @if (in_array("Accepted", request()->app_application_status))
                                                            selected 
                                                        @endif
                                                    @endif
                                                >Accepted</option>
                                                <option value="Rejected"
                                                    @if (request()->app_application_status)
                                                        @if (in_array("Rejected", request()->app_application_status))
                                                            selected 
                                                        @endif
                                                    @endif
                                                >Rejected</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-lg-4 mb-2">
                                        <div class="mb-3">
                                            <label class="text-label form-label " style="color: transparent !important;">s</label>
                                            @if (request()->is('application/report/search'))
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <input type="submit" value="Search" class="btn btn-primary w-75">
                                                    <a href="{{ url('/report') }}" class="btn btn-dark w-25">Clear</a>
                                                </div>
                                            @else
                                                <input type="submit" value="Search" class="btn btn-primary w-100">
                                            @endif
                                        </div>
                                    </div>


                                    
                                </div>
                                
                            </form>


                            <div class="table-responsive">
                                <table  id="myExample4" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>Applicaiton ID</strong></th>
                                            
                                            <th><strong>Agent<span style="color: transparent !important;">campus</span></strong></th>
                                            <th><strong>Student Type</strong></th>
                                            <th><strong>Student ID</strong></th>
                                            <th><strong>Student Ref No</strong></th>
                                            <th><strong>Student Name</strong></th>
                                            <th><strong>Date of Birth</strong></th>
                                            <th><strong>Nationality</strong></th>
                                            <th><strong>Email Address</strong></th>
                                            <th><strong>Phone</strong></th>
                                            <th><strong>Enrolment Status</strong></th>


                                            <th><strong>Course<span style="color: transparent !important;">campus</span></strong></th>
                                            <th><strong>University Name <span style="color: transparent !important;">campus</span></strong></th>
                                            <th><strong>Intake<span style="color: transparent !important;">campus</span></strong></th>
                                            <th><strong>Status</strong></th>
                                            <th><strong>Created Date</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($applications as $application)
                                            @php
                                                error_reporting(0);
                                                $student = DB::table('students')->where('id', $application->student_id)->first();
                                                $course = DB::table('courses')->where('id', $application->course_id)->first();
                                                $intake = DB::table('intakes')->where('id', $application->intake_id)->first();

                                                $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                                $university = DB::table('universities')->where('id', $campus->university_id)->first();

                                                $agent = DB::table('users')->where('id', $student->agent_id)->first();
                                                $nationality = DB::table('countries')->where('id', $student->nationality)->first();
                                            @endphp
                                            <tr>
                                                
                                                <td>{{ $application->id }} </td>

                                                <td>{{ $agent->name }}</td>
                                                <td>{{ $student->type }}</td>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->registration_number }}</td>
                                                <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                                <td>{{ date('d M Y', strtotime($student->date_of_birth)) }} </td>
                                                <td>{{ $nationality->name }}</td>
                                                <td>{{ $student->email_address }} </td>
                                                <td>{{ $student->contact_number }} </td>
                                                <td>{{ $student->enrolment_status === null ? "Pending" : $student->enrolment_status }} </td>

                                                <td>{{ $course->course_name }} </td>
                                                <td>{{ mb_strimwidth($university->name, 0, 25,"...") }} </td>
                                                <td>{{ $intake->month }} {{ $intake->year }} </td>
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
                                                <td>{{ date('d M Y', strtotime($application->created_at)) }} </td>
                                                
                                            </tr>

                                          
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>    
                      </div>

                      <div class="tab-pane fade" id="Commissions">
                        <div class="p-2">
                            @include('common.report.commission-search')
                            <div class="table-responsive">
                                <table  id="myExample3" class="table table-striped table-responsive-md">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th><strong>Agent</strong></th>
                                            <th><strong>Course</strong></th>
                                            <th><strong>Tution Fee</strong></th>
                                            <th><strong>Commision</strong></th>
                                            <th><strong>Status</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($commissions as $commission)
                                            @php
                                                error_reporting(0);
                                                $agent = DB::table('users')->where('id', $commission->agent_id)->first();
                                                $course = DB::table('courses')->where('id', $commission->course_id)->first();
                                                $intake = DB::table('intakes')->where('id', $application->intake_id)->first();
                                            @endphp
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
                                                <td><a target="_blank" href="{{ url('/admin/course/view/'.$course->id) }}">{{ $course->course_name }}</a> </td>
                                                <td>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</td>
                                                <td>{{ $course->fee_and_commission_currency }} {{ $commission->commission_amount }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            @if ($commission->status == "Accepted")
                                                                <i class="fa fa-circle text-success me-1"></i> {{ $commission->status }}
                                                            @elseif ($commission->status == "Rejected")
                                                                <i class="fa fa-circle text-danger me-1"></i> {{ $commission->status }}
                                                            @else
                                                                <i class="fa fa-circle text-primary me-1"></i> {{ $commission->status }}
                                                            @endif
                                                        </div>
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



