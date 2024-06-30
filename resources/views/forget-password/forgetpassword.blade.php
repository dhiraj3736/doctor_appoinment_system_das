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
            color: white;
        }

        .nav-link {
            color: white;
        }

        #border {
            max-width: 300px;
            width: 90%; /* Adjusted for responsiveness */
            margin: auto;
            padding: 15px;
            border: 1px solid black;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.5);
        }

        .textbox {
            width: 100%; /* Adjusted for responsiveness */
            height: 30px;
            border-radius: 20px;
            margin-bottom: 10px; /* Added spacing between elements */
        }

        .form {
            margin-top: 50px; /* Adjusted for spacing */
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

    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form method="post" name="adminloginform" class="form" action="{{ route('Forget-password-post') }}">
        @csrf
        <div id="border">
            <p>Please enter your email to search for your account.</p> <!-- Corrected typo -->
            @if(Session::has('error'))
            <p class="text-danger">{{ Session::get('error') }}</p>
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
