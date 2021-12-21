@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Project Marks</h1>
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
<form action="{{ URL::to('/admin-project-mark') }}" class="signup_form mt-3 mb-5" method="post">
  {{ csrf_field() }}
  @php
  $team__projects = DB::table('team__projects')->where('project_id', '=', $p->id)->first();
  $team = DB::table('teams')->where('id', '=', $team__projects->team_id)->first();
  $team__members = DB::table('team__members')->where('team_id', '=', $team->id)->get();
  $i = 0;
  @endphp
  <div class="container">
    <input type="hidden" name="p_id" value="{{ $p->id }}">
    
    @foreach($team__members as $tm)
    @php
    $s = DB::table('students')->where('id', '=', $tm->student_id)->first(); 
    $i++;
    @endphp
    <input type="hidden" name="s_id{{$i}}" value="{{ $tm->student_id }}">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">{{$s->name}} - {{$s->student_id}}</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="class_attendence{{$i}}">Class Attendence</span>
                  <input name="class_attendence{{$i}}" value='{{ old('class_attendence'.$i) }}' type="text" class="form-control" placeholder="Marks range: 0 - 10" aria-label="class_attendence{{$i}}" aria-describedby="class_attendence{{$i}}" required>
                </div>
                @if($errors->has('class_attendence{{$i}}'))
                <span class="err">{{ $errors->first('class_attendence'.$i) }}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="class_performance{{$i}}">Class Performance</span>
                  <input name="class_performance{{$i}}" value='{{ old('class_performance'.$i) }}' type="text" class="form-control" placeholder="Marks range: 0 - 10" aria-label="class_performance{{$i}}" aria-describedby="class_performance{{$i}}" required>
                </div>
                @if($errors->has('class_performance{{$i}}'))
                <span class="err">{{ $errors->first('class_performance'.$i) }}</span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="report{{$i}}">Report</span>
                  <input name="report{{$i}}" value='{{ old('report'.$i) }}' type="text" class="form-control" placeholder="Marks range: 0 - 20" aria-label="report{{$i}}" aria-describedby="report{{$i}}" required>
                </div>
                @if($errors->has('report{{$i}}'))
                <span class="err">{{ $errors->first('report'.$i) }}</span>
                @endif
              </div>
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="viva{{$i}}"> Viva</span>
                  <input name="viva{{$i}}" value='{{ old('viva'.$i) }}' type="text" class="form-control" placeholder="Marks range: 0 - 10" aria-label="viva{{$i}}" aria-describedby="viva{{$i}}" required>
                </div>
                @if($errors->has('viva{{$i}}'))
                <span class="err">{{ $errors->first('viva'.$i) }}</span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="final_exam{{$i}}">Final Exam</span>
                  <input name="final_exam{{$i}}" value='{{ old('final_exam{'.$i) }}' type="text" class="form-control" placeholder="Marks range: 0 - 50" aria-label="final_exam{{$i}}" aria-describedby="final_exam{{$i}}" required>
                </div>
                @if($errors->has('final_exam{{$i}}'))
                <span class="err">{{ $errors->first('final_exam'.$i) }}</span>
                @endif
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

    @endforeach

  </div>
  <div class="row mt-5">
    <div class="col text-center">
      <button type="submit" class="btn btn-success">Register</button>
    </div>
  </div>
</form>
@endsection