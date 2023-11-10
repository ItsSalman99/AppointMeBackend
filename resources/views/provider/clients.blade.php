@extends('provider.layouts.main')

@section('content')
    <style>
        body {
            background-color: #EEF6F9;
        }
    </style>
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px">Clients</h2>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <table class="datatable display align-middle" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $i => $client)
                        <tr>
                            <td class="fw-500">#<?php echo $i; ?></td>
                            <td style="max-width: 250px">
                                <div class=" d-flex align-items-center gap-2">
                                    <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                                        <img src="{{$client->profile_img}}"
                                            alt="">
                                    </div>
                                    <div style="width: 150px;">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$client->name}}"
                                            class=" font-14px m-0 text-truncate text-dark hover-opacity-07">
                                            {{$client->name}}
                                        </a>

                                    </div>
                                </div>
                            </td>
                            <td>{{$client->email }}</td>
                            <td>{{$client->phone}}</td>
                            <td class="text-center">
                                <ul class="dropdownStyle-v1 position-absolute">
                                    <li class="dropdown tableDropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle caret-none"
                                            data-bs-toggle="dropdown" role="button" id="navbarDropdown"
                                            aria-expanded="false"><i
                                                class="bi bi-three-dots-vertical font-19px link-dark"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a href="#." class="dropdown-item">View Client</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal  -->

    <div class="modal fade" id="createDiscountModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
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
                                    <select class="select-box" data-minimum-results-for-search="Infinity" id="discountLimit"
                                        data-placeholder="Select Discount Limit">

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
                                    <button type="submit"
                                        class="btn btn-primary text-white extra-btn-padding-30">Apply</button>
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
