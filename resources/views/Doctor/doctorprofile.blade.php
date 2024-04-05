@extends('doctor_layout.main')

@section('main-container')




@foreach($doctor_info as $row)

@if(isset($row->name) && $row->name == $user->name)




<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">User Profile</h3>
                    @if(session('message'))
                    <span class="alert alert-success">
                        {{ session('message') }}
                    </span>
                    @endif
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div style="width: 150px; height:150px; margin: 0 auto; border: 1px solid black; padding: 10px;">
                            @if(isset($row->image) && $row->image !== NULL)
                            <img src="{{ asset('storage/uploads/'.$row->image) }}" alt="..." style="width: 100%; height:100%; object-fit: cover;">
                            @else
                            <img src="{{ asset('images/pro.webp') }}" alt="profile" style="width: 100%; height:100%;" class="rounded-circle">
                            @endif
                            <a href="#" class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="background-image: url('images/camera.png'); width: 25px; height: 25px; border: none; background-size: contain; background-repeat: no-repeat; cursor: pointer;"></a>


                        </div>
                        <div class="text-center">

                            <h1>{{$row->name}}</h1>
                            <p>{{$row->specialist}}</p>
                            <p>NMC_NO. :{{$row->nmc_no}}</p>
                            <p>{{$row->qualification}}</p>
                            <p>{{$row->experiance}}</p>


                            <p>{{$user->number}} |<a href="mailto:dhirajbikramshah@gmail.com"> {{$user->email}}</a></p>
                            <p>Member Since: {{$user->created_at}}</p>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-primary" data-bs-target="#edit_doctor_profile" data-bs-toggle="modal">Edit Information</button>
                        <button class="btn btn-danger" data-bs-target="#change_password" data-bs-toggle="modal">Change Password</button>

                        <a href="#" class="btn btn-warning">Delete Account</a>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div>
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Change photo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/doctorprofile/photo" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="photo" class="form-label">Upload New Photo:</label>
                                <input type="file" class="form-control" id="photo" name="image" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload Photo</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>
@endif

@endforeach

@include('Doctor/edit_doctor_profile')
@endsection