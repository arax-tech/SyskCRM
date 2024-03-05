@extends('agent.layouts.app')
@section('title', 'Profile')
@php
    error_reporting(0);
@endphp
@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper p-3">
        
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <div class="row">
                <div class="col-md-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header bg-light mb-1">Profile Picture</div>
                        <div class="card-body text-center">
                            @if (!empty(auth::user()->image))
                                <img class="w-75 rounded-circle mb-2" src="{{ asset('/backend/profile/'.auth::user()->image) }}" />
                            @else
                                <img class="w-75 rounded-circle mb-2" src="{{ asset('/backend/placeholder.jpg') }}" />
                            @endif



                            <!-- Profile picture help block-->
                            <div class="small font-italic font-bolder">{{ auth::user()->name }}</div>
                            <div class="small font-italic text-muted">{{ auth::user()->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header bg-light mb-1">Update Profile</div>
                        <div class="card-body">

                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#basic-info" data-bs-toggle="tab" class="nav-link active show">Profile</a></li>
                                        <li class="nav-item"><a href="#bank-info" data-bs-toggle="tab" class="nav-link">Banking Information</a></li>
                                        <li class="nav-item"><a href="#services" data-bs-toggle="tab" class="nav-link">Services</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <div id="basic-info" class="tab-pane fade active show">
                                            <div class="p-3 mt-4">
                                                <form method="post" action="{{ url(strtolower(auth::user()->role).'/profile') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row gx-3 mb-1">
                                                        <div class="col-md-12">
                                                            <label>Name</label>
                                                            <input class="form-control" type="text" name="name" value="{{ auth::user()->name }}" required autofocus />
                                                        </div>
                                                    
                                                     

                                                       
                                                    </div>

                                                    <div class="row gx-3 mb-1">
                                                       
                                                        <div class="col-md-12">
                                                            <label>Email</label>
                                                            <input class="form-control" type="email" name="email" value="{{ auth::user()->email }}" required />
                                                        </div>

                                                       
                                                    </div>


                                                   

                                                   
                                                    
                                                   
                                                    <div class="row gx-3 mb-1">
                                                        <div class="col-md-12">
                                                            <label>Profile Image</label>
                                                            <input class="form-control" type="file" name="profile" />
                                                        </div>
                                                    </div>
                                                    


                                                   
                                                    <button class="btn btn-primary w-100 mt-1" type="submit">Update Profile</button>
                                                </form>
                                            </div>    
                                        </div>
                                        <div id="bank-info" class="tab-pane fade ">
                                            <div class="p-3 mt-4">
                                                <form method="post" action="{{ url('/agent/bank-info') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row gx-3 mb-1">
                                                        <div class="col-md-6">
                                                            <label>Bank Name</label>
                                                            <input class="form-control" type="text" name="bank_name" value="{{ auth::user()->bank_name }}" required autofocus />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Bank Address</label>
                                                            <input class="form-control" type="text" name="bank_address" value="{{ auth::user()->bank_address }}" required />
                                                        </div>
                                                    
                                                     

                                                       
                                                    </div>

                                                    <div class="row gx-3 mb-1">
                                                       
                                                        <div class="col-md-6">
                                                            <label>Institution Number</label>
                                                            <input class="form-control" type="text" name="institution_number" value="{{ auth::user()->institution_number }}" required />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Transit Number</label>
                                                            <input class="form-control" type="text" name="transit_number" value="{{ auth::user()->transit_number }}" required />
                                                        </div>

                                                       
                                                    </div>


                                                   

                                                   
                                                    
                                                   
                                                    <div class="row gx-3 mb-1">
                                                        <div class="col-md-6">
                                                            <label>Account Number </label>
                                                            <input class="form-control" type="text" name="account_number" value="{{ auth::user()->account_number }}" required />
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label>Swift Code </label>
                                                            <input class="form-control" type="text" name="swift_code" value="{{ auth::user()->swift_code }}" required />
                                                        </div>
                                                    </div>


                                                    <div class="row gx-3 mb-1">
                                                        <div class="col-md-12">
                                                            <label>Comments </label>
                                                            <input class="form-control" type="text" name="comments" value="{{ auth::user()->comments }}" required />
                                                        </div>

                                                        
                                                    </div>
                                                    


                                                   
                                                    <button class="btn btn-primary w-100 mt-1" type="submit">Update</button>
                                                </form>
                                            </div>    
                                        </div>


                                        <div id="services" class="tab-pane fade ">
                                            <div class="p-3 mt-4">
                                                <form method="post" action="{{ url('/agent/services') }}">
                                                    @csrf
                                                    


                                                    <div class="row">
                                                    
                                                        <h4>Services offered to students</h4> <br><br>
                                                        @php
                                                            error_reporting(0);
                                                            $services = explode(",", auth::user()->services_offered_to_students);
                                                        @endphp
                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Educational Counselling" value="Educational Counselling" @if (in_array("Educational Counselling", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Educational Counselling">Educational Counselling</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Course Selection" value="Course Selection" @if (in_array("Course Selection", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Course Selection">Course Selection</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="University Selection"  value="University Selection" @if (in_array("University Selection", $services)) checked @endif>
                                                                    <label class="form-check-label" for="University Selection">University Selection</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Offers & Admissions in Universities / Colleges" value="Offers & Admissions in Universities / Colleges" @if (in_array("Offers & Admissions in Universities / Colleges", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Offers & Admissions in Universities / Colleges">Offers & Admissions in Universities / Colleges</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Visa Assistance" value="Visa Assistance" @if (in_array("Visa Assistance", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Visa Assistance">Visa Assistance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Scholarship Assistance"  value="Scholarship Assistance" @if (in_array("Scholarship Assistance", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Scholarship Assistance">Scholarship Assistance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Study Abroad Loan Assistance" value="Study Abroad Loan Assistance" @if (in_array("Study Abroad Loan Assistance", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Study Abroad Loan Assistance">Study Abroad Loan Assistance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Pre Departure and Post Arrival Services" value="Pre Departure and Post Arrival Services" @if (in_array("Pre Departure and Post Arrival Services", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Pre Departure and Post Arrival Services">Pre Departure and Post Arrival Services</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Airport Assistance" value="Airport Assistance" @if (in_array("Airport Assistance", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Airport Assistance">Airport Assistance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Accommodation Services"  value="Accommodation Services" @if (in_array("Accommodation Services", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Accommodation Services">Accommodation Services</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Part Time Job Guidance"  value="Part Time Job Guidance" @if (in_array("Part Time Job Guidance", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Part Time Job Guidance">Part Time Job Guidance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Psychometric Testing" value="Psychometric Testing" @if (in_array("Psychometric Testing", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Psychometric Testing">Psychometric Testing</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Entrance Exams- Coaching Classes"  value="Entrance Exams- Coaching Classes" @if (in_array("Entrance Exams- Coaching Classes", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Entrance Exams- Coaching Classes">Entrance Exams- Coaching Classes</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="English language classes" value="English language classes" @if (in_array("English language classes", $services)) checked @endif>
                                                                    <label class="form-check-label" for="English language classes">English language classes</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Registration for Entrance and English tests" value="Registration for Entrance and English tests" @if (in_array("Registration for Entrance and English tests", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Registration for Entrance and English tests">Registration for Entrance and English tests</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Immigration assistance"  value="Immigration assistance" @if (in_array("Immigration assistance", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Immigration assistance">Immigration assistance</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Visitor Visas"  value="Visitor Visas" @if (in_array("Visitor Visas", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Visitor Visas">Visitor Visas</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Overseas Work permits"   value="Overseas Work permits" @if (in_array("Overseas Work permits", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Overseas Work permits">Overseas Work permits</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 mb-2">
                                                            <div class="mb-3">
                                                               <div class="form-check custom-checkbox ms-1">
                                                                    <input type="checkbox" class="form-check-input" name="services_offered_to_students[]"  id="Collaboration Services to Institutions" value="Collaboration Services to Institutions" @if (in_array("Collaboration Services to Institutions", $services)) checked @endif>
                                                                    <label class="form-check-label" for="Collaboration Services to Institutions">Collaboration Services to Institutions</label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                  


                                                   
                                                    <button class="btn btn-primary w-100 mt-1" type="submit">Update</button>
                                                </form>
                                            </div>    
                                        </div>
                                     

                                    </div>
                                </div>
                                
                            </div>


                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
@endsection
