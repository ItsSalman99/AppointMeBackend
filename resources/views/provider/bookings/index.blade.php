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
        <a href="{{ route('dashboard.inbox') }}" class="btn w-100 my-2" style="background-color: #eee;"><i class="bi bi-envelope"></i>Messages</a>
        <a href="{{ route('dashboard.bookings.index') }}" class="btn w-100 my-2" style="background-color: #E1F7FF; color: #04AEEC;">
        <i class="bi bi-card-list"></i>Booking Requests</a>
    </div>
    <div class="p-2" style="width: 80%; border: 1px solid #eee;">

        <div class="cover-datatable">
            @foreach($bookings as $booking)
            <div style="border-bottom: 2px solid #ddd;" class="d-flex justify-content-between p-4">
                <div>
                    <div class="d-flex justify-content-center gap-2">
                        <div class="rounded-circle overflow-hidden" 
                        style="color: #fff; background-color: {{ $booking->service->color }}; text-align: center; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center;">
                            <span class="font-18px">TA</span>
                        </div>
                        <div>
                            <a href="#" data-bs-toggle="tooltip" data-bs-title="{{ $booking->user->name }}" class="m-0 text-truncate text-dark hover-opacity-07">
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
                    <div class="active-status">
                        <span>{{ $booking->status }}</span>
                    </div>
                </div>
                <div>
                    <a href="#." class="btn rounded-circle" style="background-color: #E1F7FF; color: #04AEEC;">></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


<div class="cover-all-content">
    <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="mb-0 fw-600 font-27px">Appointments</h2>
    </div>
    <br>
    <br>
    <div class="cover-datatable">
        <table class="datatable display align-middle" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Phone Number</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Total</th>
                    <th>Status</th>
                    <!--<th>Action</th>-->
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="fw-500">#{{$booking->id}}</td>
                        <td style="max-width: 250px">
                            <div class=" d-flex align-items-center gap-2">
                                <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                                    <img src="{{ $booking->user->profile_img }}" alt="">
                                </div>
                                <div style="width: 150px;">
                                    <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$booking->user->name}}" class=" font-14px m-0 text-truncate text-dark hover-opacity-07">
                                        {{$booking->user->name}}
                                    </a>

                                </div>
                            </div>
                        </td>
                        <td>{{$booking->user->email}}</td>
                        <td>{{$booking->user->phone}}</td>
                        <td>{{$booking->date}}</td>
                        <td>{{$booking->time_slot}}</td>
                        <td>${{$booking->total}}</td>
                        <td>
                            <div class="active-status">
                                <p>
                                    {{$booking->status}}
                                </p>
                            </div>
                            </td>
                        <!--<td style="max-width: 240px;" data-bs-toggle="tooltip" data-bs-title="4513 Adele Street Gazolle-->
                        <!--    Adriane, California">-->
                        <!--    4513 Adele Street Gazolle-->
                        <!--    Adriane, California-->
                        <!--</td>-->
                        <!--<td class="text-center">-->
                        <!--    <ul class="dropdownStyle-v1">-->
                        <!--        <li class="dropdown tableDropdown">-->
                        <!--            <a href="javascript:void(0)" class="dropdown-toggle caret-none" data-bs-toggle="dropdown" role="button" id="navbarDropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical font-19px link-dark"></i></a>-->
                        <!--            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">-->
                        <!--                <li>-->
                        <!--                    <a href="#." class="dropdown-item">View Client</a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="#." class="dropdown-item delete">Delete</a>-->
                        <!--                </li>-->
                        <!--            </ul>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</td>-->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- Modal  -->

<div class="modal fade" id="createDiscountModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-600" id="modalTitleId">Create Discount</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" class=" mt-3">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Name</label>
                                <input type="text" class=" form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Code</label>
                                <input type="text" class=" form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Discount amount</label>
                                <input type="number" class=" form-control">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Discount Type</label>
                                <select class="select-box" data-minimum-results-for-search="Infinity">
                                    <option>Percentage</option>
                                    <option>Fixed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Starts</label>
                                <input type="text" class=" form-control startDate">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group m-0">
                                <label for="">Ends</label>
                                <input type="text" class=" form-control endDate">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group m-0">
                                <label for="">Type</label>
                                <select class="select-box" data-minimum-results-for-search="Infinity" id="discountLimit" data-placeholder="Select Discount Limit">

                                    <option value="unlimited">Unlimited</option>
                                    <option value="limited">Limited</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12" id="showLimit">
                            <div class="form-group m-0">
                                <label for="">Limit</label>
                                <input type="text" class=" form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary text-white extra-btn-padding-30">Apply</button>
                            </div>
                        </div>
                    </div>
                </form>
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