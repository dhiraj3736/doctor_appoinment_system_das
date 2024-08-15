@extends('layouts.main')

@section('main-section')

<div class="container mt-0">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-12">
            <!-- Service Information -->
            <div class="service-info mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/uploads/' . $service->image) }}" class="img-fluid rounded" alt="Service Image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="text" style="color: #ced6dd; font-size: 2rem; letter-spacing: 1px;">{{ $service->service }}</h2>
                        <p class="lead" style="color: rgb(233, 230, 225)">{{ $service->discription }}</p>
                    </div>
                </div>
            </div>

            <!-- Recommended Doctors -->
            <div class="container mt-5">
                <h3 class="text-center mb-4" style="color: #ced6dd; font-size: 2rem; letter-spacing: 1px;">Recommended Doctors</h3>
                <div class="row">
                    @foreach($doctors as $doctor)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 border-dark shadow-sm">
                            <div class="position-relative">
                                <img src="{{ asset('storage/uploads/' . $doctor->image) }}" class="card-img-top" alt="Doctor Image" style="object-fit: cover; height: 200px;">
                                <div class="overlay position-absolute w-100 h-100" style="top: 0; left: 0; background-color: rgba(0, 0, 0, 0.2);">
                                    <div class="text-white position-absolute bottom-0 p-2" style="background-color: rgba(0, 0, 0, 0.6); font-size: 0.9rem;">
                                        <h5 class="card-title mb-1" style="font-size: 1rem;">Dr. {{ $doctor->name }}</h5>
                                        <p class="card-text mb-1" style="font-size: 0.9rem;">Specialization: {{ $doctor->specialist }}</p>
                                        <p class="card-text" style="font-size: 0.9rem;">Rating:
                                            <span class="stars">
                                                {{ $doctor->average_rating ?? 'Not Rated' }}
                                                <i class="fa fa-star"></i>
                                            </span>
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <div class="card-footer text-center">
                                <a href="/doctorProfile/{{$doctor->d_id}}" class="btn btn-primary">View Profile</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
