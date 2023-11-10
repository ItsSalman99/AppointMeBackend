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
    .PillList-item input[type="checkbox"]:checked + .PillList-label {
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
    .PillList-item
      input[type="checkbox"]:checked
      + .PillList-label
      .Icon--checkLight {
      display: inline-block;
    }
    .PillList-item input[type="checkbox"]:checked + .PillList-label .Icon--addLight,
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

<div class="cover-all-content">
    <div class="page-title d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="mb-0 fw-600 font-27px">Account & Settings</h2>
        <!-- <ul>
            <li><a href="#" class="btn btn-primary text-white extra-btn-padding-20" data-bs-toggle="modal" data-bs-target="#createEventModal">Create Events</a></li>
        </ul> -->
    </div>
    <br>
    <br>

    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Change Password</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="p-4">
                        <form>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Current Password</label>
                                        <input type="text" class="form-control" placeholder="Enter Your Current Password" name="" id="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="text" class="form-control" placeholder="New Password" name="" id="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="text" class="form-control" placeholder="Confirm Password" name="" id="">
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
        </div>
    </div>

</div>

@push('extra-js')
<script>

</script>
@endpush

@endsection
