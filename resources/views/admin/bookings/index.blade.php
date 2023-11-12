@extends('admin.layouts.admin')

@section('content')
    <style>
        body {
            background-color: #EEF6F9;
        }
    </style>
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px">Bookiings</h2>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <table class="datatable display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Customer</th>
                        <th>Provider</th>
                        <th>Service Fee</th>
                        <th>Platform Fee</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $i => $booking)
                        <tr>
                            <td class="fw-500">#<?php echo $booking->id; ?></td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->provider->name }}</td>
                            <td>{{ $booking->service_fee }}</td>
                            <td>{{ $booking->platform_fee }}</td>
                            <td>{{ $booking->total }}</td>
                            <td>
                                <div class="active-status">
                                    <p>
                                        {{ $booking->status }}
                                    </p>
                                </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @push('extra-js')
        <script></script>
    @endpush
@endsection
