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
  <label for="first_name">Name</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control" placeholder="John" name="first_name" id="first_name" value="{{ old('first_name') ? old('first_name') : $seller->first_name }}" required>
    <input type="text" class="form-control" placeholder="Doe" name="last_name" value="{{ old('last_name') ? old('last_name') : $seller->last_name }}" required>
  </div>
</div>
<div class="form-group">
  <label for="document">Document</label>
  <div class="input-group mb-3">
    <select class="form-control" name="document_type">
      <option value="CC" {{ $seller->document_type == 'CC' ? 'selected' : '' }}>Cedula de ciudadanía</option>
      <option value="CE" {{ $seller->document_type == 'CE' ? 'selected' : '' }}>Cedula de extrangería</option>
      <option value="PAS" {{ $seller->document_type == 'PAS' ? 'selected' : '' }}>Pasaporte</option>
      <option value="OT" {{ $seller->document_type == 'OT' ? 'selected' : '' }}>Otro</option>
    </select>
    <input type="text" class="form-control" placeholder="1234567890" name="document" id="document" value="{{ old('document') ? old('document') : $seller->document }}" required>
  </div>
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input type="email" class="form-control" placeholder="username@example.com" name="email" id="email" value="{{ old('email') ? old('email') : $seller->email }}" required>
</div>
<div class="form-group">
  <label>Gender: </label>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" {{ $seller->gender == 'Male' ? 'checked' : '' }} required>
    <label class="form-check-label" for="gender_male">Male</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" {{ $seller->gender == 'Female' ? 'checked' : '' }} required>
    <label class="form-check-label" for="gender_female">Female</label>
  </div>
</div>
<div class="form-group">
  <label for="admission">Admission date</label>
  <input type="date" class="form-control" name="admission" id="admission" value="{{ old('admission') ? old('admission') : $seller->admission }}" required>
</div>
