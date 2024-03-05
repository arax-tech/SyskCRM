@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp
<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">



            <li>
                <a href="{{ url('/agent/dashboard') }}" class="{{ (strpos(url()->full() , 'dashboard')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            @if (in_array("AgentView", $permission))
                <li>
                    <a href="{{ url('/agent/agent') }}" class="{{ (strpos(url()->full() , 'agent')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Sub Agents</span>
                    </a>
                </li>
            @endif


          

            @if (in_array("StudentView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/student')) }}" class="{{ (strpos(url()->full() , '/agent/student/')) ? 'active' : ''  }}">
                        <i class="fas fa-users"></i>
                        <span class="nav-text">Students</span>
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



            @if (in_array("SearchProgramView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/search/program')) }}" class="{{ (strpos(url()->full() , '/search/program')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-search"></i>
                        <span class="nav-text">Search Program</span>
                    </a>
                </li>
            @endif



            <li>
                <a href="{{ url(strtolower(auth::user()->role.'/university')) }}" class="{{ (strpos(url()->full() , '/university')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fas fa-school"></i>
                    <span class="nav-text">Universities</span>
                </a>
            </li>


            <li>
                <a href="{{ url('/report') }}" class="{{ (strpos(url()->full() , '/report')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fas fa-file"></i>
                    <span class="nav-text">Reports</span>
                </a>
            </li>

            <li>
                <a href="{{ url('/inbox') }}" class="{{ (strpos(url()->full() , '/inbox')) ? 'active' : ''  }}" aria-expanded="false">
                    <i class="fa fa-inbox"></i>
                    <span class="nav-text">Inbox</span>
                </a>
            </li>
   



            @if (in_array("CommissionView", $permission))
                <li>
                    <a href="{{ url(strtolower(auth::user()->role.'/commission')) }}" class="{{ (strpos(url()->full() , '/commission')) ? 'active' : ''  }}" aria-expanded="false">
                        <i class="fas fa-gift"></i>
                        <span class="nav-text">Commissions</span>
                    </a>
                </li>
            @endif
            




        </ul>
        
        <div class="copyright">
            <p><strong>SYSK CRM</strong> © {{ date('Y') }} All Rights Reserved</p>
            <p class="fs-12">Made by <span class="heart"></span> Techno Lancer</p>
        </div>
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************