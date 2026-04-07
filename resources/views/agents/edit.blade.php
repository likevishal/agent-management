<h1>Edit Agent</h1>

<form method="POST" action="/agents/update/{{$agent->id}}">
    @csrf

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