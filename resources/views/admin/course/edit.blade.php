@extends('admin.layouts.app')
@section('title', 'Update Course')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Update Student</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url(strtolower(auth::user()->role.'/course/')) }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/course/update/'.$course->id) }}">
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
                                            <div id="smartwizard" class="form-wizard order-Update">
                                                <ul class="nav nav-wizard">
                                                    <li><a class="nav-link" href="#course_info">
                                                        <span>1</span>
                                                    </a></li>
                                                    <li><a class="nav-link" href="#fee_info">
                                                        <span>2</span>
                                                    </a></li>
                                                    <li><a class="nav-link" href="#education_info">
                                                        <span>3</span>
                                                    </a></li>
                                                    <li><a class="nav-link" href="#language_info">
                                                        <span>4</span>
                                                    </a></li>
                                                    
                                                </ul>
                                                <div class="tab-content">
                                                    <div id="course_info" class="tab-pane" role="tabpanel">
                                                        <br>
                                                        <h3 class="py-3">Course Information </h3>
                                                        <div class="row ">
                                                            
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Course Name <span class="text-danger">*</span></label>
                                                                    <input type="text" name="course_name" value="{{ old('course_name', $course->course_name, $course->course_name) }}" class="form-control" autofocus="true">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Course Description <span class="text-danger">*</span></label>
                                                                    <textarea name="course_description">{{ old('course_description', $course->course_description) }}</textarea>
                                                                </div>
                                                            </div>
                                                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                    <div id="fee_info" class="tab-pane" role="tabpanel">
                                                        <br>
                                                        <h3 class="py-3">Fee & Other  Information </h3>
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Campus Name <span class="text-danger">*</span></label>
                                                                    <select class="form-control select2" name="campus_name">
                                                                        <option selected disabled value="">Choose...</option>
                                                                        @foreach ($campuses as $campus)
                                                                        <option value="{{ $campus->id }}"
                                                                            @if (old('campus_name', $course->campus_name) == $campus->id)
                                                                                selected 
                                                                            @endif
                                                                        >{{ $campus->name }} | {{ $campus->university_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Tuition Fee <span class="text-danger">*</span></label>
                                                                    <input type="number" name="tuition_fee" class="form-control" value="{{ old('tuition_fee', $course->tuition_fee) }}" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Commission Fee <span class="text-danger">*</span></label>
                                                                    <input type="number" name="commission_fee" class="form-control" value="{{ old('commission_fee', $course->commission_fee) }}" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Application Fee <span class="text-danger">*</span></label>
                                                                    <input type="number" name="application_fee" class="form-control" value="{{ old('application_fee', $course->application_fee) }}" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Fee and Commission Currency <span class="text-danger">*</span></label>
                                                                    
                                                                    <select class="form-control"  name="fee_and_commission_currency">
                                                                        <option value="">Select Currency</option>
                                                                        <option value="₹ INR"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "₹ INR")
                                                                            selected 
                                                                        @endif
                                                                        >₹ INR</option>
                                                                        <option value="$ USD"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "$ USD")
                                                                            selected 
                                                                        @endif
                                                                        >$ USD</option>
                                                                        <option value="€ EUR"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "€ EUR")
                                                                            selected 
                                                                        @endif
                                                                        >€ EUR</option>
                                                                        <option value="£ GBP"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "£ GBP")
                                                                            selected 
                                                                        @endif
                                                                        >£ GBP</option>
                                                                        <option value="¥ JPY"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "¥ JPY")
                                                                            selected 
                                                                        @endif
                                                                        >¥ JPY</option>
                                                                        <option value="$ CAD"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "$ CAD")
                                                                            selected 
                                                                        @endif
                                                                        >$ CAD</option>
                                                                        <option value="$ AUD"
                                                                        @if (old('fee_and_commission_currency', $course->fee_and_commission_currency) == "$ AUD")
                                                                            selected 
                                                                        @endif
                                                                        >$ AUD</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Duration <span class="text-danger">*</span></label>
                                                                    <input type="text" name="duration" value="{{ old('duration', $course->duration) }}" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Degree Types <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="degree_type" >
                                                                        <option selected disabled value="">Select Degree Types</option>
                                                                        <option value="Diploma"
                                                                        @if (old('degree_type', $course->degree_type) == "Diploma")
                                                                            selected 
                                                                        @endif
                                                                        >Diploma</option>
                                                                        <option value="Advance Diploma"
                                                                        @if (old('degree_type', $course->degree_type) == "Advance Diploma")
                                                                            selected 
                                                                        @endif
                                                                        >Advance Diploma</option>
                                                                        <option value="Associate Degree"
                                                                        @if (old('degree_type', $course->degree_type) == "Associate Degree")
                                                                            selected 
                                                                        @endif
                                                                        >Associate Degree</option>
                                                                        <option value="Bachelor Degree"
                                                                        @if (old('degree_type', $course->degree_type) == "Bachelor Degree")
                                                                            selected 
                                                                        @endif
                                                                        >Bachelor Degree</option>
                                                                        <option value="Certificate Program"
                                                                        @if (old('degree_type', $course->degree_type) == "Certificate Program")
                                                                            selected 
                                                                        @endif
                                                                        >Certificate Program</option>
                                                                        <option value="Degree"
                                                                        @if (old('degree_type', $course->degree_type) == "Degree")
                                                                            selected 
                                                                        @endif
                                                                        >Degree</option>
                                                                        <option value="Graduate Certificate"
                                                                        @if (old('degree_type', $course->degree_type) == "Graduate Certificate")
                                                                            selected 
                                                                        @endif
                                                                        >Graduate Certificate</option>
                                                                        <option value="Masters"
                                                                        @if (old('degree_type', $course->degree_type) == "Masters")
                                                                            selected 
                                                                        @endif
                                                                        >Masters</option>
                                                                        <option value="Post Graduate Certificate"
                                                                        @if (old('degree_type', $course->degree_type) == "Post Graduate Certificate")
                                                                            selected 
                                                                        @endif
                                                                        >Post Graduate Certificate</option>
                                                                        <option value="Phd"
                                                                        @if (old('degree_type', $course->degree_type) == "Phd")
                                                                            selected 
                                                                        @endif
                                                                        >Phd</option>
                                                                        <option value="Training and Internship"
                                                                        @if (old('degree_type', $course->degree_type) == "Training and Internship")
                                                                            selected 
                                                                        @endif
                                                                        >Training and Internship</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Field of Study <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="study_field">
                                                                        <option selected disabled value="">Select Study Field</option>
                                                                        <option value="Agriculture and Biology"
                                                                        @if (old('study_field', $course->study_field) == "Agriculture and Biology")
                                                                            selected 
                                                                        @endif
                                                                        >Agriculture and Biology</option>
                                                                        <option value="Applied Sciences and Professions"
                                                                        @if (old('study_field', $course->study_field) == "Applied Sciences and Professions")
                                                                            selected 
                                                                        @endif
                                                                        >Applied Sciences and Professions </option>
                                                                        <option value="Architecture and Building"
                                                                        @if (old('study_field', $course->study_field) == "Architecture and Building")
                                                                            selected 
                                                                        @endif
                                                                        >Architecture and Building</option>
                                                                        <option value="Art, Design, and Fashion"
                                                                        @if (old('study_field', $course->study_field) == "Art, Design, and Fashion")
                                                                            selected 
                                                                        @endif
                                                                        >Art, Design, and Fashion</option>
                                                                        <option value="Business, Management, and Finance"
                                                                        @if (old('study_field', $course->study_field) == "Business, Management, and Finance")
                                                                            selected 
                                                                        @endif
                                                                        >Business, Management, and Finance </option>
                                                                        <option value="Computer Science and IT"
                                                                        @if (old('study_field', $course->study_field) == "Computer Science and IT")
                                                                            selected 
                                                                        @endif
                                                                        >Computer Science and IT</option>
                                                                        <option value="Economics, Accounting, and Taxation"
                                                                        @if (old('study_field', $course->study_field) == "Economics, Accounting, and Taxation")
                                                                            selected 
                                                                        @endif
                                                                        >Economics, Accounting, and Taxation </option>
                                                                        <option value="Education and Teaching"
                                                                        @if (old('study_field', $course->study_field) == "Education and Teaching")
                                                                            selected 
                                                                        @endif
                                                                        >Education and Teaching</option>
                                                                        <option value="Engineering and Technology"
                                                                        @if (old('study_field', $course->study_field) == "Engineering and Technology")
                                                                            selected 
                                                                        @endif
                                                                        >Engineering and Technology</option>
                                                                        <option value="Environmental Studies and Earth Sciences"
                                                                        @if (old('study_field', $course->study_field) == "Environmental Studies and Earth Sciences")
                                                                            selected 
                                                                        @endif
                                                                        >Environmental Studies and Earth Sciences </option>
                                                                        <option value="Food and Nutrition and Beverage Studies"
                                                                        @if (old('study_field', $course->study_field) == "Food and Nutrition and Beverage Studies")
                                                                            selected 
                                                                        @endif
                                                                        >Food and Nutrition and Beverage Studies </option>
                                                                        <option value="Journalism and Media Communications"
                                                                        @if (old('study_field', $course->study_field) == "Journalism and Media Communications")
                                                                            selected 
                                                                        @endif
                                                                        >Journalism and Media Communications </option>
                                                                        <option value="Law and Jurisprudence"
                                                                        @if (old('study_field', $course->study_field) == "Law and Jurisprudence")
                                                                            selected 
                                                                        @endif
                                                                        >Law and Jurisprudence</option>
                                                                        <option value="Leisure and Sports"
                                                                        @if (old('study_field', $course->study_field) == "Leisure and Sports")
                                                                            selected 
                                                                        @endif
                                                                        >Leisure and Sports</option>
                                                                        <option value="Logistics and Transportation"
                                                                        @if (old('study_field', $course->study_field) == "Logistics and Transportation")
                                                                            selected 
                                                                        @endif
                                                                        >Logistics and Transportation </option>
                                                                        <option value="Marketing and PR"
                                                                        @if (old('study_field', $course->study_field) == "Marketing and PR")
                                                                            selected 
                                                                        @endif
                                                                        >Marketing and PR</option>
                                                                        <option value="Mathematics, Physics, and Chemistry"
                                                                        @if (old('study_field', $course->study_field) == "Mathematics, Physics, and Chemistry")
                                                                            selected 
                                                                        @endif
                                                                        >Mathematics, Physics, and Chemistry </option>
                                                                        <option value="Medicine and Health"
                                                                        @if (old('study_field', $course->study_field) == "Medicine and Health")
                                                                            selected 
                                                                        @endif
                                                                        >Medicine and Health</option>
                                                                        <option value="Military Science and Security"
                                                                        @if (old('study_field', $course->study_field) == "Military Science and Security")
                                                                            selected 
                                                                        @endif
                                                                        >Military Science and Security </option>
                                                                        <option value="Philology and Culturology"
                                                                        @if (old('study_field', $course->study_field) == "Philology and Culturology")
                                                                            selected 
                                                                        @endif
                                                                        >Philology and Culturology</option>
                                                                        <option value="Psychology"
                                                                        @if (old('study_field', $course->study_field) == "Psychology")
                                                                            selected 
                                                                        @endif
                                                                        >Psychology</option>
                                                                        <option value="Sociology, Political Science, and History"
                                                                        @if (old('study_field', $course->study_field) == "Sociology, Political Science, and History")
                                                                            selected 
                                                                        @endif
                                                                        >Sociology, Political Science, and History </option>
                                                                        <option value="Tourism, Hospitality, and Restaurant Management"
                                                                        @if (old('study_field', $course->study_field) == "Tourism, Hospitality, and Restaurant Management")
                                                                            selected 
                                                                        @endif
                                                                        >Tourism, Hospitality, and Restaurant Management </option>
                                                                        <option value="Film &amp; Theatre"
                                                                        @if (old('study_field', $course->study_field) == "Film &amp; Theatre")
                                                                            selected 
                                                                        @endif
                                                                        >Film &amp; Theatre</option>
                                                                        <option value="Trade and Technician Engg"
                                                                        @if (old('study_field', $course->study_field) == "Trade and Technician Engg")
                                                                            selected 
                                                                        @endif
                                                                        >Trade and Technician Engg</option>
                                                                        <option value="Dental and Assisting"
                                                                        @if (old('study_field', $course->study_field) == "Dental and Assisting")
                                                                            selected 
                                                                        @endif
                                                                        >Dental and Assisting</option>
                                                                        <option value="Medical and Lab Technicians"
                                                                        @if (old('study_field', $course->study_field) == "Medical and Lab Technicians")
                                                                            selected 
                                                                        @endif
                                                                        >Medical and Lab Technicians</option>
                                                                        <option value="Music"
                                                                        @if (old('study_field', $course->study_field) == "Music")
                                                                            selected 
                                                                        @endif
                                                                        >Music</option>
                                                                        <option value="Accounting and finance"
                                                                        @if (old('study_field', $course->study_field) == "Accounting and finance")
                                                                            selected 
                                                                        @endif
                                                                        >Accounting and finance</option>
                                                                        <option value="Business and Administration Management"
                                                                        @if (old('study_field', $course->study_field) == "Business and Administration Management")
                                                                            selected 
                                                                        @endif
                                                                        >Business and Administration Management</option>
                                                                        <option value="Flights and Aviation"
                                                                        @if (old('study_field', $course->study_field) == "Flights and Aviation")
                                                                            selected 
                                                                        @endif
                                                                        >Flights and Aviation</option>
                                                                        <option value="Computer Engineers"
                                                                        @if (old('study_field', $course->study_field) == "Computer Engineers")
                                                                            selected 
                                                                        @endif
                                                                        >Computer Engineers</option>
                                                                        <option value="Web Developers and Designer"
                                                                        @if (old('study_field', $course->study_field) == "Web Developers and Designer")
                                                                            selected 
                                                                        @endif
                                                                        >Web Developers and Designer</option>
                                                                        <option value="Others"
                                                                        @if (old('study_field', $course->study_field) == "Others")
                                                                            selected 
                                                                        @endif
                                                                        >Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Study Type <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="study_type">
                                                                        <option selected disabled value="">Select Study Type</option>
                                                                        <option value="Distance"
                                                                        @if (old('study_type', $course->study_type) == "Distance")
                                                                            selected 
                                                                        @endif
                                                                        >Distance</option>
                                                                        <option value="Full Time"
                                                                        @if (old('study_type', $course->study_type) == "Full Time")
                                                                            selected 
                                                                        @endif
                                                                        >Full Time</option>
                                                                        <option value="Part Time"
                                                                        @if (old('study_type', $course->study_type) == "Part Time")
                                                                            selected 
                                                                        @endif
                                                                        >Part Time</option>
                                                                        <option value="Blended"
                                                                        @if (old('study_type', $course->study_type) == "Blended")
                                                                            selected 
                                                                        @endif
                                                                        >Blended</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Fees Per Year <span class="text-danger">*</span></label>
                                                                    <select class="form-control"  name="fees_per_year">
                                                                        <option selected disabled value="">Select Fees</option>
                                                                        <option value="Any"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "Any")
                                                                            selected 
                                                                        @endif
                                                                        >Any</option>
                                                                        <option value="0-5000"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "0-5000")
                                                                            selected 
                                                                        @endif
                                                                        >0-5000</option>
                                                                        <option value="5000-10000"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "5000-10000")
                                                                            selected 
                                                                        @endif
                                                                        >5000-10000</option>
                                                                        <option value="10000-13000"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "10000-13000")
                                                                            selected 
                                                                        @endif
                                                                        >10000-13000</option>
                                                                        <option value="13000-15000"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "13000-15000")
                                                                            selected 
                                                                        @endif
                                                                        >13000-15000</option>
                                                                        <option value="15000-18000"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "15000-18000")
                                                                            selected 
                                                                        @endif
                                                                        >15000-18000</option>
                                                                        <option value="18000-20000"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "18000-20000")
                                                                            selected 
                                                                        @endif
                                                                        >18000-20000</option>
                                                                        <option value="20000 or More"
                                                                        @if (old('fees_per_year', $course->fees_per_year) == "20000 or More")
                                                                            selected 
                                                                        @endif
                                                                        >20000 or More</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Year <span class="text-danger">*</span></label>
                                                                    <input type="text" name="year" value="{{ old('year', $course->year) }}" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Status <span class="text-danger">*</span></label>
                                                                    <select class="form-control" name="status">
                                                                        <option value="">Select Course Status</option>
                                                                        <option value="Active"
                                                                        @if (old('status', $course->status) == "Active")
                                                                            selected 
                                                                        @endif
                                                                        >Active</option>
                                                                        <option value="Inactive"
                                                                        @if (old('status', $course->status) == "Inactive")
                                                                            selected 
                                                                        @endif
                                                                        >Inactive</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div id="education_info" class="tab-pane" role="tabpanel">
                                                        <br>
                                                        <h3 class="py-3">Education Requirement </h3>
                                                        <div class="row">
                                                            
                                                            <div class="col-lg-12 mb-2">
                                                                <div class="mb-3">
                                                                    <label class="text-label form-label">Education Requirement <span class="text-danger">*</span></label>
                                                                    <textarea name="education_requirement">{{ old('education_requirement', $course->education_requirement) }}</textarea>
                                                                </div>
                                                            </div>
                                                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                                        </div>
                                                        
                                                    </div>
                                                    <div id="language_info" class="tab-pane" role="tabpanel">
                                                        <br>
                                                        <h3 class="py-3">Language Requirement </h3>
                                                        
                                                        <div class="row my-3">
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Test Name <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="test_name">
                                                                    <option selected disabled value="">Select Exam</option>
                                                                    <option value="IELTS"
                                                                    @if (old('test_name', $course->test_name) == "IELTS")
                                                                        selected 
                                                                    @endif
                                                                    >IELTS</option>
                                                                    <option value="PTE"
                                                                    @if (old('test_name', $course->test_name) == "PTE")
                                                                        selected 
                                                                    @endif
                                                                    >PTE</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Overall Score <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="over_all_socre">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('over_all_socre', $course->over_all_socre) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('over_all_socre', $course->over_all_socre) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('over_all_socre', $course->over_all_socre) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('over_all_socre', $course->over_all_socre) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('over_all_socre', $course->over_all_socre) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('over_all_socre', $course->over_all_socre) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Speaking  <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="speaking">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('speaking', $course->speaking) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('speaking', $course->speaking) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('speaking', $course->speaking) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('speaking', $course->speaking) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('speaking', $course->speaking) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('speaking', $course->speaking) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Listening <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="listening">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('listening', $course->listening) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('listening', $course->listening) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('listening', $course->listening) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('listening', $course->listening) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('listening', $course->listening) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('listening', $course->listening) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Reading <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="reading">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('reading', $course->reading) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('reading', $course->reading) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('reading', $course->reading) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('reading', $course->reading) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('reading', $course->reading) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('reading', $course->reading) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-4 mb-4">
                                                                <label class="text-label form-label">Writing <span class="text-danger">*</span></label>
                                                                <select class="form-control" name="writing">
                                                                    <option selected disabled value="">Choose...</option>
                                                                    <option value="A1"
                                                                    @if (old('writing', $course->writing) == "A1")
                                                                        selected 
                                                                    @endif
                                                                    >A1</option>
                                                                    <option value="A2"
                                                                    @if (old('writing', $course->writing) == "A2")
                                                                        selected 
                                                                    @endif
                                                                    >A2</option>
                                                                    <option value="B1"
                                                                    @if (old('writing', $course->writing) == "B1")
                                                                        selected 
                                                                    @endif
                                                                    >B1</option>
                                                                    <option value="B2"
                                                                    @if (old('writing', $course->writing) == "B2")
                                                                        selected 
                                                                    @endif
                                                                    >B2</option>
                                                                    <option value="C1"
                                                                    @if (old('writing', $course->writing) == "C1")
                                                                        selected 
                                                                    @endif
                                                                    >C1</option>
                                                                    <option value="C2"
                                                                    @if (old('writing', $course->writing) == "C2")
                                                                        selected 
                                                                    @endif
                                                                    >C2</option>
                                                                </select>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-12">
                                                                <input type="submit" class="btn btn-primary w-100" value="Update Course" />
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
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>


