@extends('provider.layouts.main')

@section('content')
<div class="cover-all-content">
    <div class="page-title d-flex justify-content-between gap-3 flex-wrap" style="background-color: #04AEEC; padding: 20px; border-radius: 20px;">
        <div>
            <h2 class="mb-0 fw-600 font-27px text-white">Welcome Back, {{Auth::user()->name}}</h2>
            <p class="mb-0  text-white">Your last login: September 10, 2022 01:00 PM</p>
        </div>
        <div class="bg-white text-dark" style="padding: 10px; border-radius: 10px;">
            <div class="d-flex align-items-center">
                <p class="mb-0 fw-600">Online</p>
                <span style="background-color: #00CA2C; width: 8px; height: 8px; border-radius: 50px; margin-left: 5px"></span>

            </div>
            <p>April 10, 2023 10:00 AM</p>

        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-600 font-16px">Today's Appointment</h3>
                            <p class="mb-2 font-26px">04</p>
                            <div>
                                <div class="sb-nav-link-icon"><i class="bi bi-arrow-up font-20px text-success">3.24 %</i> vs last week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-600 font-16px">Today's Revenue</h3>
                            <p class="mb-2 font-26px">$12.03</p>
                            <div>
                                <div class="sb-nav-link-icon"><i class="bi bi-arrow-down font-20px text-danger">3.24 %</i> vs last week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-600 font-16px">Today's Clients</h3>
                            <p class="mb-2 font-26px">04</p>
                            <div>
                                <div class="sb-nav-link-icon"><i class="bi bi-arrow-up font-20px text-success">3.24 %</i> vs last week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h3 class="mb-2 fw-600 font-16px">Number of services</h3>
                            <p class="mb-2 font-26px">14</p>
                            <div>
                                <div class="sb-nav-link-icon"><i class="bi bi-arrow-up font-20px text-success">3.24 %</i> vs last week</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="card">
                <div class="card-body">
                    <span class=" font-15px d-block mb-2 opacity-7 fw-400" style="letter-spacing: 0.7px;">Sales Statistics</span>
                    <div id="chart۱" style="min-height: 400px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="card">
                <div class="card-body">
                    <span class=" font-15px d-block mb-2 opacity-7 fw-400" style="letter-spacing: 0.7px;">Appointment Statistics</span>
                    <div id="chart">
                    </div>
                </div>
            </div>
        </div>



    </div>


</div>

@endsection
