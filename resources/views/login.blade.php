<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)),
            url("{{ asset('/images/wallpaper.avif') }}");
            background-size: cover;
            background-attachment: fixed;
        }

        .nav-link,
        h1,
        label {
            color: white;
        }

        #border {
            width: 90%;
            max-width: 300px;
            margin: auto;
            position: relative;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
            border-radius: 25px;
            padding: 20px;
        }

        .textbox {
            width: 100%;
            height: 40px;
            border-radius: 20px;
            margin-bottom: 10px;
        }

        .form {
            margin-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        <div class="container">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/signup">SignUp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="post" name="adminloginform" class="form" action="{{ route('login') }}">
            @csrf
            <div id="border">
                <h1>User Login</h1>
                @if(Session::has('error'))
                <p class="text-danger">{{ Session::get('error') }}</p>
                @endif
                @if(Session::has('success'))
                <p class="text-success">{{ Session::get('success') }}</p>
                @endif
                <label>Email:</label>
                <input type="email" name="email" class="textbox">
                <span style="color:red;">@error('email') {{ $message }} @enderror</span><br>
                <label>Password:</label>
                <input type="password" name="password" class="textbox" />
                <span style="color:red;">@error('password') {{ $message }} @enderror</span><br>
                <a href="{{route('Forget-password')}}">Forgot Password</a><br>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
