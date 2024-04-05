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
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow-1">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">New Customers</h6>
                                <div class="dropdown mb-2">
                                    <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h3 class="mb-2">3,897</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <span>+3.3%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-xl-7">
                                    <div id="customersChart" class="mt-md-3 mt-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div> <!-- row -->



    <div class="row">
        <div class="col-lg-7 col-xl-8 stretch-card">
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
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
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
        <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Cloud storage</h6>
                        <div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>
                    </div>
                    <div id="storageChart"></div>
                    <div class="row mb-3">
                        <div class="col-6 d-flex justify-content-end">
                            <div>
                                <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                                <h5 class="fw-bolder mb-0 text-end">8TB</h5>
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
                                <h5 class="fw-bolder mb-0">~5TB</h5>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary">Upgrade storage</button>
                    </div>
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
                            <h6 class="card-title mb-0">Appoinment</h6>
                            <div class="dropdown mb-2">
                                <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item d-flex align-items-center" href="{{url('/admin_view_appoinment')}}"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
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
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
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
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
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