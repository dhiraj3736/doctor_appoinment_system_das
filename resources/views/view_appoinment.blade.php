@extends('layouts.main')

@section('main-section')
<div class="container text-center">
    <h4 class="display-4" style="color: white; font-size:30px;">View Appointment</h4>
</div>


<table class="table table-bordered table-hover mb-0" border="2" >
    <thead>
        <tr>
            <th scope="col">Fullname</th>
            <th scope="col">email</th>
            <th scope="col">gender</th>
            <th scope="col">address</th>
            <th scope="col">dov</th>
            <th scope="col">service </th>
            <th scope="col">doctor</th>
            <th scope="col">time</th>
            <th scope="col">phone</th>
            <th scope="col">status</th>
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

            <td><a href="/delete/{{$row->b_id}} " class="badge bg-danger">delete</a><br><a href="/edit/{{$row->b_id}}" class="badge bg-success">edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>



@endsection