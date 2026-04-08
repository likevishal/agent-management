@extends('layouts.admin')

@section('content')

<h2>Create Agent</h2>

<form method="POST" action="{{ route('admin.agents.store') }}">
    @csrf

    @include('admin.agents.form')

</form>

@endsection