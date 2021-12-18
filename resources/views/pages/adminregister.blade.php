@extends('layouts.home')
@section('content')

<h1 class="text-center p-3 mb-3">Admin Registration Form</h1>

@include('includes.adminform', ['admin_route' => '/register-admin', 'button_name' => 'Register'])
@endsection