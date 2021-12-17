@extends('layouts.admin', ['controlPanelActive' => 'active'])
@section('content')
<h1 class="text-center mt-5 ">Control Panel - Supervisor Registration</h1>
<a href="{{ URL::to('/admin-supervisor') }}" class="input_button button_link back_button"><i class="fas fa-arrow-left"></i> Back to
    Supervisor</a>
@include('includes.registerform')
@endsection