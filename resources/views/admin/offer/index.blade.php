@php
    $array = auth::user()->permissions;
    $permission = explode(",", $array);
@endphp

@extends('admin.layouts.app')
@section('title', 'Offers')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Offers</h4>
                        
                        @if (in_array("OfferfCreate", $permission))
                            <button class="btn btn-sm btn-primary float-right"  data-bs-toggle="modal" data-bs-target="#Create">
                                <i class="fa fa-plus"></i>
                                <span>Create</span>
                            </button>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="Create">
                            <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-light">
                                        <h5 class="modal-title">Create</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ url('/admin/offer/store') }}" enctype="multipart/form-data">
                                            @csrf
                                            
                                            <div class="row"> 
                                                <div class="col-lg-6 mb-2">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Campus Name <span class="text-danger">*</span></label>
                                                        <select class="form-control select2" name="campus_id">
                                                            <option selected disabled value="">Choose...</option>
                                                            @foreach ($campuses as $campus)
                                                            <option value="{{ $campus->id }}"
                                                                @if (old('campus_name') == $campus->id)
                                                                    selected 
                                                                @endif
                                                            >{{ $campus->name }} | {{ $campus->university_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>


                                             

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Offer Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="offer" required  />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Offer Banner <span class="text-danger">*</span></label>
                                                        <input type="file" class="form-control" name="banner" required  />
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="text-label form-label">Offer Discount <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="discount" required  />
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
                                        <th><strong>Offer</strong></th>
                                        <th><strong>Discount</strong></th>
                                        <th><strong>Campus</strong></th>
                                        <th><strong>Action</strong></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($offers as $offer)
                                        @php
                                            error_reporting(0);
                                            $campus = DB::table('campuses')->where('id', $offer->campus_id)->first();
                                        @endphp
                                        <tr>
                                            
                                            <td>
                                                <div class="d-flex align-items-center">

                                                    @if (!empty($offer->banner))
                                                        <img class="me-2" width="50" src="{{ asset('backend/offers/banner/'.$offer->banner) }}" />
                                                    @else
                                                        <img class="me-2" width="50" src="{{ asset('backend/placeholder.jpg') }}" />
                                                    @endif


                                                    <span class="w-space-no">{{ $offer->offer }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $offer->discount }} </td>
                                            <td>{{ $campus->name }} </td>

                                            <td>
                                                <div class="d-flex">
                                                    @if (in_array("OfferfUpdate", $permission))
                                                        <a href="javascript::" class="btn btn-primary shadow btn-xs sharp me-1"  data-bs-toggle="modal" data-bs-target="#Update{{ $offer->id }}"><i class="fas fa-pencil-alt"></i></a>
                                                    @endif
                                                    @if (in_array("OfferfDelete", $permission))
                                                        <a  href="{{ url('/admin/offer/delete/'.$offer->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- Modal -->
                                        <div class="modal fade" id="Update{{ $offer->id }}">
                                            <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title">Update</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ url('/admin/offer/update/'.$offer->id) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            
                                                            <div class="row"> 
                                                                <div class="col-lg-6 mb-2">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Campus Name <span class="text-danger">*</span></label>
                                                                        <select class="form-control select2" name="campus_id">
                                                                            <option selected disabled value="">Choose...</option>
                                                                            @foreach ($campuses as $campus)
                                                                            <option value="{{ $campus->id }}"
                                                                                @if ($offer->campus_id == $campus->id)
                                                                                    selected 
                                                                                @endif
                                                                            >{{ $campus->name }} | {{ $campus->university_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>


                                                             

                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Offer Name <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="offer" value="{{ $offer->offer }}" required  />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-5">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Offer Banner <span class="text-danger">*</span></label>
                                                                        <input type="file" class="form-control" name="banner" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-1">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Old</label><br>
                                                                        @if (!empty($offer->banner))
                                                                            <img class=" me-2" width="30" src="{{ asset('backend/offers/banner/'.$offer->banner) }}" />
                                                                        @else
                                                                            <img class=" me-2" width="30" src="{{ asset('backend/placeholder.jpg') }}" />
                                                                        @endif
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label class="text-label form-label">Offer Discount <span class="text-danger">*</span></label>
                                                                        <input type="text" class="form-control" name="discount" value="{{ $offer->discount }}" required  />
                                                                    </div>
                                                                </div>



                                                            
                                                                
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