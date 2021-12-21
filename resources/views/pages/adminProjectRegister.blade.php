@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Project</h1>
<a href="{{ URL::to('/admin-project') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to
  Project</a>
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
<form action="{{ URL::to('/admin-project-register') }}" class="signup_form mt-3 mb-5" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-6">
      <div class="input-group mb-3">
        <span class="input-group-text" id="full_name">Project Name</span>
        <input name="name" value='{{ old('name') }}' type="text" class="form-control" placeholder="Enter full name" aria-label="full_name" aria-describedby="full_name" required>
      </div>
      @if($errors->has('name'))
      <span class="err">{{ $errors->first('name') }}</span>
      @endif
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label for="type" class="form-label">Project type</label><br>
        <select name="type" class="form-select" aria-label="type">
          <option value="Advanced Database design" {{ old('type') == "Advanced Database design" ? "selected" : "" }}>Advanced Database design</option>
          <option value="Neural Network & Fuzzy Logic" {{ old('type') == "Neural Network & Fuzzy Logic" ? "selected" : "" }}>Neural Network & Fuzzy Logic</option>
          <option value="Machine Learning" {{ old('type') == "Machine Learning" ? "selected" : "" }}>Machine Learning</option>
          <option value="Pattern Recognition" {{ old('type') == "Pattern Recognition" ? "selected" : "" }}>Pattern Recognition</option>
          <option value="Parallel & Distributed Computing" {{ old('type') == "Parallel & Distributed Computing" ? "selected" : "" }}>Parallel & Distributed Computing</option>
          <option value="VLSI Design" {{ old('type') == "VLSI Design" ? "selected" : "" }}>VLSI Design</option>
          <option value="Digital Signal Processing" {{ old('type') == "Digital Signal Processing" ? "selected" : "" }}>Digital Signal Processing</option>
          <option value="Deep Learning" {{ old('type') == "Deep Learning" ? "selected" : "" }}>Deep Learning</option>
        </select>
      </div>
      @if($errors->has('type'))
      <span class="err">{{ $errors->first('type') }}</span>
      @endif
    </div>

  </div>
  <div class="row">
    <div class="col-12">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea name="description" value='{{ old('description') }}' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>

      @if($errors->has('description'))
      <span class="err">{{ $errors->first('description') }}</span>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="start_time" class="form-label">Starting date</label><br>
        <input name="start_time" value="{{ old('start_time') }}" type="date" class="form-control" aria-label="start_time" aria-describedby="start_time" required>
      </div>
      @if($errors->has('start_time'))
      <span class="err">{{ $errors->first('start_time') }}</span>
      @endif
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label for="end_time" class="form-label">Submission date</label><br>
        <input name="end_time" value="{{ old('end_time') }}" type="date" class="form-control" aria-label="end_time" aria-describedby="end_time" required>
      </div>
      @if($errors->has('end_time'))
      <span class="err">{{ $errors->first('end_time') }}</span>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="supervisor" class="form-label">Select Supervisor</label><br>
        <select name="supervisor_id" class="form-select" aria-label="supervisor">
          @if(!empty($supervisors))
          @foreach($supervisors as $s)
          <option value="{{ $s->id }}" {{ old('supervisor_id') ==  $s->id ? "selected" : "" }}>{{ $s->name }}</option>
          @endforeach
          @endif
        </select>
      </div>
      @if($errors->has('supervisor_id'))
      <span class="err">{{ $errors->first('supervisor_id') }}</span>
      @endif
    </div>
    <div class="col-md-6">
      <div class="mb-3">
        <label for="team" class="form-label">Select Team</label><br>
        <select name="team_id" class="form-select" aria-label="team">
          @if(!empty($teams))
          @foreach($teams as $s)
          <option value="{{ $s->id }}" {{ old('team_id') ==  $s->id ? "selected" : "" }}>{{ $s->name }}</option>
          @endforeach
          @endif
        </select>
      </div>
      @if($errors->has('team_id'))
      <span class="err">{{ $errors->first('team_id') }}</span>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="session" class="form-label">Select Session</label><br>
        <select name="session_id" class="form-select" aria-label="session">
          @if(!empty($sessions))
          @foreach($sessions as $s)
          <option value="{{ $s->id }}" {{ old('session_id') ==  $s->id ? "selected" : "" }}>{{ $s->name }}</option>
          @endforeach
          @endif
        </select>
      </div>
      @if($errors->has('session_id'))
      <span class="err">{{ $errors->first('session_id') }}</span>
      @endif
    </div>
  </div>
  <div class="row">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>
@endsection