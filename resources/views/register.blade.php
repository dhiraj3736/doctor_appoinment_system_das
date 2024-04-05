<!DOCTYPE html>
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
        .form-container {
            margin-top: 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .container {
            margin-top: 100px;
            padding: 20px;

        }

        .center-text {
            text-align: center;

        }
        .link-icon {
            position: absolute;
            top: 10px;
            left: 10px;
          
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/main_dashboard"> <i class="link-icon" data-feather="arrow-left"></i></a>
        <div class="row">
            <h3 class=" center-text">For Doctor only</h3>
            <!-- Left Column for Registration Form -->
            <div class="col-md-6">
                <div class="form-container">
                    <!-- Doctor Registration Form -->
                    <h3>Register</h3>
                    <form action="{{ url('/register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Doctor</label>
                            <select name="name" class="form-control" id="name">
                                @foreach($doctors as $row)
                                <option value="{{ $row->name }}" {{ (isset($select_item) && $select_item->name == $row->name) || old('doctor') == $row->name ? 'selected' : '' }}>
                                    {{ $row->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- End Left Column -->

            <!-- Right Column for Login Form -->
            <div class="col-md-6">
                <div class="form-container">
                    <!-- Doctor Login Form -->
                    <h3>Login</h3>
                    <form action="{{ url('/doctor_login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="login_email">Email address</label>
                            <input type="email" class="form-control" name="email" id="login_email">
                        </div>
                        <div class="form-group">
                            <label for="login_password">Password</label>
                            <input type="password" class="form-control" name="password" id="login_password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- End Right Column -->
        </div>
    </div>

    <!-- Bootstrap JS -->
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