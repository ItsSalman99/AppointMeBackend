<div id="layoutSidenav_content" class=" position-relative d-flex flex-column min-vh-100 justify-content-between flex-grow-1 " style="min-width: 0;">
    <main>
        <nav class="sb-topnav navbar navbar-expand bg-white justify-content-between py-3 px-3 px-md-5">
            <div class="order-1 order-lg-0">
                <a class=" me-lg-0 text-dark bg-transparent d-lg-none" id="sidebarToggle" href="#!"><i class="bi bi-justify-right font-20px"></i></a>
            </div>

            <div class="logo-sm d-block d-lg-none">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" class="width-20 width-md-10 width-lg-80" draggable="false" loading="lazy">
            </div>
            <ul class="navbar-nav ms-auto me-lg-0 me-2 align-items-center gap-3">


                <li class="nav-item dropdown">
                    <div class="dropdown" style="width: 80%;">
                        <a class="nav-link dropdown-toggle caret-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/lang.png') }}" alt="" data-bs-toggle="tooltip" data-bs-title="Langauges">
                        </a>
                        <ul class="dropdown-menu" style="">
                            <li>
                                <a href="#.">
                                    <div class="d-flex p-2">
                                        <div>
                                            <img src="{{ asset('assets/images/lang.png') }}" class="w-50">
                                        </div>
                                        <div>
                                            English
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#.">
                                    <div class="d-flex p-2">
                                        <div>
                                            <img src="{{ asset('assets/images/spanish.png') }}" class="w-50">
                                        </div>
                                        <div>
                                            Spanish
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown" style="width: 80%;">
                        <a class="nav-link dropdown-toggle caret-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/Hicon/Linear/Message.png') }}" alt="" data-bs-toggle="tooltip" data-bs-title="Messasges">
                        </a>
                        <ul class="dropdown-menu" style="width: 260px;">
                            <div class="">
                                <div style="padding: 10px; border-bottom: 2px solid #eee;">Messages</div>
                                <li>
                                    <a href="#" class="dropdown-item my-4">

                                        <div class="d-flex gap-2">
                                            <div>
                                                <span style="background-color: rgba(255, 147, 47, 1); padding: 13px; font-size: 14px; border-radius: 200px;"><b>DA</b></span>

                                            </div>
                                            <div>
                                                <span><b>Davi Amini</b></spans>
                                                    <br>
                                                    <span>New Message</span>
                                            </div>
                                        </div>


                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item my-4">

                                        <div class="d-flex gap-2">
                                            <div>
                                                <span style="background-color: rgba(255, 147, 47, 1); padding: 13px; font-size: 14px; border-radius: 200px;"><b>DA</b></span>

                                            </div>
                                            <div>
                                                <span><b>Davi Amini</b></spans>
                                                    <br>
                                                    <span>New Message</span>
                                            </div>
                                        </div>


                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <div class="dropdown" style="width: 70%;">
                        <a class="nav-link dropdown-toggle caret-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/Hicon/Linear/notify.png') }}" alt="" data-bs-toggle="tooltip" data-bs-title="Notifications">
                        </a>
                        <ul class="dropdown-menu">
                            <div class="notify ">
                                <div style="padding-bottom: 10px; border-bottom: 2px solid #eee;">Notifications </div>
                                <li><a href="#" class="dropdown-item">
                                        <p>New request for booking</p>
                                        <p>3 mins ago</p>
                                    </a></li>
                                <li>
                                    <a href="#" class="dropdown-item">
                                        <div class="w-100">
                                            <p>You have a appointment</p>
                                            <p>12 mins ago</p>
                                        </div>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown profile">
                    <a class="nav-link d-flex dropdown-toggle caret-none align-items-center gap-2 p-0" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" 
                    aria-expanded="false" data-bs-auto-close="outside"> <img src="{{ auth()->user()->profile_img }}" alt="" draggable="false" loading="lazy">
                        <div class="d-none d-lg-block" data-bs-toggle="tooltip" data-bs-title="Login Info">
                            <h6 class="text-capitalize m-0  font-15px font-weight-500">{{ Auth::user()->name }}</h6>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 mt-2" aria-labelledby="navbarDropdown" style="--bs-dropdown-min-width: 200px">

                        <li class="dropstart dropdown position-relative">
                            <a class="dropdown-item dropdown-toggle caret-none" href="{{ route('dashboard.settings.accountSettings') }}">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-gear font-22px"></i>
                                    <p class="m-0 d-flex align-items-center justify-content-between flex-1" style="color: inherit;">Account & Settings</p>
                                </div>
                            </a>
                        </li>

                        <li class="dropstart dropdown position-relative">
                            <a class="dropdown-item dropdown-toggle caret-none" href="{{ route('logout') }}">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-box-arrow-right font-22px"></i>
                                    <p class="m-0 d-flex align-items-center justify-content-between flex-1" style="color: inherit;">Logout</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>