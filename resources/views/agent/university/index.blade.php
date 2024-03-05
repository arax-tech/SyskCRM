@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp


@extends('agent.layouts.app')
@section('title', 'Universities')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Universities</h4>
                        

                        <button class="btn btn-sm btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#CreateAgent">
                            <i class="fas fa-school"></i>
                            <span>Request Other Universities</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="CreateAgent">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Request Universities</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" id="StatusUpdateForm" action="{{ url('/agent/universities/request//') }}">
                                            @csrf
                                            
                                            <div class="row"> 
                                                <div class="col-lg-12 mb-2">
                                                    <div class="mb-3">
                                                        @php
                                                            $AllUniversities = DB::table('universities')->get();
                                                        @endphp
                                                        <label class="text-label form-label">Request Universities <span class="text-danger">*</span></label>
                                                        <select name="universities_request[]"  class="form-control select2" multiple required>

                                                            @php
                                                                error_reporting(0);
                                                                $universities_ids = auth::user()->universities;
                                                                $arrays = explode(",", $universities_ids);
                                                                
                                                                
                                                            @endphp


                                                            @foreach($AllUniversities as $university)
                                                                @if (in_array($university->id, $arrays))
                                                                @else
                                                                    <option value="{{ $university->id }}">{{ $university->name }} </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-lg-12">
                                                    <div class="mb-3 mb-0">
                                                        <input type="submit" value="Send Request" class="submit btn btn-primary btn-block">
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
                                        <th><strong>University</strong></th>
                                        <th><strong>Country</strong></th>
                                        <th><strong>State</strong></th>
                                        <th><strong>City</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($universities as $university)
                                        <tr>
                                           


                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if (!empty($university->logo))
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/university/logo/'.$university->logo) }}" />
                                                    @else
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                    @endif


                                                    <span class="w-space-no">{{ mb_strimwidth($university->name , 0, 25, "...")}}</span>
                                                </div>
                                            </td>



                                            @php
                                                error_reporting(0);
                                                $country = DB::table('countries')->where('id', $university->country)->first();
                                                $state = DB::table('states')->where('id', $university->state)->first();
                                                $city = DB::table('cities')->where('id', $university->city)->first();
                                            @endphp
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $state->name }}</td>
                                            <td>{{ $city->name }}</td>
                                            <td>{{ date('d M Y', strtotime($university->created_at)) }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ url('/agent/university/view/'.$university->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
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