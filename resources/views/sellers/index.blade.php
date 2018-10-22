@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Sellers</h1>
  <table class="table table-striped" id="dtTable">
    <thead>
      <tr>
        <th width="20">ID</th>
        <th>Name</th>
        <th>Document</th>
        <th>Email</th>
        <th width="20">Gen</th>
        <th width="20" class="text-center"><i class="fas fa-user-tag"></i></th>
        <th>Admision</th>
        <th width="40"></th>
      </tr>
    </thead>
    <tbody>
    @foreach($sellers as $seller)
    <tr>
      <td width="20">{{ $seller->id }}</td>
      <td>{{ $seller->first_name . ' ' .$seller->last_name }}</td>
      <td>{{ $seller->document_type . ' ' .$seller->document }}</td>
      <td>{{ $seller->email }}</td>
      <td width="20" class="text-center">{!! $seller->gender == 'Female' ? '<i class="fas fa-venus"></i>' : '<i class="fas fa-mars"></i>' !!}</td>
      <td width="20" class="text-center">{{ $seller->clients->count() }}</td>
      <td>{{ $seller->admission->toFormattedDateString() }}</td>
      <td width="40">
        <a href="{{ route('sellers.edit', $seller->id) }}" class="btn btn-sm btn-info"><i class="far fa-edit"></i></a>
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
    <form method="post" action="{{ route('sellers.store') }}" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="createNewLabel">Add new Seller</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @include('partials.sellers.form', ['seller' => $newSeller])
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection
