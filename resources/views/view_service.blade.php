@extends('layouts.main')
@section('main-section')

<div class="row justify-content-center" style="margin-top: 50px;">
    <div class="col-lg-7 col-xl-8 stretch-card">
        <div class="card transparent-bg">
            <div class="card-body">
                <div class="d-flex justify-content-center align-items-baseline mb-2">
                    <h4 class="card-title mb-0" style="color: white;">Available services</h4>
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
