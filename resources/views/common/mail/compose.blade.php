@php
    error_reporting(0);
    $layoust_view = strtolower(auth::user()->role).'.layouts.app'
@endphp
@extends($layoust_view)
@section('title', 'Compose Email')
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
                            <form method="post" action="{{ url('/mail') }}">
                                @csrf
                                
                                <div class="email-right-box ms-0 ms-sm-4 ms-sm-0">
                                    <div class="compose-content">
                                       
                                            
                                        <div class="mb-3">

                                            <select name="reciver_id" class="form-control select2" @if (request()->to) @else autofocus @endif required>
                                                <option selected disabled value="">To :</option>
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        @if (request()->to && request()->to == $user->id)
                                                            selected 
                                                        @endif
                                                    >{{ $user->name }} : {{ $user->email }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="subject" @if (request()->to) autofocus @endif class="form-control bg-transparent" placeholder=" Subject:">
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="message" class="textarea_editor form-control bg-transparent" rows="15" placeholder="Enter message ..."></textarea>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Send</button>
                                        <a class="btn btn-danger light btn-sl-sm" href="{{ url('/inbox') }}"><span class="me-2"><i class="fa fa-times"></i></span>Discard</a>
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
