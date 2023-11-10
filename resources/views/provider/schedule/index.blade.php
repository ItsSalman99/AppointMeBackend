@extends('provider.layouts.main')

@section('content')
    <style>
        .PillList-item {
            cursor: pointer;
            display: inline-block;
            float: left;
            font-size: 14px;
            font-weight: normal;
            line-height: 20px;
            margin: 0 12px 12px 0;
            text-transform: capitalize;
        }

        .PillList-item input[type="checkbox"] {
            display: none;
        }

        .PillList-item input[type="checkbox"]:checked+.PillList-label {
            background-color: #1da1f2;
            border: 1px solid #1da1f2;
            color: #fff;
            padding-right: 16px;
            padding-left: 16px;
        }

        .PillList-label {
            border: 1px solid #1da1f2;
            border-radius: 20px;
            color: #1c94e0;
            display: block;
            padding: 7px 28px;
            text-decoration: none;
        }

        .PillList-item input[type="checkbox"]:checked+.PillList-label .Icon--checkLight {
            display: inline-block;
        }

        .PillList-item input[type="checkbox"]:checked+.PillList-label .Icon--addLight,
        .PillList-label .Icon--checkLight,
        .PillList-children {
            display: none;
        }

        .PillList-label .Icon {
            width: 12px;
            height: 12px;
            margin: 0 0 0 12px;
        }

        .Icon--smallest {
            font-size: 12px;
            line-height: 12px;
        }

        .Icon {
            background: transparent;
            display: inline-block;
            font-style: normal;
            vertical-align: baseline;
            position: relative;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Change Password</a>
                </li>
            </ul>
            <div class="p-4">
                <h2>Update Your Schedule Availability Days</h2>
                <br>
                <form id="addSchedule">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">
                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Monday"
                                        @php if(checkSchedule('Monday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Monday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Monday')!=null) ? checkSchedule('Monday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Monday')!=null) ? checkSchedule('Monday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">
                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Tuesday"
                                        @php if(checkSchedule('Tuesday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Tuesday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Tuesday')!=null) ? checkSchedule('Tuesday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Tuesday')!=null) ? checkSchedule('Tuesday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">
                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Wednesday"
                                        @php if(checkSchedule('Wednesday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Wednesday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Wednesday') != null) ? checkSchedule('Wednesday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Wednesday')!=null) ? checkSchedule('Wednesday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>

                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">

                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Thursday"
                                        @php if(checkSchedule('Thursday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Thursday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Thursday') != null) ? checkSchedule('Thursday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Thursday')!=null) ? checkSchedule('Thursday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">
                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Friday"
                                        @php if(checkSchedule('Friday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Friday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Friday') != null) ? checkSchedule('Friday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Friday')!=null) ? checkSchedule('Friday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">
                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Saturday"
                                        @php if(checkSchedule('Saturday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Saturday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Saturday') != null) ? checkSchedule('Saturday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Saturday')!=null) ? checkSchedule('Saturday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>
                        <div class="col-md-12 my-2">
                            <div class="d-flex gap-2">
                                <label class="PillList-item">
                                    <input type="checkbox" name="days[]" value="Sunday"
                                        @php if(checkSchedule('Sunday') != null) { echo 'checked'; } @endphp>
                                    <span class="PillList-label">Sunday
                                        <span class="Icon Icon--checkLight Icon--smallest"><i
                                                class="fa fa-check"></i></span>

                                    </span>
                                </label>
                                <input type="time" value="{{(checkSchedule('Sunday') != null) ? checkSchedule('Sunday')->open_time : ''}}" class="form-control" name="open_time[]" id="">
                                <input type="time" value="{{(checkSchedule('Sunday')!=null) ? checkSchedule('Sunday')->close_time : ''}}" class="form-control" name="close_time[]" id="">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary " style="border: 0px;;">Update</button>
        </div>

        </form>
    </div>
    </div>
    </div>

    @push('extra-js')
        <script>
            addSchedule


            $('#addSchedule').on('submit', function(e) {
                e.preventDefault();

                var formData = new FormData(this);


                $.ajax({
                    url: "{{ route('dashboard.settings.updateScheduleDays') }}",
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
        </script>
    @endpush
@endsection
