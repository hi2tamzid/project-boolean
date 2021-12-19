@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Session</h1>
<a href="{{ URL::to('/admin-session') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to
  Session</a>
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
<form action="{{ URL::to('/admin-session-register') }}" class="signup_form mt-3 mb-5" method="post">
  {{ csrf_field() }}
  <div class="row">
    <div class="col-md-12">
      <div class="input-group mb-3">
        <span class="input-group-text" id="full_name">Session Name(e.g. January 2018)</span>
        <input name="name" value='{{ old('name') }}' type="text" class="form-control" placeholder="Enter full name" aria-label="full_name" aria-describedby="full_name" required>
      </div>
      @if($errors->has('name'))
      <span class="err">{{ $errors->first('name') }}</span>
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