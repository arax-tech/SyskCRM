@extends('admin.layouts.app')
@section('title', 'Settings')
@section('css')
@endsection
@section('content')

<div class="content-body">
    <div class="container-fluid">
        

        <div class="row">
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h4 class="card-title">Settings</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('/admin/setting') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row">
                                

                                {{-- <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Light Color Code <span class="text-danger">*</span></label>
                                        <input type="text" name="light_color" value="{{ $setting->light_color }}" class="form-control" placeholder="#31353d" required="">
                                    </div>
                                </div>

                                <div class="col-lg-4 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Dark Color Code <span class="text-danger">*</span></label>
                                        <input type="text" name="dark_color" value="{{ $setting->dark_color }}" class="form-control" placeholder="#31353d" required="">
                                    </div>
                                </div>
 --}}
                                

                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Facebook <span class="text-danger">*</span></label>
                                        <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Null</label>
                                        <div class="form-check custom-checkbox ms-1">
                                             <input type="checkbox" class="form-check-input" name="facebook" id="facebook" value="null">
                                             <label class="form-check-label" for="facebook">Yes</label>
                                         </div>
                                    </div>
                                </div>

                                
                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Youtube <span class="text-danger">*</span></label>
                                        <input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Null</label>
                                        <div class="form-check custom-checkbox ms-1">
                                             <input type="checkbox" class="form-check-input" name="youtube" id="youtube" value="null">
                                             <label class="form-check-label" for="youtube">Yes</label>
                                         </div>
                                    </div>
                                </div>




                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Google Plus <span class="text-danger">*</span></label>
                                        <input type="text" name="google_plus" value="{{ $setting->google_plus }}" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Null</label>
                                        <div class="form-check custom-checkbox ms-1">
                                             <input type="checkbox" class="form-check-input" name="google_plus" id="google_plus" value="null">
                                             <label class="form-check-label" for="google_plus">Yes</label>
                                         </div>
                                    </div>
                                </div>




                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Twitter <span class="text-danger">*</span></label>
                                        <input type="text" name="twitter" value="{{ $setting->twitter }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Null</label>
                                        <div class="form-check custom-checkbox ms-1">
                                             <input type="checkbox" class="form-check-input" name="twitter" id="twitter" value="null">
                                             <label class="form-check-label" for="twitter">Yes</label>
                                         </div>
                                    </div>
                                </div>



                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Instagram <span class="text-danger">*</span></label>
                                        <input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Null</label>
                                        <div class="form-check custom-checkbox ms-1">
                                             <input type="checkbox" class="form-check-input" name="instagram" id="instagram" value="null">
                                             <label class="form-check-label" for="instagram">Yes</label>
                                         </div>
                                    </div>
                                </div>





                                <div class="col-lg-3 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Pinterest <span class="text-danger">*</span></label>
                                        <input type="text" name="pinterest" value="{{ $setting->pinterest }}" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-lg-1 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Null</label>
                                        <div class="form-check custom-checkbox ms-1">
                                             <input type="checkbox" class="form-check-input" name="pinterest" id="pinterest" value="null">
                                             <label class="form-check-label" for="pinterest">Yes</label>
                                         </div>
                                    </div>
                                </div>



                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Logo <span class="text-danger">*</span></label>
                                        <input type="file" name="logo" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-2">
                                    <div class="mb-3">
                                        <label class="text-label form-label">Login Background <span class="text-danger">*</span></label>
                                        <input type="file" name="login_background" class="form-control">
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
    </div>
</div>


@endsection