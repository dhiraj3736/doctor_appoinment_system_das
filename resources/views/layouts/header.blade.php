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
    
    }
    .nav-link {
    color: white; /* Default color */
    font-size: 20px; 
    padding: 15px;
    /* Default font size */
    }
    .ttt  {
    margin: 0;
    padding: 0;
    color: white;
    
}
.vertical-menu {
    background-color: transparent !important;
}
.table{
    width: 800px;
    background-color: transparent !important;
    padding: 3px;
    
            margin: auto;
           
           
           
    
}
th,td{
    border: 2px;
}
.transparent-bg {
    background-color: rgba(255, 255, 255, 0.2); /* Adjust the last value (0.5) to change opacity */
}
.transparent-table {
    background-color: rgba(255, 255, 255, 0); /* Table background transparent */
}





</style>


</head>

<body>
   
<div class="card-header bg-transparent">
    <ul class="nav nav-pills card-header-pills justify-content-end">
        <li class="nav-item">
            <a class="nav-link" href="/userdashboard">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/view_doctor">Doctor</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="/view_service">Service</a>
        </li>
      
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           book
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/book">Book</a></li>
            <li><a class="dropdown-item" href="/view_appoinment">View_appoinment</a></li>
       
           
          </ul>
        </li>

      
        <li class="nav-item">
            <a class="nav-link" href="/logout">logout</a>
        </li>
    </ul>
</div>
