@extends('layouts.app')


@section('content')

<h1>Agents List</h1>

<a href="/agents/create">Add Agent</a>

<!-- <form method="GET" action="/agents" class="mb-3">
    <input 
        type="text" 
        name="search"
        placeholder="Search by name or email"
        value="{{ $search ?? '' }}"
    >

    <button type="submit" class="btn btn-primary">Search</button>
</form> -->

<table border="1">
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
            <a href="/agents/{{$agent->id}}/edit"
                class="btn btn-success btn-sm">
                Edit
            </a>

            <form action="/agents/{{$agent->id}}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <button onclick="return confirm('Are you sure?')"
                    class="btn btn-danger btn-sm">
                    Delete
                </button>

            </form>
        </td>
    </tr>
    @endforeach
</table>

<!-- 👇 Put pagination here -->
{{ $agents->links() }}

@endsection