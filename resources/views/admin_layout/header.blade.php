
<?php

use App\Models\doctor_v_model;
use App\Models\model_admin;

use Illuminate\Support\Facades\Session;
$a_id=session('a_id');
$noti =model_admin::find($a_id); 

$notifications = $noti->notifications;
?>
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

    <title>admin pannel</title>

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
                    Admin
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
                        <a href="{{url('/admin_dashboard')}}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{url('/view_user')}}" class="nav-link">
                            <i class="link-icon" data-feather="user"></i>
                            <span class="link-title">User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{url('/admin_view_appoinment')}}" class="nav-link">
                            <i data-feather="eye" class="link-icon"></i>
                            <span class="link-title">View Appointment</span>
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

                    <li class="nav-item">
                        <a href="{{url('/logout_admin')}}" class="nav-link">
                            <i class="link-icon" data-feather="log-out"></i>
                            <span class="link-title">Logout</span>
                        </a>
                    </li>









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
                               
                                @foreach ($noti->unreadNotifications as $notification)
                                @if(isset($notification->data['doctor']) && isset($notification->data['name']))
                                <div class="p-1">
                                    <!-- Display the notification message and link -->
                                    <a href="" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="plus"></i>
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
                                @elseif(isset($notification->data['name']))
                                <div class="p-1">
                                    <!-- Display the notification message and link -->
                                    <a href="" class="dropdown-item d-flex align-items-center py-2">
                                        <div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
                                            <i class="icon-sm text-white" data-feather="user-plus"></i>
                                        </div>
                                        <div class="flex-grow-1 me-2">
                                            <p>New user {{$notification->data['name']}} registered</p>
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
                              
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">{{session('email')}}</p>

                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        <a href="pages/general/profile.html" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="user"></i>
                                            <span>Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="repeat"></i>
                                            <span>Switch User</span>
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