@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp


<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">



            <li>
                <a href="{{ url(strtolower(auth::user()->role.'/dashboard')) }}" class="{{ (strpos(url()->full() , '/dashboard')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            @if (in_array("StaffView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/staff')) }}" class="{{ (strpos(url()->full() , '/staff')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Staff</span>
                    </a>
                </li>
            @endif


            @if (in_array("AgentView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/agents?type=agents')) }}" class="{{ (strpos(url()->full() , '/agents')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Agents</span>
                    </a>
                </li>
            @endif


      

            @if (in_array("StudentView", $permission))
                <li>
                    <a href="{{ url('/common/student') }}" class="{{ (strpos(url()->full() , '/common/student/')) ? 'active' : ''  }}">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Students</span>
                    </a>
                </li>
            @endif

            @if (in_array("IntakeView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/intake ')) }}" class="{{ (strpos(url()->full() , 'intake ')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-table"></i>
                        <span class="nav-text">Intakes</span>
                    </a>
                </li>
            @endif

            @if (in_array("CourseView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/course ')) }}" class="{{ (strpos(url()->full() , 'course ')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-file-alt"></i>
                        <span class="nav-text">Courses</span>
                    </a>
                </li>
            @endif

            @if (in_array("ApplicationView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/application')) }}" class="{{ (strpos(url()->full() , '/application')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-clone"></i>
                        <span class="nav-text">Course Preference</span>
                    </a>
                </li>
            @endif

            @if (in_array("CommissionView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/commission')) }}" class="{{ (strpos(url()->full() , '/commission')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-gift"></i>
                        <span class="nav-text">Commissions</span>
                    </a>
                </li>
            @endif
            @if (in_array("OfferfView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/offer')) }}" class="{{ (strpos(url()->full() , '/offer')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-inbox"></i>
                        <span class="nav-text">Disc & Scholarships</span>
                    </a>
                </li>
            @endif


            <li>
                <a href="{{ url('/inbox') }}" class="{{ (strpos(url()->full() , '/inbox')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fa fa-inbox"></i>
                    <span class="nav-text">Mail box</span>
                </a>
            </li>

            @if (in_array("UniversityView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/university')) }}" class="{{ (strpos(url()->full() , '/university')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-school"></i>
                        <span class="nav-text">Universities</span>
                    </a>
                </li>
            @endif

            @if (in_array("CampusView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/campus')) }}" class="{{ (strpos(url()->full() , '/campus')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <span class="nav-text">Campuses</span>
                    </a>
                </li>
            @endif


            @if (in_array("ReportView", $permission))
            <li>
                <a href="{{ url('/report') }}" class="{{ (strpos(url()->full() , '/report')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">Reports</span>
                </a>
            </li>
            @endif   

            @if (in_array("StateCityView", $permission))
            <li>
                <a href="{{ url(strtolower(auth::user()->role.'/state-and-city')) }}" class="{{ (strpos(url()->full() , '/state-and-city')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fas fa-list"></i>
                    <span class="nav-text">State & Cities</span>
                </a>
            </li>
            @endif   

            @if (in_array("NoticeView", $permission))
            <li>
                <a href="{{ url(strtolower(auth::user()->role.'/notice')) }}" class="{{ (strpos(url()->full() , '/notice')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fa fa-bullhorn"></i>
                    <span class="nav-text">Notices</span>
                </a>
            </li>
            @endif

            @if (in_array("SettingView", $permission))
            <li>
                <a href="{{ url(strtolower(auth::user()->role.'/setting')) }}" class="{{ (strpos(url()->full() , '/setting')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fa fa-cog"></i>
                    <span class="nav-text">Settings</span>
                </a>
            </li>
            @endif   

       
       
            


        </ul>
        
        <div class="copyright">
            <p><strong>EduSYSK</strong> © {{ date('Y') }} All Rights Reserved</p>
            <p class="fs-12">Developed by SYSK Solutions</p>
        </div>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************