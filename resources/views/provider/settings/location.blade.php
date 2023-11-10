@extends('provider.layouts.main')

@section('content')

<style>
    body {
        background-color: #EEF6F9;
    }
</style>

<div class="cover-all-content">
    <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="mb-0 fw-600 font-27px">Locations</h2>
    </div>
    <br>
    <br>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <img src="./assets/images/Hicon/Linear/Vector.png" style="width: 20%; height: 20%;">
                    <h5>Business address</h5>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-telephone font-24px" style="color: #04AEEC"></i>
                    <h5>Business Phone Number</h5>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <img src="./assets/images/Hicon/Linear/Location.png" style="width: 20%; height: 20%;">
                    <h5>Business Email</h5>
                </div>
                <div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('extra-js')
<script>
   
</script>
@endpush

@endsection