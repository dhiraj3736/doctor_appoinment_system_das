@extends('doctor_layout.main')

@section('main-container')

<div class="row" style="margin-top: 100px;">
                    
                    <div class="col-lg-7 col-xl-12 stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-baseline mb-2">
                                    <h6 class="card-title mb-0">User</h6>
                                    <div class="dropdown mb-2">
                                        <a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">

                                <h1>
       
                                </h1>
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($select_data as $key => $row)
                                            <tr>
                                            <td>{{($select_data->currentPage()-1)* $select_data->perPage() + $key +1}}</td>
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
                                    <div class="container mt-4">
                        <div class="d-flex justify-content-center">
                            {{ $select_data->links() }}
                        </div>
                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->

@endsection