@extends('agent.layouts.app')
@section('title', 'Password')

@section('content')
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper p-3">
        <div class="content-body">
            <!-- Dashboard Ecommerce Starts -->
            <section id="dashboard-ecommerce">
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header bg-light mb-1">Update Password</div>
                            <div class="card-body">
                                <form method="post" action="{{ url(strtolower(auth::user()->role).'/update_password') }}">
                                    @csrf


                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-1">
                                        <div class="col-md-12">
                                            <label>Current Password</label>
                                            <input class="form-control" type="text"  autocomplete="off" name="current_password" id="current_password" required autofocus value="{{old('current_password')}}" />
                                        <span class="mt-1" id="change"></span>
                                        </div>

                                    </div>

                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-1">
                                        <div class="col-md-6">
                                            <label>New Password</label>
                                            <input class="form-control" type="text"  autocomplete="off" name="new_password" required  value="{{old('new_password')}}" />
                                        </div>

                                        <div class="col-md-6">
                                            <label class="small mb-1">Confirm Password</label>
                                            <input class="form-control" type="text"  autocomplete="off" name="confirm_password" required  value="{{old('confirm_password')}}"/>
                                        </div>

                                       
                                    </div>

                                    
                                   

                                    <!-- Save changes button-->
                                    <button class="btn btn-primary w-100 mb-2 mt-1" type="submit">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Ecommerce ends -->

        </div>
    </div>
</div>
@endsection



@section('js')
    <script type="text/javascript">
        $("#current_password").on('change', function() {
            var current_password = $(this).val();
            // alert(current_password);
            var url = "{{ url(strtolower(auth::user()->role).'/check-pwd') }}";
            $.ajax({
                type: 'get',
                url: url,
                data: {
                    current_password: current_password
                },
                success: function(resp) {
                    $("#change").html(resp);
                },
                error: function(resp) {
                    alert("Opps Try Agian...");
                }
            });
        });
    </script>
@endsection