@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Sellers</h1>
  <table class="table table-striped" id="dtTable">
    <thead>
      <tr>
        <th width="20">ID</th>
        <th>Name</th>
        <th>Seller</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th width="40"></th>
      </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
    <tr>
      <td width="20">{{ $client->id }}</td>
      <td>{{ $client->first_name . ' ' .$client->last_name }}</td>
      <td><a href="{{ route('sellers.edit', $client->seller->id) }}">{{ $client->seller->first_name . ' ' .$client->seller->last_name }}</a></td>
      <td>{{ $client->email }}</td>
      <td>{{ $client->phone }}</td>
      <td>{{ $client->address }}</td>
      <td width="40">
        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
  </table>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createNew">
    Add new Seller
  </button>
</div>

<!-- Modal Create -->
<div class="modal fade {{ $errors->any() ? 'modalOpened' : '' }}" id="createNew" tabindex="-1" role="dialog" aria-labelledby="createNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="{{ route('clients.store') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="createNewLabel">Add new Seller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('partials.clients.form', ['client' => $newClient])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
