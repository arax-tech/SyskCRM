@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('agent.layouts.app')
@section('title', 'Agents')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Agents</h4>
                        @if (in_array("AgentCreate", $permission))
                            <a class="btn btn-sm btn-primary float-right"  href="{{ url('/agent/agent/create') }}">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </a>
                        @endif

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="myExample1" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        <th><strong>Agent</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>Designation</strong></th>
                                        <th><strong>Registerd</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $agent)
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



                                           
                                            <td>{{ $agent->email }}</td>
                                            <td>{{ $agent->designation }}</td>
                                            <td>{{ date('d M Y', strtotime($agent->created_at)) }}</td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($agent->status == 1)
                                                        <i class="fa fa-circle text-success me-1"></i> Active
                                                    @else
                                                        <i class="fa fa-circle text-danger me-1"></i> InActive
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    
                                                    @if (in_array("AgentUpdate", $permission))
                                                        <a href="{{ url('/agent/agent/edit/'.$agent->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    
                                                    @if (in_array("AgentDelete", $permission))
                                                        <a href="{{ url('/agent/agent/delete/'.$agent->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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