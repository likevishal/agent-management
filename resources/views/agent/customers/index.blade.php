@extends('layouts.agent')

@section('content')

<a href="{{ route('agent.customers.create') }}" class="btn btn-primary mb-3">
    Add Customer
</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    @foreach($customers as $customer)
    <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone }}</td>
        <td>
            <a href="{{ route('agent.customers.edit', $customer->id) }}"
               class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('agent.customers.destroy', $customer->id) }}"
                  method="POST"
                  style="display:inline;">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{$customers->links()}}
@endsection
