<!DOCTYPE html>
<html>
<body>

<h2>Reset Password</h2>

<p>Click the button below to reset your password:</p>

<a href="{{ url('/agent/reset-password/'.$token) }}"
   style="padding:10px 15px; background:#0d6efd; color:#fff; text-decoration:none;">
   Reset Password
</a>

<p>If you did not request this, ignore this email.</p>

</body>
</html>