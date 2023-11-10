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
        <li>Review</li>
    </ul>
</div>
<div class="signup bg-white rounded-4 overflow-hidden width-100 width-lg-40 mx-auto" style="box-shadow: 0px 0px 8px 0px #00000040;">
    <div class="right-box d-flex align-items-center ">
        <div>
            <h2 class="m-0 text-center">Tell us about your business</h2>
            <form id="registerForm" class="mt-6">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Business Name</label>
                            <div class="position-relative">
                                <input type="text" name="business_name" class="form-control " value="{{ (session()->get('provider') != null) ? session()->get('provider')['business_name'] : '' }}" placeholder="Enter your business name" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Sector</label>
                            <div class="position-relative">
                                <select class="select-box form-control" name="business_sector" id="businessSector" required>
                                    <option>Select Business Sector</option>
                                    @foreach($business_sectiors as $business_sectior)
                                        <option value="{{ $business_sectior->id }}">{{ $business_sectior->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Sub Sector</label>
                            <div class="position-relative">
                                <select class="select-box form-control" name="business_sub_sector" id="subsectors" required>
                                    <!--<option>Select sub Sector</option>-->
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Address</label>
                            <div class="position-relative">
                                <textarea name="address" class="form-control " placeholder="Enter your address" required>{{ (session()->get('provider') != null) ? session()->get('provider')['address'] : '' }}</textarea>
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
        $('#businessSector').on('change', function(e){
            
            var id = $(this).val();
            
            $.ajax({
                url: '/register/getSubSectors/'+id,
                method: 'GET',
                success: function(response)
                {
                    $('#subsectors').empty();
                    console.log(response.data)
                    response.data.forEach((item, index)=>{
                    	console.log(index, item)
                        $('#subsectors').append('<option value="'+item.id+'">'+item.name+'</option>')    
                    })
                }
            })
                
        });
        
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
                        window.location.href = "{{ route('registerStep3') }}"
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