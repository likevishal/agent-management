@extends('layouts.app')

@section('content')

<h1>Add Agent</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($erros->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="/agents">
    @csrf

    Name:
    <input type="text" name="name"> <br>

    Email:
    <input type="text" name="email"> <br>

    Password:
    <input type="password" name="password"> <br>

    Phone:
    <input type="text" name="phone"> <br>

    Address:
    <input type="text" name="address"> <br>

    <button type="submit"> Save </button>
</form>

@endsection