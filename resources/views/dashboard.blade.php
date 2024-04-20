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
            <a class="nav-link active" href="/dashboard">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/signup">SignUp</a>
        </li>
    </ul>


    </div>
    <h1 class="h1 d-flex justify-content-center" style="margin-top:200px; color:white;">DOCTOR APPOINTMENT SYSTEM</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>