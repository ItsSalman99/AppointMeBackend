@extends('provider.layouts.main')

@section('content')
    <style>
        body {
            background-color: #EEF6F9;
        }
    </style>
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
            <h2 class="mb-0 fw-600 font-27px d-flex align-items-center gap-2"><i class="bi bi-shop font-30px me-2"></i>
                Services</h2>
        </div>
        <br>
        <br>
        <div class="card">
            <div class="card-body p-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class=" font-24px pb-4 mb-0 fw-600">Manage Your Service</h3>
                    </div>
                    <div class="d-flex gap-4">
                        <div class="input-group " style="background-color: #eee; border-radius: 10px; height: 90%;">
                            <i class="bi bi-search input-group-text"
                                style="color: #0d6efd; background-color: transparent; border: none;"></i>
                            <input type="text" placeholder="Search By Name" class="form-control"
                                style="background-color: #eee; border: none;">
                        </div>
                        <div>
                            <button onclick="addNew()" class="btn btn-primary btn-lg" style="height: 90%; border: 0px;">
                                <i class="bi bi-plus-lg me-2"></i>Add</button>
                        </div>
                    </div>
                </div>
                <div class="my-4 p-4 d-none"
                    style="background-color: #EEF6F9; border-radius: 10px; border: 2px solid #ddd; border-left: 8px solid #04AEEC;"
                    id="addNew">
                    <form id="addService">
                        @csrf
                        <div class="d-flex gap-4 justify-content-between align-items-center">
                            <div style="width: 95%;">
                                <input type="text" class="form-control w-100" name="name"
                                    placeholder="Enter Service Name" id="">
                                <br>
                                <div class="row gap-2 my-2">
                                    <div class="col">
                                        <input type="text" class="form-control w-100" name="duration"
                                            placeholder="Enter Service Duration" id="">
                                    </div>
                                    <div class="col d-flex gap-2">
                                        <label for="">Color</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#DD6267"
                                                    style="background-color: #DD6267;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#B2EBFF"
                                                    style="background-color: #B2EBFF;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#6BFABD"
                                                    style="background-color: #6BFABD;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#CE9BE7"
                                                    style="background-color: #CE9BE7;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#EBA8D0"
                                                    style="background-color: #EBA8D0;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h6>Select Service Type</h6>

                                <div class="row">
                                    <div class="col">
                                        @foreach ($service_types as $key => $service_type)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="service_type[]"
                                                    value="{{ $service_type->id }}" onclick="openPrice({{ $key }})"
                                                    id="priceCheckbox{{ $key }}">
                                                <label class="form-check-label"
                                                    for="priceCheckbox{{ $key }}">{{ $service_type->name }}</label>
                                            </div>
                                            <div id="priceInput{{ $key }}" style="display: none;">
                                                <div class="form-group">
                                                    <label for="price">Price:</label>
                                                    <input type="number" min="1" name="service_price[]"
                                                        class="form-control" id="price" name="price">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <br>
                                <select class=" select-box" name="location" data-placeholder="Choose Location"
                                    style="width: 230px;">
                                    <option value="At clients address">At client’s address</option>
                                    <option value="Online (Phone Call)">Online (Phone Call)</option>
                                    <option value="At your business address">At your business address</option>
                                </select>
                                <!--<div>-->
                                <!--   <select class=" select-box" multiple name="type[]" data-placeholder="Choose Service Types" style="width: 230px;">-->
                                <!--<option></option>-->
                                <!--        @foreach ($service_types as $type)
    -->
                                <!--            <option value="{{ $type->id }}">{{ $type->name }}</option>-->
                                <!--
    @endforeach-->
                                <!--    </select>-->
                                <!--</div>-->
                                <!--<div>-->
                                <!--    <input class=" select-box" multiple name="type_price[]" data-placeholder="Choose Service Types Prices" style="width: 230px;">-->
                                <!--</div>-->
                            </div>
                            <button type="submit" class="btn">
                                <i class="bi bi-check-lg font-22px" style="color: #0d6efd"></i>
                            </button>
                            <a href="#.">
                                <i class="bi bi-trash3-fill font-22px  text-danger"></i>
                            </a>
                        </div>
                    </form>
                </div>
                @foreach ($services as $key => $service)
                    <div class="my-4 p-4"
                        style="border-radius: 10px; border: 2px solid #ddd; border-left: 8px solid #6BFABD;">
                        <div class="d-flex justify-content-between">
                            <h2 class="mb-0 fw-600 font-18px ">{{ $service->name }}</h2>
                            <div class="d-flex gap-4">
                                <a href="#." onclick="openEditDiv({{ $key }})">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <a href="{{ route('dashboard.settings.services.delete', ['id' => $service->id]) }}">
                                    <i class="bi bi-trash3-fill font-22px  text-danger"></i>
                                </a>
                            </div>
                        </div>
                        <div id="editDiv{{ $key }}" class="d-none">
                            <form id="updateService">
                                @csrf
                                <input type="text" hidden name="service_id" value="{{ $service->id }}"
                                    id="">
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <div>
                                                <input type="text" name="name" class=" form-control "
                                                    placeholder="Name" value="{{ $service->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Duration (minutes)</label>
                                            <div>
                                                <input type="text" class=" form-control " name="duration"
                                                    placeholder="Duration" value="{{ $service->duration }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Location</label>
                                            <select class=" select-box" name="location"
                                                data-placeholder="Choose Location" style="width: 230px;">
                                                <option value="At clients address">At client’s address</option>
                                                <option value="Online (Phone Call)">Online (Phone Call)</option>
                                                <option value="At your business address">At your business address</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 my-4">
                                        <label for="">Color</label>
                                        <div class="d-flex">
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#DD6267"
                                                    {{ ($service->color == '#DD6267')? 'checked': '' }}
                                                    style="background-color: #DD6267;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#B2EBFF"
                                                    {{ ($service->color == '#B2EBFF')? 'checked': '' }}
                                                    style="background-color: #B2EBFF;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#6BFABD"
                                                    {{ ($service->color == '#6BFABD')? 'checked': '' }}
                                                    style="background-color: #6BFABD;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#CE9BE7"
                                                    {{ ($service->color == '#CE9BE7')? 'checked': '' }}
                                                    style="background-color: #CE9BE7;">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input color-radio-red" type="radio"
                                                    name="color" id="flexRadioDisabled" value="#EBA8D0"
                                                    {{ ($service->color == '#EBA8D0')? 'checked': '' }}
                                                    style="background-color: #EBA8D0;">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="d-flex gap-2">
                                            @foreach ($service->types as $types)
                                                <input class="form-control" aria-disabled="true"
                                                    value="{{ $types->service_type->name }} - ${{ $types->price }}"
                                                    readonly>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>

    @push('extra-js')
        <script>
            function addNew() {
                if ($("#addNew").hasClass("d-none")) {
                    $("#addNew").removeClass("d-none")
                } else [
                    $("#addNew").addClass('d-none')
                ]
            }

            function openEditDiv(key) {
                if ($("#editDiv" + key).hasClass("d-none")) {
                    $("#editDiv" + key).removeClass("d-none")
                } else [
                    $("#editDiv" + key).addClass('d-none')
                ]
            }

            $('#addService').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);


                $.ajax({
                    url: "{{ route('dashboard.settings.services.store') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
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
                });

            })


            $('#updateService').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);


                $.ajax({
                    url: "{{ route('dashboard.settings.services.update') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
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
                });

            })


            function openPrice(key) {
                // Toggle the input field when the checkbox is clicked
                var checkBox = document.getElementById('priceCheckbox' + key);
                console.log(checkBox.checked);
                if (checkBox.checked) {
                    $('#priceInput' + key).show();

                } else {
                    $('#priceInput' + key).hide();
                }

            }
        </script>
    @endpush
@endsection
