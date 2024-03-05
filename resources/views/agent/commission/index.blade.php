@extends('agent.layouts.app')
@section('title', 'Agent Commissions')
@section('content')
@php
    error_reporting(0);
    use App\Commission;

    $status = $_REQUEST['status'];

    if($status){
        $commissions = Commission::where(['status' => $status, 'agent_id' => auth::user()->id])->get();
    }else{
        $commissions = Commission::where('agent_id', auth::user()->id)->get();
    }
@endphp
<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Agent Commissions</h4>

                        
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="myExample1" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>Agent</strong></th>
                                        <th><strong>Course</strong></th>
                                        <th><strong>Tution Fee</strong></th>
                                        <th><strong>Commision</strong></th>
                                        <th><strong>Status</strong></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($commissions as $commission)
                                        @php
                                            error_reporting(0);
                                            $agent = DB::table('users')->where('id', $commission->agent_id)->first();
                                            $course = DB::table('courses')->where('id', $commission->course_id)->first();
                                            $intake = DB::table('intakes')->where('id', $application->intake_id)->first();
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if (!empty($agent->image))
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/profile/'.$agent->image) }}" />
                                                    @else
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                    @endif


                                                    <span class="w-space-no">{{ $agent->name }}</span>
                                                </div>
                                            </td>
                                            <td><a target="_blank" href="{{ url('/admin/course/view/'.$course->id) }}">{{ $course->course_name }}</a> </td>
                                            <td>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</td>
                                            <td>{{ $course->fee_and_commission_currency }} {{ $commission->commission_amount }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if ($commission->status == "Accepted")
                                                            <i class="fa fa-circle text-success me-1"></i> {{ $commission->status }}
                                                        @elseif ($commission->status == "Rejected")
                                                            <i class="fa fa-circle text-danger me-1"></i> {{ $commission->status }}
                                                        @else
                                                            <i class="fa fa-circle text-primary me-1"></i> {{ $commission->status }}
                                                        @endif
                                                    </div>
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