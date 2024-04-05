@extends('doctor_layout.main')

@section('main-container')
<h1 class="h1 d-flex justify-content-center" style="margin-top:200px; color:white;">Welcome {{session('name')}}</h1>
    <div class="ttt d-flex justify-content-center">
    <div class="ttt">
    <div><strong>Today is:</strong></div>
    <div>{{ \Carbon\Carbon::now()->format('l, F d, Y') }}</div>
</div>


</div>

@endsection