@extends('layouts.admin')

@section('content')

<h2>Admin Dashboard</h2>

<p>Welcome, {{ auth('admin')->user()->name }}</p>

@endsection