@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
  <strong>{{Session::get('msg')}}</strong>
</div>
@endif
@if(Session::has('err_msg'))
<div class="alert alert-danger" role="alert">
  {{ Session::get('err_msg') }}
@endif
</div>
<form action="{{ URL::to('/admin-supervisor-register') }}" class="signup_form mt-3 mb-5" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="full_name">Full Name</span>
        <input name="name" type="text" class="form-control" placeholder="Enter full name" aria-label="full_name" aria-describedby="full_name" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="email">Email</span>
        <input name="email" type="email" class="form-control" placeholder="Enter email" aria-label="email" aria-describedby="email" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_login_id">Login ID</span>
        <input name="login_id" type="text" class="form-control" placeholder="Enter login id" aria-label="register_login_id" aria-describedby="register_login_id" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_password">Password</span>
        <input name="password" type="Password" class="form-control" placeholder="Enter password" aria-label="register_password" aria-describedby="register_password" required>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label><br>
        <select name="gender" class="form-select" aria-label="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="mobile">Mobile</span>
        <input name="mobile" type="text" class="form-control" placeholder="Enter mobile no" aria-label="mobile" aria-describedby="mobile" required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="mb-3">
        <label for="formFile" class="form-label">Profile Photo</label>
        <input name="image" class="form-control" type="file" id="formFile">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>