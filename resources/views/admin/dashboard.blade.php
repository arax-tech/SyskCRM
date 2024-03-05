@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h2>Welcome to EduSYSK</h2>
                                            <span>Student Management System by SYSK Solutions...</span>
                                            
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

                                                </div> --}}

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
                   {{--  <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Donught Chart</h4>
                            </div>
                            <div class="card-body">
                                <div id="morris_donught" class="morris_chart_height"></div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">


                                    @if (in_array("StaffView", $permission))
                                        <div class="col-xl-3 col-sm-3">
                                            <a href="{{ url('/admin/staff') }}">
                                                <div class="card">
                                                    <div class="card-body px-4 pb-0">
                                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">
                                                            Staff
                                                            <i class="fas fa-users d-icon"></i>
                                                        </h4>

                                                        <div class="progress default-progress">
                                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: 100%; height:10px;" role="progressbar">
                                                                <span class="sr-only">65% Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                            <span>{{ DB::table('users')->where('role', 'Admin')->count() }} Total Staff </span>
                                                            <h4 class="mb-0">{{ DB::table('users')->where('role', 'Admin')->count() }}</h4>
                                                        </div>
                                                    
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif



                                    @if (in_array("AgentView", $permission))
                                        <div class="col-xl-3 col-sm-3">
                                            <a href="{{ url('/admin/agents?type=agents') }}">
                                                <div class="card">
                                                    <div class="card-body px-4 pb-0">
                                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Agents
                                                            <i class="fas fa-users d-icon"></i>
                                                        </h4>
                                                        <div class="progress default-progress">
                                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: 100%; height:10px;" role="progressbar">
                                                                <span class="sr-only">45% Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                            @if ((auth::user()->designation == "RM"))
                                                                <span>{{ DB::table('users')->where('rm_id', auth::user()->id)->count() }} Total Agents</span>
                                                                <h4 class="mb-0">{{ DB::table('users')->where('rm_id', auth::user()->id)->count() }}</h4>
                                                            @else
                                                                <span>{{ DB::table('users')->where('role', 'Agent')->count() }} Total Agents</span>
                                                                <h4 class="mb-0">{{ DB::table('users')->where('role', 'Agent')->count() }}</h4>
                                                            @endif
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif


                                    @if (in_array("StudentView", $permission))
                                        <div class="col-xl-3 col-sm-3">
                                            <a href="{{ url('/admin/student') }}">
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
                                                            <span>{{ DB::table('students')->count() }} Total Students</span>
                                                            <h4 class="mb-0">{{ DB::table('students')->count() }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif

                                    @if (in_array("ApplicationView", $permission))
                                        <div class="col-xl-3 col-sm-3">
                                            <a href="{{ url('/admin/application') }}">
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
                                                            <span>{{ DB::table('applications')->count() }} Total Applications</span>
                                                            <h4 class="mb-0">{{ DB::table('applications')->count() }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif



                                    
                                    
                                </div>
                                
                                
                            </div>
                       

                            
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    
                                    @if (in_array("IntakeView", $permission))
                                        <div class="col-xl-3 col-sm-6">
                                            <a href="{{ url('/admin/intake') }}">
                                                <div class="card">
                                                    <div class="card-body px-4 pb-0">
                                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Intakes
                                                            <i class="fas fa-table d-icon"></i>
                                                        </h4>
                                                        <div class="progress default-progress">
                                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: 100%; height:10px;" role="progressbar">
                                                                <span class="sr-only">65% Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                            <span>{{ DB::table('intakes')->count() }} Total Intakes </span>
                                                            <h4 class="mb-0">{{ DB::table('intakes')->count() }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif


                                    
                                    @if (in_array("CourseView", $permission))
                                        <div class="col-xl-3 col-sm-6">
                                            <a href="{{ url('/admin/course') }}">
                                                <div class="card">
                                                    <div class="card-body px-4 pb-0">
                                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Courses
                                                            <i class="fas fa-file-alt d-icon"></i>
                                                        </h4>
                                                        <div class="progress default-progress">
                                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: 100%; height:10px;" role="progressbar">
                                                                <span class="sr-only">45% Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                            <span>{{ DB::table('courses')->count() }} Total Courses</span>
                                                            <h4 class="mb-0">{{ DB::table('courses')->count() }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif


                                    
                                    @if (in_array("UniversityView", $permission))
                                        <div class="col-xl-3 col-sm-6">
                                            <a href="{{ url('/admin/university') }}">
                                                <div class="card">
                                                    <div class="card-body px-4 pb-0">
                                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Universities
                                                            <i class="fas fa-school d-icon"></i>
                                                        </h4>
                                                        <div class="progress default-progress">
                                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: 75%; height:10px;" role="progressbar">
                                                                <span class="sr-only">75% Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                            <span>{{ DB::table('universities')->count() }} Total Universities</span>
                                                            <h4 class="mb-0">{{ DB::table('universities')->count() }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif

                                    
                                    @if (in_array("CampusView", $permission))
                                        <div class="col-xl-3 col-sm-6">
                                            <a href="{{ url('/admin/campus') }}">
                                                <div class="card">
                                                    <div class="card-body px-4 pb-0">
                                                        <h4 class="fs-18 font-w600 mb-5 text-nowrap">Campuses
                                                            <i class="fas fa-home d-icon"></i>
                                                        </h4>
                                                        <div class="progress default-progress">
                                                            <div class="progress-bar bg-gradient1 progress-animated" style="width: 95%; height:10px;" role="progressbar">
                                                                <span class="sr-only">95% Complete</span>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                                            <span>{{ DB::table('campuses')->count() }} Total Campuses</span>
                                                            <h4 class="mb-0">{{ DB::table('campuses')->count() }}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif



                                    
                                    
                                </div>
                                
                            </div>
                       

                            
                        </div>
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
                                            <div id="emailchart"> </div>
                                            <div class="mb-3 mt-4">
                                                <h4 class="fs-18 font-w600">Status</h4>
                                            </div>
                                            <div>
                                                <a href="{{ url('/admin/application?status=Pending') }}"> 
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
                                                <a href="{{ url('/admin/application?status=Accepted') }}">
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
                                                <a href="{{ url('/admin/application?payment_status=Paid') }}">
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

                                                <a href="{{ url('/admin/application?payment_status=UnPaid') }}">
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
                                                
                                                <a href="{{ url('/admin/application?status=Rejected') }}">
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
    $students0 = DB::table('students')->count();
    $agents0 = DB::table('agents')->count();
    $universities0 = DB::table('universities')->count();
    $campuses0 = DB::table('campuses')->count();
    $applications0 = DB::table('applications')->count();
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
                        label: "\xa0 \xa0 Agents \xa0 \xa0",
                        value: {{ $agents0 }}
                    },{
                        label: "\xa0 \xa0 Applications \xa0 \xa0",
                        value: {{ $applications0 }}
                    }, {
                        label: "\xa0 \xa0 Universities \xa0 \xa0",
                        value: {{ $universities0 }}
                    }, {
                        label: "\xa0 \xa0 Campuses \xa0 \xa0",
                        value: {{ $campuses0 }}
                    }],
                    resize: true,
                    redraw: true,
                    colors: ['#FFA7D7', 'rgb(255, 92, 0)', '#ffaa2b', '#31353d', '#49b0ff'],
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
                            colors: '#000000',

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

            var emailchart = function() {
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

                var chart = new ApexCharts(document.querySelector("#emailchart"), options);
                chart.render();

            }




            /* Function ============ */
            return {
                init: function() {},


                load: function() {
                    chartBar();
                    emailchart();

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
