<h1>Agents List</h1>

<a href="/agents/create">Add Agent</a>

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
                <a href="/agents/edit/{{$agent->id}}">Edit</a>
                <a href="/agents/delete/{{$agent->id}}">Delete</a>
            </td>           
        </tr>
    @endforeach
</table>