@extends('layouts.main')

@section('main-section')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-9">
            <div class="card shadow-sm border-light">
                <div class="card-header bg-secondary text-white">
                    <h3 class="card-title">Report</h3>
                </div>
                <div class="card-body">
                    @foreach($rep as $result)
                        <div class="mb-4 p-3 border rounded bg-light">
                            <div class="d-flex justify-content-between align-items-center mb-2">

                                <span class="badge bg-secondary">{{ $result->created_at->format('d M Y') }}</span>
                            </div>
                            <div class="mb-2">
                                <strong>Doctor:</strong> {{ $result->doctor }}
                            </div>
                            <div>
                                <strong>Report:</strong> {{ $result->report }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
