<div class="mb-3">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $customer->first_name ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $customer->last_name ?? '') }}">
</div>

<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="phone">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone ?? '') }}">
</div>

<div class="mb-3">
    <label for="address">Address</label>
    <textarea name="address" class="form-control">{{ old('address', $customer->address ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-4">
        <label for="city">City</label>
        <input type="text" name="city" class="form-control" value="{{ old('city', $customer->city ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="state">State</label>
        <input type="text" name="state" class="form-control" value="{{ old('state', $customer->state ?? '') }}">
    </div>
    <div class="col-md-4">
        <label for="zip_code">Zip Code</label>
        <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code', $customer->zip_code ?? '') }}">
    </div>
</div>

<div class="mb-3 mt-3">
    <label for="status">Status</label>
    <select name="status" class="form-control" required>
        <option value="1" {{ old('status', $customer->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $customer->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
