@extends('provider.layouts.main')

@section('content')

<div class=" d-flex align-items-center justify-content-between gap-3 flex-wrap p-4" style="background-color: #04AEEC;">
    <h2 class="mb-0 fw-600 font-27px text-white">Calendar</h2>
</div>
<div class=" d-flex align-items-center justify-content-between gap-3 flex-wrap p-4" style="background-color: #181439;">
    <div class="d-flex gap-2">
        <div class="">
            <button class="btn " style="background-color: #363657; color: #fff; border-radius: 50px;">
                << </button>
        </div>
        <div class="">
            <button class="btn " style="background-color: #363657; color: #fff; border-radius: 50px;">
                < </button>
        </div>
        <div class="">
            <h2 class="mb-0 fw-600 font-27px text-white">April 19 - 25, 2023</h2>
        </div>
        <div class="">
            <button class="btn " style="background-color: #363657; color: #fff; border-radius: 50px;">
                > </button>
        </div>
        <div class="">
            <button class="btn " style="background-color: #363657; color: #fff; border-radius: 50px;">
                >> </button>
        </div>
    </div>
    <div class="d-flex gap-4">
        <a href="calendar-daily.php" class="btn " style="background-color: #363657; color: #fff;">
            <i class="bi bi-calendar-check"></i>
            Daily
        </button>
        <a href="calendar.php" class="btn btn-primary">
            <i class="bi bi-calendar-check"></i>
            Weekly
        </a>
    </div>
</div>
<div class=" d-flex align-items-center justify-content-around gap-3 flex-wrap p-4" style="border-bottom: 2px solid #ddd; background-color: #fff;">
    <div>
        <a href="#.">Mon 4/19</a>
    </div>
    <div>
        <a href="#.">Tue 4/20</a>
    </div>
    <div>
        <a href="#.">Wed 4/21</a>
    </div>
    <div>
        <a href="#.">Thur 4/22</a>
    </div>
    <div>
        <a href="#.">Fri 4/23</a>
    </div>
    <div>
        <a href="#.">Sat 4/24</a>
    </div>
    <div>
        <a href="#.">Sun 4/25</a>
    </div>
</div>
<div class="row ">
      <div class="col" style="border-right: 2px solid #ddd; height: 4742px;">
            <div data-bs-toggle="modal" data-bs-target="#detailsModal" style="border-left: 8px solid #6BFABD; background-color: rgba(107, 250, 189, 0.16);" class="p-2 mx-4 my-4">
                <h5>Tuna Alexa</h5>
                <p>Eye Checkup</p>
            </div>
      </div>
      <div class="col" style="border-right: 2px solid #ddd; height: 4742px;">
        
      </div>
      <div class="col" style="border-right: 2px solid #ddd; height: 4742px;">
        
      </div>
      <div class="col" style="border-right: 2px solid #ddd; height: 4742px;">
        
      </div>
      <div class="col" style="border-right: 2px solid #ddd; height: 4742px;">
        
      </div>
      <div class="col" style="border-right: 2px solid #ddd; height: 4742px;">
        
      </div>
      <div class="col"  style="border-right: 2px solid #ddd; height: 4742px;">
            <div data-bs-toggle="modal" data-bs-target="#detailsModal" style="border-left: 8px solid #6BFABD; background-color: rgba(107, 250, 189, 0.16);" class="p-2 mx-2 my-4">
                    <h5>Tuna Alexa</h5>
                    <p>Eye Checkup</p>
            </div>
      </div>
      
      
      
    </div>
<!--<div class="row" style="background-color: #fff;">
    <div style="border-right: 2px solid #ddd; height: 742px;" class="col-2">
        <div style="border-left: 8px solid #6BFABD; background-color: rgba(107, 250, 189, 0.16);" class="p-2 mx-2 my-4">
            <h5>Tuna Alexa</h5>
            <p>Eye Checkup</p>
            <!--<p>10:00 AM to 11:00 AM</p>
            <p>Eye Checkup</p> --!>
        </div>
    </div>
    <div style="border-right: 2px solid #ddd; height: 742px;" class="col-2">
        
    </div>
    <div style="border-right: 2px solid #ddd; height: 742px;" class="col-2">
        
    </div>
    <div style="border-right: 2px solid #ddd; height: 742px;" class="col-2">

    </div>
    <div style="border-right: 2px solid #ddd; height: 742px;" class="col-2">
        
    </div>
    <div style="border-right: 2px solid #ddd; height: 742px;" class="col-2">
        <div style="border-left: 8px solid rgba(255, 159, 70, 1); background-color: rgba(255, 159, 70, 0.15);" class="p-2 mx-2 my-4">
            <h5>Tuna Alexa</h5>
            0<p>Eye Checkup</p>
            <!--<p>10:00 AM to 11:00 AM</p>
            <p>Eye Checkup</p> --!>
        </div>
    </div>
</div>!-->

    <!-- Modal -->
    <div class="modal fade" id="detailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px;">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking Request By Tuna</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="background-color: #f6fdff">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">
                    Details
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    Activity
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">Name:</div>
                                <div class="col-6">Tuna Alex</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Email:</div>
                                <div class="col-6">tuna@gmail.com</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Number:</div>
                                <div class="col-6">+1 (512) 400 1222</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Country:</div>
                                <div class="col-6">United States of America</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Address:</div>
                                <div class="col-6">Brooktown 3001 Port Crowd Street B2</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6">Service:</div>
                                <div class="col-6">Eye Checkup</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Requested On:</div>
                                <div class="col-6">Sunday 10 March, 2023</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Time Slot:</div>
                                <div class="col-6">10:00 AM to 12:00 AM</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Location:</div>
                                <div class="col-6">At client’s address</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Amount:</div>
                                <div class="col-6">$34.24 (You’ll receive $30.00)</div>
                            </div>
                            <div class="row">
                                <div class="col-6">Payment Status:</div>
                                <div class="col-6">Paid</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6>Activity</h6>
                                <div>
                                <!--<div>
                                    <a href="#."><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>Add Note</a>
                                </div>!-->
                            </div>
                            <div class="bg-light" style="padding: 20px">Tuna Alex requested this appointment (12:00 AM)</div>
                            <div class="bg-primary" style="padding: 20px; background-color:#04AEEC; text-align:center; margin-top: 10px">
                                <h5 class="text-white">$34</h5>
                                <p class="text-white">Tuna paid the fees via credit card</p>
                            </div>
                            <hr>
                            <div>
                                <h6>Add Note</h6>
                                <textarea name="text" class="form-control w-100" placeholder="Add a note"></textarea>
                                <div class="d-flex justify-content-between my-4">
                                    <div style="width: 40%">
                                        <button class="btn btn-primary w-100">
                                            Add Note
                                        </button>
                                    </div>
                                    <!--<div style="width: 40%">
                                        <button class="btn btn-danger w-100">
                                            Cancel
                                        </button>
                                    </div>!-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="card">
                <div class="card-body">
                    <h6>Take Action</h6>
                    <div class="d-flex justify-content-between">
                        <div style="width: 40%">
                            <button class="btn btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            Accept Request
                            </button>
                        </div>
                        <div style="width: 40%">
                            <button class="btn btn-danger w-100"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            Reject Request</button>
                        </div>
                    </div>
                </div>
            </div>
        <!--<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
        </div>!-->
        </div>
    </div>
    </div>
    
@endsection