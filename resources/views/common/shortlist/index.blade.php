@extends('agent.layouts.app')
@section('title', 'ShortListed Courses')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<style type="text/css">
    .previous {overflow:hidden !important;}
    
    
</style>
@endsection
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">ShortListed Courses</h4>
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary float-right">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>

                      
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="myExample" class="table table-striped table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>S#</strong></th>
                                        <th><strong>Country</strong></th>
                                        <th><strong>University</strong></th>
                                        <th><strong>Campus</strong></th>
                                        <th><strong>Course</strong></th>
                                        <th><strong>Tution Fee</strong></th>
                                        <th><strong>Application fee</strong></th>
                                        <th><strong>Intake</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $key => $course)
                                        @php
                                            error_reporting();
                                            $campus = DB::table('campuses')->where('id', $course->campus_name)->first();
                                            $university = DB::table('universities')->where('id', $campus->university_id)->first();


                                            error_reporting(0);
                                            $country = DB::table('countries')->where('id', $university->country)->first();
                                            $intakes = DB::table('intakes')->where('course_id', $course->id)->get();

                                        @endphp


                                        <tr>
                                            
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $university->name }}</td>
                                            <td>{{ $campus->name }}</td>
                                            <td>{{ $course->course_name }}</td>
                                            <td>{{ $course->fee_and_commission_currency }} {{ $course->tuition_fee }}</td>
                                            <td>{{ $course->fee_and_commission_currency }} {{ $course->application_fee }}</td>
                                            <td>@foreach ($intakes as $intake){{ $intake->year }} {{ $intake->month }}, @endforeach</td>
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
@section('js')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myExample').DataTable( {
            dom: 'Bfrtip',

            buttons: [
                'copy',
                'csv',
                'excel',
                'print',
                {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4' }
            ]
        } );
    } );
</script>
@endsection