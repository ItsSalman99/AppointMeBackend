 <!-- start side bar -->
    <!-- <div class="preloader position-fixed top-0 start-0 w-100 h-100 bg-white" style="
        z-index: 999999;
        background: url(assets/images/icons/loading-bg.svg) no-repeat
          center/cover;
      ">
        <div class="centercontent h-100 d-flex align-items-center justify-content-center flex-column gap-4">
            <img src="assets/images/logo.png" alt="" class="width-50 width-md-25" />
            <div class="fill-bar"></div>
            <img src="assets/images/icons/loading-bg2.svg" alt="" class="width-60 width-md-40 position-absolute top-50 start-50 rotate360" />
        </div>
    </div> -->

    <div id="layoutSidenav" class="d-flex height-100vh">
        <div id="layoutSidenav_nav" class=" height-100vh position-fixed top-0 start-0" style="width: var(--sidebarwidth);">
            <!-- logo -->
            <div class="logo bg-white w-100 text-center p-3 d-none d-md-block position-relative" style="border-bottom: 1px solid var(--bs-gray-200);">
                <div class="d-flex align-items-cener justify-content-center h-50">
                    <a href="index.php" class="d-inline-flex">
                        <img src="{{ asset('assets/images/bookinglogo.png') }}" alt="" class="mx-auto">
                    </a>
                </div>
            </div>
            <!-- sidemenu links -->
            <nav class="sb-sidenav accordion bg-white d-flex flex-column overflow-hidden min-vh-100 flex-nowrap" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="cover-nav height-100vh px-4">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading pb-3">
                                <h4 class="font-14px m-0 opacity-07 font-weight-500 text-uppercase">Main Menu</h4>
                            </div>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'home.php') !== false) echo 'active'; ?>" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2-fill font-20px"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'calendar.php') !== false) echo 'active'; ?>" href="{{ route('dashboard.calendar') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-calendar-check font-20px"></i></div>
                                Calendar
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'clients.php') !== false) echo 'active'; ?>" href="{{ route('dashboard.clients') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill font-20px"></i></div>
                                Clients
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'clients.php') !== false) echo 'active'; ?>" href="{{ route('dashboard.bookings.index') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill font-20px"></i></div>
                                Appointments
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'inbox.php') !== false || strpos($_SERVER['REQUEST_URI'], 'booking-requests.php') !== false || strpos($_SERVER['REQUEST_URI'], 'chat.php') !== false) echo 'active'; ?>" href="{{ route('dashboard.inbox') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-inbox font-20px"></i></div>
                                Inbox
                            </a>

                            <a class="nav-link collapsed 
                            <?php if ((strpos($_SERVER['REQUEST_URI'], 'business-details.php') !== false) || (strpos($_SERVER['REQUEST_URI'], 'services.php') !== false) || (strpos($_SERVER['REQUEST_URI'], 'location.php') !== false) || (strpos($_SERVER['REQUEST_URI'], 'availability.php') !== false) || (strpos($_SERVER['REQUEST_URI'], 'payments.php') !== false)) echo 'active'; ?> sidenav-active" 
                            href="#" data-bs-toggle="collapse" data-bs-target="#NewsLetter" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="bi bi-gear-fill font-20px"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                            </a>
                            <div class="collapse" id="NewsLetter" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested">
                                    <a class="nav-link" href="{{ route('dashboard.settings.business-details') }}">
                                        Business Details
                                    </a>
                                    <a class="nav-link" href="{{ route('dashboard.settings.services') }}">
                                        Services
                                    </a>
                                    <a class="nav-link" href="{{ route('dashboard.settings.location') }}">
                                        Locations
                                    </a>
                                    <a class="nav-link" href="{{ route('dashboard.settings.availability') }}">
                                        Availability
                                    </a>
                                    <!--<a class="nav-link" href="{{ route('dashboard.settings.payments') }}">-->
                                    <!--    Payment-->
                                    <!--</a>-->
                                </nav>
                            </div>
                            <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'reports.php') !== false) echo 'active'; ?>" href="reports.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-file font-20px"></i></div>
                                Reports
                            </a>
                           <!-- <a class="nav-link collapsed sidenav-active" href="#" data-bs-toggle="collapse" data-bs-target="#Payments" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="bi bi-coin font-20px"></i></div>
                                Payments
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                            </a>
                           <div class="collapse" id="Payments" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested">
                                    <a class="nav-link" href="transaction-history.php">
                                        Transaction History
                                    </a>
                                    <a class="nav-link" href="withdraw-request.php">
                                        Withdraw Request
                                    </a>
                                </nav>
                            </div> -->

                            <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], 'subscription.php') !== false) echo 'active'; ?>" href="subscription.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-bookmark-star-fill font-20px"></i></div>
                                Subscription
                            </a> 




                            <!-- <a class="nav-link collapsed sidenav-active" href="#" data-bs-toggle="collapse" data-bs-target="#website" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="bi bi-gear-fill font-20px"></i></div>
                                Website Setting
                                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-chevron-down"></i></div>
                            </a>
                            <div class="collapse" id="website" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested">
                                    <a class="nav-link" href="managepackages.php">
                                        Manage Packages
                                    </a>
                                </nav>
                            </div> -->
                        </div>
                    </div>
                </div>

            </nav>
        </div>