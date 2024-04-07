<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>Doctor pannel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">


    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('../assets/vendors/core/core.css')}}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('../assets/vendors/flatpickr/flatpickr.min.css')}}">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('../assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('../assets/css/demo2/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('../assets/images/favicon.png')}}" />
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
              
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            
            <div class="sidebar-body">
                <ul class="nav">
                    <li class="nav-item nav-category">Main</li>
                    <li class="nav-item">
                        <a href="{{url('/doctor_dashboard')}}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/view_d_appoinment')}}" class="nav-link">
                            <i class="link-icon" data-feather="eye"></i>
                            <span class="link-title">View Appoinment</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/view_my_appoinment')}}" class="nav-link">
                            <i class="link-icon" data-feather="eye"></i>
                            <span class="link-title">View my Appointment</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/view_d_user')}}" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">View User</span>
                        </a>
                    </li>
                 

                    <li class="nav-item">
                        <a href="{{url('/logout_doctor')}}" class="nav-link">
                            <i class="link-icon" data-feather="log-out"></i>
                            <span class="link-title">Logout</span>
                        </a>
                    </li>
                    <!--   <li class="nav-item">
                        <a href="{{url('/admin_view_appoinment')}}" class="nav-link">
                            <i data-feather="eye" class="link-icon"></i>
                            <span class="link-title">View Appoinment</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/add_service')}}" class="nav-link">
                            <i class="link-icon" data-feather="plus"></i>
                            <span class="link-title">Add services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/add_doctor')}}" class="nav-link">
                            <i class="link-icon" data-feather="plus"></i>
                            <span class="link-title">Add Doctor</span>
                        </a>
                    </li>
                   -->








                </ul>
            </div>
        </nav>

        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                <form class="search-form" action="">
                        <div class="input-group">
                            <div class="input-group-text">
                                <i data-feather="search"></i>
                            </div>
                            <input type="search" class="form-control" name="search" id="navbarForm" value="" placeholder="Search here...">
                            <button class="btn btn-primary">search</button>
                        </div>
                    </form>
                    <ul class="navbar-nav">



                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                <div class="indicator">
                                    <div class="circle"></div>
                                </div>
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
    <div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
        <p>6 New Notifications</p>
        <a href="javascript:;" class="text-muted">Clear all</a>
    </div>
    @foreach ($user->unreadNotifications as $notification)
        @if(isset($notification->data['doctor']) && $notification->data['doctor'] == session('name'))
        <div class="p-1">
            <!-- Display the notification message and link -->
            <a href="" class="dropdown-item d-flex align-items-center py-2">
                <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                    <i class="icon-sm text-white" data-feather="gift"></i>
                </div>
                <div class="flex-grow-1 me-2">
                    <p>New book added by {{$notification->data['name']}}</p>
                    <p class="tx-12 text-muted">30 min ago</p>
                </div>
            </a>
            
            <!-- Form for marking notification as read -->
            <form id="mark-as-read-{{ $notification->id }}" action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <!-- JavaScript to submit the form when notification link is clicked -->
            <script>
                document.querySelector('#mark-as-read-{{ $notification->id }}').previousElementSibling.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    document.querySelector('#mark-as-read-{{ $notification->id }}').submit(); // Submit the form
                });
            </script>
        </div>
        @endif
    @endforeach
    <div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
        <a href="javascript:;">View all</a>
    </div>
</div>



                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @foreach($doctor_info as $bow)
                                @if(isset($bow->name) && $bow->name == $user->name)
                                <img class="wd-30 ht-30 rounded-circle" src="{{ asset('storage/uploads/'.$bow->image) }}" alt="profile">
                                @endif
                                @endforeach
                            </a>

                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        @foreach($doctor_info as $row)

                                        @if(isset($row->name) && $row->name == $user->name)
                                        <div style="width: 150px; height:150px; margin: 0 auto;  padding: 10px;">
                                            @if(isset($row->image) && $row->image !== NULL)
                                            <img src="{{ asset('storage/uploads/'.$row->image) }}" alt="..." style="width: 100%; height:100%;" class="rounded-circle">
                                            @else
                                            <img src="{{ asset('images/pro.webp') }}" alt="profile" style="width: 100%; height:100%;" class="rounded-circle">
                                            @endif


                                        </div>
                                        @endif

                                        @endforeach
                                        <!-- <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt=""> -->
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">{{session('name')}}</p>
                                        <p class="tx-12 text-muted">{{session('email')}}</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        <a href="/doctorprofile" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>


                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>