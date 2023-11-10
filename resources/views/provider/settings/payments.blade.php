@extends('provider.layouts.main')

@section('content')

<div class="cover-all-content">
    <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="mb-0 fw-600 font-27px">Payment</h2>
    </div>
    <br>
    <br>

    <div class="card">
        <div class="card-body">
            <h2>Payment Method</h2>
            <div class="d-flex ">
                <div style="width: 20%;">
                    <button class="btn" style="background-color: transparent; ">
                        <img src="./assets/images/paypal.png" style="width: 100%;">
                    </button>
                </div>
                <div style="width: 20%;">
                    <button class="btn" style="background-color: transparent; ">
                        <img src="./assets/images/stripe.png" style="width: 100%;">
                    </button>
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