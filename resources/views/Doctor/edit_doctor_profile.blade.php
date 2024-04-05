<div class="modal fade" id="edit_doctor_profile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/doctorprofile/edit" enctype="multipart/form-data" method="post">
                 

                    @csrf
                    @foreach($doctor_info as $row)
                    @if(isset($row->name) && $row->name == $user->name)
                    <div class="card-body">
                      
                        <div class="form-group">
                            <label for="name">NMC No.</label>
                            <input type="text" name="nmc" value="{{$row->nmc_no}}" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="exampl">Specialist</label>
                            <input type="text" name="spec" value="{{$row->specialist}}" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="exampl">Qualification</label>
                            <input type="text" name="qual" value="{{$row->qualification}}" class="form-control" id="">
                        </div>

                        <div class="form-group">
                            <label for="exampl">Experience</label>
                            <input type="text" name="expe" value="{{$row->experiance}}" class="form-control" id="">
                        </div><br>

                        <div class="form-group row">
                            <label for="fromTime" class="col-sm-2 col-form-label">From:</label>
                            <div class="col-sm-4">
                                <input type="time" class="form-control" id="fromTime" value="{{$row->fromtime}}" name="fromtime">
                            </div>
                            <label for="toTime" class="col-sm-2 col-form-label">To:</label>
                            <div class="col-sm-4">
                                <input type="time" class="form-control" id="toTime" value="{{$row->totime}}" name="totime">
                            </div>
                        </div>
                        




                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
                    @endif
                    @endforeach
                </form>
    </div>
  </div>
</div>




<div class="modal fade" id="change_password" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">change password</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/doctorprofile/change_password" enctype="multipart/form-data" method="post">
      @csrf
     <div class="form-outline mb-2">
        <input type="email" id="" name="email" class="form-control form-control-lg" placeholder="Enter your email" required/>
    </div>
    <div class="form-outline mb-2">
        <input type="password" id="oldPassword" name="oldPassword" class="form-control form-control-lg" placeholder="Old Password" required/>
    </div>

    <div class="form-outline mb-2">
        <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg" placeholder="New Password" required />
    </div>

    <div class="form-outline mb-2">
    
        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control form-control-lg" placeholder="Confirm Password" required/>
    </div>
    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                    </div>
     </form>
    </div>
  </div>
</div>
