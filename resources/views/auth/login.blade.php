@extends('layouts.main')

@section('content')
<div class=" mb-8 text-center">
    <img src="{{ asset('assets/images/bookinglogo.png') }}" alt="" style="width: 30%;" class="mx-auto mb-3" draggable="false" loading="lazy">
</div>
<div class="signup bg-white rounded-4 overflow-hidden width-100 width-lg-40 mx-auto" style="box-shadow: 0px 0px 8px 0px #00000040;">
    <div class="right-box d-flex align-items-center ">
        <div>
            <h2 class="m-0">Login your Account!</h2>
            <p class="m-0">Access your account using your email and password.</p>
            <form id="loginForm" class="mt-6">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <div class="position-relative">
                                <input type="email" name="email" class="form-control " placeholder="Enter your email address">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <label for="">Password</label>
                                </div>
                                <div>
                                    <a href="#." style="color: #04aeec;">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control " placeholder="Enter Password">

                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="my-4">
                            <button type="submit" style="display: inherit;"  class=" text-center btn btn-primary text-uppercase py-2 w-100">
                                Login
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <p class="m-0">Want to become a service provider? </p>
                            </div>
                            <div>
                                <a href="{{ route('register') }}" class="">Register Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@push('extra-js')
    <script>
        $('#loginForm').on('submit', function(e){

            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('login.authenticate') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response)
                {
                    if(response.status == true)
                    {
                        Toast.fire({
                          icon: 'success',
                          title: 'Logged in successfully!!'
                        })

                        window.location.href = "{{ route('dashboard') }}"
                    }
                    else{
                        Toast.fire({
                          icon: 'error',
                          title: response.msg
                        })
                    }
                }
            })

        })
    </script>
@endpush


@endsection
