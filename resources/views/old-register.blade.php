@extends('layouts.app')
@section('title', 'Agent - Sign Up')
@section('css')
@php
    error_reporting(0);
    $setting = DB::table('settings')->where('id', 1)->first();
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('/backend/vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') }}">
<style type="text/css">
    
    input[type="file"]{
        line-height: 2.5 !important;
    }
    @if (request()->tab == "references")
    .authincation{
        min-height: 160vh !important
    }
    @else
    .authincation{
        min-height: 130vh !important
    }
    @endif
</style>
@endsection
@section('content')

<div class="authincation h-100">
    <div class="container h-100">

        <div class="row justify-content-center h-100 align-items-center">
            
            <div class="authincation-content">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form" style="padding: 2rem 3.125rem 1rem 1.125rem !important">
                            <div class="text-center">
                                <a href="javascript::">
                                    <img width="200" src="{{ asset('/backend/logo/'.$setting->logo) }}" alt="">
                                    <h2 class="font-weight-bolder">Agent - Sign Up</h2>
                                </a>
                            </div>
                            


                            <div class="row">
                                <form method="post" action="{{ url('/agent/register') }}" enctype="multipart/form-data">   
                                    @csrf
                                    
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
                                                        <li><a class="nav-link" href="#basic_info"> 
                                                            <span>1</span> 
                                                        </a></li>
                                                        <li><a class="nav-link" href="#contract_info">
                                                            <span>2</span>
                                                        </a></li>
                                                        <li><a class="nav-link" href="#services_offered">
                                                            <span>3</span>
                                                        </a></li>
                                                        <li><a class="nav-link" href="#references">
                                                            <span>4</span>
                                                        </a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div id="basic_info" class="tab-pane" role="tabpanel">
                                                            <br>
                                                            <div class="row ">
                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Recruitment Type <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="recruitment_type">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <option value="International"
                                                                            @if (old('recruitment_type') == "International")
                                                                                selected 
                                                                            @endif
                                                                            >International</option>
                                                                            <option value="Local"
                                                                            @if (old('recruitment_type') == "Local")
                                                                                selected 
                                                                            @endif
                                                                            >Local</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Agent Company Name <span class="text-danger">*</span></label>
                                                                        <input type="text" name="agent_company_name" class="form-control" value="{{old('agent_company_name')}}">
                                                                    </div>
                                                                </div>

                                                                 <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Company Registration Number </label>
                                                                        <input type="text" name="company_registration_number" class="form-control"  value="{{old('company_registration_number')}}">
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Year of Establishment <span class="text-danger">*</span></label>
                                                                        <input type="text" name="year_of_establishment" class="form-control"  value="{{old('year_of_establishment')}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Company Type <span class="text-danger">*</span></label>
                                                                        <select class="form-control" name="company_type">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <option value="Private Limited"
                                                                            @if (old('company_type') == "Private Limited")
                                                                                selected 
                                                                            @endif
                                                                            >Private Limited</option>
                                                                            <option value="Public Limited"
                                                                            @if (old('company_type') == "Public Limited")
                                                                                selected 
                                                                            @endif
                                                                            >Public Limited</option>
                                                                            <option value="Partnership"
                                                                            @if (old('company_type') == "Partnership")
                                                                                selected 
                                                                            @endif
                                                                            >Partnership</option>
                                                                            <option value="Freelancer"
                                                                            @if (old('company_type') == "Freelancer")
                                                                                selected 
                                                                            @endif
                                                                            >Freelancer</option>
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Address Line 1 <span class="text-danger">*</span></label>
                                                                        <input type="text" name="address_line_1" class="form-control" value="{{old('address_line_1')}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Address Line 2 <span class="text-danger">*</span></label>
                                                                        <input type="text" name="address_line_2" class="form-control" value="{{old('address_line_2')}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Town / City <span class="text-danger">*</span></label>
                                                                        <input type="text" name="city" class="form-control" value="{{old('city')}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">State / Region <span class="text-danger">*</span></label>
                                                                        <input type="text" name="state" class="form-control" value="{{old('state')}}">
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        @php
                                                                            error_reporting(0);
                                                                            $countries = DB::table('countries')->get();
                                                                        @endphp
                                                                        <label class="text-label form-label">Country <span class="text-danger">*</span></label>

                                                                        <select name="country" class="form-control select2" required>
                                                                            <option selected disabled value="">Select Country</option>
                                                                            @foreach($countries as $country)
                                                                                <option value="{{ $country->name }}"
                                                                                    @if (old('country') == $country->name)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $country->name }} </option>
                                                                            @endforeach
                                                                        </select>


                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Post / Pin Code <span class="text-danger">*</span></label>
                                                                        <input type="text" name="pincode" class="form-control" value="{{old('pincode')}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">website <span class="text-danger">*</span></label>
                                                                        <input type="text" name="website" class="form-control" value="{{old('website')}}">
                                                                    </div>
                                                                </div><div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Email Address <span class="text-danger">*</span></label>
                                                                        <input type="text" name="email" class="form-control" value="{{old('email')}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Contact Number <span class="text-danger">*</span></label>
                                                                        <input type="text" name="contact_number" class="form-control" value="{{old('contact_number')}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Company Registration Document / Evidence </label>
                                                                        <input type="file" name="company_registration_document_evidence[]" class="form-control" multiple data-bs-toggle="tooltip" data-bs-placement="top" title="pdf/ word / jpg / png) - upto 4 files each 1mb">
                                                                    </div>
                                                                </div>



                                                                
                                                            </div>
                                                        </div>
                                                        <div id="contract_info" class="tab-pane" role="tabpanel">
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Main Contact First Name <span class="text-danger">*</span></label>
                                                                        <input type="text" name="contact_first_name" class="form-control" value="{{ old('contact_first_name') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Main Contact Last Name <span class="text-danger">*</span></label>
                                                                        <input type="text" name="contact_last_name" class="form-control" value="{{ old('contact_last_name') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Gender</label>
                                                                        <select class="form-control" name="contact_gender">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <option value="Male"
                                                                            @if (old('contact_gender') == "Male")
                                                                                selected 
                                                                            @endif
                                                                            >Male</option>
                                                                            <option value="Female"
                                                                            @if (old('contact_gender') == "Female")
                                                                                selected 
                                                                            @endif
                                                                            >Female</option>
                                                                            <option value="Other"
                                                                            @if (old('contact_gender') == "Other")
                                                                                selected 
                                                                            @endif
                                                                            >Other</option>
                                                                            <option value="Prefer not to say"
                                                                            @if (old('contact_gender') == "Prefer not to say")
                                                                                selected 
                                                                            @endif
                                                                            >Prefer not to say</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Nationality</label>
                                                                        <select name="contact_nationality" class="form-control select2" required>
                                                                            <option selected disabled value="">Select Nationality</option>
                                                                            @foreach($countries as $country)
                                                                                <option value="{{ $country->name }}"
                                                                                    @if (old('contact_nationality') == $country->name)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $country->name }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Email Address <span class="text-danger">*</span></label>
                                                                        <input type="text" name="contract_email_address" class="form-control" value="{{ old('contract_email_address') }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Contact Number <span class="text-danger">*</span></label>
                                                                        <input type="text" name="contract_contact_number" class="form-control" value="{{ old('contract_contact_number') }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Main Contact Identity Proof Front</label>
                                                                        <input type="file" name="contact_identity_proof_front" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Main Contact Identity Proof Back</label>
                                                                        <input type="file" name="contact_identity_proof_back" class="form-control">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div id="services_offered" class="tab-pane" role="tabpanel">
                                                            <br>
                                                            <div class="row">
                                                            
                                                                <h4>Services offered to students</h4> <br><br>
                                                                @php
                                                                    error_reporting(0);
                                                                @endphp
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Educational Counselling" value="Educational Counselling">
                                                                            <label class="form-check-label" for="Educational Counselling">Educational Counselling</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Course Selection" value="Course Selection">
                                                                            <label class="form-check-label" for="Course Selection">Course Selection</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="University Selection"  value="University Selection">
                                                                            <label class="form-check-label" for="University Selection">University Selection</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Offers & Admissions in Universities / Colleges" value="Offers & Admissions in Universities / Colleges">
                                                                            <label class="form-check-label" for="Offers & Admissions in Universities / Colleges">Offers & Admissions in Universities / Colleges</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Visa Assistance" value="Visa Assistance">
                                                                            <label class="form-check-label" for="Visa Assistance">Visa Assistance</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Scholarship Assistance"  value="Scholarship Assistance">
                                                                            <label class="form-check-label" for="Scholarship Assistance">Scholarship Assistance</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Study Abroad Loan Assistance" value="Study Abroad Loan Assistance">
                                                                            <label class="form-check-label" for="Study Abroad Loan Assistance">Study Abroad Loan Assistance</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Pre Departure and Post Arrival Services" value="Pre Departure and Post Arrival Services">
                                                                            <label class="form-check-label" for="Pre Departure and Post Arrival Services">Pre Departure and Post Arrival Services</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Airport Assistance" value="Airport Assistance">
                                                                            <label class="form-check-label" for="Airport Assistance">Airport Assistance</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Accommodation Services"  value="Accommodation Services">
                                                                            <label class="form-check-label" for="Accommodation Services">Accommodation Services</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Part Time Job Guidance"  value="Part Time Job Guidance">
                                                                            <label class="form-check-label" for="Part Time Job Guidance">Part Time Job Guidance</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Psychometric Testing" value="Psychometric Testing">
                                                                            <label class="form-check-label" for="Psychometric Testing">Psychometric Testing</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Entrance Exams- Coaching Classes"  value="Entrance Exams- Coaching Classes">
                                                                            <label class="form-check-label" for="Entrance Exams- Coaching Classes">Entrance Exams- Coaching Classes</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="English language classes" value="English language classes">
                                                                            <label class="form-check-label" for="English language classes">English language classes</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Registration for Entrance and English tests" value="Registration for Entrance and English tests">
                                                                            <label class="form-check-label" for="Registration for Entrance and English tests">Registration for Entrance and English tests</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Immigration assistance"  value="Immigration assistance">
                                                                            <label class="form-check-label" for="Immigration assistance">Immigration assistance</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Visitor Visas"  value="Visitor Visas">
                                                                            <label class="form-check-label" for="Visitor Visas">Visitor Visas</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Overseas Work permits"   value="Overseas Work permits">
                                                                            <label class="form-check-label" for="Overseas Work permits">Overseas Work permits</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                       <div class="form-check custom-checkbox ms-1">
                                                                            <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Collaboration Services to Institutions" value="Collaboration Services to Institutions">
                                                                            <label class="form-check-label" for="Collaboration Services to Institutions">Collaboration Services to Institutions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            <div class="row" id="add_space">
                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Do you charge students for any of the services ?</label>
                                                                        <select name="do_you_charge_students_for_any_of_the_services" class="form-control">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <option value="Yes">Yes</option>
                                                                            <option value="No">No</option>
                                                                          
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3" id="provide_details">
                                                                        <label class="text-label form-label">Provide details</label>
                                                                        <input name="provide_details" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="references" class="tab-pane" role="tabpanel">
                                                            <br>
                                                            <h4>Reference 1 </h4>
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">University / Institution Name</label>
                                                                        <input name="ref1_university_or_nstitution_name" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Country</label>
                                                                        <input name="ref1_country" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Contact Person</label>
                                                                        <input name="ref1_contact_person" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Designation</label>
                                                                        <input name="ref1_designation" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Email Address</label>
                                                                        <input name="ref1_email_address" class="form-control"/>
                                                                    </div>
                                                                </div>

                                                                
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Contact Number</label>
                                                                        <input name="ref1_contact_number" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Years of working relation</label>
                                                                        <input name="ref1_years_of_working_relation" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>



                                                            <br>
                                                            <h4>Reference 2 </h4>
                                                            <div class="row">
                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">University / Institution Name</label>
                                                                        <input name="ref2_university_or_nstitution_name" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Country</label>
                                                                        <input name="ref2_country" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Contact Person</label>
                                                                        <input name="ref2_contact_person" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Designation</label>
                                                                        <input name="ref2_designation" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                            </div>


                                                            <div class="row">
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Email Address</label>
                                                                        <input name="ref2_email_address" class="form-control"/>
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Contact Number</label>
                                                                        <input name="ref2_contact_number" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Years of working relation</label>
                                                                        <input name="ref2_years_of_working_relation" class="form-control"/>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>


                                                    
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input type="submit" class="btn btn-primary w-100" value="Sign Up" />
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
                            

                       


                            <center>
                                <div class="new-account  mt-3">
                                    <p>Have an account ? <a class="text-primary" href="{{ url('/login') }}">Login</a></p>
                                </div>
                                
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')


  <script src="{{ asset('backend/vendor/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <!-- Form Steps -->
    <script src="{{ asset('backend/vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend/js/dlabnav-init.js') }}"></script>
    <script src="{{ asset('backend/js/demo.js') }}"></script>
    <script>
        $(document).ready(function(){
            // SmartWizard initialize
            $('#smartwizard').smartWizard(); 
        });
    </script>



    <script type="text/javascript">
        $("#add_space").css("marginBottom", "60px");
        $("#provide_details").hide();
        $('select[name="do_you_charge_students_for_any_of_the_services"]').on('change', function(){
            var value = $(this).val();
            // alert(value);
            if(value === "Yes"){
                $("#add_space").css("marginBottom", "0px");
                $("#provide_details").show();
            }else{
                $("#add_space").css("marginBottom", "60px");
                $("#provide_details").hide();
            }
        });

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>




@endsection