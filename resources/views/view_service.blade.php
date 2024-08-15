@extends('layouts.main')

@section('main-section')

<div class="container mt-0">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-12">
            <h2 class="text-center mb-4" style="color: #ced6dd; font-size: 2.5rem; letter-spacing: 1px;">Available Services</h2>
            <div class="row">
                @foreach($service as $row)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="/serviceDoctor/{{$row->s_id}}" class="text-decoration-none text-dark">
                        <div class="card h-100 border-dark shadow-sm" style="background-color: rgba(255, 255, 255, 0.9);">
                            <div class="position-relative">
                                <img src="{{ asset('storage/uploads/'.$row->image) }}" class="card-img-top" alt="Service Image" style="object-fit: cover; height: 200px;">
                                <div class="overlay position-absolute w-100 h-100" style="top: 0; left: 0; background-color: rgba(0, 0, 0, 0.4);">
                                    <div class="text-white position-absolute bottom-0 p-3" style="background-color: rgba(0, 0, 0, 0.6);">
                                        <h5 class="card-title">{{ $row->service }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ \Illuminate\Support\Str::words($row->discription, 10, '...') }}
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <span class="btn btn-primary">View more</span>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
