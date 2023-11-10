@extends('provider.layouts.main')

@section('content')

<div class="d-flex">
    <div class="p-2" style="width: 20%; border: 1px solid #eee;">
        <h2 class="mb-0 fw-600 font-27px ">Inbox</h2>
    </div>
    <div class="p-2" style="width: 80%; border: 1px solid #eee;">
        <div class="input-group ">
            <i class="bi bi-search input-group-text" style="background-color: transparent; border: none;"></i>
            <input type="text" placeholder="Search By Name" class="form-control" style="border: none;">
        </div>
    </div>
</div>
<div class="d-flex" style="height: 954px; bottom: 0;">
    <div class="p-2" style="width: 20%; height: 100%; border: 1px solid #eee;">
        <a href="{{ route('dashboard.inbox') }}" class="btn w-100 my-2" style="background-color: #E1F7FF; color: #04AEEC;"><i class="bi bi-envelope"></i>Messages</a>
        <a href="{{ route('dashboard.bookings.index') }}" class="btn w-100 my-2" style="background-color: #eee;"><i class="bi bi-card-list"></i>Booking Requests</a>
    </div>
    <div class="p-2" style="width: 80%; border: 1px solid #eee;">

        <div class="cover-datatable">
            <div style="border-bottom: 2px solid #ddd;" class="d-flex justify-content-between p-4">
                <div >
                    <div class="d-flex justify-content-center gap-2">
                        <div class="rounded-circle overflow-hidden" style="color: #fff; background-color: dodgerblue; text-align: center; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <span class="font-18px">JE</span>
                        </div>
                        <div>
                            <a href="chat.php" data-bs-toggle="tooltip" data-bs-title="Julie Edward" class="m-0 text-truncate text-dark hover-opacity-07">Julie Edward</a>
                        </div>
                    </div>
                </div>
                <div>
                    <span>Can we setup a meeting after 2 hours?</span>
                </div>
                <div>
                    <span>2 Hours ago</span>
                </div>
            </div>
            <div style="border-bottom: 2px solid #ddd;" class="d-flex justify-content-between p-4">
                <div >
                    <div class="d-flex justify-content-center gap-2">
                        <div class="rounded-circle overflow-hidden" style="color: #fff; background-color: dodgerblue; text-align: center; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <span class="font-18px">DC</span>
                        </div>
                        <div>
                            <a href="chat.php" data-bs-toggle="tooltip" data-bs-title="David Cameron" class="m-0 text-truncate text-dark hover-opacity-07">David Cameron</a>
                        </div>
                    </div>
                </div>
                <div>
                    <span>You: that’s sounds great?</span>
                </div>
                <div>
                    <span>2 Hours ago</span>
                </div>
            </div>
        </div>
    </div>
</div>



@push('extra-js')
<script>
    $('#discountLimit').on('change', function() {
        let value = $(this).val();
        if (value == "limited") {
            $("#showLimit").show();
        } else {
            $("#showLimit").hide();
        }
    })
</script>
@endpush

@endsection