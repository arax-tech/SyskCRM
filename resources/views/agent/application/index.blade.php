@php
    error_reporting(0);
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
    
    use App\Application;

    $status = $_REQUEST['status'];
    $payment_status = $_REQUEST['payment_status'];

    if($status){
        $applications = Application::where(['status' => $status, 'agent_id' => auth::user()->id])->get();
    }elseif($payment_status){
        $applications = Application::where(['payment_status' => $payment_status, 'agent_id' => auth::user()->id])->get();
    }else{
        $applications = Application::where('agent_id', auth::user()->id)->get();
    }

@endphp


@extends('agent.layouts.app')
@section('title', 'Course preference ')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Course preference </h4>
                        
                        @if (in_array("ApplicationCreate", $permission))

                            <a href="{{ url('/agent/application/create') }}" class="btn btn-sm btn-primary float-right">
                                <i class="fa fa-plus"></i>
                                <span>Apply</span>
                            </a>
                        @endif
                    
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="myExample1" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>ID</strong></th>
                                        <th><strong>Student</strong></th>
                                        <th><strong>Course</strong></th>
                                        <th><strong>Intake</strong></th>
                                        <th><strong>University</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Payment</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($applications as $application)
                                        @php
                                            error_reporting(0);
                                            $student = DB::table('students')->where('id', $application->student_id)->first();
                                            $course = DB::table('courses')->where('id', $application->course_id)->first();
                                            $intake = DB::table('intakes')->where('id', $application->intake_id)->first();

                                            $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                            $university = DB::table('universities')->where('id', $campus->university_id)->first();

                                        @endphp
                                        <tr>
                                            
                                            <td>{{ $application->id }} </td>
                                            <td>{{ $student->first_name }} {{ $student->last_name }} </td>
                                            <td>{{ $course->course_name }} </td>
                                            <td>{{ $intake->month }} {{ $intake->year }} </td>
                                            <td>{{ $university->name }} </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($application->status == "Accepted")
                                                        <i class="fa fa-circle text-success me-1"></i> {{ $application->status }}
                                                    @elseif ($application->status == "Rejected")
                                                        <i class="fa fa-circle text-danger me-1"></i> {{ $application->status }}
                                                    @else
                                                        <i class="fa fa-circle text-primary me-1"></i> {{ $application->status }}
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($application->payment_status == "Paid")
                                                        <i class="fa fa-circle text-success me-1"></i> {{ $application->payment_status }}
                                                    
                                                    @else
                                                        <i class="fa fa-circle text-danger me-1"></i> {{ $application->payment_status }}
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    
                                                    <a href="{{ url('/agent/application/view/'.$application->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>

                                                    <a href="{{ url('/agent/application/edit/'.$application->id) }}" class="btn btn-primary shadow btn-xs sharp me-1" ><i class="fas fa-pencil-alt"></i></a>
                                                    
                                                </div>
                                            </td>
                                        </tr>


                       

                                       
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
       
        </div>
    </div>
</div>


@endsection

