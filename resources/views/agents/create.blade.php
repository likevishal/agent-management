<h1>Add Agent</h1>

<form method="post" action="/agents/store" >
    @csrf

    Name:
    <input type="text" name="name"> <br>

    Email:
    <input type="text" name="email"> <br>

    Phone:
    <input type="text" name="phone"> <br>

    Address:
    <input type="text" name="address" > <br>

    <button type="submit"> Save </button>
</form>