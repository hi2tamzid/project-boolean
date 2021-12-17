@extends('layouts.home')
@section('content')

<h1 class="text-center p-3 mb-3">Admin Login Form</h1>

@include('includes.adminform', ['admin_route' => '/login-admin'])
@endsection