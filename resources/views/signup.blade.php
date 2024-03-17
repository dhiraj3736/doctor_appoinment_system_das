<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    body{
        background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url("{{ asset('/images/3.jpg') }}");
        background-size: cover;
    }
    .nav-link {
    color: white; /* Default color */
    font-size: 16px; /* Default font size */
}



</style>


</head>

<body>
   
    <div class="card-header bg-transparent">
    <ul class="nav nav-pills card-header-pills justify-content-center">
        <li class="nav-item">
            <a class="nav-link " href="/dashboard">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/signup">SignUp</a>
        </li>
    </ul>


    </div>
    <div class="container">
    <div class="row justify-content-center" style="margin-top: 70px;">
        <div class="col-md-6">
            <div style="background: white; padding: 20px;">
                <form method="post" action="" name="adminloginform" class="form">
                    @csrf
                    <div class="mb-3">
                        <h1 class="title">Sign up</h1>

                        <div class="inputContainer">
                            <input type="text" name="fullname" class="form-control" placeholder="Fullname" >
                        </div>
                        <span>
                            @error('fullname')
                            {{$message}} 
                            @enderror
                        </span>
                        <div class="inputContainer">
                            <label class="gender">Gender</label><br>
                            <input type="radio" name="gender" value="male" > Male
                            <input type="radio" name="gender" value="female"> Female
                            <input type="radio" name="gender" value="others"> Others
                        </div>
                        <span>
                            @error('gender')
                            {{$message}} 
                            @enderror
                        </span>
                        <div class="inputContainer">
                            <input type="text" name="username" class="form-control" placeholder="Username" >
                        </div>
                        <span>
                            @error('username')
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
                            <input type="password" class="form-control" name="password-confirmation" placeholder="Confirm Password" >
                        </div>
                        <span>
                            @error('password-confirmation')
                            {{$message}} 
                            @enderror
                        </span>
                        <div class="inputContainer">
                            <input type="text" class="form-control" name="address" placeholder="Address" >
                        </div>
                        <span>
                            @error('address')
                            {{$message}} 
                            @enderror
                        </span>
                        <div class="inputContainer">
                            <input type="text" class="form-control" name="number" placeholder="Contact no">
                        </div>
                        <span>
                            @error('number')
                            {{$message}} 
                            @enderror
                        </span>
                        <div class="inputContainer">
                            <input type="email" class="form-control" name="email" placeholder="Email" >
                        </div>
                        <span>
                            @error('email')
                            {{$message}} 
                            @enderror
                        </span>

                        <input type="submit" name="ok" class="btn btn-primary" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>