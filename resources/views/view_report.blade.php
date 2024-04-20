

@extends('layouts.main')

@section('main-section')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-xl-8">
            <div class="card card-primary border border-dark" style="background-color: rgba(255, 255, 255, 0.8);">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">Available Services</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0" style="background-color: rgba(255, 255, 255, 0.8);">
                        <thead class="bg-dark text-white">
                            <tr>

                                <th scope="col">Date of Visit</th>
                                <th scope="col">Service</th>
                                <th scope="col">Doctor</th>
                                <th scope="col">Report</th>

                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rep as $result)
                <tr>
                    <td>{{ $result->created_at }}</td>
                    <td>{{ $result->service }}</td>
                    <td>{{ $result->doctor }}</td>
                    <td>{{ $result->report }}</td>
                </tr>
                @endforeach
                        </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
