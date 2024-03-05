
@php
    error_reporting(0);
@endphp
@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'Update Student')
@section('content')


<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Update Student</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('/common/student/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/common/student/update/'.$student->id) }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                <div class="col-xl-12 col-xxl-12">
                                    <div class="card">
                                        <div style="padding: 5px 25px !important">
                                            @if ($errors->any())
                                                <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                                                    <div class="alert-body">
                                                        @foreach ($errors->all() as $error)
                                                            <i data-feather="info" class="mr-50 align-middle"></i>
                                                            <span style="margin-bottom: 2px !important"><strong> {{ $error }} </strong></span> <br>
                                                        @endforeach
                                                        
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="card-body">
                                            <div id="smartwizard" class="form-wizard order-create">
                                                <ul class="nav nav-wizard">
                                                    <li><a class="nav-link" href="#personal_details">
                                                        <span>1</span>
                                                    </a></li>
                                                    <li><a class="nav-link" href="#contract_info">
                                                        <span>2</span>
                                                    </a></li>
                                                    <li><a class="nav-link" href="#previous_qualification">
                                                        <span>3</span>
                                                    </a></li>
                                                    
                                                    <li><a class="nav-link" href="#document_upload">
                                                        <span>4</span>
                                                    </a></li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="personal_details" class="tab-pane" role="tabpanel">
                                                        <br>
                                                        <div class="row ">
                                                            
                                                            <input type="hidden" name="type" value="{{ $_REQUEST['type'] }}">
                                                            @if (auth::user()->role != "Agent")
                                                                @php
                                                                    error_reporting(0);
                                                                    $agents = DB::table('users')->where('role', 'Agent')->get();
                                                                @endphp
                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Select Agent <span class="text-danger">*</span></label>
                                                                        <select name="agent_id" class="form-control select2" >
                                                                            <option selected disabled value="">Select Agent</option>
                                                                            @foreach($agents as $agent)
                                                                                <option value="{{ $agent->id }}"
                                                                                    @if ($student->agent_id == $agent->id)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $agent->name }} : {{ $agent->email }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Title <span class="text-danger">*</span></label>
                                                                    <input type="text" name="title" value="{{ old('title', $student->title) }}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">First Name <span class="text-danger">*</span></label>
                                                                    <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Middle Name</label>
                                                                    <input type="text" name="middle_name" value="{{ old('middle_name', $student->middle_name) }}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Last Name <span class="text-danger">*</span></label>
                                                                    <input type="text" name="last_name" value="{{ old('last_name', $student->last_name) }}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Date of Birth <span class="text-danger">*</span></label>
                                                                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Gender<span class="text-danger">*</span></label>
                                                                    <select name="gender" class="form-control">
                                                                        <option selected disabled value>Choose...</option>
                                                                        <option value="Male"
                                                                        @if (old('gender', $student->gender) == "Male")
                                                                            selected 
                                                                        @endif
                                                                        >Male</option>
                                                                        <option value="Female"
                                                                        @if (old('gender', $student->gender) == "Female")
                                                                            selected 
                                                                        @endif
                                                                        >Female</option>
                                                                        <option value="Other"
                                                                        @if (old('gender', $student->gender) == "Other")
                                                                            selected 
                                                                        @endif
                                                                        >Other</option>
                                                                        <option value="Prefer not to say"
                                                                        @if (old('gender', $student->gender) == "Prefer not to say")
                                                                            selected 
                                                                        @endif
                                                                        >Prefer not to say</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Nationality <span class="text-danger">*</span></label>
                                                                    <select name="nationality" class="form-control select2">
                                                                        <option selected disabled value>Select Country</option>
                                                                        @foreach($countries as $country)
                                                                            <option value="{{ $country->id }}"
                                                                                @if (old('nationality', $student->nationality) == $country->id)
                                                                                    selected 
                                                                                @endif
                                                                            >{{ $country->name }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Passport Number <span class="text-danger">*</span></label>
                                                                    <input type="text" name="passport_number" value="{{ old('passport_number', $student->passport_number) }}" class="form-control">
                                                                </div>
                                                            </div>



                                                            <div class="col-lg-3 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Passport Expiry Date <span class="text-danger">*</span></label>
                                                                    <input type="date" name="passport_expiry_date" value="{{ old('passport_expiry_date', $student->passport_expiry_date) }}" class="form-control">
                                                                </div>
                                                            </div>

                                                          

                                                            
                                                        
                                                    </div>
                                                </div>
                                                <div id="contract_info" class="tab-pane" role="tabpanel">
                                                    <br>
                                                    <div class="row">


                                                        <div class="col-lg-6 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Email address <span class="text-danger">*</span></label>
                                                                <input type="text" name="email_address" value="{{ old('email_address', $student->email_address) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Contact Number <span class="text-danger">*</span></label>
                                                                <input type="text" name="contact_number" value="{{ old('contact_number', $student->contact_number) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <hr>
                                                        <h4>Permanent Address</h4>
                                                        <hr>
                                                        

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Address Line One <span class="text-danger">*</span></label>
                                                                <input type="text" name="permanent_address_line_one" value="{{ old('permanent_address_line_one', $student->permanent_address_line_one) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Address Line Two <span class="text-danger">*</span></label>
                                                                <input type="text" name="permanent_address_line_two" value="{{ old('permanent_address_line_two', $student->permanent_address_line_two) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Country <span class="text-danger">*</span></label>
                                                                <select name="permanent_address_country"  class="form-control select2">
                                                                    <option selected disabled value>Select Country</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}"
                                                                            @if (old('permanent_address_country', $student->permanent_address_country) == $country->id)
                                                                                selected 
                                                                            @endif
                                                                        >{{ $country->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">State / Region <span class="text-danger">*</span></label>
                                                                <input type="text" name="permanent_address_state" value="{{ old('permanent_address_state', $student->permanent_address_state) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Town / City <span class="text-danger">*</span></label>
                                                                <input type="text" name="permanent_address_city" value="{{ old('permanent_address_city', $student->permanent_address_city) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Post Code / Pin Code <span class="text-danger">*</span></label>
                                                                <input type="text" name="permanent_address_pincode" value="{{ old('permanent_address_pincode', $student->permanent_address_pincode) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <h4>
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                Communication Address
                                                                <div class="form-check form-switch float-right">
                                                                    <label for="SamePermanentAddress" style="font-weight: normal !important;">Same as Permanent</label>
                                                                    <input type="checkbox" class="form-check-input" id="SamePermanentAddress">
                                                                </div>
                                                            </div>
                                                        </h4>
                                                        <hr>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Address Line One <span class="text-danger">*</span></label>
                                                                <input type="text" name="communication_address_line_one" value="{{ old('communication_address_line_one', $student->communication_address_line_one) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Address Line Two <span class="text-danger">*</span></label>
                                                                <input type="text" name="communication_address_line_two" value="{{ old('communication_address_line_two', $student->communication_address_line_two) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Country <span class="text-danger">*</span></label>
                                                                <select name="communication_address_country" class="form-control select2">
                                                                    <option selected disabled value>Select Country</option>
                                                                    @foreach($countries as $country)
                                                                        <option value="{{ $country->id }}"
                                                                            @if (old('communication_address_country', $student->communication_address_country) == $country->id)
                                                                                selected 
                                                                            @endif
                                                                        >{{ $country->name }} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">State / Region <span class="text-danger">*</span></label>
                                                                <input type="text" name="communication_address_state" value="{{ old('communication_address_state', $student->communication_address_state) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Town / City <span class="text-danger">*</span></label>
                                                                <input type="text" name="communication_address_city" value="{{ old('communication_address_city', $student->communication_address_city) }}" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Post Code / Pin Code <span class="text-danger">*</span></label>
                                                                <input type="text" name="communication_address_pincode" value="{{ old('communication_address_pincode', $student->communication_address_pincode) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <hr>



                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Emergency Contact Name</label>
                                                                <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $student->emergency_contact_name) }}" class="form-control">
                                                            </div>
                                                        </div>



                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Emergency Contact Relationship</label>
                                                                <input type="text" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship', $student->emergency_contact_relationship) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Emergency Contact Number <span class="text-danger">*</span></label>
                                                                <input type="text" name="emergency_contact_number" value="{{ old('emergency_contact_number', $student->emergency_contact_number) }}" class="form-control">
                                                            </div>
                                                        </div>



                                                        


                                                        
                                                    </div>
                                                </div>
                                                <div id="previous_qualification" class="tab-pane" role="tabpanel">
                                                    <br>
                                                    <div class="row">

                                                        <h4>Qualification 1</h4>
                                                        <hr>
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Course Title <span class="text-danger">*</span></label>
                                                                <input type="text" name="qualification1_course_title" value="{{ old('qualification1_course_title', $student->qualification1_course_title) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Course Level  <span class="text-danger">*</span></label>
                                                                <select name="qualification1_course_level" class="form-control">
                                                                    <option selected disabled value="">Choose</option>
                                                                    <option value="SSC"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "SSC")
                                                                        selected 
                                                                    @endif
                                                                    >SSC</option>
                                                                    <option value="HSC"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "HSC")
                                                                        selected 
                                                                    @endif
                                                                    >HSC</option>
                                                                    <option value="UG Diploma"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "UG Diploma")
                                                                        selected 
                                                                    @endif
                                                                    >UG Diploma</option>
                                                                    <option value="PG Diploma"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "PG Diploma")
                                                                        selected 
                                                                    @endif
                                                                    >PG Diploma</option>
                                                                    <option value="Bachelor’s Degree"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "Bachelor’s Degree")
                                                                        selected 
                                                                    @endif
                                                                    >Bachelor’s Degree</option>
                                                                    <option value="Master’s Degree"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "Master’s Degree")
                                                                        selected 
                                                                    @endif
                                                                    >Master’s Degree</option>
                                                                    <option value="PhD"
                                                                    @if (old('qualification1_course_level', $student->qualification1_course_level) == "PhD")
                                                                        selected 
                                                                    @endif
                                                                    >PhD</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Course Duration <span class="text-danger">*</span></label>
                                                                <input type="text" name="qualification1_course_duration" value="{{ old('qualification1_course_duration', $student->qualification1_course_duration) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">University / Awarding Organisation <span class="text-danger">*</span></label>
                                                                <input type="text" name="qualification1_university_or_organisation" value="{{ old('qualification1_university_or_organisation', $student->qualification1_university_or_organisation) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Medium of Education (language)<span class="text-danger">*</span></label>
                                                                <input type="text" name="qualification1_medium_of_education" value="{{ old('qualification1_medium_of_education', $student->qualification1_medium_of_education) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Grade / Result<span class="text-danger">*</span></label>
                                                                <input type="text" name="qualification1_grade" value="{{ old('qualification1_grade', $student->qualification1_grade) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Year of Passing <span class="text-danger">*</span></label>
                                                                <input type="text" name="qualification1_year_of_passing" value="{{ old('qualification1_year_of_passing', $student->qualification1_year_of_passing) }}" class="form-control">
                                                            </div>
                                                        </div>






                                                        <hr>
                                                        <h4>Qualification 2</h4>
                                                        <hr>
                                                        <div class="col-lg-12 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Course Title </label>
                                                                <input type="text" name="qualification2_course_title" value="{{ old('qualification2_course_title', $student->qualification2_course_title) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Course Level  </label>
                                                                <select name="qualification2_course_level" class="form-control">
                                                                    <option selected disabled value="">Choose</option>
                                                                    <option value="SSC"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "SSC")
                                                                        selected 
                                                                    @endif
                                                                    >SSC</option>
                                                                    <option value="HSC"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "HSC")
                                                                        selected 
                                                                    @endif
                                                                    >HSC</option>
                                                                    <option value="UG Diploma"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "UG Diploma")
                                                                        selected 
                                                                    @endif
                                                                    >UG Diploma</option>
                                                                    <option value="PG Diploma"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "PG Diploma")
                                                                        selected 
                                                                    @endif
                                                                    >PG Diploma</option>
                                                                    <option value="Bachelor’s Degree"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "Bachelor’s Degree")
                                                                        selected 
                                                                    @endif
                                                                    >Bachelor’s Degree</option>
                                                                    <option value="Master’s Degree"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "Master’s Degree")
                                                                        selected 
                                                                    @endif
                                                                    >Master’s Degree</option>
                                                                    <option value="PhD"
                                                                    @if (old('qualification2_course_level', $student->qualification2_course_level) == "PhD")
                                                                        selected 
                                                                    @endif
                                                                    >PhD</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Course Duration </label>
                                                                <input type="text" name="qualification2_course_duration" value="{{ old('qualification2_course_duration', $student->qualification2_course_duration) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">University / Awarding Organisation </label>
                                                                <input type="text" name="qualification2_university_or_organisation" value="{{ old('qualification2_university_or_organisation', $student->qualification2_university_or_organisation) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Medium of Education (language)</label>
                                                                <input type="text" name="qualification2_medium_of_education" value="{{ old('qualification2_medium_of_education', $student->qualification2_medium_of_education) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Grade / Result</label>
                                                                <input type="text" name="qualification2_grade" value="{{ old('qualification2_grade', $student->qualification2_grade) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Year of Passing </label>
                                                                <input type="text" name="qualification2_year_of_passing" value="{{ old('qualification2_year_of_passing', $student->qualification2_year_of_passing) }}" class="form-control">
                                                            </div>
                                                        </div>





                                                        <hr>
                                                        <h4>English Language Assessment</h4>
                                                        <hr>


                                                        @if ($_REQUEST['type'] == "International")
                                                            
                                                        
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Test Name </label>
                                                                <select class="form-control" name="test_name">
                                                                    <option selected disabled value="">Select Exam</option>
                                                                    <option value="IELTS"
                                                                    @if (old('test_name', $student->test_name) == "IELTS")
                                                                        selected 
                                                                    @endif
                                                                    >IELTS</option>
                                                                    <option value="PTE"
                                                                    @if (old('test_name', $student->test_name) == "PTE")
                                                                        selected 
                                                                    @endif
                                                                    >PTE</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Overall Score </label>
                                                                <select class="form-control" name="over_all_socre">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('over_all_socre', $student->over_all_socre) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('over_all_socre', $student->over_all_socre) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('over_all_socre', $student->over_all_socre) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('over_all_socre', $student->over_all_socre) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('over_all_socre', $student->over_all_socre) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('over_all_socre', $student->over_all_socre) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Speaking  </label>
                                                                <select class="form-control" name="speaking">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('speaking', $student->speaking) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('speaking', $student->speaking) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('speaking', $student->speaking) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('speaking', $student->speaking) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('speaking', $student->speaking) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('speaking', $student->speaking) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Listening </label>
                                                                <select class="form-control" name="listening">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('listening', $student->listening) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('listening', $student->listening) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('listening', $student->listening) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('listening', $student->listening) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('listening', $student->listening) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('listening', $student->listening) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Reading </label>
                                                                <select class="form-control" name="reading">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('reading', $student->reading) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('reading', $student->reading) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('reading', $student->reading) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('reading', $student->reading) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('reading', $student->reading) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('reading', $student->reading) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Writing </label>
                                                                <select class="form-control" name="writing">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('writing', $student->writing) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('writing', $student->writing) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('writing', $student->writing) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('writing', $student->writing) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('writing', $student->writing) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('writing', $student->writing) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                        @else
                                                            <div class="col-lg-12 mb-4">
                                                                <label class="text-label form-label">English Level  </label>
                                                                <select class="form-control" name="english_level">
                                                                    <option selected disabled value="">Select Level</option>
                                                                    <option value="Good "
                                                                    @if (old('english_level', $student->english_level) == "Good ")
                                                                        selected 
                                                                    @endif
                                                                    >Good </option>
                                                                    <option value="Average"
                                                                    @if (old('english_level', $student->english_level) == "Average")
                                                                        selected 
                                                                    @endif
                                                                    >Average</option>
                                                                    <option value="Poor"
                                                                    @if (old('english_level', $student->english_level) == "Poor")
                                                                        selected 
                                                                    @endif
                                                                    >Poor</option>
                                                                </select>
                                                            </div>
                                                        @endif





                                                        <hr>
                                                        <h4>Work Experience (if applicable)</h4>
                                                        <hr>



                                                        <div class="col-lg-12 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Job Title</label>
                                                                <input type="text" name="job_title" value="{{ old('job_title', $student->job_title) }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Company Name</label>
                                                                <input type="text" name="company_name" value="{{ old('company_name', $student->company_name) }}" class="form-control">
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-6 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Years of Experience</label>
                                                                <input type="text" name="years_of_experience" value="{{ old('years_of_experience', $student->years_of_experience) }}" class="form-control">
                                                            </div>
                                                        </div>








                                                    </div>
                                                   

                                                </div>

                                                <div id="document_upload" class="tab-pane" role="tabpanel">
                                                    <br>
                                                    
                                                    <div class="row">
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Photograph <span class="text-danger">*</span></label>
                                                                <input type="file" name="photograph" class="form-control" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Passport <span class="text-danger">*</span></label>
                                                                <input type="file" name="passport" class="form-control" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Address Proof <span class="text-danger">*</span></label>
                                                                <input type="file" name="address_proof" class="form-control" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                                <label class="text-label form-label">Qualifications <span class="text-danger">*</span></label>
                                                                <input type="file" name="qualifications" class="form-control" />
                                                            </div>
                                                        </div>


                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-6">
                                                                <label class="text-label form-label">Work Experience</label>
                                                                <input type="file" name="work_experience" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-6">
                                                                <label class="text-label form-label">CV</label>
                                                                <input type="file" name="cv" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-6">
                                                                <label class="text-label form-label">Personal Statement</label>
                                                                <input type="file" name="personal_statement" class="form-control" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-5">
                                                            <div class="mb-6">
                                                                <label class="text-label form-label">Any other supporting documents</label>
                                                                <input type="file" name="any_other_supporting_documents" class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                           
                                                    
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <input type="submit" class="btn btn-primary w-100" value="Update Student" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

@endsection
@section('js')
<script>
    $(document).ready(function(){
        // SmartWizard initialize
        $('#smartwizard').smartWizard(); 

        $('#SamePermanentAddress').on('change', function(){
            $('input[name="communication_address_line_one"]').val($('input[name="permanent_address_line_one"]').val());
            $('input[name="communication_address_line_two"]').val($('input[name="permanent_address_line_two"]').val());
            $('select[name="communication_address_country"]').val($('select[name="permanent_address_country"]').val());
            $('input[name="communication_address_state"]').val($('input[name="permanent_address_state"]').val());
            $('input[name="communication_address_city"]').val($('input[name="permanent_address_city"]').val());
            $('input[name="communication_address_pincode"]').val($('input[name="permanent_address_pincode"]').val());
        });

        /*
            communication_address_line_one
            communication_address_line_two
            communication_address_country
            communication_address_state
            communication_address_city
            communication_address_pincode
        */
    });
</script>
@endsection