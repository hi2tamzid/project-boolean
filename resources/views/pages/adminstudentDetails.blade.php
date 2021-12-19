@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 "> Student Details</h1>
<a href="{{ URL::to('/admin-student') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to  Supervisor</a>

@endsection