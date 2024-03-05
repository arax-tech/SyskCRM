@extends('admin.layouts.app')
@section('title', 'Agents')
@section('content')
@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp
<div class="content-body">
    <div class="container-fluid">
        
        @php
            error_reporting(0);
            $type = $_REQUEST['type'];
            if ($type == "agents") {
                $agents = DB::table('users')->where('role', 'Agent')->whereNull('agent_id')->get();
            }elseif ($type == "sub-agents"){
                $agents = DB::table('users')->where('role', 'Agent')->whereNotNull('agent_id')->get();
            }else{
                $agents = DB::table('agents')->where('status', 0)->get();
            }

            
        @endphp
        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Agents</h4>




                    </div>
                    <div class="card-body">

                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-4">
                                            
                                            <a href="{{ url(strtolower(auth::user()->role.'/agents?type=agents')) }}">
                                                <div class="card shadow {{ $_REQUEST['type'] == "agents" ? 'bg-primary' : '' }}">
                                                    <div class="card-body d-flex justify-content-center align-items-center" style="padding: 10px !important">
                                                        <h4 class="fs-10 font-w600 text-nowrap {{ $_REQUEST['type'] == "agents" ? 'text-white' : '' }}">Agents </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="col-xl-4 col-sm-4">
                                            
                                            <a href="{{ url(strtolower(auth::user()->role.'/agents?type=sub-agents')) }}">
                                                <div class="card shadow {{ $_REQUEST['type'] == "sub-agents" ? 'bg-primary' : '' }}">
                                                    <div class="card-body d-flex justify-content-center align-items-center" style="padding: 10px !important">
                                                        <h4 class="fs-10 font-w600 text-nowrap {{ $_REQUEST['type'] == "sub-agents" ? 'text-white' : '' }}">Sub Agents </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                       

                                        <div class="col-xl-4 col-sm-4">
                                            
                                            <a href="{{ url(strtolower(auth::user()->role.'/agents?type=new-agents')) }}">
                                                <div class="card shadow {{ $_REQUEST['type'] == "new-agents" ? 'bg-primary' : '' }}">
                                                    <div class="card-body d-flex justify-content-center align-items-center" style="padding: 10px !important">
                                                        <h4 class="fs-10 font-w600 text-nowrap {{ $_REQUEST['type'] == "new-agents" ? 'text-white' : '' }}">Agents Requests 
                                                            <span class="badge badge-primary">{{ DB::table("agents")->where('status', 0)->count() }}</span>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                
                                        
                                    </div>
                                    
                                </div>
                           

                                
                            </div>
                        </div>


                        <div class="table-responsive">
                            <table  id="example" class="table table-striped table-responsive-md">
                                <thead class="thead-primary">
                                    <tr>
                                        @if ($type == "sub-agents") 
                                            <th><strong>Creator</strong></th>
                                        @endif
                                        @if ($type == "new-agents")
                                            <th><strong>Company Name</strong></th>
                                        @else
                                            <th><strong>Name</strong></th>
                                        @endif
                                        
                                        <th><strong>Email</strong></th>
                                        @if ($type != "new-agents")
                                        <th><strong>Designation</strong></th>
                                        @endif
                                        @if ($type == "new-agents")
                                        <th><strong>Country</strong></th>
                                        @endif
                                        <th><strong>Registered</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agents as $agent)

                                        <tr>

                                            @if ($type == "sub-agents") 
                                                @php
                                                    error_reporting(0);
                                                    $creator = DB::table('users')->where('id', $agent->agent_id)->first();
                                                @endphp
                                                <td>
                                                    <div class="d-flex align-items-center">

                                                        @if (!empty($creator->image))
                                                            <img class="rounded-lg me-2" width="24" src="{{ asset('backend/profile/'.$creator->image) }}" />
                                                        @else
                                                            <img class="rounded-lg me-2" width="24" src="{{ asset('backend/placeholder.jpg') }}" />
                                                        @endif


                                                        <span class="w-space-no">{{ $creator->name }}</span>
                                                    </div>
                                                </td>
                                            @endif


                                            @if ($type == "new-agents")
                                                <td>{{ $agent->agent_company_name }}</td>
                                            @else
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
                                            @endif
                                            
                                            <td>{{ $agent->email }}</td>
                                            @if ($type != "new-agents")
                                            <td>{{ $agent->designation }}</td>
                                            @endif
                                            @if ($type == "new-agents")
                                            <td>{{ $agent->country }}</td>
                                            @endif
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
                                                    @if ($type == "new-agents")

                                                        @if (in_array("AgentUpdate", $permission))
                                                            <a href="javascript::"  data-bs-toggle="modal" data-bs-target="#UpdateAgent{{ $agent->id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        @endif
                                                    @endif
                                                    @if ($type != "new-agents")
                                                    <a href="{{ url('/admin/agent/view/'.$agent->id) }}" class="btn btn-info shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                    @endif

                                                    @if ($type == "new-agents")
                                                        @if (in_array("AgentDelete", $permission))
                                                            <a onclick="return confirm('Are you sure to delete ?')" href="{{ url(strtolower(auth::user()->role.'/agent/delete/'.$agent->id)) }}"" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                        @endif
                                                    @else
                                                        
                                                        <a href="javascript::"  data-bs-toggle="modal" data-bs-target="#UpdateAgentInfo{{ $agent->id }}" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>

                                                        <a href="javascript::"  data-bs-toggle="modal" data-bs-target="#UpdateAgentUniversity{{ $agent->id }}" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-school"></i></a>

                                                        @if (in_array("AgentDelete", $permission))
                                                            <a onclick="return confirm('Are you sure to delete ?')" href="{{ url(strtolower(auth::user()->role.'/agent/delete/'.$agent->id)) }}"" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                        @endif
                                                    @endif



                                                    
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="UpdateAgentInfo{{ $agent->id }}">
                                            <div class="modal-dialog  modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('/admin/agent/update/'.$agent->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class="row">
                                                                

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Name <span class="text-danger">*</span></label>
                                                                        <input type="text" name="name" value="{{ $agent->name }}" class="form-control" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Email <span class="text-danger">*</span></label>
                                                                        <input type="text" name="email" value="{{ $agent->email }}" class="form-control" required="">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Password <span class="text-danger">*</span></label>
                                                                        <div class="input-group">
                                                                            <input type="text" name="password" id="PasswordInput" class="form-control w-75" data-bs-toggle="tooltip" data-bs-placement="top" title="If you want to update password then enter new password othereise leave this field blank...">
                                                                            <button type="button" class="form-control w-24" id="PasswordViewBtn"><i class="fa fa-eye"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Status</label>
                                                                        <select name="status" class="form-control" required>
                                                                            <option value="1"
                                                                            @if ($agent->status == "1")
                                                                                selected 
                                                                            @endif
                                                                            >Active</option>
                                                                            <option value="0"
                                                                            @if ($agent->status == "0")
                                                                                selected 
                                                                            @endif
                                                                            >InActive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-10 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Profile</label>
                                                                        <input type="file" name="profile" class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-2 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Old</label> <br>
                                                                        @if (!empty($agent->image))
                                                                            <img class="me-2" width="40" src="{{ asset('backend/profile/'.$agent->image) }}" />
                                                                        @else
                                                                            <img class="me-2" width="40" src="{{ asset('backend/placeholder.jpg') }}" />
                                                                        @endif
                                                                    </div>
                                                                </div>



                                                                
                                                                
                                                            </div>

                                                         




                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input type="submit" class="btn btn-primary w-100" value="Update" />
                                                                </div>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="modal fade" id="UpdateAgent{{ $agent->id }}">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" id="StatusUpdateForm" action="{{ url(strtolower(auth::user()->role.'/agent/status/update/'.$agent->id)) }}">
                                                            @csrf
                                                            
                                                            <div class="row"> 
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Status <span class="required">*</span></label>
                                                                        <select class="form-control" name="status" required autofocus>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            <option value="1">Active</option>
                                                                            <option value="0">InActive</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-black font-w600 form-label">Select RM <span class="required">*</span></label>
                                                                        <select class="form-control" name="rm_id" required autofocus>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            @php
                                                                                error_reporting(0);
                                                                                $rms = DB::table('users')->where('designation', 'RM')->get();
                                                                            @endphp
                                                                            @foreach ($rms as $rm)
                                                                                <option value="{{ $rm->id }}">{{ $rm->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 mb-0">
                                                                        <input type="submit" data-bs-toggle="modal" data-bs-target="#Loading" rel="#UpdateAgent{{ $agent->id }}"  value="Update" class="submit btn btn-primary btn-block Loading">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                



                                        <div class="modal fade" id="UpdateAgentUniversity{{ $agent->id }}">
                                            <div class="modal-dialog " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" id="StatusUpdateForm" action="{{ url('/admin/agent/universities/'.$agent->id) }}">
                                                            @csrf
                                                            
                                                            <div class="row"> 
                                                                <div class="col-lg-12 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Universities Access <span class="text-danger">*</span></label>
                                                                        <select name="universities[]"  class="form-control select2" multiple required>

                                                                            @php
                                                                                error_reporting(0);
                                                                                $universities_ids = $agent->universities;
                                                                                $arrays = explode(",", $universities_ids);
                                                                                
                                                                                
                                                                            @endphp


                                                                            @foreach($universities as $university)
                                                                                <option value="{{ $university->id }}"
                                                                                    @if (in_array($university->id, $arrays))
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $university->name }} </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                @if ($agent->universities_request != null)
                                                                    <div class="row">
                                                                        <div class="col-lg-12 mb-2">
                                                                            <div class="mb-3">
                                                                                <label class="text-label form-label font-weight-bold">Agent Universities Requests</label>
                                                                                @php
                                                                                    error_reporting(0);
                                                                                    $universities_request_ids = $agent->universities_request;
                                                                                    $requested_arrays = explode(",", $universities_request_ids);


                                                                                    
                                                                                @endphp
                                                                                <ul style="margin-left: 10px">
                                                                                    
                                                                                    @foreach ($requested_arrays as $key => $value)
                                                                                        @php
                                                                                            error_reporting(0);
                                                                                            $uni = DB::table('universities')->where('id', $value)->first();

                                                                                        @endphp
                                                                                        <li> {{ $key+1 }}. {{ $uni->name }}</li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                @endif
                                                                
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 mb-0">
                                                                        <input type="submit" value="Update" class="submit btn btn-primary btn-block">
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