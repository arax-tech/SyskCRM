@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('admin.layouts.app')
@section('title', 'Campuses')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Campuses</h4>
                        @if (in_array("CampusCreate", $permission))
                            <a class="btn btn-sm btn-primary float-right"  href="{{ url('/admin/campus/create') }}">
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
                                        <th><strong>Campus</strong></th>
                                        <th><strong>Country</strong></th>
                                        <th><strong>State</strong></th>
                                        <th><strong>City</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campuses as $campus)
                                        <tr>
                                           


                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if (!empty($campus->logo))
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/university/campus/logo/'.$campus->logo) }}" />
                                                    @else
                                                        <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                    @endif


                                                    <span class="w-space-no">{{ $campus->name }}</span>
                                                </div>
                                            </td>



                                            @php
                                                error_reporting(0);
                                                $country = DB::table('countries')->where('id', $campus->country)->first();
                                                $state = DB::table('states')->where('id', $campus->state)->first();
                                                $city = DB::table('cities')->where('id', $campus->city)->first();
                                            @endphp
                                            <td>{{ $country->name }}</td>
                                            <td>{{ $state->name }}</td>
                                            <td>{{ $city->name }}</td>
                                            <td>{{ date('d M Y', strtotime($campus->created_at)) }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("CampusUpdate", $permission))
                                                        <a href="{{ url('/admin/campus/edit/'.$campus->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    <a href="{{ url('/admin/campus/view/'.$campus->id) }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    @if (in_array("CampusDelete", $permission))
                                                        <a href="{{ url('/admin/campus/delete/'.$campus->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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