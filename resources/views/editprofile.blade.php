<div class="modal fade" id="editprofile" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="/user_profile/edit_profile" name="editprofileform" class="form">
        @csrf
        <div class="modal-body">
          <div class="inputContainer">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" class="form-control" value="{{ $user->fullname }}" placeholder="Full Name" required>
            <span class="error">@error('fullname') {{$message}} @enderror</span>
          </div>
          <div class="inputContainer">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" value="{{ $user->username }}" placeholder="Username" required>
            <span class="error">@error('username') {{$message}} @enderror</span>
          </div>
          <div class="inputContainer">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}" placeholder="Address" required>
            <span class="error">@error('address') {{$message}} @enderror</span>
          </div>
          <div class="inputContainer">
            <label for="number">Number</label>
            <input type="text" id="number" name="number" class="form-control" value="{{ $user->number }}" placeholder="Contact Number" required>
            <span class="error">@error('number') {{$message}} @enderror</span>
          </div>
          <div class="inputContainer">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Email" required>
            <span class="error">@error('email') {{$message}} @enderror</span>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="ok" class="btn btn-primary">Save Changes</button>
        </div>
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
      <form action="/user_profile/change_password" enctype="multipart/form-data" method="post">
      @csrf
     <div class="form-outline mb-2">
        <input type="email" id="" name="email" class="form-control form-control-lg" placeholder="Enter your email"  required/>
        
    </div>
    <div class="form-outline mb-2">
        <input type="password" id="oldPassword" name="oldPassword" class="form-control form-control-lg" placeholder="Old Password" required/>
    </div>

    <div class="form-outline mb-2">
        <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg" placeholder="New Password" required/>
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