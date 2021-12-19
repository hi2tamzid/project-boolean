@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel</h1>

<section class="container mt-5">
  <div class="row">
    <div class="col-12 control_panel_box">
      <div class="control_item">
        <div class="control_item_icon">
        <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <p class="control_item_title">Supervisor</p>
        <div class="control_item_btn">
          <a href="{{URL::to('admin-supervisor')}}" class="btn btn-primary text-center">Click here</a>
        </div>
      </div>
      <div class="control_item">
        <div class="control_item_icon">
        <i class="fas fa-user-graduate"></i>
        </div>
        <p class="control_item_title">Student</p>
        <div class="control_item_btn">
          <a href="{{URL::to('admin-student')}}" class="btn btn-primary text-center">Click here</a>
        </div>
      </div>
      <div class="control_item">
        <div class="control_item_icon">
        <i class="fas fa-project-diagram"></i>
        </div>
        <p class="control_item_title">Project</p>
        <div class="control_item_btn">
          <a href="{{URL::to('admin-project')}}" class="btn btn-primary text-center">Click here</a>
        </div>
      </div>
      <div class="control_item">
        <div class="control_item_icon">
        <i class="fas fa-school"></i>
        </div>
        <p class="control_item_title">Session</p>
        <div class="control_item_btn">
          <a href="{{URL::to('admin-session')}}" class="btn btn-primary text-center">Click here</a>
        </div>
      </div>
      <div class="control_item">
        <div class="control_item_icon">
        <i class="fas fa-users"></i>
        </div>
        <p class="control_item_title">Team</p>
        <div class="control_item_btn">
          <a href="{{URL::to('admin-team')}}" class="btn btn-primary text-center">Click here</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection