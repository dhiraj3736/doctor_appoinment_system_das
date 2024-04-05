@extends('layouts.main')

@section('main-section')
<div class="container text-center mt-5">
    <h4 class="display-4" style="color: white; font-size: 30px;">View Appointment</h4>
</div>

<div class="container mt-5">
    <div class="table-responsive">
        <table class="table table-bordered table-hover mb-0" style="background-color: rgba(255, 255, 255, 0.8);">
            <thead class="bg-dark text-white">
                <tr>
                    <th scope="col">Fullname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date of Visit</th>
                    <th scope="col">Service</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Time</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($select_item as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>{{$row->gender}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->date}}</td>
                    <td>{{$row->service}}</td>
                    <td>{{$row->doctor}}</td>
                    <td>{{$row->time}}</td>
                    <td>{{$row->number}}</td>
                    <td>
                        @if($row->status == 0)
                        <span class="badge bg-danger">Not Approved</span>
                        @elseif($row->status == 1)
                        <span class="badge bg-success">Approved</span>
                        @else
                        <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </td>
                    <td>
                        <a href="/delete/{{$row->b_id}}" class="badge bg-danger">Delete</a>
                        <a href="/edit/{{$row->b_id}}" class="badge bg-success">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Pagination -->
<!-- Pagination -->
<div class="container mt-4">
    <div class="d-flex justify-content-center">
        {{ $select_item->links() }}
    </div>
</div>


@endsection
