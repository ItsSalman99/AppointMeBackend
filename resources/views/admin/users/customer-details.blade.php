@extends('admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px d-flex align-items-center gap-2"><i class="bi bi-people font-30px me-2"></i>
                {{ $customer->name }}</h2>

            <ul class="d-flex align-items-center gap-2 flex-wrap">
                <li><a href="#" class="btn white-btn gap-2 border-radius-10px border fw-400" onclick="goBack()"><i
                            class="bi bi-chevron-left font-16px"></i> Go Back</a></li>
            </ul>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-body p-5">
                <h3 class=" font-24px pb-4 mb-0 fw-600">Customer Details</h3>
                <hr class="mb-5 mt-0">
                <div class="row g-4">

                    <div class=" col-lg-6">
                        <div class="pb-3 border-bottom h-100">
                            <h6 class=" fw-400 font-16px mb-2"> Name: </h6>
                            <h5 class=" fw-600 font-18px m-0 text-truncate">{{ $customer->name }}</h5>
                        </div>
                    </div>
                    <div class=" col-lg-6">
                        <div class="pb-3 border-bottom h-100">
                            <h6 class=" fw-400 font-16px mb-2">Email: </h6>
                            <h5 class=" fw-600 font-18px m-0 text-truncate" data-bs-toggle="tooltip"
                                data-bs-title="{{ $customer->email }}">{{ $customer->email }}</h5>
                        </div>
                    </div>
                    <div class=" col-lg-6">
                        <div class="pb-3 border-bottom h-100">
                            <h6 class=" fw-400 font-16px mb-2">Phone: </h6>
                            <h5 class=" fw-600 font-18px m-0 text-truncate">{{ $customer->phone }}</h5>
                        </div>
                    </div>
                    <div class=" col-lg-3">
                        <div class="pb-3 border-bottom h-100">
                            <h6 class=" fw-400 font-16px mb-2">Date Of Birth: </h6>
                            <h5 class=" fw-600 font-18px m-0">{{ $customer->dob }}</h5>
                        </div>
                    </div>
                    <div class=" col-lg-12">
                        <div class="pb-3 border-bottom h-100">
                            <h6 class=" fw-400 font-16px mb-2">Address: </h6>
                            <h5 class=" fw-600 font-18px m-0 text-truncate" data-bs-toggle="tooltip"
                                data-bs-title="United States 2050 W Whispering Wind Dr">United States 2050 W Whispering Wind
                                Dr</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-body p-5">
                <h3 class=" font-24px pb-4 mb-0 fw-600">Bookings</h3>
                <hr class="mb-5 mt-0">
                <div class="cover-datatable">
                    <table class="datatable display align-middle" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Provider</th>
                                <th>Date</th>
                                <th>Time Slot</th>
                                <th>Platform Fee</th>
                                <th>Service Fee</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customer->customer_bookings as $i => $booking)
                                <tr>
                                    <td class="fw-500">#<?php echo $booking->id; ?></td>
                                    <td style="max-width: 250px">
                                        {{ $booking->service->name }}
                                    </td>
                                    <td style="max-width: 250px">
                                        {{ $booking->provider->name }}
                                    </td>
                                    <td>{{ $booking->date }}</td>
                                    <td>{{ $booking->time_slot }}</td>
                                    <td>{{ $booking->platform_fee }}</td>
                                    <td>{{ $booking->service_fee }}</td>
                                    <td>{{ $booking->total }}</td>
                                    <td>{{ $booking->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
