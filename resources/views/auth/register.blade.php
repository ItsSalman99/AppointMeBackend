@extends('layouts.main')

@section('content')
<div class=" mb-8 text-center">
    <img src="assets/images/bookinglogo.png" alt="" style="width: 25%;" class="mx-auto mb-3" draggable="false" loading="lazy">
</div>
<div class=" mb-8 text-center">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Basic Info</li>
        <li>Business Info</li>
        <li>Review</li>
    </ul>
    <!-- fieldsets -->
    <!-- <div class="d-flex justify-content-between w-50 m-auto">
        <div>
            <button class="btn btn-primary text-white" style="border:0px; border-radius: 50px;">
                01
            </button>
            <div style="position: relative; z-index: -9999px; width: 50%; margin: 0 auto; padding: 2px; background-color: #ddd;">

            </div>
        </div>
        <div>
            <button class="btn btn-primary text-white" style="border:0px; border-radius: 50px;">
                02
            </button>
        </div>
        <div>
            <button class="btn btn-primary text-white" style="border:0px; border-radius: 50px;">
                03
            </button>
        </div>
    </div> -->
</div>
<div class="signup bg-white rounded-4 overflow-hidden width-100 width-lg-40 mx-auto" style="box-shadow: 0px 0px 8px 0px #00000040;">
    <div class="right-box d-flex align-items-center ">
        <div>
            <h2 class="m-0 text-center">Tell us about yourself</h2>
            <form id="registerForm" class="mt-6">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">First Name</label>
                            <div class="position-relative">
                                <input type="text" name="first_name" class="form-control " required value="{{ (session()->get('provider') != null) ? session()->get('provider')['first_name'] : '' }}" placeholder="Enter your first name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <div class="position-relative">
                                <input type="text" name="last_name" class="form-control " required value="{{ (session()->get('provider') != null) ? session()->get('provider')['last_name'] : '' }}" placeholder="Enter your last name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Work Email</label>
                            <div class="position-relative">
                                <input type="email" name="email" class="form-control " required value="{{ (session()->get('provider') != null) ? session()->get('provider')['email'] : '' }}" placeholder="Enter your work email">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <div class="position-relative">
                                <input type="tel" name="phone" class="form-control " required value="{{ (session()->get('provider') != null) ? session()->get('provider')['phone'] : '' }}" placeholder="+1">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Date Of Birth</label>
                            <div class="position-relative">
                                <input type="date" name="dob" required class="form-control " value="{{ (session()->get('provider') != null) ? session()->get('provider')['dob'] : '' }}" placeholder="">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="my-4">
                            <button type="submit" style="display: inherit;" class=" text-center btn btn-primary text-uppercase py-2 w-100">
                                Next
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                                <p class="m-0">Already have an account? </p>
                            </div>
                            <div>
                                <a href="index.php" class="">Login Now</a>
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
        $('#registerForm').on('submit', function(e){
            
            e.preventDefault();
            
            var formData = new FormData(this);
            
            $.ajax({
                url: "{{ route('register.registerUserSession') }}",
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response)
                {
                    if(response == true)
                    {
                        window.location.href = "{{ route('registerStep2') }}"
                    }
                    else{
                        Toast.fire({
                          icon: 'error',
                          title: 'Something went wrong!'
                        })
                    }
                }
            })
            
        })
    </script>
@endpush

@endsection