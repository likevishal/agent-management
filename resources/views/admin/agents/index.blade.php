@extends('layouts.admin')

@section('content')

<h2>Agents</h2>

<a href="{{ route('admin.agents.create') }}" class="btn btn-primary mb-3">
    Add Agent
</a>

<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Action</th>
</tr>

@foreach($agents as $agent)
<tr>
    <td>{{ $agent->id }}</td>
    <td>{{ $agent->name }}</td>
    <td>{{ $agent->email }}</td>
    <td>{{ $agent->phone }}</td>
    <td>
        <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>

{{ $agents->links() }}

@endsection