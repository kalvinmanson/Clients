@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-6 m-auto">
      <div class="card">
        <div class="card-header">Edit: {{ $client->first_name.' '.$client->last_name }}</div>
        <div class="card-body">
          <form method="post" action="{{ route('clients.update', $client->id) }}">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            @include('partials.clients.form')
            <button type="submit" class="btn btn-primary">Save</button>
          </form>
        </div>
      </div>

      <hr>
      <div class="card">
        <div class="card-header">Danger zone</div>
        <div class="card-body">
          <form method="post" action="{{ route('clients.destroy', $client->id) }}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger btn-block">Destroy</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
