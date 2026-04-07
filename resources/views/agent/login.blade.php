<h2>Agent Login</h2>

@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form method="POST" action="/agent/login">
@csrf

Email:
<input type="email" name="email"><br>

Password:
<input type="password" name="password"><br>

<button type="submit">Login</button>

</form>