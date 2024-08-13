<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.6)),
            url("{{ asset('/images/wallpaper.avif') }}");
            background-size: cover;
            background-attachment: fixed;
            color: white;
        }

        .nav-link {
            color: white;
            font-size: 16px;
        }

        #border {
            max-width: 500px;
            margin: auto;
            position: relative;
            box-shadow: 0 20px 55px rgba(0, 0, 0, 0.5);
            border-radius: 25px;
            padding: 20px;
            text-align: center;
        }

        .form-control {
            width: 100%;
            margin-top: 7px;
            border-radius: 20px;
        }

        .inputContainer {
            margin-bottom: 14px;
        }

        .form {
            margin-top: 50px;
            text-align: center;
        }

        .gender {
            color: white;
        }

        span {
            color: red;
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
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/signup">SignUp</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <form method="post" action="" name="adminloginform" class="form">
            @csrf
            <div id="border">

                <h1 class="title">Sign up</h1>

                <div class="inputContainer">
                    <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" placeholder="Fullname">
                </div>
                <span>
                    @error('fullname')
                    {{$message}}
                    @enderror
                </span>
                <div class="inputContainer">
                    <label class="gender">Gender</label>
                    <input type="radio" class="g" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> Male
                    <input type="radio" class="g" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female
                    <input type="radio" class="g" name="gender" value="others" {{ old('gender') == 'others' ? 'checked' : '' }}> Others
                </div>
                <span>
                    @error('gender')
                    {{$message}}
                    @enderror
                </span>
                <div class="inputContainer">
                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Username">
                </div>
                <span>
                    @error('username')
                    {{$message}}
                    @enderror
                </span>
                <div class="inputContainer">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
                </div>
                <span>
                    @error('address')
                    {{$message}}
                    @enderror
                </span>
                <div class="inputContainer">
                    <input type="text" class="form-control" name="number" value="{{ old('number') }}" placeholder="Contact no">
                </div>
                <span>
                    @error('number')
                    {{$message}}
                    @enderror
                </span>
                <div class="inputContainer">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                </div>
                <span>
                    @error('email')
                    {{$message}}
                    @enderror
                </span>

                <div class="inputContainer">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <span>
                    @error('password')
                    {{$message}}
                    @enderror
                </span>
                <div class="inputContainer">
                    <input type="password" class="form-control" name="password-confirmation" placeholder="Confirm Password">
                </div>
                <span>
                    @error('password-confirmation')
                    {{$message}}
                    @enderror
                </span>
                <br>
                <input type="submit" name="ok" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            // Custom JavaScript can go here
        });
    </script>
</body>

</html>
