@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp


@extends('agent.layouts.app')
@section('title', 'Applications')
@section('content')

<style>
    
    .img-txt-box-col {
        display: flex;
        align-items: center;
    }
    .selct-course-icon {
        font-size: 35px;
        line-height: 1;
        color: #49b0ff;
        margin-right: 4px;
    }
    .img-txt-box {
        width: calc(100% - 55px);
    }
    .yr-slct {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da!important;
        border-radius: 2px;
    }
    .text-center {
        text-align: center !important;
    }
    .notify-title {
        color: #012970;
        margin-top: 15px;
    }
    .srch-btn {
        width: 150px;
        display: inline-block;
        border: none;
        box-shadow: none!important;
        background: #49b0ff!important;
        text-transform: uppercase;
        color: #fff!important;
        margin-left: 10px;
    }
    .a-btn {
    max-width: 210px;
    display: inline-block;
    border: none;
    box-shadow: none!important;
    background: #49b0ff!important;
    text-transform: uppercase;
    color: #fff!important;
    margin-left: 10px;
    font-size: 15px;
    line-height: 42px;
    }
    .course-reslt{
        background: #fff;
        padding: 20px;
    }
    .select2-container--default .select2-selection--single{
        background: white !important;
        border: 1px solid #ced4da!important;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        

       
        
        
        
        @php
            error_reporting(0);
            $url_campus = $_REQUEST['campus'];
            $url_course = $_REQUEST['course'];
            $url_application = $_REQUEST['application'];

            $course = DB::table('courses')->where('id', $url_course)->first();
        @endphp

        <form method="post" action="{{ url('/agent/application/store') }}">
            @csrf

            <div class="row justify-content-center">
                <!-- <div class="col-md-12">
                    <h3 class="notify-title">Manage Students</h3>
                </div> -->
                <div class="col-md-12 mb-2 text-center">
                    <h4 style="color: #49b0ff;font-size: 22px;">Select Student</h4>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col">
                        <i class="bi bi-person-fill selct-course-icon"></i>
                        <!-- <img src="assets/images/user-c.png"> -->
                        <div class="img-txt-box">
                            <!-- <label>Tution Fee</label> -->
                            <select class="form-control select2 yr-slct" name="student_id" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        @if (request()->student_id)
                                            @if (request()->student_id == $student->id)
                                                selected 
                                            @endif
                                        @endif
                                    >{{ $student->id }} | {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/user-c.png"> -->
                        <i class="la la-bank selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Select Institute / Campus</label>
                            <select class="form-control select2" name="campus_id" required>
                                <option selected disabled value="">Choose...</option>
                                @foreach ($campuses as $campus)
                                <option value="{{ $campus->id }}"
                                    @if ($url_campus == $campus->id)
                                        selected 
                                    @endif
                                >{{ $campus->name }} | {{ $campus->university_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>





                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/dolor-c.png"> -->
                        <i class="la la-dollar selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Tuition fee  </label>
                            <input type="text"  class="form-control" readonly id="tuition_fee" name="tuition_fee"  @if ($url_course) value="{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}" @endif  required>
                        </div>
                    </div>
                </div>


                <input type="hidden"  class="form-control" readonly id="commission_fee" name="commission_fee"  @if ($url_course) value="{{ $course->fee_and_commission_currency }} {{ $course->commission_fee }}" @endif  required>

                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/course-c.png"> -->
                        <i class="bi bi-book-half selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Select Course</label>
                            <select class="form-control select2" name="course_id" required>
                                
                                @if ($url_course)
                                    
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @else
                                    <option selected disabled value="">Choose...</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/dolor-c.png"> -->
                        <i class="la la-dollar selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Application Fee</label>
                            <input type="text"  class="form-control" readonly id="application_fee" name="application_fee"  @if ($url_course) value="{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}" @endif  required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/year-c.png"> -->
                        <i class="bi bi-calendar3 selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Year</label>
                            <input type="text"  class="form-control" readonly id="year" name="year" @if ($url_course) value="{{ $course->year }}" @endif required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/year-c.png"> -->
                        <i class="bi bi-calendar-check selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Choose Available Intake</label>
                            <select class="form-control select2" name="intake" required>
                                @if ($url_course)
                                    @php
                                        $intakes = DB::table('intakes')->where('course_id', $url_course)->get();

                                    @endphp
                                    @foreach ($intakes as $intake)
                                        <option value="{{ $intake->id }}">{{ $intake->month }} {{ $intake->year }}</option>
                                    @endforeach
                                @else
                                    <option selected disabled value="">Choose...</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 mt-2">
                    <div style="margin:auto;display: table;">
                        <input type="submit" class="form-control srch-btn" value="Add ">
                    </div>
                </div>
            </div>

            @if ($url_application)
            @php
                error_reporting(0);
                $application = DB::table('applications')->where('id', $url_application)->first();
                $app_student = DB::table('students')->where('id', $application->student_id)->first();
                $app_campus = DB::table('campuses')->where('id', $application->campus_id)->first();
                $app_course = DB::table('courses')->where('id', $application->course_id)->first();
                $app_intake = DB::table('intakes')->where('id', $application->intake_id)->first();
            @endphp
            <div class="row mt-4 justify-content-center">
                <div class="col-md-12 text-center">
                    <h4 class="notify-title" style="color: #49b0ff;font-size: 22px;">Selected Student</h4>
                </div>
                <div class="col-lg-5 col-md-8 mb-4 mt-3">
                    <div class="img-txt-box-col">
                        <i class="bi bi-person-fill selct-course-icon"></i>
                        <div class="img-txt-box">
                            <h4 class="selct-txt">{{ $app_student->id }} | {{ $app_student->first_name }} {{ $app_student->middle_name }} {{ $app_student->last_name }}  | {{ $app_student->email_address }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="course-reslt">
                        <div class="course-detl">
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <div class="img-txt-box-col align-items-end">
                                        <i class="la la-bank selct-course-icon"></i>
                                        <div class="img-txt-box">
                                            <label>Select Institute / Campus</label>
                                            <h4 class="selct-txt" id="selectedCampus">{{ $app_campus->name }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="img-txt-box-col align-items-end">
                                        <i class="la la-dollar selct-course-icon"></i>
                                        <div class="img-txt-box">
                                            <label>Tuition fee </label>
                                            <h4 class="selct-txt">{{ $application->tuition_fee  }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <div class="img-txt-box-col align-items-end">
                                        <i class="bi bi-book-half selct-course-icon"></i>
                                        <div class="img-txt-box">
                                            <label>Select Course</label>
                                            <h4 class="selct-txt">{{ $app_course->course_name  }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="img-txt-box-col align-items-end">
                                        <i class="la la-dollar selct-course-icon"></i>
                                        <div class="img-txt-box">
                                            <label>Application Fee</label>
                                            <h4 class="selct-txt">{{ $application->application_fee  }}</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <div class="img-txt-box-col align-items-end">
                                        <i class="bi bi-calendar3 selct-course-icon"></i>
                                        <div class="img-txt-box">
                                            <label>Select Year</label>
                                            <h4 class="selct-txt">{{ $application->year }}</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="img-txt-box-col align-items-end">
                                        <i class="bi bi-calendar-check selct-course-icon"></i>
                                        <div class="img-txt-box">
                                            <label>Choose Available Intake</label>
                                            <h4 class="selct-txt">{{ $app_intake->month  }} {{ $app_intake->year }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row mb-3">
                            <div class="col-md-12">
                                <div style="text-align: center;">
                                    <p><b style="color: red;">Documents Required:</b> <span>Consoliated Marksheet</span></p>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <div style="text-align: center;margin-bottom: 15px;margin-top:20px;">
                                    <a href="javascript::" class="form-control a-btn mb-2 clickInfo" style="text-align: center;text-decoration: none;">Pay & Submit</a>
                                    <a href="{{ url('/agent/application/redirect') }}" class="form-control a-btn" style="text-align: center;text-decoration: none;">Pay Later & Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </form>
        
        
        
    </div>
</div>



@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        

        $('.clickInfo').on('click', function(){
            tata.info('Info...', 'This functionality yet to come', {
              position: 'tr',
              duration: 10000,
              animate: 'slide'
            })
        });

     


        



        $('select[name="campus_id"]').on('change', function(){
            var campus_id = $(this).val();
            // alert(campus_id);
            var uri = "{{ url('agent/application/getCourses') }}" +'/'+ campus_id;
                
            if(campus_id != null)
            {
                $.ajax({
                    url: uri,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data){
                        
                        $('select[name="course_id"]').html('<option value="">Select Course</option>');
                        $.each(data, function(key, value){
                            $('select[name="course_id"]')
                                .append('<option value="'+key+'">'+ value +'</option>');
                        });
                    }
                });
            }
            

        });




        $('select[name="course_id"]').on('change', function(){
            var course_id = $(this).val();
            // alert(course_id);
            var uri = "{{ url('agent/application/getCourseDetail') }}" +'/'+ course_id;
                
            if(course_id != null)
            {
                $.ajax({
                    url: uri,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response){
                        // console.log(response);
                        $("#year").val(response[0]['year']);
                        $("#tuition_fee").val(response[0]['fee_and_commission_currency']+' '+response[0]['tuition_fee']);
                        $("#application_fee").val(response[0]['fee_and_commission_currency']+' '+response[0]['application_fee']);
                        $("#commission_fee").val(response[0]['fee_and_commission_currency']+' '+response[0]['commission_fee']);



                        $('select[name="intake"]').html('<option value="">Select Intake</option>');
                        $.each(response[1], function(key, value){
                            $('select[name="intake"]')
                                .append('<option value="'+value['id']+'">'+ value['month'] +' '+ value['year'] +'</option>');
                        });


                    }
                });
            }
            

        });

    });
</script>
@endsection