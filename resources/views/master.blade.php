<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ixony ERP</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('/dashboard_assets/vendors/core/core.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet"
        href="{{ asset('/dashboard_assets//vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/dashboard_assets//fonts/feather-font/css/iconfont.css') }}">

    <link rel="stylesheet" href="{{ asset('/dashboard_assets//vendors/flag-icon-css/css/flag-icon.min.css') }}">


    <link rel="stylesheet" href="{{ asset('/dashboard_assets//css/demo_1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('/dashboard_assets/images/favicon.png') }}" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />



</head>

<body>
    <div class="main-wrapper">


        <nav class="navbar">
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <div class="search-form">

                    <div class="input-group">

                        <input type="text" id="searchInput" placeholder="Search here..." class="w-50 mr-2">
                        <button class="btn btn-dark" id="searchBtn">Search</button>

                    </div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span
                                class="font-weight-medium ml-1 mr-1 d-none d-md-inline-block">English</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us"
                                    title="us" id="us"></i> <span class="ml-1"> English </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr"
                                    title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de"
                                    title="de" id="de"></i> <span class="ml-1"> German </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt"
                                    title="pt" id="pt"></i> <span class="ml-1"> Portuguese
                                </span></a>
                            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es"
                                    title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                        </div>
                    </li>


                    <li class="nav-item dropdown nav-apps">
                        <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="grid"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="appsDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">Web Apps</p>
                                <a href="javascript:;" class="text-muted">Edit</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="d-flex align-items-center apps">
                                    <a href="pages/apps/chat.html"><i data-feather="message-square"
                                            class="icon-lg"></i>
                                        <p>Chat</p>
                                    </a>
                                    <a href="pages/apps/calendar.html"><i data-feather="calendar"
                                            class="icon-lg"></i>
                                        <p>Calendar</p>
                                    </a>
                                    <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i>
                                        <p>Email</p>
                                    </a>
                                    <a href="pages/general/profile.html"><i data-feather="instagram"
                                            class="icon-lg"></i>
                                        <p>Profile</p>
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-messages">
                        <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="mail"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="messageDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">9 New Messages</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Leonardo Payne</p>
                                            <p class="sub-text text-muted">2 min ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Project status</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Carl Henson</p>
                                            <p class="sub-text text-muted">30 min ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Client meeting</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Jensen Combs</p>
                                            <p class="sub-text text-muted">1 hrs ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Project updates</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Amiah Burton</p>
                                            <p class="sub-text text-muted">2 hrs ago</p>
                                        </div>
                                        <p class="sub-text text-muted">Project deadline</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="figure">
                                        <img src="https://via.placeholder.com/30x30" alt="userr">
                                    </div>
                                    <div class="content">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p>Yaretzi Mayo</p>
                                            <p class="sub-text text-muted">5 hr ago</p>
                                        </div>
                                        <p class="sub-text text-muted">New record</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-notifications">
                        <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i data-feather="bell"></i>
                            <div class="indicator">
                                <div class="circle"></div>
                            </div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                                <a href="javascript:;" class="text-muted">Clear all</a>
                            </div>
                            <div class="dropdown-body">
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="user-plus"></i>
                                    </div>
                                    <div class="content">
                                        <p>New customer registered</p>
                                        <p class="sub-text text-muted">2 sec ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="gift"></i>
                                    </div>
                                    <div class="content">
                                        <p>New Order Recieved</p>
                                        <p class="sub-text text-muted">30 min ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="alert-circle"></i>
                                    </div>
                                    <div class="content">
                                        <p>Server Limit Reached!</p>
                                        <p class="sub-text text-muted">1 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="layers"></i>
                                    </div>
                                    <div class="content">
                                        <p>Apps are ready for update</p>
                                        <p class="sub-text text-muted">5 hrs ago</p>
                                    </div>
                                </a>
                                <a href="javascript:;" class="dropdown-item">
                                    <div class="icon">
                                        <i data-feather="download"></i>
                                    </div>
                                    <div class="content">
                                        <p>Download completed</p>
                                        <p class="sub-text text-muted">6 hrs ago</p>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                <a href="javascript:;">View all</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-profile">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                            @if (Auth::user()->image != '')
                                <img src="{{ asset('/uploads/user') }}/{{ Auth::user()->image }}" alt="">
                            @else
                                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                            @endif

                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdown">
                            <div class="dropdown-header d-flex flex-column align-items-center">
                                <div class="figure mb-3">

                                    @if (Auth::user()->image != '')
                                        <img src="{{ asset('/uploads/user') }}/{{ Auth::user()->image }}"
                                            alt="">
                                    @else
                                        <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" />
                                    @endif



                                </div>
                                <div class="info text-center">
                                    <p class="name font-weight-bold mb-0">{{ Auth::user()->name }}</p>
                                    <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="dropdown-body">
                                <ul class="profile-nav p-0 pt-3">


                                    <li class="nav-item">
                                        <a href="{{ route('Profile.Edit') }}" class="nav-link">
                                            <i data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>



                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="nav-link">
                                            <i data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>




        <!-- partial:partials/_sidebar.html -->

        @include('includes.sidebar')




        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->


            @yield('content')

            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2021 <a href="https://www.nobleui.com"
                        target="_blank">NobleUI</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i
                        class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('/dashboard_assets//vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('/dashboard_assets//vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//vendors/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('/dashboard_assets//vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//js/template.js') }}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ asset('/dashboard_assets//js/dashboard.js') }}"></script>
    <script src="{{ asset('/dashboard_assets//js/datepicker.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>


    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.select').select2();
        });
    </script>


    <script>
        $('.delete').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var link = $(this).attr('data-delete');
                    location.href = link;
                }
            })
        });
    </script>


    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>


    @yield('scripts')

    <script>
        const searchInput = document.getElementById('searchInput');
        const searchBtn = document.getElementById('searchBtn');

        searchBtn.addEventListener('click', function(e) {
            e.preventDefault();

            const value = searchInput.value;
            var link = "{{ route('Search') }}" + "?q=" + value;
            location.href = link;
        });
    </script>
    <!-- end custom js for this page -->
</body>

</html>
