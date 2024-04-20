<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("{{ asset('/images/3.jpg') }}");
            background-size: cover;
        }

        .nav-link {
            color: white;
        }

        h1,p,
        label {
            color: white;
        }

        #border {
            width: 300px;
            height: auto;
            border: 1px solid black;
            margin: auto;
            position: relative;
            box-shadow: 0 10px 25px;
            border-radius: 25px;
            padding: 3px;
        }

        .textbox {
            width: 200px;
            height: 30px;
            margin: 0 auto;
            /* Center horizontally */
            display: block;
            border-radius: 20px;
        }

        .form {
            margin-top: 150px;
            text-align: center;
            /* Center the form horizontally */
        }
    </style>
</head>

<body>
    <div class="card-header bg-transparent">
        <ul class="nav nav-pills card-header-pills justify-content-center">
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
    @if(session('message'))
    <span class="alert alert-success">
        {{ session('message') }}
    </span>
    @endif

    <form method="post" name="adminloginform" class="form" action="{{ route('Forget-password-post') }}">
        @csrf
        <div id="border">
            <p>Please enter your email search for your account.</p>
            @if(Session::has('error'))
            <p class="text-danger" style="color:red;">{{ Session::get('error') }}</p>
            @endif
            @if(Session::has('success'))
            <p class="text-success">{{ Session::get('success') }}</p>
            @endif
            <label>Email:</label>
            <input type="email" name="email" class="textbox">
            <span style="color:red;">@error('email') {{ $message }} @enderror</span><br>

            <input type="submit" class="btn btn-primary" value="Submit">
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
