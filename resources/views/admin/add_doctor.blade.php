@extends('admin_layout.main')

@section('main-con')
<div class="row justify-content-center" style="margin-top: 100px;">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Doctor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if(isset($edit))
    <!-- Editing existing service -->
    <form action="/edit_doctor/{{$edit->d_id}}"  enctype="multipart/form-data" method="post">
        @else
        <!-- Adding new service -->
        <form action="/add_doctor"  enctype="multipart/form-data" method="post">
            @endif
          
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{isset($edit) ? $edit->name : old('name')}}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="name">NMC No.</label>
                        <input type="text" name="nmc" value="{{isset($edit) ? $edit->nmc_no : old('nmc')}}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="exampl">Specialist</label>
                        <input type="text" name="spec" value="{{isset($edit) ? $edit->specialist : old('spec')}}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="exampl">Qualification</label>
                        <input type="text" name="qual" value="{{isset($edit) ? $edit->qualification : old('qual')}}" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="exampl">Experience</label>
                        <input type="text" name="expe" value="{{isset($edit) ? $edit->nmc_no : old('nmc')}}" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image"class="custom-file-input" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row justify-content-center" style="margin-top: 100px;">
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Available Doctor</h3>
            </div>
            <div class="row" style="margin-top: 20px;">
                @foreach($doctors as $row)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/uploads/'.$row->image) }}" class="card-img-top" alt="Doctor Image" style="object-fit: cover; height: 200px;"> <!-- Adjust the max-height value as needed -->

                        <div class="card-body">
                            <h5 class="card-title">Dr. {{$row->name}}</h5>
                            <p class="card-text">NMC No.: {{$row->nmc_no}}</p>
                            <p class="card-text">Specialist: {{$row->specialist}}</p>

                            <p class="card-text">Qualification: {{$row->qualification}}</p>
                            <p class="card-text">experience: {{$row->experiance}}</p>


                            <a href="delete_doctor/{{$row->d_id}}" class="badge bg-danger">Delete</a>

                            <a href="edit_doctor/{{$row->d_id}}" class="badge bg-primary">Edit</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Add more cards here if needed -->
            </div>
        </div>
    </div>
</div>


@endsection