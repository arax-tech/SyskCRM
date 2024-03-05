@extends('admin.layouts.app')
@section('title', 'Agent Commissions')
@section('content')
@php
    $agents000 = DB::table('users')->where('role', 'Agent')->get();
    $courses = DB::table('courses')->get();
@endphp

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Agent Commissions</h4>

                        <button class="btn btn-sm btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#CreateCommission">
                            <i class="fa fa-plus"></i>
                            <span>Create</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="CreateCommission">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Create</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/admin/commission/store') }}">
                                            @csrf
                                            
                                            <div class="row"> 
                                                
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Agent <span class="text-danger">*</span></label>
                                                        <select name="agent_id" class="form-control select2" required>
                                                            <option selected disabled value="">Select Agent</option>
                                                            @foreach($agents000 as $agents)
                                                                <option value="{{ $agents->id }}">{{ $agents->name }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Course <span class="text-danger">*</span></label>
                                                        <select name="course_id" class="form-control select2" required>
                                                            <option selected disabled value="">Select Course</option>
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->course_name }} | {{ $course->fee_and_commission_currency }} {{ $course->commission_fee }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="col-lg-12 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">From University <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="from_university" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Deducted Commision <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="deducted_commision" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Agent Commission Amount <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control" name="commission_amount" required>
                                                    </div>
                                                </div>
                                                

                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Agent Commission Status <span class="text-danger">*</span></label>
                                                        <select name="status" class="form-control" required>
                                                            <option value="Outstanding">Outstanding</option>
                                                            <option value="Paid">Paid</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">University Commission Status <span class="text-danger">*</span></label>
                                                        <select name="university_status" class="form-control" required>
                                                            <option value="Outstanding">Outstanding</option>
                                                            <option value="Paid">Paid</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="mb-3 mb-0">
                                                        <input type="submit" value="Create" class="submit btn btn-primary btn-block" >
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="example" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>Agent</strong></th>
                                        <th><strong>Course</strong></th>
                                        <th><strong>From_University</strong></th>
                                        <th><strong>Deduct_Commission</strong></th>
                                        <th><strong>Agent_Commission</strong></th>
                                        <th><strong>University_Status</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
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
                                            <td>{{ $course->fee_and_commission_currency }} {{ $commission->from_university }}</td>
                                            <td>{{ $course->fee_and_commission_currency }} {{ $commission->deducted_commision }}</td>
                                            <td>{{ $course->fee_and_commission_currency }} {{ $commission->commission_amount }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if ($commission->university_status == "Paid")
                                                            <i class="fa fa-circle text-success me-1"></i> {{ $commission->university_status }}
                                                        @else
                                                            <i class="fa fa-circle text-primary me-1"></i> {{ $commission->university_status }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        @if ($commission->status == "Paid")
                                                            <i class="fa fa-circle text-success me-1"></i> {{ $commission->status }}
                                                        @else
                                                            <i class="fa fa-circle text-primary me-1"></i> {{ $commission->status }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <a href="javascript::" class="btn btn-primary shadow btn-xs sharp me-1"   data-bs-toggle="modal" data-bs-target="#UpdateCommission{{ $commission->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ url('/admin/commission/delete/'.$commission->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                            
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="UpdateCommission{{ $commission->id }}">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('/admin/commission/update/'.$commission->id) }}">
                                                            @csrf
                                                            
                                                            <div class="row"> 
                                                                
                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Agent <span class="text-danger">*</span></label>
                                                                        <select name="agent_id" class="form-control select2" required>
                                                                            <option selected disabled value="">Select Agent</option>
                                                                            @foreach($agents000 as $ag0)
                                                                                <option value="{{ $ag0->id }}"
                                                                                    @if ($commission->agent_id == $ag0->id)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $ag0->name }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Course <span class="text-danger">*</span></label>
                                                                        <select name="course_id" class="form-control select2" required>
                                                                            <option selected disabled value="">Select Course</option>
                                                                            @foreach($courses as $course)
                                                                                <option value="{{ $course->id }}"
                                                                                    @if ($course->id == $commission->course_id)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $course->course_name }} | {{ $course->fee_and_commission_currency }} {{ $course->commission_fee }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">From University <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="from_university" value="{{ $commission->from_university }}" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Deducted Commision <span class="text-danger">*</span></label>
                                                                        <input type="number" class="form-control" name="deducted_commision" value="{{ $commission->deducted_commision }}" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Agent Commission Amount <span class="text-danger">*</span></label>
                                                                        <input type="number" class="form-control" name="commission_amount" value="{{ $commission->commission_amount }}" required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Agent Commission Status <span class="text-danger">*</span></label>
                                                                        <select name="status" class="form-control" required>
                                                                            <option value="Outstanding"
                                                                                @if ($commission->status == "Outstanding")
                                                                                    selected 
                                                                                @endif
                                                                            >Outstanding</option>
                                                                            <option value="Paid"
                                                                                @if ($commission->status == "Paid")
                                                                                    selected 
                                                                                @endif
                                                                            >Paid</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">University Commission Status <span class="text-danger">*</span></label>
                                                                        <select name="university_status" class="form-control" required>
                                                                            <option value="Outstanding"
                                                                                @if ($commission->university_status == "Outstanding")
                                                                                    selected 
                                                                                @endif
                                                                            >Outstanding</option>
                                                                            <option value="Paid"
                                                                                @if ($commission->university_status == "Paid")
                                                                                    selected 
                                                                                @endif
                                                                            >Paid</option>
                                                                            
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 mb-0">
                                                                        <input type="submit" value="Update" class="submit btn btn-primary btn-block" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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