@php
    error_reporting(0);
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
    
    use App\Application;

    $status = $_REQUEST['status'];
    $payment_status = $_REQUEST['payment_status'];

    if($status){
        $applications = Application::where(['status' => $status])->get();
    }elseif($payment_status){
        $applications = Application::where(['payment_status' => $payment_status])->get();
    }else{
        $applications = Application::get();
    }

@endphp

@extends('admin.layouts.app')
@section('title', 'Course preference ')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Course preference </h4>
                    
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
                                                    @if (in_array("ApplicationUpdate", $permission))
                                                        <a href="javascript::" class="btn btn-primary shadow btn-xs sharp me-1"  data-bs-toggle="modal" data-bs-target="#UpdateApplication{{ $application->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    <a href="{{ url('/admin/application/view/'.$application->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    @if (in_array("ApplicationDelete", $permission))
                                                        <a href="{{ url('/admin/application/delete/'.$application->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="UpdateApplication{{ $application->id }}">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('/admin/application/update/'.$application->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class="row"> 
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Status <span class="text-danger">*</span></label>
                                                                        <select class="form-control select2" name="status" required>
                                                                            <option value="">Select Status</option>
                                                                            <option value="Pending"
                                                                            @if ($application->status == "Pending")
                                                                                selected 
                                                                            @endif
                                                                            >Pending</option>

                                                                            <option value="Accepted"
                                                                            @if ($application->status == "Accepted")
                                                                                selected 
                                                                            @endif
                                                                            >Accepted</option>

                                                                            <option value="Rejected"
                                                                            @if ($application->status == "Rejected")
                                                                                selected 
                                                                            @endif
                                                                            >Rejected</option>


                                                                        </select>
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Payment Status <span class="text-danger">*</span></label>
                                                                        <select class="form-control select2" name="payment_status" required>
                                                                            <option value="">Select Status</option>
                                                                            <option value="Paid"
                                                                            @if ($application->payment_status == "Paid")
                                                                                selected 
                                                                            @endif
                                                                            >Paid</option>

                                                                            <option value="UnPaid"
                                                                            @if ($application->payment_status == "UnPaid")
                                                                                selected 
                                                                            @endif
                                                                            >UnPaid</option>

                                                                            


                                                                        </select>
                                                                    </div>
                                                                </div>


                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Document</label>
                                                                        <input type="file" class="form-control" name="document"/>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Remarks</label>
                                                                        <textarea class="form-control" style="height: 80px !important" name="remarks">{{ $application->remarks }}</textarea>
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
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        

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