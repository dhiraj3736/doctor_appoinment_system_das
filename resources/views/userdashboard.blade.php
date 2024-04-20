@extends('layouts.main')

@section('main-section')
    <h1 class="h1 d-flex justify-content-center text-white" style="margin-top:200px;">Welcome {{ session('fullname') }}</h1>
    <div class="ttt d-flex justify-content-center">
        <div class="ttt">
            <div><strong class="text-white">Today is:</strong></div>
            <div class="text-white">{{ \Carbon\Carbon::now()->format('l, F d, Y') }}</div>
        </div>
    </div>
@endsection
