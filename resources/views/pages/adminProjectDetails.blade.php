@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 "> Project Details</h1>
<a href="{{ URL::to('/admin-project') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to Project</a>
@php

$project__supervisors = DB::table('project__supervisors')->where('id', '=', $p->id)->first();
$supervisor = DB::table('supervisors')->where('id', '=', $project__supervisors->supervisor_id)->first();

$team__projects = DB::table('team__projects')->where('id', '=', $p->id)->first();
$team = DB::table('teams')->where('id', '=', $team__projects->team_id)->first();
$team__members = DB::table('team__members')->where('team_id', '=', $team->id)->get();

$project__sessions = DB::table('project__sessions')->where('id', '=', $p->id)->first();
$sessions = DB::table('sessions')->where('id', '=', $project__sessions->session_id)->first();
@endphp
<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <div class="comment_item">
        <div class="comment_operation">
          <p><a href="" class="input_button comment_operation_delete" data-bs-toggle="modal" data-bs-target="#adminProjectDeleteModal{{ $p->id }}"><i class="far fa-trash-alt"></i> Delete Project</a></p>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="adminProjectDeleteModal{{ $p->id }}" tabindex="-1" aria-labelledby="adminProjectDeleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="adminProjectDeleteModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete <b>{{ $p->name }}</b> ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ URL::to('/admin-project-delete/'.$p->id) }}" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#adminProjectDeleteModal">Delete</a>
              </div>
            </div>
          </div>
        </div>
        <div class="comment_golf_course admin_user_top">
          <h2>Project Name: {{$p->name}}</h2>
        </div>
        <div class="comment_golf_course admin_user_top">
          <p class="display-3">Type: {{$p->type}}</p>
        </div>
        <div class="comment_body">
          <div class="container">
            <div class="row mb-4">
              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">Description</h5>
                  <div class="card-body">
                    <p class="card-text">{{$p->description}}</p>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Supervisor</th>
                      <th scope="col">Session</th>
                      <th scope="col">Starting time</th>
                      <th scope="col">Deadline</th>
                      <th scope="col">Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{$supervisor->name}}</th>
                      <td>{{$sessions->name}}</td>
                      <td>{{$p->start_time}}</td>
                      <td>{{$p->end_time}}</td>
                      <td>{{$s->remark ?? '0'}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>

            </div>
            <div class="row mb-4">
              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">Team Name: {{$team->name}}</h5>
                  <div class="card-body">
                    <div class="col-8 table-responsive">
                      <table class="table table-striped border border-light">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Team Members</th>
                            <th scope="col">Student ID</th>
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
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <h5 class="card-header text-center">Marksheet</h5>
                <div class="card-body">
                  <div class="col-12 table-responsive">

                    @php
                    $student_results = DB::table('student__marks')->where('project_id', '=', $p->id)->get();

                    @endphp
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Student No</th>
                          <th scope="col">Name of Students</th>
                          <th scope="col" colspan="7" class="text-center">Marks Obtained</th>
                          <th scope="col" >Grade obtained</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td>Class Attendence</td>
                          <td>Home Works(10%)</td>
                          <td>Class Test(10%)</td>
                          <td>Mid Term(20%)</td>
                          <td>Total(50%)(Up to Midterm)</td>
                          <td>Final Exam(50%)</td>
                          <td>Total(100%)</td>
                          <td></td>
                        </tr>
                        @foreach($student_results as $sr)
                        @php
                        $s = DB::table('students')->where('id', '=', $sr->student_id)->first();
                        $before_final = $sr->class_attendence+$sr->class_performance+$sr->viva;
                        $total = $before_final + $sr->final_exam

                        @endphp
                        <tr>
                          <td>{{ $s->student_id }}</td>
                          <td>{{ $s->name }}</td>
                          <td>{{ $sr->class_attendence }}</td>
                          <td>{{ $sr->class_performance }}</td>
                          <td>{{ $sr->report }}</td>
                          <td>{{ $sr->viva }}</td>
                          <td>{{ $before_final }}</td>
                          <td>{{ $sr->final_exam }}</td>
                          <td>{{ $total }}</td>
                          <td></td>
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
    </div>
  </div>
</div>
@endsection