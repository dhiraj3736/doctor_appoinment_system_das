@extends('layouts.main')

@section('main-section')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-primary border border-dark" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Available Doctors</h3>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-4">
                    @if(isset($doctor))
                    @foreach($doctor as $row)
                    <div class="col">
                        <div class="card h-100" id="card2" style="cursor: pointer;"> <!-- Change cursor to pointer -->
                            <img src="{{ asset('storage/uploads/'.$row->image) }}" class="card-img-top" alt="Doctor Image" style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title">Dr. {{$row->name}}</h5>
                                <p class="card-text">Specialist: {{$row->specialist}}</p>
                                
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-dark view-doctor" data-bs-toggle="modal" data-bs-target="#exampleModalToggle{{$row->d_id}}">View Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <!-- Add more cards here if needed -->
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($doctor as $row)
<div class="modal fade" id="exampleModalToggle{{$row->d_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel{{$row->d_id}}"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1  ">
                    <div class="col">
                        <div class="card h-100" id="card2" >
                        <img src="{{ asset('storage/uploads/'.$row->image) }}" class="card-img-top" alt="Doctor Image" style="object-fit: cover; height: 300px;">
                            <div class="card-body">
                                <h5 class="card-title">Dr. {{$row->name}}</h5>
                                <p class="card-text">NMC No.: {{$row->nmc_no}}</p>
                                <p class="card-text">Specialist: {{$row->specialist}}</p>
                                <p class="card-text">Qualification: {{$row->qualification}}</p>
                                <p class="card-text">Experience: {{$row->experiance}}</p>

                                <p class="card-text">Available Time: {{$row->fromtime}} TO {{$row->totime}}</p>
                                <a href="/book" class="btn btn-primary" >Book</a>

                            </div>

                            <div class="card-footer">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
         
        </div>
    </div>
</div>
@endforeach


<style>
    #card2:hover {
        transform: translateY(-10px);
        transition: transform 0.1s ease;
    }
</style>

@endsection
