@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp


@extends('agent.layouts.app')
@section('title', 'Update Applications')
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

            $course = DB::table('courses')->where('id', $application->course_id)->first();
        @endphp

        <form method="post" action="{{ url('/agent/application/update/'.$application->id) }}">
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
                                        @if ($application->student_id == $student->id)
                                            selected 
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
                                    @if ($application->campus_id == $campus->id)
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
                            <input type="text"  class="form-control" readonly id="tuition_fee" name="tuition_fee"  value="{{ $application->fee_and_commission_currency }} {{ $application->tuition_fee }}"  required>
                        </div>
                    </div>
                </div>


                <input type="hidden"  class="form-control" readonly id="commission_fee" name="commission_fee"  value="{{ $application->fee_and_commission_currency }} {{ $application->commission_fee }}"  required>

                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/course-c.png"> -->
                        <i class="bi bi-book-half selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Select Course</label>
                            <select class="form-control select2" name="course_id" required>
                                
                                @if ($application)
                                    
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
                            <input type="text"  class="form-control" readonly id="application_fee" name="application_fee"  value="{{ $application->fee_and_commission_currency }} {{ $application->application_fee }}"   required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="img-txt-box-col align-items-end">
                        <!-- <img src="assets/images/year-c.png"> -->
                        <i class="bi bi-calendar3 selct-course-icon"></i>
                        <div class="img-txt-box">
                            <label>Year</label>
                            <input type="text"  class="form-control" readonly id="year" name="year" value="{{ $application->year }}"  required>
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
                                @if ($application)
                                    @php
                                        $intake = DB::table('intakes')->where('id', $application->intake_id)->first();

                                    @endphp
                                    
                                        <option value="{{ $intake->id }}">{{ $intake->month }} {{ $intake->year }}</option>
                                    
                                @else
                                    <option selected disabled value="">Choose...</option>
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 mt-2">
                    <div style="margin:auto;display: table;">
                        <input type="submit" class="form-control srch-btn" value="Update ">
                    </div>
                </div>
            </div>

          


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