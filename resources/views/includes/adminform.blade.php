@if(Session::has('msg'))
<div class="alert alert-success" role="alert">
  <strong>{{Session::get('msg')}}</strong>
</div>
@endif
@if(Session::has('err_msg'))
<div class="alert alert-danger" role="alert">
  {{ Session::get('err_msg') }}
</div>
@endif
<form action="{{URL::to($admin_route)}}" class="signup_form" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_login_id">Login ID</span>
        <input name="login_id" type="text" class="form-control" placeholder="Enter login id" aria-label="register_login_id" aria-describedby="register_login_id" required>
      </div>
      <span class="err">{{ $errors->first('login_id') }}</span>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_password">Password</span>
        <input name="password" type="Password" class="form-control" placeholder="Enter password" aria-label="register_password" aria-describedby="register_password" required>
      </div>
      <span class="err">{{ $errors->first('password') }}</span>
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">{{$button_name}}</button>
    </div>
  </div>
</form>