<!-- Include Bootstrap CSS -->

<!-- Navbar -->
<?php

use App\Models\model_signup;
use Illuminate\Support\Facades\Session;
$u_id = session('u_id');
$user = model_signup::find($u_id);

$notifications = $user->notifications;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<!-- Include Feather Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Your HTML code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)),
                url("{{ asset('/images/wallpaper.avif') }}");
            background-size: cover;
            background-attachment: fixed;
        }

        .navbar {
            /* position: fixed; */
            top: 0;
            width: 100%;
            background-color: #333;
            z-index: 1000;
        }

        .navbar .nav-link {
            color: white;
            font-size: 18px;
            padding: 15px 20px;
            margin-left: 12px;
            transition: all 0.3s ease;
            text-decoration: none;
        }


        .nav-link:hover {
            color: #ffc107;
            text-decoration: none;
            /* Ensure no underline on hover */
        }

        .navbar-brand {
            font-size: 24px;
            margin-right: 30px;
        }

        .dropdown-item {
            color: black;
            font-size: 16px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #343a40;
            color: #ffc107;
        }


        .navbar-nav .nav-item .nav-link.active {
            color: #ffc107;
            /* Change color for active link */
        }

        .no-caret::after {
            display: none !important;
        }

        a {
            text-decoration: none;
        }

        .dropdown-item:hover a {
            color: #ffc107 !important;
        }

        .container {
            padding: 50px;
        }

        /* Star Rating Styles */
.rating {
    direction: rtl;
    display: inline-block;
    font-size: 1.5em;
}

.rating input {
    display: none;
}

.rating label {
    color: #ddd;
    cursor: pointer;
    display: inline-block;
}

.rating label:hover,
.rating label:hover ~ label,
.rating input:checked ~ label {
    color: #f5c518;
}

    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">






                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('userdashboard') ? 'active' : '' }}"
                            href="/userdashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('view_doctor') ? 'active' : '' }}"
                            href="/view_doctor">Doctor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('view_service') ? 'active' : '' }}"
                            href="/view_service">Service</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Request::is('book', 'view_appoinment') ? 'active' : '' }} no-caret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            View Appoinment
                        </a>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="/upCommingSchedule">Up Comming Schedule</a></li>
                            <li><a class="dropdown-item" href="/completedSchedule">Completed Schedule</a></li>

                            <li><a class="dropdown-item" href="/view_report">View Report</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle no-caret" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/images/qqqq.png" alt="Notifications" class="rounded-circle" style="width: 25px; height: 25px;">
                            <span class="badge bg-danger position-absolute top-1 start-100 translate-middle">{{ $user->unreadNotifications->count() }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end p-0 shadow-lg rounded-lg" style="width: 400px;">
                            <div class="dropdown-header text-white text-center py-2" style="background-color: #726d6d">
                                Notifications
                            </div>
                            <div class="dropdown-divider m-0"></div>
                            <div class="list-group">
                                @foreach ($user->notifications as $notification)
                                    @if (isset($notification->data['name']))
                                        <a class="list-group-item list-group-item-action {{ $notification->read_at ? '' : 'bg-warning text-light' }}"
                                            href="/view_appointment"
                                            onclick="event.preventDefault(); document.getElementById('mark-as-read-{{ $notification->id }}').submit();">
                                            <div class="d-flex flex-column">
                                                <span class="text-wrap text-break" style="max-width: 100%;">
                                                    Hello, {{ $notification->data['name'] }} your appointment is Approved
                                                </span>
                                                <small class="text-muted mt-1">{{ $notification->created_at->diffForHumans() }}</small>
                                            </div>
                                        </a>
                                        <form id="mark-as-read-{{ $notification->id }}"
                                            action="{{ route('notifications.markAsRead', $notification->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @elseif(isset($notification->data['b_id']))
                                        <a class="list-group-item list-group-item-action {{ $notification->read_at ? '' : 'bg-warning text-light' }}"
                                            href="/view_report"
                                            onclick="event.preventDefault(); document.getElementById('mark-as-read-{{ $notification->id }}').submit();">
                                            <div class="d-flex flex-column">
                                                <span class="text-wrap text-break" style="max-width: 100%;">
                                                    New report added by doctor</span>
                                                    <small class="text-muted mt-1">{{ $notification->created_at->diffForHumans() }}</small>
                                                </div>
                                        </a>
                                        <form id="mark-as-read-{{ $notification->id }}"
                                            action="{{ route('notifications.markAsRead', $notification->id) }}"
                                            method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (isset($user->image) && $user->image !== null)
                                <img src="{{ asset('storage/uploads/' . $user->image) }}" alt="profile"
                                    style="width: 30px; height: 30px;" class="rounded-circle">
                            @else
                                <img src="{{ asset('images/pro.webp') }}" alt="profile"
                                    style="width: 30px; height: 30px;" class="rounded-circle">
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end  p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    @if (isset($user->image) && $user->image !== null)
                                        <img src="{{ asset('storage/uploads/' . $user->image) }}" alt="profile"
                                            style="width: 100px; height: 100px;" class="rounded-circle">
                                    @else
                                        <img src="{{ asset('images/pro.webp') }}" alt="profile"
                                            style="width: 100px; height: 100px;" class="rounded-circle">
                                    @endif
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">{{ session('fullname') }}</p>
                                    <p class="tx-12 text-muted"><a href="mailto:dhirajbikramshah@gmail.com">
                                            {{ session('email') }}</a></p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="/user_profile" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" data-bs-target="#editprofile" data-bs-toggle="modal"
                                        class="text-body ms-0">
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
                                    <a href="/logout" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @include('editprofile')

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>

