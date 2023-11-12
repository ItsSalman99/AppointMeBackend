@extends('provider.layouts.main')

@section('content')
    <div class="d-flex">
        <div class="p-2" style="width: 20%; border: 1px solid #eee;">
            <h2 class="mb-0 fw-600 font-27px ">Bookings Requests</h2>
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
            <a href="{{ route('dashboard.inbox') }}" class="btn w-100 my-2" style="background-color: #eee;"><i
                    class="bi bi-envelope"></i>Messages</a>
            <a href="{{ route('dashboard.bookings.index') }}" class="btn w-100 my-2"
                style="background-color: #E1F7FF; color: #04AEEC;">
                <i class="bi bi-card-list"></i>Booking Requests</a>
        </div>
        <div class="p-2" style="width: 80%; border: 1px solid #eee;">

            <div class="cover-datatable">
                @foreach ($bookings as $booking)
                    <div style="border-bottom: 2px solid #ddd;" class="d-flex justify-content-between p-4">
                        <div>
                            <div class="d-flex justify-content-center gap-2">
                                <div class="rounded-circle overflow-hidden"
                                    style="color: #fff; background-color: {{ $booking->service->color }}; text-align: center; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                                    <span class="font-18px">TA</span>
                                </div>
                                <div>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-title="{{ $booking->user->name }}"
                                        class="m-0 text-truncate text-dark hover-opacity-07">
                                        {{ $booking->user->name }}
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div>
                            <span>Request for {{ $booking->service->name }}</span>
                        </div>
                        <div>
                            <span>{{ date('F, j Y', strtotime($booking->created_at)) }}</span>
                        </div>
                        <div>
                            <a href="#">
                                <div class="active-status">
                                    <p>{{ $booking->status }}</p>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex gap-2">
                            <div>
                                <a href="#"
                                    class="btn btn-sm btn-success {{ $booking->status != 'pending' ? 'disabled' : '' }}"
                                    onclick="scheduledBooking({{ $booking->id }})">
                                    <i class="bi bi-check2-all"></i>
                                </a>
                            </div>
                            <div>
                                <a href="#"
                                    class="btn btn-sm btn-danger {{ $booking->status != 'pending' ? 'disabled' : '' }}"
                                    onclick="cancelBooking({{ $booking->id }})">
                                    <i class="bi bi-x-octagon-fill"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <a href="#." class="btn rounded-circle"
                                style="background-color: #E1F7FF; color: #04AEEC;">></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    @push('extra-js')
        <script>
            function scheduledBooking(id) {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to accept this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/dashboard/bookings/scheduled/' + id
                    }
                })
            }

            function cancelBooking(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to cancel this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/dashboard/bookings/cancelled/' + id,
                            method: 'GET',
                            success: function(response) {
                                if (response.status == true) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: response.msg
                                    })

                                    location.reload();
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: response.msg
                                    })
                                }
                            }
                        })
                    }
                })
            }


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
