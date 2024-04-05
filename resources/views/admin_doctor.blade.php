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
    
    <style>
        /* Center the main content vertically and horizontally */
        .main-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Add CSS styling for the <a> tags */
        .custom-link {
            font-size: 18px; /* Adjust the font size as needed */
            color: #007bff; /* Change the color to your desired color */
            border: 1px solid #007bff; /* Add a border around the <a> tag */
            padding: 10px 20px; /* Add padding to the <a> tag */
            text-decoration: none; /* Remove default underline */
            border-radius: 5px; /* Optional: Add border radius for rounded corners */
            margin: 5px;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">

        <!-- Centered <a> tag -->
        
        <a href="/admin_login" class="custom-link">Admin</a>
        <a href="/register" class="custom-link">Doctor</a>

    </div>

    <!-- core:js -->
    <script src="{{asset('../assets/vendors/core/core.js')}}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{asset('../assets/vendors/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('../assets/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{asset('../assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('../assets/js/template.js')}}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{asset('../assets/js/dashboard-dark.js')}}"></script>
    <!-- End custom js for this page -->

</body>

</html>
