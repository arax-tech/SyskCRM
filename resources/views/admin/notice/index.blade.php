@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('admin.layouts.app')
@section('title', 'Notices')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Notices</h4>
                        @if (in_array("NoticeCreate", $permission))
                            <button class="btn btn-sm btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#CreateIntake">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </button>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="CreateIntake">
                            <div class="modal-dialog  modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Create</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/admin/notice/store') }}">
                                            @csrf
                                            
                                            <div class="row"> 


                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Title  <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="title"  required="" />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Select University <span class="required">*</span></label>
                                                        <select class="form-control select2" name="university_id" required>
                                                            <option selected disabled value="">Choose...</option>
                                                            @foreach ($universities as $university)
                                                                <option value="{{ $university->id }}">{{ $university->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                               

                                                



                                                
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Date  <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="date" required="" />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="mb-3 mb-0">
                                                        <input type="submit" value="Create" class="submit btn btn-primary btn-block">
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
                                        <th><strong>Title</strong></th>
                                        <th><strong>Date</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($notices as $notice)
                                        @php
                                            error_reporting(0);
                                            $university = DB::table('universities')->where('id', $notice->university_id)->first();


                                        @endphp
                                        <tr>
                                            
                                            <td>{{ $university->name }} </td>
                                            <td>{{ $notice->title }} </td>
                                            <td>{{ $notice->date ? date('d M Y', strtotime($notice->date)) : 'Not Provided' }} </td>
                                           
                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("NoticeUpdate", $permission))
                                                        <a href="javascript::" class="btn btn-primary shadow btn-xs sharp me-1"  data-bs-toggle="modal" data-bs-target="#UpdateNotice{{ $notice->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    @if (in_array("NoticeDelete", $permission))
                                                        <a  href="{{ url('/admin/notice/delete/'.$notice->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="UpdateNotice{{ $notice->id }}">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('/admin/notice/update/'.$notice->id) }}">
                                                            @csrf
                                                            
                                                            <div class="row"> 


                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Title  <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="title" value="{{ $notice->title }}"  required="" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Select University <span class="required">*</span></label>
                                                                        <select class="form-control select2" name="university_id" required>
                                                                            <option selected disabled value="">Choose...</option>
                                                                            @foreach ($universities as $university)
                                                                                <option value="{{ $university->id }}"
                                                                                    @if ($university->id == $notice->university_id)
                                                                                        selected 
                                                                                    @endif
                                                                                >{{ $university->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                               

                                                                



                                                                
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Date  <span class="text-danger">*</span></label>
                                                                        <input type="date" class="form-control" name="date" value="{{ $notice->date }}" required="" />
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3 mb-0">
                                                                        <input type="submit" value="Create" class="submit btn btn-primary btn-block">
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