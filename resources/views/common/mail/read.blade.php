@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'Read')
@section('css')


@endsection
@section('content')
    @php
        $user = DB::table('users')->where('id', $email->sender_id)->first();
    @endphp

    <div class="content-body">
        <div class="container-fluid">
           

            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @include('common.mail.sidebar')
                                <div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="right-box-padding">
                                                <div class="read-content">
                                                    <div class="media pt-3 d-sm-flex d-block justify-content-between">
                                                        <div class="clearfix mb-3 d-flex">

                                                            @if (!empty($user->image))
                                                                <img class="me-3 rounded" width="70" height="70" src="{{ asset('/backend/profile/'.$user->image) }}" />
                                                            @else
                                                                <img class="me-3 rounded" width="70" height="70" src="{{ asset('/backend/placeholder.jpg') }}" />
                                                            @endif


                                                            <div class="media-body me-2">
                                                                <h5 class="text-primary mb-0 mt-1">{{ $user->name }}</h5>
                                                                <p class="mb-0">{{ date('d M Y, h:i A', strtotime($email->created_at)) }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix mb-3">
                                                           
                                                            <a href="{{ url('/compose?to='.$email->sender_id) }}" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-reply"></i> </a>

                                                            <a href="{{ url('/mail/delete/'.$email->id) }}" onclick="return confirm('Are you sure to delete ?')" class="btn btn-primary px-3 my-1 light me-2"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    
                                                    <div class="read-content-body">
                                                        <h5 class="mb-4">{{ $email->subject }}</h5>
                                                        <p class="mb-2">
                                                            {{ $email->message }}
                                                        </p>
                                                        
                                                        <hr>
                                                    </div>
                                                    
                                                  
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
