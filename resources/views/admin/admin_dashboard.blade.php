@extends('admin_layout.main')

@section('main-con')

<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>

        </div>
    </div>





    <div class="row">
        <div class="col-lg-7 col-xl-10 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                        <h6 class="card-title mb-0">Customer</h6>
                        <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                <a class="dropdown-item d-flex align-items-center" href="{{url('/view_user')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="pt-0">User_id</th>
                                    <th class="pt-0">Full Name</th>
                                    <th class="pt-0">Gender</th>
                                    <th class="pt-0">Username</th>
                                    <th class="pt-0">Address</th>
                                    <th class="pt-0">Number</th>
                                    <th class="pt-0">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key=> $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{$row->fullname}}</td>
                                    <td>{{$row->gender}}</td>
                                    <td>{{$row->username}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->number}}</td>
                                    <td>{{$row->email}}</td>


                                </tr>

                                @endforeach


                            </tbody>

                        </table>


                    </div>
                    <a class="dropdown-item d-flex align-items-center" href="{{url('/view_user')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View More</span></a>

                </div>
            </div>
        </div>

    </div> <!-- row -->

    <div class="row">


        <div class="row" style="margin-top: 20px;">

            <div class="col-lg-7 col-xl-12 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Appointment</h6>
                            <div class="dropdown mb-2">
                                <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin_view_appoinment')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="pt-0">id</th>
                                        <th class="pt-0">Name</th>
                                        <th class="pt-0">gender</th>
                                        <th class="pt-0">date</th>
                                        <th class="pt-0">Email</th>

                                        <th class="pt-0">Address</th>
                                        <th class="pt-0">service</th>
                                        <th class="pt-0">doctor</th>
                                        <th class="pt-0">time</th>
                                        <th class="pt-0">number</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($book as $key => $row)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->gender}}</td>
                                        <td>{{$row->date}}</td>

                                        <td>{{$row->email}}</td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->service}}</td>
                                        <td>{{$row->doctor}}</td>
                                        <td>{{$row->time}}</td>
                                        <td>{{$row->number}}</td>


                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                        <a class="dropdown-item d-flex align-items-center" href="{{url('/admin_view_appoinment')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View More</span></a>

                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- row -->


    <div class="row">


        <div class="row" style="margin-top: 20px;">

            <div class="col-lg-7 col-xl-8 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Doctors</h6>
                            <div class="dropdown mb-2">
                                <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin_view_appoinment')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>

                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 2px;">
                            @foreach($doctors as $row)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="{{ asset('storage/uploads/'.$row->image) }}" class="card-img-top" alt="Doctor Image" style="object-fit: cover; height: 200px;"> <!-- Adjust the max-height value as needed -->

                                    <div class="card-body">
                                        <h5 class="card-title">Dr. {{$row->name}}</h5>

                                        <p class="card-text">Specialist: {{$row->specialist}}</p>


                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Add more cards here if needed -->
                        </div>
                        <a class="dropdown-item d-flex align-items-center" href="/add_doctor"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View More</span></a>


                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-xl-4 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Service</h6>
                            <div class="dropdown mb-2">
                                <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin_view_appoinment')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>

                                </div>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 2px;">
                            @foreach($service as $row)
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">{{$row->service}}</h5>
                                    <p class="card-text">{{$row->discription}}</p>

                                </div>
                            </div>
                            @endforeach
                            <!-- Add more cards here if needed -->
                        </div>
                        <a class="dropdown-item d-flex align-items-center" href="/add_service"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View More</span></a>


                    </div>
                </div>
            </div>
        </div> <!-- row -->
    </div> <!-- row -->

</div>
@endsection
