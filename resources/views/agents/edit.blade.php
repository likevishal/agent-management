@extends('layouts.app')

@section('content')
<h1>Edit Agent</h1>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($erros->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="/agents/{{$agent->id}}">
    @csrf
    @method('PUT')

    Name:
    <input type="text" name="name" value="{{$agent->name}}"><br>

    Email:
    <input type="text" name="email" value="{{$agent->email}}"><br>

    Phone:
    <input type="text" name="phone" value="{{$agent->phone}}"><br>

    Address:
    <input type="text" name="address" value="{{$agent->address}}"><br>

    <button type="submit">Update</button>

</form>

@endsection