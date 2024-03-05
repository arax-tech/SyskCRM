@extends('agent.layouts.app')
@section('title', 'Agancies')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Agancies</h4>
                        <button class="btn btn-sm btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#CreateAgent">
                            <i class="fa fa-plus"></i>
                            <span>Create</span>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="CreateAgent">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Create</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form >
                                            <div class="row"> 
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-black font-w600 form-label">Name <span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="name" required autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-black font-w600 form-label">Email <span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="email" required>
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-black font-w600 form-label">Password <span class="required">*</span></label>
                                                        <input type="text" class="form-control" name="password" required>
                                                    </div>
                                                </div>



                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-black font-w600 form-label">Profile Image <span class="required">*</span></label>
                                                        <input type="file" class="form-control" name="profile" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                    <div class="mb-3 mb-0">
                                                        <input type="submit" value="Create" class="submit btn btn-primary btn-block" name="submit">
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
                                <thead>
                                    <tr>
                                        <th><strong>Name</strong></th>
                                        <th><strong>Email</strong></th>
                                        <th><strong>RegisterAT</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('/backend/images/avatar/1.jpg') }}" class="rounded-lg me-2" width="24" alt=""/>
                                                <span class="w-space-no">Dr. Jackson</span>
                                            </div>
                                        </td>
                                        <td>example@example.com </td>
                                        <td>01 August 2020</td>
                                        <td><div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> Active</div></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('/backend/images/avatar/2.jpg') }}" class="rounded-lg me-2" width="24" alt=""/>
                                                <span class="w-space-no">Dr. Jackson</span>
                                            </div>
                                        </td>
                                        <td>example@example.com </td>
                                        <td>01 August 2020</td>
                                        <td><div class="d-flex align-items-center"><i class="fa fa-circle text-danger me-1"></i> InActive</div></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-success shadow btn-xs sharp me-1"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>


                                    
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