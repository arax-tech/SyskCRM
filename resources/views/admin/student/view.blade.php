@extends('admin.layouts.app')
@section('title', 'View Student')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('backend/vendor/lightgallery/css/lightgallery.min.css') }}">
@endsection
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            
            @php
                error_reporting(0);
                $nationality = DB::table('countries')->where('id', $student->nationality)->first();
            @endphp
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="cover-photo rounded"></div>
                            </div>
                            <div class="profile-info">
                                <div class="profile-photo">
                                    @if (!empty($student->photograph))
                                        <img class="img-fluid rounded-circle" src="{{ asset('backend/student/document/'.$student->photograph) }}" />
                                    @else
                                        <img class="img-fluid rounded-circle" src="{{ asset('backend/placeholder.jpg') }}" />
                                    @endif
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h4>
                                        <p>{{ $nationality->name }}</p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <h4 class="text-muted mb-0">{{ $student->email_address }}</h4>
                                        {{-- <p>Email</p> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="row">
                        
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h2 class="card-title">Documents</h2>
                                </div>
                                <div class="card-body pb-0">
                                    <p>Click on view button to view the full document.</p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Photograph </strong>
                                            @if (!empty($student->photograph))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->photograph) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>

                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Passport </strong>
                                            @if (!empty($student->passport))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->passport) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Address Proof </strong>
                                            @if (!empty($student->address_proof))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->address_proof) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Qualifications </strong>
                                            @if (!empty($student->qualifications))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->qualifications) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Work Experience </strong>
                                            @if (!empty($student->work_experience))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->work_experience) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>CV </strong>
                                            @if (!empty($student->cv))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->cv) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Personal Statement </strong>
                                            @if (!empty($student->personal_statement))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->personal_statement) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                        <li class="list-group-item d-flex px-0 justify-content-between">
                                            <strong>Any other supporting documents </strong>
                                            @if (!empty($student->any_other_supporting_documents))
                                                <span class="mb-0"><a target="_blank" class="text-primary" href="{{ asset('/backend/student/document/'.$student->any_other_supporting_documents) }}">View</a></span>
                                            @else
                                                <span class="mb-0">Not Provided</span>
                                            @endif
                                        </li>


                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#basic-info" data-bs-toggle="tab" class="nav-link active show">Info</a></li>
                                        <li class="nav-item"><a href="#address" data-bs-toggle="tab" class="nav-link">Address</a></li>
                                        <li class="nav-item"><a href="#emergency" data-bs-toggle="tab" class="nav-link">Emergency</a></li>
                                        <li class="nav-item"><a href="#qualification" data-bs-toggle="tab" class="nav-link">Qualification</a></li>
                                        <li class="nav-item"><a href="#language" data-bs-toggle="tab" class="nav-link">Language</a></li>
                                    </ul>
                                    <div class="tab-content">

                                        <div id="basic-info" class="tab-pane fade active show">
                                            <div class="p-3 mt-4">
                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">Title</label><br>
                                                        <label class="mb-1">{{ $student->title }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">Type</label><br>
                                                        <label class="mb-1">{{ $student->type }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">first name</label><br>
                                                        <label class="mb-1">{{ $student->first_name }}</label>
                                                    </div>

                                                    
                                                </div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">middle name</label><br>
                                                        <label class="mb-1">{{ $student->middle_name }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">last name</label><br>
                                                        <label class="mb-1">{{ $student->last_name }}</label>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">date of birth</label><br>
                                                        <label class="mb-1">{{ date('d M Y', strtotime($student->date_of_birth)) }}</label>
                                                    </div>

                                                    
                                                </div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">gender</label><br>
                                                        <label class="mb-1">{{ $student->gender }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">nationality</label><br>
                                                        <label class="mb-1">{{ $nationality->name }}</label>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">passport number</label><br>
                                                        <label class="mb-1">{{ $student->passport_number }}</label>
                                                    </div>

                                                    
                                                </div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">email address</label><br>
                                                        <label class="mb-1">{{ $student->email_address }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">contact number</label><br>
                                                        <label class="mb-1">{{ $student->contact_number }}</label>
                                                    </div>
                                                    
                                                    

                                                    
                                                </div>


                                                <h3 class="mb-2 mt-5 text-center">Work Experience </h3>
                                                <div class="row mb-4 custom_bottom_border"></div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">job title</label><br>
                                                        <label class="mb-1">{{ $student->job_title ? $student->job_title : 'Not Provided' }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">company name</label><br>
                                                        <label class="mb-1">{{ $student->company_name ? $student->company_name : 'Not Provided' }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">years of experience</label><br>
                                                        <label class="mb-1">{{ $student->years_of_experience ? $student->years_of_experience : 'Not Provided' }}</label>
                                                    </div>


                                                    
                                                </div>
                                                




                                                

                                            </div>    
                                        </div>
                                        <div id="address" class="tab-pane fade">
                                            <div class="p-3 mt-4">


                                                <h3 class="mb-2 mt-3 text-center">Permanent Address</h3>
                                                <div class="row mb-4 custom_bottom_border"></div>
                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address line one</label><br>
                                                        <label class="mb-1">{{ $student->permanent_address_line_one }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address line two</label><br>
                                                        <label class="mb-1">{{ $student->permanent_address_line_two }}</label>
                                                    </div>
                                                    
                                                  

                                                    
                                                </div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address country</label><br>
                                                        <label class="mb-1">{{ $student->permanent_address_country }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address state</label><br>
                                                        <label class="mb-1">{{ $student->permanent_address_state }}</label>
                                                    </div>
                                                    
                                                  

                                                    
                                                </div>





                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address city</label><br>
                                                        <label class="mb-1">{{ $student->permanent_address_city }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address pincode</label><br>
                                                        <label class="mb-1">{{ $student->permanent_address_pincode }}</label>
                                                    </div>
                                                    
                                                  

                                                    
                                                </div>








                                                <h3 class="mb-2 mt-5 text-center">Communication Address</h3>
                                                <div class="row mb-4 custom_bottom_border"></div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address line one</label><br>
                                                        <label class="mb-1">{{ $student->communication_address_line_one }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address line two</label><br>
                                                        <label class="mb-1">{{ $student->communication_address_line_two }}</label>
                                                    </div>
                                                    
                                                  

                                                    
                                                </div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address country</label><br>
                                                        <label class="mb-1">{{ $student->communication_address_country }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address state</label><br>
                                                        <label class="mb-1">{{ $student->communication_address_state }}</label>
                                                    </div>
                                                    
                                                  

                                                    
                                                </div>





                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address city</label><br>
                                                        <label class="mb-1">{{ $student->communication_address_city }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">address pincode</label><br>
                                                        <label class="mb-1">{{ $student->communication_address_pincode }}</label>
                                                    </div>
                                                    
                                                  

                                                    
                                                </div>


                                                


                                            </div>
                                        </div>
                                        <div id="emergency" class="tab-pane fade">
                                            <div class="p-3 mt-4">
                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">contact name</label><br>
                                                        <label class="mb-1">{{ $student->emergency_contact_name }}</label>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">contact relationship</label><br>
                                                        <label class="mb-1">{{ $student->emergency_contact_relationship }}</label>
                                                    </div>

                                                    
                                                    
                                                  

                                                    
                                                </div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-6">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">contact number</label><br>
                                                        <label class="mb-1">{{ $student->emergency_contact_number }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="qualification" class="tab-pane fade">
                                            <div class="p-3 mt-4">

                                                <h3 class="mb-2 mt-3 text-center">Qualification 1</h3>
                                                <div class="row mb-4 custom_bottom_border"></div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-12">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">course title</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_course_title }}</label>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">course level</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_course_level }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">course duration</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_course_duration }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">University / Awarding Organisation</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_university_or_organisation }}</label>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">medium of education</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_medium_of_education }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">grade</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_grade }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">year of passing</label><br>
                                                        <label class="mb-1">{{ $student->qualification1_year_of_passing }}</label>
                                                    </div>
                                                    
                                                </div>








                                                <h3 class="mb-2 mt-3 text-center">Qualification 2</h3>
                                                <div class="row mb-4 custom_bottom_border"></div>


                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-12">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">course title</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_course_title ? $student->qualification2_course_title  : 'Not Provided'  }}</label>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">course level</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_course_level ? $student->qualification2_course_level  : 'Not Provided'  }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">course duration</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_course_duration ? $student->qualification2_course_duration  : 'Not Provided'  }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">University / Awarding Organisation</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_university_or_organisation ? $student->qualification2_university_or_organisation  : 'Not Provided'  }}</label>
                                                    </div>
                                                    
                                                </div>

                                                <div class="row mb-4 custom_bottom_border">
                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">medium of education</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_medium_of_education ? $student->qualification2_medium_of_education  : 'Not Provided'  }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">grade</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_grade ? $student->qualification2_grade  : 'Not Provided'  }}</label>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="mb-1 text-uppercase font-weight-bolder">year of passing</label><br>
                                                        <label class="mb-1">{{ $student->qualification2_year_of_passing ? $student->qualification2_year_of_passing  : 'Not Provided'  }}</label>
                                                    </div>
                                                    
                                                </div>


                                                
                                            </div>
                                        </div>

                                        <div id="language" class="tab-pane fade">
                                            <div class="p-3 mt-4">
                                                @if ($student->type == "international")
                                                    <div class="row mb-4 custom_bottom_border">
                                                        <div class="col-md-4">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">test name</label><br>
                                                            <label class="mb-1">{{ $student->test_name }}</label>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">over all socre</label><br>
                                                            <label class="mb-1">{{ $student->over_all_socre }}</label>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">speaking</label><br>
                                                            <label class="mb-1">{{ $student->speaking }}</label>
                                                        </div>                                                        
                                                    </div>

                                                    <div class="row mb-4 custom_bottom_border">
                                                        <div class="col-md-4">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">listening</label><br>
                                                            <label class="mb-1">{{ $student->listening }}</label>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">reading</label><br>
                                                            <label class="mb-1">{{ $student->reading }}</label>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">writing</label><br>
                                                            <label class="mb-1">{{ $student->writing }}</label>
                                                        </div>                                                        
                                                    </div>
                                                @else
                                                    <div class="row mb-4 custom_bottom_border">
                                                        <div class="col-md-12">
                                                            <label class="mb-1 text-uppercase font-weight-bolder">english level</label><br>
                                                            <label class="mb-1">{{ $student->english_level }}</label>
                                                        </div>
                                                        
                                                    </div>
                                                @endif
                                                

                                                
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">btn-close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
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
<script src="{{ asset('/backend/vendor/lightgallery/js/lightgallery-all.min.js') }}"></script>
@endsection