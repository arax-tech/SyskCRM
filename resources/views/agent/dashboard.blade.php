@php
    error_reporting(0);
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('agent.layouts.app')
@section('title', 'Dashboard')
@section('css')
<style type="text/css">
    .MultiCarousel { float: left; overflow: hidden; padding: 10px; width: 100%; position:relative; }
        .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
            .MultiCarousel .MultiCarousel-inner .item { float: left; height: 215px !important}
            .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; margin:5px; background:#f1f1f1; color:#666;}
        .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px); }
        .MultiCarousel .leftLst { left:0; }
        .MultiCarousel .rightLst { right:0; }
        
            .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
            .list-group-item{
                font-size: 15px;
            }
            .list-group-item strong{
                color:#1e3761;
            }
</style>
@endsection
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-12 mb-3">
                        <a class="btn btn-primary" href="{{ url('/agent/student/type') }}">Create Student</a>
                        <a class="btn btn-primary" href="{{ url('/agent/application/create') }}">Apply Now</a>
                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h2>Welcome to SYSK CRM</h2>
                                            <span>SYSK Customer relationship management system...</span>
                                            <a href="javascript:void(0);" class="btn btn-rounded  fs-18 font-w500 mb-3">Start Advencher</a>
                                        </div>
                                        <div class="col-xl-5 col-sm-6">
                                            <img src="{{ asset('backend/images/chart.png') }}" alt="" class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                       

                        </div>
                        
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="card-intro-title mb-4">Universities Notices</h4>
                                <div class="bootstrap-carousel">
                                    <div data-bs-ride="carousel" class="carousel slide" id="carouselExampleCaptions">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                                        </div>
                                        <div class="carousel-inner">

                                            @php
                                                error_reporting(0);
                                                $notices = DB::table('notices')->get();
                                            @endphp
                                            @foreach ($notices as $key => $notice )

                                            @php
                                                
                                                $university = DB::table('universities')->where('id', $notice->university_id)->first();
                                            @endphp

                                                {{-- <div class="item p-0 m-0">
                                                    <div class="card overflow-hidden">
                                                        <div class="text-center" style="height: 150px !important; background-image: url({{ asset('backend/university/logo/'.$university->logo) }});  background-position: center; background-repeat: no-repeat; background-size: cover;">
                                                        </div>
                                                        <div class="card-body p-3 align-content-center justify-content-center">
                                                            <h5 style="font-size: 16px">{{ $notice->title }}</h5>
                                                            <p>{{ date('d M Y', strtotime($notice->date)) }}</p>
                                                            <p>in <b>{{ $university->name }}</b></p>
                                                        </div>
                                                    </div>

                                                </div>
 --}}

                                                <div class="carousel-item @if ($key == 0 ) active @endif">
                                                    <img class="d-block w-100" style="height: 230px !important" src="{{ asset('backend/university/logo/'.$university->logo) }}" alt="">
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>{{ $notice->title }}</h5>
                                                        <p>{{ $university->name }}</p>
                                                        <p>{{ date('d M Y', strtotime($notice->date)) }}</p>
                                                    </div>
                                                </div>


                                            @endforeach

                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                          </button>
                                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                          </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <h4 class="card-intro-title mb-4">Universities Notices</h4>
                                <div class="container mt-0">
                                    <div class="row">
                                        <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                            <div class="MultiCarousel-inner">

                                                @php
                                                    error_reporting(0);
                                                    $notices = DB::table('notices')->get();
                                                @endphp
                                                @foreach ($notices as $key => $notice )

                                                @php
                                                    
                                                    $university = DB::table('universities')->where('id', $notice->university_id)->first();
                                                @endphp

                                                    <div class="item p-0 m-0">
                                                        <div class="card overflow-hidden">
                                                            <div class="text-center" style="height: 150px !important; background-image: url({{ asset('backend/university/logo/'.$university->logo) }});  background-position: center; background-repeat: no-repeat; background-size: cover;">
                                                            </div>
                                                            <div class="card-body p-3 align-content-center justify-content-center">
                                                                <h5 style="font-size: 16px">{{ $notice->title }}</h5>
                                                                <p>{{ date('d M Y', strtotime($notice->date)) }}</p>
                                                                <p>in <b>{{ $university->name }}</b></p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                @endforeach
                                               
                                            </div>
                                            <button class="btn btn-primary leftLst"><</button>
                                            <button class="btn btn-primary rightLst">></button>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>
                        </div>
                        
                    </div> --}}
                    




                    <div class="row">




                        @if (in_array("AgentView", $permission))
                            <div class="col-xl-3 col-sm-3">
                                <a href="{{ url('/agent/agent') }}">
                                    <div class="card">
                                        <div class="card-body px-4 pb-0">
                                            <h4 class="fs-18 font-w600 mb-5 text-nowrap">Sub Agents
                                                    <i class="fas fa-users d-icon"></i>
                                                </h4>
                                            <div class="progress default-progress">
                                                <div class="progress-bar bg-gradient1 progress-animated" style="width: 100%; height:10px;" role="progressbar">
                                                    <span class="sr-only">45% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                <span>{{ DB::table('users')->where(['role' => 'Agent', 'agent_id' => auth::user()->id])->count() }} Total Agents</span>
                                                <h4 class="mb-0">{{ DB::table('users')->where(['role' => 'Agent', 'agent_id' => auth::user()->id])->count() }} </h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif


                        @if (in_array("StudentView", $permission))
                            <div class="col-xl-3 col-sm-3">
                                <a href="{{ url('/agent/student') }}">
                                    <div class="card">
                                        <div class="card-body px-4 pb-0">
                                            <h4 class="fs-18 font-w600 mb-5 text-nowrap">Students
                                                    <i class="fas fa-users d-icon"></i>
                                                </h4>
                                            <div class="progress default-progress">
                                                <div class="progress-bar bg-gradient1 progress-animated" style="width: 100%; height:10px;" role="progressbar">
                                                    <span class="sr-only">75% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                <span>{{ DB::table('students')->where('agent_id', auth::user()->id)->count() }} Total Students</span>
                                                <h4 class="mb-0">{{ DB::table('students')->where('agent_id', auth::user()->id)->count() }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif

                        @if (in_array("ApplicationView", $permission))
                            <div class="col-xl-3 col-sm-3">
                                <a href="{{ url('/agent/application') }}">
                                    <div class="card">
                                        <div class="card-body px-4 pb-0">
                                            <h4 class="fs-18 font-w600 mb-5 text-nowrap">Applications
                                                    <i class="fas fa-clone d-icon"></i>
                                                </h4>
                                            <div class="progress default-progress">
                                                <div class="progress-bar bg-gradient1 progress-animated" style="width: 95%; height:10px;" role="progressbar">
                                                    <span class="sr-only">95% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                <span>{{ DB::table('applications')->where('agent_id', auth::user()->id)->count() }} Total Applications</span>
                                                <h4 class="mb-0">{{ DB::table('applications')->where('agent_id', auth::user()->id)->count() }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif


                        @if (in_array("CommissionView", $permission))
                            <div class="col-xl-3 col-sm-3">
                                <a href="{{ url('/agent/commission') }}">
                                    <div class="card">
                                        <div class="card-body px-4 pb-0">
                                            <h4 class="fs-18 font-w600 mb-5 text-nowrap">Commissions
                                                    <i class="fas fa-gift d-icon"></i>
                                                </h4>
                                            <div class="progress default-progress">
                                                <div class="progress-bar bg-gradient1 progress-animated" style="width: 95%; height:10px;" role="progressbar">
                                                    <span class="sr-only">95% Complete</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                <span>{{ DB::table('applications')->where('agent_id', auth::user()->id)->count() }} Total Commissions</span>
                                                <h4 class="mb-0">{{ DB::table('applications')->where('agent_id', auth::user()->id)->count() }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif



                        
                        
                    </div>


                    @if (in_array("ApplicationView", $permission))
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-header border-0 flex-wrap">
                                    <h4 class="fs-20 font-w700 mb-2">Applications Statistics</h4>
                                     
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="monthly">
                                            <div id="chartBar" class="chartBar"></div>
                                        </div>  
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="row">
                                <div class="col-xl-6 col-xxl-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-header border-0">
                                            <div>
                                                <h4 class="fs-20 font-w700">Applications  By Status</h4>
                                            </div>  
                                        </div>  
                                        <div class="card-body">
                                            <div id="ApplicationByStatus"> </div>
                                            <div class="mb-3 mt-4">
                                                <h4 class="fs-18 font-w600">Status</h4>
                                            </div>
                                            <div>
                                                <a href="{{ url('/agent/application?status=Pending') }}"> 
                                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                                        <span class="fs-18 font-w500">  
                                                            <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#886CC0"/>
                                                            </svg>
                                                            Pending
                                                        </span>
                                                        <span class="fs-18 font-w600">{{ $PendingApplication }}</span>
                                                    </div>
                                                </a>
                                                <a href="{{ url('/agent/application?status=Accepted') }}">
                                                    <div class="d-flex align-items-center justify-content-between  mb-4">
                                                        <span class="fs-18 font-w500">  
                                                            <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#26E023"/>
                                                            </svg>
                                                            Accepted
                                                        </span>
                                                        <span class="fs-18 font-w600">{{ $AcceptedApplication }}</span>
                                                    </div>
                                                </a>
                                                <a href="{{ url('/agent/application?payment_status=Paid') }}">
                                                    <div class="d-flex align-items-center justify-content-between  mb-4">
                                                        <span class="fs-18 font-w500">  
                                                            <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#FFDA7C"/>
                                                            </svg>
                                                            Paid
                                                        </span>
                                                        <span class="fs-18 font-w600">{{ $PaidApplication }}</span>
                                                    </div>
                                                </a>

                                                <a href="{{ url('/agent/application?payment_status=UnPaid') }}">
                                                    <div class="d-flex align-items-center justify-content-between  mb-4">
                                                        <span class="fs-18 font-w500">  
                                                            <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#61CFF1"/>
                                                            </svg>
                                                            UnPaid
                                                        </span>
                                                        <span class="fs-18 font-w600">{{ $UnPaidApplication }}</span>
                                                    </div>
                                                </a>
                                                
                                                <a href="{{ url('/agent/application?status=Rejected') }}">
                                                    <div class="d-flex align-items-center justify-content-between  mb-4">
                                                        <span class="fs-18 font-w500">  
                                                            <svg class="me-3" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect width="20" height="20" rx="6" fill="#FF86B1"/>
                                                            </svg>
                                                            Rejected
                                                        </span>
                                                        <span class="fs-18 font-w600">{{ $RejectedApplication }}<span>
                                                    </div>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>  
                                

                            </div>  
                        </div>
                    </div>
                    @endif



                </div>
            </div>


            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-4">
                        <h4 class="card-intro-title mb-4">Offers</h4>
                        <div class="container">
                            <div class="row">
                                <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                    <div class="MultiCarousel-inner">

                                        @php
                                            error_reporting(0);
                                            $offers = DB::table('offers')->get();
                                        @endphp
                                        @foreach ($offers as $key => $offer)

                                        @php
                                            $campus = DB::table('campuses')->where('id', $offer->campus_id)->first();
                                            $university = DB::table('universities')->where('id', $campus->university_id)->first();
                                        @endphp

                                            <div class="item p-0 m-0">
                                                <div class="card overflow-hidden">
                                                    <div class="text-center" style="height: 150px !important; background-image: url({{ asset('backend/offers/banner/'.$offer->banner) }});  background-position: center; background-repeat: no-repeat; background-size: cover;">
                                                    </div>
                                                    <div class="card-body p-3 align-content-center justify-content-center">
                                                        <h5 style="font-size: 16px">{{ $offer->offer }} {{ $offer->discount }}</h5>
                                                        <p>in <b>{{ $university->name }}</b> at <b>{{ $campus->name }}</b></p>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                       
                                    </div>
                                    <button class="btn btn-primary leftLst"><</button>
                                    <button class="btn btn-primary rightLst">></button>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                </div>
            </div>




            <!--<div class="col-xl-12">
                
            </div>-->

      
      

            


            <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                <div class="card">
                    @php
                        error_reporting(0);
                        $rm = DB::table('users')->where('id', auth::user()->rm_id)->first();

                    @endphp
                    <div class="card-body text-center ai-icon  text-primary">
                        @if (!empty($rm->image))
                            <img class="rounded-circle" width="80" src="{{ asset('backend/profile/'.$rm->image) }}" />
                        @else
                            <img class="rounded-circle" width="80" src="{{ asset('backend/placeholder.jpg') }}" />
                        @endif
                        <h4 class="my-2">Relationship Manager</h4>

                    </div>
                    <div class="card-footer p-0 m-0">
                        <div class="">
                            <ul class="list-group list-group-flush">
                                
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Name </span>
                                    <strong> {{ $rm->name }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Email </span>
                                    <strong> {{ $rm->email }}</strong>
                                </li>
                                <li class="list-group-item d-flex justify-content-between">
                                    <span class="mb-0">Contact Number </span>
                                    <strong> {{ $rm->phone }}</strong>
                                </li>
                                
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                <div class="card">
                    <div class="card-body text-center ai-icon  text-primary">
                        <svg id="rocket-icon" class="my-2" viewBox="0 0 24 24" width="80" height="80" stroke="currentColor" stroke-width="1" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        <h4 class="my-2">Commission Balance</h4>

                    </div>
                    @php
                        error_reporting(0);
                        $pendingCommission = DB::table('commissions')->where(['agent_id' => auth::user()->id, 'status' => 'Pending'])->get();

                    @endphp
                    <div class="card-footer p-0 m-0">
                        <div class="">
                            <ul class="list-group list-group-flush">
                                @php
                                    $total_pending_commision = 0;
                                @endphp
                                @foreach ($pendingCommission as $commission)
                                    @php
                                        $course0 = DB::table('courses')->where('id', $commission->course_id)->first();
                                        $total_pending_commision = $total_pending_commision + ($course0->commission_fee);
                                    @endphp
                                @endforeach

                                <a href="{{ url('/agent/commission?status=Pending') }}">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Peding Commission</span><strong>{{ $total_pending_commision }}</strong></li>
                                </a>


                                
                            </ul>
                        </div>

                        <div class="">
                            <ul class="list-group list-group-flush">
                                @php
                                    error_reporting(0);
                                    $acceptedCommission = DB::table('commissions')->where(['agent_id' => auth::user()->id, 'status' => 'Accepted'])->get();


                                    $total_accepted_commision = 0;
                                @endphp
                                @foreach ($acceptedCommission as $commission)
                                    @php
                                        $course0 = DB::table('courses')->where('id', $commission->course_id)->first();
                                        $total_accepted_commision = $total_accepted_commision + ($course0->commission_fee);
                                    @endphp
                                @endforeach

                                <a href="{{ url('/agent/commission?status=Accepted') }}">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Earned Commission </span><strong>{{ $total_accepted_commision }}</strong></li>
                                </a>

                                
                            </ul>
                        </div>

                        <div class="">
                            <ul class="list-group list-group-flush">
                                @php
                                    error_reporting(0);
                                    $rejectedCommission = DB::table('commissions')->where(['agent_id' => auth::user()->id, 'status' => 'Rejected'])->get();


                                    $total_rejected_commision = 0;
                                @endphp
                                @foreach ($rejectedCommission as $commission)
                                    @php
                                        $course0 = DB::table('courses')->where('id', $commission->course_id)->first();
                                        $total_rejected_commision = $total_rejected_commision + ($course0->commission_fee);
                                    @endphp
                                @endforeach

                                <a href="{{ url('/agent/commission?status=Rejected') }}">
                                    <li class="list-group-item d-flex justify-content-between"><span class="mb-0">Rejected Commission </span><strong>{{ $total_rejected_commision }}</strong></li>
                                </a>

                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


           
        </div>
    </div>
</div>
@endsection
@section('js')

<!-- Chart Morris plugin files -->
<script src="{{ asset('backend/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/vendor/morris/morris.min.js') }}"></script>

@php
    error_reporting(0);
    $students0 = DB::table('students')->where('agent_id', auth::user()->id)->count();
    $agents0 = DB::table('users')->where(['role' => 'Agent', 'agent_id' => auth::user()->id])->count();
    $universities0 = DB::table('universities')->whereIn('id', explode(",", auth::user()->universities))->count();
    $campuses0 = DB::table('campuses')->count();
    $applications0 = DB::table('applications')->where('agent_id', auth::user()->id)->count();
@endphp
<script type="text/javascript">
    (function($) {
        "use strict"

        var dlabMorris = function(){
            
          
            
            var donutChart = function(){
                Morris.Donut({
                    element: 'morris_donught',
                    data: [{
                        label: "\xa0 \xa0 Students \xa0 \xa0",
                        value: {{ $students0 }},

                    }, {
                        label: "\xa0 \xa0 Sub Agents \xa0 \xa0",
                        value: {{ $agents0 }}
                    },{
                        label: "\xa0 \xa0 Applications \xa0 \xa0",
                        value: {{ $applications0 }}
                    }, {
                        label: "\xa0 \xa0 Universities \xa0 \xa0",
                        value: {{ $universities0 }}
                    }],
                    resize: true,
                    redraw: true,
                    colors: ['#FFA7D7', 'rgb(255, 92, 0)', '#ffaa2b', '#31353d'],
                    //responsive:true,
                    
                });
            }
        
            
            
            /* Function ============ */
            return {
                init:function(){
                    donutChart();
                },
                
                
                resize:function(){
                    screenWidth = $(window).width();
                    donutChart();
                }
            }
            
        }();

        jQuery(document).ready(function(){
            dlabMorris.init();
            //dlabMorris.resize();
        
        });
            
        jQuery(window).on('load',function(){
            //dlabMorris.init();
        });
            
        jQuery( window ).resize(function() {
            //dlabMorris.resize();
            //dlabMorris.init();
        });
       
    })(jQuery);
</script>




<script type="text/javascript">

    $(document).ready(function () {
        var itemsMainDiv = ('.MultiCarousel');
        var itemsDiv = ('.MultiCarousel-inner');
        var itemWidth = "";

        $('.leftLst, .rightLst').click(function () {
            var condition = $(this).hasClass("leftLst");
            if (condition)
                click(0, this);
            else
                click(1, this)
        });

        ResCarouselSize();




        $(window).resize(function () {
            ResCarouselSize();
        });

        //this function define the size of the items
        function ResCarouselSize() {
            var incno = 0;
            var dataItems = ("data-items");
            var itemClass = ('.item');
            var id = 0;
            var btnParentSb = '';
            var itemsSplit = '';
            var sampwidth = $(itemsMainDiv).width();
            var bodyWidth = $('body').width();
            $(itemsDiv).each(function () {
                id = id + 1;
                var itemNumbers = $(this).find(itemClass).length;
                btnParentSb = $(this).parent().attr(dataItems);
                itemsSplit = btnParentSb.split(',');
                $(this).parent().attr("id", "MultiCarousel" + id);


                if (bodyWidth >= 1200) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 992) {
                    incno = itemsSplit[2];
                    itemWidth = sampwidth / incno;
                }
                else if (bodyWidth >= 768) {
                    incno = itemsSplit[1];
                    itemWidth = sampwidth / incno;
                }
                else {
                    incno = itemsSplit[0];
                    itemWidth = sampwidth / incno;
                }
                $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
                $(this).find(itemClass).each(function () {
                    $(this).outerWidth(itemWidth);
                });

                $(".leftLst").addClass("over");
                $(".rightLst").removeClass("over");

            });
        }


        //this function used to move the items
        function ResCarousel(e, el, s) {
            var leftBtn = ('.leftLst');
            var rightBtn = ('.rightLst');
            var translateXval = '';
            var divStyle = $(el + ' ' + itemsDiv).css('transform');
            var values = divStyle.match(/-?[\d\.]+/g);
            var xds = Math.abs(values[4]);
            if (e == 0) {
                translateXval = parseInt(xds) - parseInt(itemWidth * s);
                $(el + ' ' + rightBtn).removeClass("over");

                if (translateXval <= itemWidth / 2) {
                    translateXval = 0;
                    $(el + ' ' + leftBtn).addClass("over");
                }
            }
            else if (e == 1) {
                var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
                translateXval = parseInt(xds) + parseInt(itemWidth * s);
                $(el + ' ' + leftBtn).removeClass("over");

                if (translateXval >= itemsCondition - itemWidth / 2) {
                    translateXval = itemsCondition;
                    $(el + ' ' + rightBtn).addClass("over");
                }
            }
            $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
        }

        //It is used to get some elements from btn
        function click(ell, ee) {
            var Parent = "#" + $(ee).parent().attr("id");
            var slide = $(Parent).attr("data-slide");
            ResCarousel(ell, Parent, slide);
        }

    });


    (function($) {
        /* "use strict" */

        var dlabChartlist = function() {


            var chartBar = function() {

                var options = {
                    series: [{
                            name: '',
                            data: [
                                {{ $PendingApplication }}, {{ $AcceptedApplication }}, {{ $RejectedApplication }}, {{ $PaidApplication }}, {{ $UnPaidApplication }}],
                            //radius: 12,   
                        }

                    ],
                    chart: {
                        type: 'bar',
                        height: 400,

                        toolbar: {
                            show: false,
                        },

                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '57%',
                            endingShape: "rounded",
                            borderRadius: 12,
                        },

                    },
                    states: {
                        hover: {
                            filter: 'none',
                        }
                    },
                    colors: ['#49b0ff', '#FF5ED2'],
                    dataLabels: {
                        enabled: false,
                    },
                    markers: {
                        shape: "circle",
                    },


                    legend: {
                        show: false,
                        fontSize: '12px',
                        labels: {
                            colors: '#000',

                        },
                        markers: {
                            width: 18,
                            height: 18,
                            strokeWidth: 10,
                            strokeColor: '#fff',
                            fillColors: undefined,
                            radius: 12,
                        }
                    },
                    stroke: {
                        show: true,
                        width: 4,
                        curve: 'smooth',
                        lineCap: 'round',
                        colors: ['transparent']
                    },
                    grid: {
                        borderColor: '#eee',
                    },
                    xaxis: {
                        position: 'bottom',
                        categories: ['Pending', 'Accepted', 'Rejected', 'Paid', 'UnPaid'],
                        labels: {
                            style: {
                                colors: '#787878',
                                fontSize: '13px',
                                fontFamily: 'poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                        crosshairs: {
                            show: false,
                        }
                    },
                    yaxis: {
                        labels: {
                            offsetX: -16,
                            style: {
                                colors: '#787878',
                                fontSize: '13px',
                                fontFamily: 'poppins',
                                fontWeight: 100,
                                cssClass: 'apexcharts-xaxis-label',
                            },
                        },
                    },
                    fill: {
                        type: 'gradient',
                        gradient: {
                            shade: 'white',
                            type: "vertical",
                            shadeIntensity: 0.2,
                            gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                            inverseColors: true,
                            opacityFrom: 1,
                            opacityTo: 1,
                            stops: [0, 50, 50],
                            colorStops: []
                        }
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val + " Applications"
                            }
                        }
                    },
                };

                var chartBar1 = new ApexCharts(document.querySelector("#chartBar"), options);
                chartBar1.render();
            }

            var ApplicationByStatus = function() {
                var options = {
                    series: [{{ $PendingApplication }}, {{ $AcceptedApplication }}, {{ $PaidApplication }}, {{ $UnPaidApplication }}, {{ $RejectedApplication }}],
                    chart: {
                        type: 'donut',
                        height: 300,
                        label: 'Status'
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        width: 0,
                    },
                    colors: ['#886cc0', '#26e023', '#ffda7c', '#61cff1', '#ff86b1'],
                    legend: {
                        position: 'bottom',
                        show: false
                    },
                    responsive: [{
                            breakpoint: 1800,
                            options: {
                                chart: {
                                    height: 200
                                },
                            }
                        },
                        {
                            breakpoint: 1800,
                            options: {
                                chart: {
                                    height: 200
                                },
                            }
                        }
                    ]
                };

                var chart = new ApexCharts(document.querySelector("#ApplicationByStatus"), options);
                chart.render();

            }




            /* Function ============ */
            return {
                init: function() {},


                load: function() {
                    chartBar();
                    ApplicationByStatus();

                },

                resize: function() {}
            }

        }();



        jQuery(window).on('load', function() {
            setTimeout(function() {
                dlabChartlist.load();
            }, 1000);

        });



    })(jQuery);
</script>


@endsection
