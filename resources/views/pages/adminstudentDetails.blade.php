@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 "> Student Details</h1>
<a href="{{ URL::to('/admin-student') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to Student</a>
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
          <p>Student ID</p>
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
          <p>{{$s->student_id}}</p>
          <p>{{$s->email}}</p>
          <p>{{$s->gender}}</p>
          <p>{{$s->mobile}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-12">
      <h3 class="text-center">Projects attempted</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-10">
      @php
      $student__marks = DB::table('student__marks')->where('student_id', '=', $s->id)->get();
      $student__marks_count = DB::table('student__marks')->where('student_id', '=', $s->id)->count();

      @endphp
      <p class="bold-text">Project attempted: {{$student__marks_count}}</p>

    </div>
  </div>
</div>
@if($student__marks_count > 0)
<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <h5 class="card-header text-center">Marksheet</h5>
        <div class="card-body">
          <div class="col-12 table-responsive">


            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col">Student No</th>
                  <th scope="col">Name of Students</th>
                  <th scope="col">Session</th>
                  <th scope="col" colspan="7" class="text-center">Marks Obtained</th>
                  <th scope="col">Grade obtained</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
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
                @foreach($student__marks as $sr)
                @php
                $before_final = $sr->class_attendence+$sr->class_performance+$sr->viva;
                $total = $before_final + $sr->final_exam;
                $session = DB::table('sessions')->where('id', '=', $sr->session_id)->first();


                @endphp
                <tr>
                  <td>{{ $s->student_id }}</td>
                  <td>{{ $s->name }}</td>
                  <td>{{ $session->name }}</td>
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
@endif
@endsection