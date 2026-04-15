@extends('layouts.agent')

@section('content')

<h2>Add Customer</h2>

<form method="POST" action="{{ route('agent.customers.store') }}">
    @csrf

    @include('agent.customers.form')

</form>

@endsection