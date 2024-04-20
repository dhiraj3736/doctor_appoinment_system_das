@extends('admin_layout.main')

@section('main-con')

<div class="row" style="margin-top: 100px;">

    <div class="col-lg-7 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">View appointment</h6>
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
                                <th class="pt-0">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($select_data as $key=> $row)
                            <tr>
                                <td>{{($select_data->currentPage()-1) * $select_data->perPage() + $key +1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->gender}}</td>
                                <td>{{$row->date}}</td>

                                <td>{{$row->email}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->service}}</td>
                                <td>{{$row->doctor}}</td>
                                <td>{{$row->time}}</td>
                                <td>{{$row->number}}</td>
                                <td>

    
                                <a href="status/{{$row->b_id}}" class="badge bg-{{ $row->status ? 'success' : 'danger' }}">
    {{ $row->status ? 'Approve' : 'Not approved' }}
</a>

</td>


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