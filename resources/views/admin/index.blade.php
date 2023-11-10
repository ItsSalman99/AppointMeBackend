@extends('admin.layouts.admin')

@section('content')
    <div class="cover-all-content">
        <div class="page-title d-flex justify-content-between gap-3 flex-wrap"
            style="background-color: #04AEEC; padding: 20px; border-radius: 20px;">
            <div>
                <h2 class="mb-0 fw-600 font-27px text-white">Welcome Back, {{ Auth::user()->name }}</h2>
                <p class="mb-0  text-white">Your last login: September 10, 2022 01:00 PM</p>
            </div>
            <div class="bg-white text-dark" style="padding: 10px; border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <p class="mb-0 fw-600">Online</p>
                    <span
                        style="background-color: #00CA2C; width: 8px; height: 8px; border-radius: 50px; margin-left: 5px"></span>

                </div>
                <p>April 10, 2023 10:00 AM</p>

            </div>
        </div>
        <br>
        <br>


    </div>
@endsection
