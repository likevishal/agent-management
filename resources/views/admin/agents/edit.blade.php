@extends('layouts.admin')

@section('content')

<h2>Edit Agent</h2>

<form method="POST" action="{{ route('admin.agents.update', $agent->id) }}">
    @csrf
    @method('PUT')

    @include('admin.agents.form')

</form>

@endsection