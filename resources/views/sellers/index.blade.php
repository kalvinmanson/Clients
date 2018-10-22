@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Sellers</h1>
  <table class="table table-striped responsive-table">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Document</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Clients</th>
      <th>Timestamps</th>
      <th></th>
    </tr>
    @foreach($sellers as $seller)
    <tr>
      <td>{{ $seller->id }}</td>
      <td>{{ $seller->first_name . ' ' .$seller->last_name }}</td>
      <td>{{ $seller->document_type . ' ' .$seller->document }}</td>
      <td>{{ $seller->email }}</td>
      <td>{{ $seller->gender }}</td>
      <td>{{ $seller->admission }}</td>
      <td>{{ $seller->created_at }}</td>
      <td></td>
    </tr>
    @endforeach
  </table>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNew">
    Add new Seller
  </button>
</div>

<!-- Modal -->
<div class="modal fade modalOpened" id="createNew" tabindex="-1" role="dialog" aria-labelledby="createNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{ route('sellers.store') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="createNewLabel">Add new Seller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
            <input type="text" class="form-control" placeholder="John" name="first_name" id="first_name" value="{{ old('first_name') }}" required>
            <input type="text" class="form-control" placeholder="Doe" name="last_name" value="{{ old('last_name') }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="document">Document</label>
          <div class="input-group mb-3">
            <select class="form-control" name="document_type">
              <option value="CC" {{ old('document_type') == 'CC' ? 'selected' : '' }}>Cedula de ciudadanía</option>
              <option value="CE" {{ old('document_type') == 'CE' ? 'selected' : '' }}>Cedula de extrangería</option>
              <option value="PAS" {{ old('document_type') == 'PAS' ? 'selected' : '' }}>Pasaporte</option>
              <option value="OT" {{ old('document_type') == 'OT' ? 'selected' : '' }}>Otro</option>
            </select>
            <input type="text" class="form-control" placeholder="1234567890" name="document" id="document" value="{{ old('document') }}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" placeholder="username@example.com" name="email" id="email" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
          <label>Gender: </label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" {{ old('gender') == 'Male' ? 'checked' : '' }} required>
            <label class="form-check-label" for="gender_male">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female" {{ old('gender') == 'Female' ? 'checked' : '' }} required>
            <label class="form-check-label" for="gender_female">Female</label>
          </div>
        </div>
        <div class="form-group">
          <label for="admission">Admission date</label>
          <input type="date" class="form-control" name="admission" id="admission" value="{{ old('admission') }}" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