<script>
    $(document).ready(function(){
        // SmartWizard initialize
        $('#smartwizard').smartWizard(); 

        
    });
</script>
<script>
    CKEDITOR.replace( 'course_description' );
    CKEDITOR.replace( 'education_requirement' );
</script>

<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.intake_wrapper'); //Input field wrapper
    var fieldHTML = `
    <div>
        <span class="row mt-4">
             <span class="col-lg-2 mb-2">
                 <span class="mb-3">
                     <label class="text-label form-label">Month <span class="text-danger">*</span></label>
                     <select class="form-control" name="intake_month[]" >
                         <option value="">Select Month</option>
                         <option value="January">January</option>
                         <option value="February">February</option>
                         <option value="March">March</option>
                         <option value="April">April</option>
                         <option value="May">May</option>
                         <option value="June">June</option>
                         <option value="July">July</option>
                         <option value="August">August</option>
                         <option value="September">September</option>
                         <option value="October">October</option>
                         <option value="November">November</option>
                         <option value="December">December</option>
                     </select>
                 </span>
             </span>

             <span class="col-lg-2 mb-2">
                 <span class="mb-3">
                     <label class="text-label form-label">Year <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="intake_year[]"  />
                 </span>
             </span>

             <span class="col-lg-2 mb-2">
                 <span class="mb-3">
                     <label class="text-label form-label">Start Date  <span class="text-danger">*</span></label>
                     <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="start_date[]"  />
                 </span>
             </span>
             <span class="col-lg-2 mb-2">
                 <span class="mb-3">
                     <label class="text-label form-label">Deadline  <span class="text-danger">*</span></label>
                     <input type="date" class="form-control" min="{{ date("Y-m-d") }}" name="deadline[]"  />
                 </span>
             </span>

             <span class="col-lg-2 mb-2">
                 <span class="mb-3">
                     <label class="text-label form-label">Status <span class="text-danger">*</span></label>
                     <select class="form-control" name="intake_status[]" >
                         <option value="">Select Status</option>
                         <option value="Active">Active</option>
                         <option value="Inactive">Inactive</option>
                         <option value="Pending">Open Soon</option>
                     </select>
                 </span>
             </span>



            


        </span>

        <a href="javascript:void(0);" class="btn btn-danger remove_button" style="float: right !important; margin-top: -46px !important; width: 14% !important;">Remove</a>
    </div>`; //New input field html 
    var x = 1; //Initial field counter is 1
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection