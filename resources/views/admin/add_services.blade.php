@extends('admin_layout.main')

@section('main-con')
<div class="row justify-content-center" style="margin-top: 100px;">
    <div class="col-md-6">
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Add Service</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if(isset($edit))
    <!-- Editing existing service -->
    <form action="/edit_service/{{ $edit->s_id }}" method="post">
        @else
        <!-- Adding new service -->
        <form action="/add_service" method="post">
            @endif
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="Service">Service</label>
                    <input type="text" class="form-control" name="service" value="{{isset($edit) ? $edit->service : old('service')}}" placeholder="Enter Service">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" name="description" placeholder="Enter Description">{{ isset($edit) ? $edit->discription : old('description') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="Service">Price</label>
                    <input type="text" class="form-control" value="{{isset($edit) ? $edit->price : old('price')}}" name="price" placeholder="Enter Price">
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
</div>
    </div>
</div>
<div class="row" style="margin-top: 10px;">

    <div class="col-lg-7 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Available services</h6>

                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>

                                <th class="pt-0">Service Name</th>
                                <th class="pt-0" style="width: 40%;">Discription</th>
                                <th class="pt-0">Price</th>
                                <th class="pt-0">Action</th>

                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service as $row)
                            <tr>

                                <td>{{$row->service}}</td>
                                <td>{{$row->discription}}</td>
                                <td>{{$row->price}}</td>
                                <td><a href="delete_service/{{$row->s_id}}" class="badge bg-danger">Delete</a></td>
                                <td><a href="edit_service/{{$row->s_id}}" class="badge bg-primary">Edit</a></td>


                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->


@endsection