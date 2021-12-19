@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Team Registration</h1>
<a href="{{ URL::to('/admin-team') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to
  Team</a>
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
<form action="{{ URL::to('/admin-team-register') }}" class="signup_form mt-3 mb-5" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-8">
      <div class="input-group mb-3">
        <span class="input-group-text" id="full_name">Team name: </span>
        <input name="name" value='{{ old('name') }}' type="text" class="form-control" placeholder="Enter team name" aria-label="team_name" aria-describedby="team_name" required>
      </div>
      @if($errors->has('name'))
      <span class="err">{{ $errors->first('name') }}</span>
      @endif
    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="member_number" class="form-label">Number of members in team</label><br>
        <select name="member_number" class="form-select admin_team_members" aria-label="member_number">
          <option value="1" {{ old('member_number') == "1" ? "selected" : "" }}>1</option>
          <option value="2" {{ old('member_number') == "2" ? "selected" : "" }}>2</option>
          <option value="3" {{ old('member_number') == "3" ? "selected" : "" }}>3</option>
        </select>
      </div>
      @if($errors->has('member_number'))
      <span class="err">{{ $errors->first('member_number') }}</span>
      @endif
    </div>
  </div>

  <div class="row">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>
@if(!empty($member_number))
<form action="{{ URL::to('/admin-team-register2') }}" class="signup_form mt-3 mb-5" method="post">
  {{ csrf_field() }}
  <input type="hidden" name="curr_id" value="{{$curr_id}}">
  <input type="hidden" name="member_number" value="{{$member_number}}">
  <h3>Enter Member Names</h3>
  @for($i = 1; $i <= $member_number; $i++) <div class="row">
    <div class="col-md-6">
      <div class="mb-3">
        <label for="member{{$i}}" class="form-label">Member {{$i}}</label><br>
        <select name="member{{$i}}" class="form-select" aria-label="member{{$i}}">
          @if(!empty($student))
          @foreach($student as $s)
          <option value="{{ $s->id }}" {{ old('member'.$i) ==  $s->id ? "selected" : "" }}>{{ $s->student_id }} - {{ $s->name }}</option>
          @endforeach
          @endif
        </select>
      </div>
      @if($errors->has('member{{$i}}'))
      <span class="err">{{ $errors->first('member'.$i) }}</span>
      @endif
    </div>
    </div>
    @endfor
    <div class="row">
      <div class="col text-center">
        <button type="submit" class="btn btn-success">Register</button>
      </div>
    </div>
</form>
@endif
@endsection