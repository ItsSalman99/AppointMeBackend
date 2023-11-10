@extends('provider.layouts.main')

@section('content')
    <style>
        .addborder {
            border: 2px solid #ddd;
        }
    </style>
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px">Subscription</h2>
        </div>
        <br>
        <br>

        <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

        <section class="py-5 bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card  mb-5 mb-lg-0 rounded-lg shadow addborder" style="background-color: #04AEEC;">
                            <div class="card-header">
                                <h5 class="card-title text-white-50 text-uppercase text-center">Free</h5>
                                <h6 class="h1 text-white text-center">$0<span class="h6 text-white-50">/month</span></h6>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>20 appointments/month</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>SMS Included</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Take Online Payments</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Support Included</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>Email
                                        Confirmations and Reminders</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>SMS
                                        Confirmations and Reminders</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card  mb-5 mb-lg-0 rounded-lg shadow addborder" style="background-color: #04AEEC;">
                            <div class="card-header">
                                <h5 class="card-title text-white-50 text-uppercase text-center">Pro Pack</h5>
                                <h6 class="h1 text-white text-center">$9<span class="h6 text-white-50">.99/month</span></h6>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>60 appointments/month</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>SMS Included</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Take Online Payments</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Support Included</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>Email
                                        Confirmations and Reminders</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>SMS
                                        Confirmations and Reminders</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card  mb-5 mb-lg-0 rounded-lg shadow addborder" style="background-color: #04AEEC;">
                            <div class="card-header">
                                <h5 class="card-title text-white-50 text-uppercase text-center">Premium Pack</h5>
                                <h6 class="h1 text-white text-center">$19<span class="h6 text-white-50">.99/month</span>
                                </h6>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>150 appointments/month</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>SMS Included</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Take Online Payments</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Support Included</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>Email
                                        Confirmations and Reminders</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>SMS
                                        Confirmations and Reminders</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card mb-5 mb-lg-0 rounded-lg shadow addborder" style="background-color: #04AEEC;">
                            <div class="card-header">
                                <h5 class="card-title text-white-50 text-uppercase text-center">Enterprise Pack</h5>
                                <h6 class="h1 text-white text-center">$29<span class="h6 text-white-50">.99/month</span>
                                </h6>
                            </div>
                            <div class="card-body bg-light rounded-bottom">
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Unlimited appointments/month
                                    </li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>SMS Included</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Take Online Payments</li>
                                    <li class="mb-3"><span class="mr-3"><i
                                                class="fas fa-check text-success"></i></span>Support Included</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>Email
                                        Confirmations and Reminders</li>
                                    <li class=" mb-3"><span class="mr-3"><i class="fas fa-times"></i></span>SMS
                                        Confirmations and Reminders</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
