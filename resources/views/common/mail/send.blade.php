@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'Send Emails')
@section('css')


@endsection
@section('content')


        <div class="content-body">
            <div class="container-fluid">
               

                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                @include('common.mail.sidebar')
                                <div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
                                    <div role="toolbar" class="toolbar ms-1 ms-sm-0">
                                        <div class="btn-group mb-1">
                                            <a href="{{ url('/inbox') }}" class="btn btn-primary light px-3" ><i class="ti-reload"></i></a>
                                        </div>
                                    </div>
                                    <div class="email-list mt-3">

                                        @foreach ($emails as $email)
                                        @php
                                            $user = DB::table('users')->where('id', $email->reciver_id)->first();
                                        @endphp
                                            <div class="message">
                                                <div>
                                                    <div class="d-flex message-single">
                                                        <div class="ms-2">
                                                            @if (!empty($user->image))
                                                                <img width="35" class="rounded-circle mx-2" src="{{ asset('/backend/profile/'.$user->image) }}" />
                                                            @else
                                                                <img width="35" class="rounded-circle mx-2" src="{{ asset('/backend/placeholder.jpg') }}" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <a href="{{ url('/mail/read/'.$email->id) }}" class="col-mail col-mail-2">
                                                        <div class="subject">{{ $email->subject }}</div>
                                                        <div class="date">{{ date('d M Y, h:i a', strtotime($email->created_at)) }}</div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        
                                    
                                    </div>
                                    <!-- panel -->
                                    <div class="row mt-4">
                                        <div class="col-12 ps-3 d-flex align-items-center justify-content-center p-3">
                                            <nav>
                                                {{ $emails->links() }}
                                            </nav>
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
