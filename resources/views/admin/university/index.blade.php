@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp


@extends('admin.layouts.app')
@section('title', 'Universities')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Universities</h4>
                        @if (in_array("UniversityCreate", $permission))
                            <a class="btn btn-sm btn-primary float-right"  href="{{ url('/admin/university/create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </a>
                        @endif
                        
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
                                            @endphp
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $state->name }}</td>
                                            <td>{{ $university->city }}</td>
                                            <td>{{ date('d M Y', strtotime($university->created_at)) }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("UniversityUpdate", $permission))
                                                        <a href="{{ url('/admin/university/edit/'.$university->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    <a href="{{ url('/admin/university/view/'.$university->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    @if (in_array("UniversityDelete", $permission))
                                                        <a href="{{ url('/admin/university/delete/'.$university->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    @endif
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