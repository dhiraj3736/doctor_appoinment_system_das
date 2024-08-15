@extends('layouts.main')

@section('main-section')

    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary border border-dark" style="background-color:rgba(0, 0, 0, 0.3)">
                    <div class="card-header text-white" style="background-color:rgba(109, 106, 106, 0.863)">
                        <h3 class="card-title" style="color: #ced6dd; font-size: 2.5rem; letter-spacing: 1px;">Available Doctors</h3>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 mt-4">
                        @if (isset($doctor))
                            @foreach ($doctor as $row)
                                <div class="col">
                                    <a href="/doctorProfile/{{ $row->d_id }}" class="text-decoration-none text-dark">
                                    <div class="card h-100" id="card2" style="cursor: pointer;" >
                                        <!-- Change cursor to pointer -->
                                        <img src="{{ asset('storage/uploads/' . $row->image) }}" class="card-img-top"
                                            alt="Doctor Image" style="object-fit: cover; height: 220px;">
                                        <div class="card-body" style="background-color: rgba(245, 234, 234, 0.9);">
                                            <h5 class="card-title">Dr. {{ $row->name }}</h5>
                                            <p class="card-text">Specialist: {{ $row->specialist }}</p>

                                        </div>
                                        <div class="card-footer text-center" style="background-color: rgba(245, 234, 234, 0.9);">
                                            <span class="btn btn-primary">View Profile</span>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        <!-- Add more cards here if needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        #card2:hover {
            transform: translateY(-10px);
            transition: transform 0.1s ease;
        }
    </style>

@endsection
