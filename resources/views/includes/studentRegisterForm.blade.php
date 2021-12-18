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
<form action="{{ URL::to('/admin-student-register') }}" class="signup_form mt-3 mb-5" method="post" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="full_name">Full Name</span>
        <input name="name" value='{{ old('name') }}' type="text" class="form-control" placeholder="Enter full name" aria-label="full_name" aria-describedby="full_name" required>
        @if($errors->has('name'))
        <span class="err">{{ $errors->first('name') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="email">Email</span>
        <input name="email" value='{{ old('email') }}' type="email" class="form-control" placeholder="Enter email" aria-label="email" aria-describedby="email" required>
        @if($errors->has('email'))
        <span class="err">{{ $errors->first('email') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_login_id">Student ID</span>
        <input name="student_id" value="{{ old('student_id') }}" type="text" class="form-control" placeholder="Enter student id" aria-label="register_login_id" aria-describedby="register_login_id" required>
        @if($errors->has('login_id'))
        <span class="err">{{ $errors->first('login_id') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="register_password">Password</span>
        <input name="password" value="{{ old('email') }}" type="Password" class="form-control" placeholder="Enter password" aria-label="register_password" aria-describedby="register_password" required>
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
          <option value="male" {{ old('gender') == "male" ? "selected" : "" }}>Male</option>
          <option value="female" {{ old('gender') == "female" ? "selected" : "" }}>Female</option>
        </select>
        @if($errors->has('gender'))
        <span class="err">{{ $errors->first('gender') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="mobile">Mobile</span>
        <input name="mobile" value="{{ old('mobile') }}" type="text" class="form-control" placeholder="Enter mobile no" aria-label="mobile" aria-describedby="mobile" required>
        @if($errors->has('mobile'))
        <span class="err">{{ $errors->first('mobile') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="year_of_admission" class="form-label">Admission date</label><br>
        <input name="year_of_admission" value="{{ old('year_of_admission') }}" type="date" class="form-control" aria-label="year_of_admission" aria-describedby="year_of_admission" required>
        @if($errors->has('year_of_admission'))
        <span class="err">{{ $errors->first('year_of_admission') }}</span>
        @endif
      </div>
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label for="current_semester" class="form-label">Current Semester</label><br>
        <select name="current_semester" class="form-select" aria-label="current_semester">
          <option value="1st" {{ old('current_semester') == "1st" ? "selected" : "" }}>1st</option>
          <option value="2nd" {{ old('current_semester') == "2nd" ? "selected" : "" }}>2nd</option>
          <option value="3rd" {{ old('current_semester') == "3rd" ? "selected" : "" }}>3rd</option>
          <option value="4th" {{ old('current_semester') == "4th" ? "selected" : "" }}>4th</option>
          <option value="5th" {{ old('current_semester') == "5th" ? "selected" : "" }}>5th</option>
          <option value="6th" {{ old('current_semester') == "6th" ? "selected" : "" }}>6th</option>
          <option value="7th" {{ old('current_semester') == "7th" ? "selected" : "" }}>7th</option>
          <option value="8th" {{ old('current_semester') == "8th" ? "selected" : "" }}>8th</option>
        </select>
        @if($errors->has('current_semester'))
        <span class="err">{{ $errors->first('current_semester') }}</span>
        @endif
      </div>
    </div>
  </div>

  <div class="row">
  <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="batch">Batch (in number)</span>
        <input name="batch" value="{{ old('batch') }}" type="text" class="form-control" placeholder="Enter batch no" aria-label="batch" aria-describedby="batch" required>
        @if($errors->has('batch'))
        <span class="err">{{ $errors->first('batch') }}</span>
        @endif
      </div>
    </div>
    <div class="col-4">
      <div class="mb-3">
        <label for="formFile" class="form-label">Profile Photo</label>
        <input name="image" value="{{ old('image') }}" class="form-control" type="file" id="formFile">
        @if($errors->has('image'))
        <span class="err">{{ $errors->first('image') }}</span>
        @endif
      </div>
    </div>
    <!-- <div class="col-md-2"></div> -->
    
  </div>

  <div class="row">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>