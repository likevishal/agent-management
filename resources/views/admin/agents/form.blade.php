<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name', $agent->name ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control"
        value="{{ old('email', $agent->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control"
        value="{{ old('phone', $agent->phone ?? '') }}">
</div>

<div class="mb-3">
    <label>Address</label>
    <input type="text" name="address" class="form-control"
        value="{{ old('address', $agent->address ?? '') }}">
</div>

<div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control">
</div>

<button class="btn btn-success">Save</button>