@extends('provider.layouts.main')

@section('content')
<style>
    body {
        background-color: #EEF6F9;
    }
</style>
<div class="cover-all-content">
    <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="mb-0 fw-600 font-27px d-flex align-items-center gap-2"><i class="bi bi-shop font-30px me-2"></i> Business Details</h2>
    </div>
    <br>
    <br>
    <form action="{{ route('dashboard.settings.business-details.update') }}" method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body p-5">
                    @csrf
                    <h3 class=" font-24px pb-4 mb-0 fw-600">Basic Info</h3>
                    <div class="row g-4">
                        <div class="upload-image-box-v1 mb-8">
                            <label for="BBigImage1" class="BBigImage position-relative d-flex align-items-center justify-content-center rounded-2 text-center p-3 border flex-column overflow-hidden m-0 hover-opacity-07 bg-white mx-auto" role="button" style="width: 180px; height: 180px; --bs-border-width: 2px; --bs-border-style: dashed">
                                <img alt="image" src="{{ auth()->user()->profile_img }}" id="bigBannerImage1" class=" position-absolute top-0 start-0 w-100 h-100" style="object-fit:cover;" draggable="false" loading="lazy">
                                <input type="file" name="img" id="BBigImage1" hidden="" 
                                onchange="document.getElementById('bigBannerImage1').src = window.URL.createObjectURL(this.files[0])" aria-required="true">
                                <i class="bi bi-camera2 font-50px opacity-05 text-dark lh-1 mb-2"></i>
                                <p class="m-0">
                                    Upload Image
                                </p>
        
                            </label>
                        </div>
                        <div class=" col-lg-6">
                            <div class="">
                                <label for="">Name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" name="name" id="">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="">
                                <label for="">Business Name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->business_name }}" name="business_name" id="">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="">
                                <label for="">Short Name for SMS</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->sms_name }}" name="sms_name" id="">
                            </div>
                        </div>
                        <div class=" col-lg-6">
                            <div class="">
                                <label for="">Work Email</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->email }}" name="email" id="">
                            </div>
                        </div>
                        <div class=" col-lg-12">
                            <div class="">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->phone }}" name="phone" id="">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-body p-5">
                <h3 class=" font-24px pb-4 mb-0 fw-600">Additional Info</h3>
    
                <div class="row g-4">
    
                    <div class=" col-lg-6">
                        <div class="">
                            <label for="">Sector</label>
                            <select class="select-box form-control">
                                <option>{{ auth()->user()->business_sub_sector->business_sector->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-lg-6">
                        <div class="">
                            <label for="">Sub Sector</label>
                            <select class="select-box form-control">
                                <option>{{ auth()->user()->business_sub_sector->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class=" col-lg-12">
                        <div class="">
                            <label for="">Business Description</label>
                            <textarea class="form-control" name="business_description" placeholder="Enter Description">{{ auth()->user()->business_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </div>
    </form>
</div>

@push('extra-js')
<script>
   
</script>
@endpush

@endsection