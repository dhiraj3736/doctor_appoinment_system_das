@extends('layouts.main')

@section('main-section')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">                @if(session('message'))
    <span class="alert alert-success">
        {{ session('message') }}
    </span>
    @endif
                <div class="card-header bg-dark text-white">
                    <h3 class="card-title">User Profile</h3>
    
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <div style="width: 150px; height:150px; margin: 0 auto; border: 1px solid black; padding: 10px;">
                            @if(isset($user->image) && $user->image !== NULL)
                            <img src="{{ asset('storage/uploads/'.$user->image) }}" alt="..." style="width: 100%; height:100%; object-fit: cover;">
                            @else
                            <img src="{{ asset('images/pro.webp') }}" alt="profile" style="width: 100%; height:100%;" class="rounded-circle">
                            @endif
                            <a href="#" class="btn" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="background-image: url('images/camera.png'); width: 25px; height: 25px; border: none; background-size: contain; background-repeat: no-repeat; cursor: pointer;" ></a>


                        </div>
                        <h1>{{$user->fullname}}</h1>
                        <p>{{$user->username}}</p>
                        <p>{{$user->address}}</p>
                        <p>{{$user->number}} |<a href="mailto:dhirajbikramshah@gmail.com"> {{$user->email}}</a></p>
                        <p>Member Since: {{$user->created_at}}</p>
                    </div>
                </div>
                <div class="card-footer text-center">
                <button class="btn btn-primary" data-bs-target="#editprofile" data-bs-toggle="modal">Edit Information</button>
                <button class="btn btn-danger" data-bs-target="#change_password" data-bs-toggle="modal">Change Password</button>

                    <a href="#" class="btn btn-warning" >Delete Account</a>

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
                    <form action="" method="POST" enctype="multipart/form-data">
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



@include('editprofile')


@endsection