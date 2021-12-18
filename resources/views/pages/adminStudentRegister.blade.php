@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Student Registration</h1>
<a href="{{ URL::to('/admin-student') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to
    Student</a>
@include('includes.studentRegisterForm')
@endsection