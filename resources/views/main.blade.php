<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('judul') - SB Admin</title>
        <link href="{{asset('sb-admin-bootstrap5/assets/datatables/datatables.css')}}" rel="stylesheet" />
        <link href="{{asset('sb-admin-bootstrap5/css/styles.css')}}" rel="stylesheet" />
        <script src="{{asset('sb-admin-bootstrap5/js/all.min.js')}}" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('/')}}">{{ Auth::user()->name }} </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            @if (auth()->user()->level == 1 || auth()->user()->level == 2)
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="{{request()->is('/') ? 'nav-link active': 'nav-link'}}" href="{{url('/')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @endif

                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="{{ request()->is(['hal-products','users','customers']) ? 'nav-link active' : 'nav-link'}}
                                {{ request()->is(['hal-products','users','customers']) ? 'collapse' : 'collapsed'}}" href="" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                List
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="{{ request()->is(['hal-products','users','customers']) ? 'collapsed' : 'collapse'}}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">

                                    @if (auth()->user()->level == '1')
                                    <a class="{{request()->is('hal-products') ? 'nav-link active': 'nav-link'}}" href="{{url('/hal-products')}}">Products</a>
                                    @elseif (auth()->user()->level == '2')
                                    <a class="{{request()->is('users') ? 'nav-link active': 'nav-link'}}" href="{{url('/users')}}">Users</a>
                                    @elseif (auth()->user()->level == '3')
                                    <a class="{{request()->is('customers') ? 'nav-link active': 'nav-link'}}" href="{{url('/customers')}}">Customer</a>
                                    @endif
                                </nav>
                            </div>
                            {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div> --}}

                            {{-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a> --}}
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                         @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <span class="badge rounded-pill bg-success">Online</span>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                            @yield('tema')

                            @yield('cardheader')

                            @yield('konten')

                    </div>
                </main>

                    @yield('adddata')
                    @yield('updatedata')

                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{asset('sb-admin-bootstrap5/jquery/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('sb-admin-bootstrap5/js/updatescript.js')}}"></script>
        <script src="{{asset('sb-admin-bootstrap5/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
        <script src="{{asset('sb-admin-bootstrap5/sweetalert2/dist/myscript.js')}}"></script>{{-- script hapus --}}
        <script src="{{asset('sb-admin-bootstrap5/css/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('sb-admin-bootstrap5/js/scripts.js')}}"></script>
        <script src="{{asset('sb-admin-bootstrap5/assets/datatables/simple-datatables.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('sb-admin-bootstrap5/js/datatables-simple-demo.js')}}"></script>
        {{-- chart --}}
        <script src="{{asset('sb-admin-bootstrap5/chart/chart.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('sb-admin-bootstrap5/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('sb-admin-bootstrap5/assets/demo/chart-bar-demo.js')}}"></script>
    </body>
</html>
