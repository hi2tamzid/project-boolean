@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Supervisor Update Registration</h1>
<a href="{{ URL::to('/admin-supervisor') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to
  Supervisor</a>
@if(Session::has('msg'))
<div class="alert alert-success mt-3" role="alert">
  <strong>{{Session::get('msg')}}</strong>
</div>
@endif
@if(Session::has('err_msg'))
<div class="alert alert-danger mt-3" role="alert">
  {{ Session::get('err_msg') }}
  @endif
</div>
<!-- @if ($errors->any())
<div class="alert alert-danger mt-3">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif -->
<form action="{{ URL::to('/admin-supervisor-update/'.$s->id) }}" class="signup_form mt-3 mb-5" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="full_name">Full Name</span>
        <input name="name" value="{{ $s->name }}" type="text" class="form-control" placeholder="Enter full name" aria-label="full_name" aria-describedby="full_name" required>
        @if($errors->has('name'))
        <span class="err">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="email">Email</span>
        <input name="email" value="{{ $s->email }}" type="email" class="form-control" placeholder="Enter email" aria-label="email" aria-describedby="email" required>
        @if($errors->has('email'))
        <span class="err">{{ $errors->first('email') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_login_id">Login ID</span>
        <input name="login_id" value="{{ $s->login_id }}" type="text" class="form-control" placeholder="Enter login id" aria-label="register_login_id" aria-describedby="register_login_id" required>
        @if($errors->has('login_id'))
        <span class="err">{{ $errors->first('login_id') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_password">Password</span>
        <input name="password" value="{{ $s->password }}"  type="Password" class="form-control" placeholder="Enter password" aria-label="register_password" aria-describedby="register_password" required>
        @if($errors->has('password'))
        <span class="err">{{ $errors->first('password') }}</span>
        @endif
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label><br>
        <select name="gender" class="form-select" aria-label="gender">
          <option value="male" {{ $s->gender == "male" ? "selected" : "" }}>Male</option>
          <option value="female" {{ $s->gender == "female" ? "selected" : "" }}>Female</option>
        </select>
        @if($errors->has('gender'))
        <span class="err">{{ $errors->first('gender') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="mobile">Mobile</span>
        <input name="mobile" value="{{ $s->mobile }}" type="text" class="form-control" placeholder="Enter mobile no" aria-label="mobile" aria-describedby="mobile" required>
        @if($errors->has('mobile'))
        <span class="err">{{ $errors->first('mobile') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-4">
      <div class="mb-3">
        <label for="formFile" class="form-label">Profile Photo</label>
        <input name="image" value="{{ $s->image }}" class="form-control" type="file" id="formFile">
        @if($errors->has('image'))
        <span class="err">{{ $errors->first('image') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </div>
</form>
@endsection