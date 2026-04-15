<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $customer->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $customer->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" class="form-control"
           value="{{ old('phone', $customer->phone ?? '') }}">
</div>

<div class="mb-3">
    <label>Address</label>
    <input type="text" name="address" class="form-control"
           value="{{ old('address', $customer->address ?? '') }}">
</div>

<button class="btn btn-success">Save</button>