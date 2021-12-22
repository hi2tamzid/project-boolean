@extends('layouts.admin', ['overviewActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Overview</h1>

<div class="container mt-5 admin_dash">
  <div class="row justify-content-center">
    <div class="col-12 col-md-5 admin_dash_1">
      @if(Session::has('admin_login_id'))
      <p>Supervisors: {{ $supervisors }}</p>
      @endif
      <p>Students: {{ $students }}</p>
      <p>Sessions: {{ $sessions }}</p>
    </div>

    <div class="col-12 col-md-5 admin_dash_2">
      <p>Projects assigned: {{ $projects }}</p>
      <p>Projects Completed: {{ $completed_projects }}</p>
      <p>Teams created: {{ $teams }}</p>
    </div>
  </div>
</div>
@endsection