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
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'home.php') !== false) echo 'active'; ?>" href="{{ route('admin.dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-grid-1x2-fill font-20px"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'home.php') !== false) echo 'active'; ?>" href="{{ route('admin.dashboard.providers') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill font-20px"></i></div>
                                Providers
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'home.php') !== false) echo 'active'; ?>" href="{{ route('admin.dashboard.customers') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-people font-20px"></i></div>
                                Customers
                            </a>
                            <a class="nav-link <?php if (strpos($_SERVER['REQUEST_URI'], 'home.php') !== false) echo 'active'; ?>" href="{{ route('admin.dashboard.bookings') }}">
                                <div class="sb-nav-link-icon"><i class="bi bi-cash font-20px"></i></div>
                                Bookings
                            </a>
                        </div>

                    </div>
                </div>

            </nav>
        </div>
