@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="form-group">
  <label for="seller_id">Seller</label>
  <select class="form-control" id="seller_id" name="seller_id">
    @foreach($sellers as $seller)
      <option value="{{ $seller->id }}" {{ $client->seller && $seller->id == $client->seller->id ? 'selected' : '' }}>{{ $seller->first_name.' '.$seller->last_name }}</option>
    @endforeach
  </select>
</div>
<div class="form-group">
  <label for="first_name">Name</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="John" name="first_name" id="first_name" value="{{ old('first_name') ? old('first_name') : $client->first_name }}" required>
    <input type="text" class="form-control" placeholder="Doe" name="last_name" value="{{ old('last_name') ? old('last_name') : $client->last_name }}" required>
  </div>
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input type="email" class="form-control" placeholder="username@example.com" name="email" id="email" value="{{ old('email') ? old('email') : $client->email }}" required>
</div>
<div class="form-group">
  <label for="phone">Phone</label>
  <input type="text" class="form-control" placeholder="+57 123 45 67" name="phone" id="phone" value="{{ old('phone') ? old('phone') : $client->phone }}" required>
</div>
<div class="form-group">
  <label for="address">Address</label>
  <input type="text" class="form-control" placeholder="Calle 123 # 45-67" name="address" id="address" value="{{ old('address') ? old('address') : $client->address }}" required>
</div>
