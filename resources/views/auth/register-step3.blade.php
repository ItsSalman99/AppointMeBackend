@extends('layouts.main')

@section('content')
<div class=" mb-8 text-center">
    <img src="assets/images/bookinglogo.png" alt="" style="width: 20%;" class="mx-auto mb-3" draggable="false" loading="lazy">
</div>
<div class=" mb-8 text-center">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active">Basic Info</li>
        <li class="active">Business Info</li>
        <li class="active">Review</li>
    </ul>
</div>
<div class="signup bg-white rounded-4 overflow-hidden width-100 width-lg-40 mx-auto" style="box-shadow: 0px 0px 8px 0px #00000040;">
    <div class="right-box d-flex align-items-center ">
        <div>
            <h2 class="m-0 text-center">Review and Submit</h2>
            <form id="registerForm" class="mt-6">
                @csrf
                <input name="is_submit" value="1" hidden>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <div class="position-relative">
                                <input type="password" name="password" class="form-control " placeholder="Enter your password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <div class="position-relative">
                                <input type="password" class="form-control " placeholder="Confirm password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="d-flex gap-2 p-2">
                            <div>
                                <input class="form-check-input mr-2" type="checkbox" value="" aria-label="Checkbox for following text input">
                            </div>
                            <div>
                                <label for="">Yes, I understand and agree to the AppointMe <a href="#.">Terms of Service </a>, including the <a href="#.">User Agreement</a> and <a href="#.">Privacy Policy</a></label>
                            </div>
                        </div>
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
                        window.location.href = "{{ route('dashboard') }}"
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