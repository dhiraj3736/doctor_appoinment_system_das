@extends('layouts.main')

@section('main-section')

<div><div class="row justify-content-center" style="margin-top: 100px;">
    <div class="col-md-10">
        <div class="card card-primary transparent-bg">
            <div class="card-header">
                <h3 class="card-title" style="color: white;">Available Doctor</h3>
            </div>
            <div class="row" style="margin-top: 20px;">
                @foreach($doctor as $row)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset('storage/uploads/'.$row->image) }}" class="card-img-top" alt="Doctor Image" style="object-fit: cover; height: 200px;"> <!-- Adjust the max-height value as needed -->

                        <div class="card-body">
                            <h5 class="card-title">Dr. {{$row->name}}</h5>
                            <p class="card-text">NMC No.: {{$row->nmc_no}}</p>
                            <p class="card-text">Specialist: {{$row->specialist}}</p>

                            <p class="card-text">Qualification: {{$row->qualification}}</p>
                            <p class="card-text">experience: {{$row->experiance}}</p>


                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Add more cards here if needed -->
            </div>
        </div>
    </div>
</div>


</div>

@endsection