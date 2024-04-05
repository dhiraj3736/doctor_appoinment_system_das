
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
                        <table class="table table-bordered table-hover mb-0 transparent-table">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Service Name</th>
                                    <th style="width: 40%;">Description</th>
                                    <th style="width: 15%;">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($service as $row)
                                <tr>
                                    <td>{{ $row->service }}</td>
                                    <td>{{ $row->discription }}</td>
                                    <td>{{ $row->price }}</td>
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
