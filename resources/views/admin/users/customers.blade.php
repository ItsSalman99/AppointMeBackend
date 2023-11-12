@extends('admin.layouts.admin')

@section('content')
    <style>
        body {
            background-color: #EEF6F9;
        }
    </style>
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px">Customers</h2>
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
                    @foreach ($customers as $i => $customer)
                        <tr>
                            <td class="fw-500">#<?php echo $i; ?></td>
                            <td style="max-width: 250px">
                                <div class=" d-flex align-items-center gap-2">
                                    <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
                                        <img src="{{$customer->profile_img}}"
                                            alt="">
                                    </div>
                                    <div style="width: 150px;">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-title="{{$customer->name}}"
                                            class=" font-14px m-0 text-truncate text-dark hover-opacity-07">
                                            {{$customer->name}}
                                        </a>

                                    </div>
                                </div>
                            </td>
                            <td>{{$customer->email }}</td>
                            <td>{{$customer->phone}}</td>
                            <td class="text-center">
                                <ul class="dropdownStyle-v1 position-absolute">
                                    <li class="dropdown tableDropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle caret-none"
                                            data-bs-toggle="dropdown" role="button" id="navbarDropdown"
                                            aria-expanded="false"><i
                                                class="bi bi-three-dots-vertical font-19px link-dark"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li>
                                                <a href="{{ route('admin.dashboard.showCustomers', ['id' => $customer->id]) }}" class="dropdown-item">View Details</a>
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


    @push('extra-js')
        <script>
        </script>
    @endpush
@endsection
