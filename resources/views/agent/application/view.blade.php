@extends('agent.layouts.app')
@section('title', 'Application Detail')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        @php
            error_reporting(0);
            
            $student = DB::table('students')->where('id', $application->student_id)->first();
            $campus = DB::table('campuses')->where('id', $application->campus_id)->first();
            $university = DB::table('universities')->where('id', $campus->university_id)->first();
            $course = DB::table('courses')->where('id', $application->course_id)->first();
            $intake = DB::table('intakes')->where('id', $application->intake_id)->first();


            error_reporting(0);
            $country = DB::table('countries')->where('id', $university->country)->first();
            $state = DB::table('states')->where('id', $university->state)->first();
            $city = DB::table('cities')->where('id', $university->city)->first();

        @endphp
        <div class="row">
            
          
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Application Detail</h4>
                        <a class="btn btn-sm btn-primary float-right" href="{{ url('agent/application/') }}">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                        
                    </div>

                   
                    <div class="card-body">

                        
                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Student Name</label><br>
                                <label class="mb-1">{{ $student->first_name }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">University Name</label><br>
                                <label class="mb-1">{{ $university->name }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Campus Name</label><br>
                                <label class="mb-1">{{ $campus->name }}</label>
                            </div>

                            
                        </div>

                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Course Name</label><br>
                                <label class="mb-1">{{ $course->course_name }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">Intake</label><br>
                                <label class="mb-1">{{ $intake->month }} {{ $intake->year }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">year</label><br>
                                <label class="mb-1">{{ $application->year }}</label>
                            </div>
                        </div>



                        <div class="row mb-4 custom_bottom_border">
                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">tuition fee</label><br>
                                <label class="mb-1">{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</label>
                            </div>


                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">application fee</label><br>
                                <label class="mb-1">{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}</label>
                            </div>

                            <div class="col-md-4">
                                <label class="mb-1 text-uppercase font-weight-bolder">commission fee</label><br>
                                <label class="mb-1">{{ $course->fee_and_commission_currency }} {{ $course->commission_fee }}</label>
                            </div>
                        </div>



                        <div class="row mb-4 ">
                            <div class="col-md-3">
                                <a target="_blank" href="{{ url('agent/student/view/'.$student->id) }}" class="btn btn-primary">View Student</a>
                            </div>


                            <div class="col-md-3">
                                <a target="_blank" href="{{ url('agent/course/view/'.$course->id) }}" class="btn btn-primary">View Course</a>
                            </div>

                            <div class="col-md-3">
                                <a target="_blank" href="{{ url('agent/campus/view/'.$campus->id) }}" class="btn btn-primary">View Course</a>
                            </div>

                            <div class="col-md-3">
                                <a target="_blank" href="{{ url('agent/university/view/'.$university->id) }}" class="btn btn-primary">View University</a>
                            </div>

                            
                        </div>


                    </div>
                </div>
            </div>


            
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            
                            <div class="col-xl-12 col-xxl-12">
                                <div class="d-flex justify-content-between align-items-center border-bottom px-4 pt-4 flex-wrap">
                                    <div class="d-flex align-items-center pb-3">
                                        <div class="fillow-design">
                                            {{-- <a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a> --}}
                                            @if (!empty(auth::user()->image))
                                                <img class="rounded-circle me-2" width="50" src="{{ asset('backend/profile/'.auth::user()->image) }}" />
                                            @else
                                                <img class="rounded-circle me-2" width="50" src="{{ asset('backend/placeholder.jpg') }}" />
                                            @endif
                                        </div>
                                        <div class="ms-3">
                                            <h4 style="margin-bottom: -3px !important" class="fs-20 font-w700">{{ auth::user()->name }}</h4>
                                            <span>Start conversation regarding this application...</span>
                                        </div>
                                    </div>
                                </div>  
                                @php
                                    error_reporting(0);
                                    $comments = DB::table('comments')->where('application_id', $application->id)->get();
                                @endphp
                                <div class="chat-box-area dlab-scroll chat-box-area" id="chatArea">
                                    <div class="chat-box-area dz-scroll" id="chartBox">

                                        @foreach ($comments as $comment)
                                            @php
                                                error_reporting(0);
                                                $userInfo = DB::table('users')->where('id', $comment->user_id)->first();
                                            @endphp


                                            @if (auth::user()->id ==  $comment->user_id)
                                                <div class="media mb-4 justify-content-end align-items-end">
                                                    <div class="message-sent">
                                                        <h4>{{ $userInfo->name }} | <span style="font-weight: 100 !important">{{ $userInfo->designation }}</span></h4>
                                                        <p class="mb-1">{{ $comment->comment }}</p>
                                                        <span class="fs-12">{{ date('d M Y, h:i A', strtotime($comment->created_at)) }}</span>
                                                    </div>
                                                    <div class="image-box ms-sm-4 ms-2 mb-4">
                                                        @if (!empty($userInfo->image))
                                                            <img class="rounded-circle img-1" src="{{ asset('backend/profile/'.$userInfo->image) }}" />
                                                        @else
                                                            <img class="rounded-circle img-1" src="{{ asset('backend/placeholder.jpg') }}" />
                                                        @endif
                                                    </div>
                                                </div>

                                            @else
                                                <div class="media my-4  justify-content-start align-items-start">
                                                    <div class="image-box me-sm-4 me-2">
                                                        @if (!empty($userInfo->image))
                                                            <img class="rounded-circle img-1" src="{{ asset('backend/profile/'.$userInfo->image) }}" />
                                                        @else
                                                            <img class="rounded-circle img-1" src="{{ asset('backend/placeholder.jpg') }}" />
                                                        @endif
                                                    </div>
                                                    <div class="message-received">
                                                        <h4>{{ $userInfo->name }} | <span style="font-weight: 100 !important">{{ $userInfo->designation }}</span></h4>
                                                        <p class="mb-1">{{ $comment->comment }}</p>
                                                        <span class="fs-12">{{ date('d M Y, h:i A', strtotime($comment->created_at)) }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        
                                        @endforeach



                                    </div>
                                </div>
                                <div class="card-footer border-0 type-massage">
                                    <form method="post" action="{{ url('/comment') }}">
                                        @csrf
                                        
                                        <div class="input-group">
                                            <textarea class="form-control" rows="3" placeholder="Start typeing..." name="comment" required></textarea>
                                            <input type="hidden" name="application_id" value="{{ $application->id }}">
                                        </div>
                                        <div class="input-group-append d-flex justify-content-between flex-wrap">
                                            <div></div>
                                            <div>
                                                <button type="submit" class="btn btn-primary rounded text-white"><i class="far fa-paper-plane me-2"></i>Send</button>
                                            </div>  
                                        </div>
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
@endsection