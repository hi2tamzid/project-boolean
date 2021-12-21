@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 "> Supervisor Details</h1>
<a href="{{ URL::to('/admin-supervisor') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to Supervisor</a>
<div class="container mx-auto mt-5">
  <div class="row">
    <div class="col-md-3">
      <img src="{{ asset('image/'.$s->image) }}" class="img-thumbnail" alt="{{$s->name}}">
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-8 supervisor_details">
      <div class="row">
        <div class="col-3">
          <p>Name </p>
          <p>Login ID</p>
          <p>Email</p>
          <p>Gender</p>
          <p>Mobile no</p>
        </div>
        <div class="col-1">
          <p>:</p>
          <p>:</p>
          <p>:</p>
          <p>:</p>
          <p>:</p>
        </div>
        <div class="col-4">
          <p>{{$s->name}}</p>
          <p>{{$s->login_id}}</p>
          <p>{{$s->email}}</p>
          <p>{{$s->gender}}</p>
          <p>{{$s->mobile}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <h3 class="text-center">Supervised Projects</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-10">

      @php
      $project_supervised_count = DB::table('project__supervisors')->where('supervisor_id', '=', $s->id)->count();
      @endphp
      <p class="bold-text">Project supervised: {{$project_supervised_count}}</p>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      @php
      $project_supervisor = DB::table('project__supervisors')->where('supervisor_id', '=', $s->id)->get();

      @endphp
      @foreach($project_supervisor as $ps)
      @php

      $p = DB::table('projects')->where('id', '=', $ps->project_id)->first();
      $project_session = DB::table('project__sessions')->where('project_id', '=', $ps->project_id)->first();
      $session = DB::table('sessions')->where('id', '=', $project_session->session_id)->first();

      $team__projects = DB::table('team__projects')->where('id', '=', $p->id)->first();
      $team = DB::table('teams')->where('id', '=', $team__projects->team_id)->first();
      $team__members = DB::table('team__members')->where('team_id', '=', $team->id)->get();
      @endphp
      <div class="card mb-5">
        <h5 class="card-header">Project Name: {{$p->name}}</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-11 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Session</th>
                    <th scope="col">Starting time</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Remark</th>
                    <th scope="col">Complete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$p->type}}</td>
                    <td>{{$session->name}}</td>
                    <td>{{$p->start_time}}</td>
                    <td>{{$p->end_time}}</td>
                    <td>{{$p->remark ?? '0'}}</td>
                    <td>{{$p->is_completed ? 'Yes' : 'No'}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="row mb-4 justify-content-center">
            <div class="col-10">
              <div class="card">
                <h5 class="card-header">Team Name: {{$team->name}}</h5>
                <div class="card-body">
                  <div class="mx-auto col-8 table-responsive">
                    <table class="table table-striped border border-light">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Team Members</th>
                          <th scope="col">Student ID</th>
                          <th scope="col">Batch</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $i = 0;
                        @endphp
                        @foreach($team__members as $tm)
                        @php
                        $s = DB::table('students')->where('id', '=', $tm->student_id)->first();

                        $i++;
                        @endphp
                        <tr>
                          <td>{{$i}}</td>
                          <td>{{$s->name}}</td>
                          <td>{{$s->student_id}}</td>
                          <td>{{$s->batch}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

</div>
@endsection