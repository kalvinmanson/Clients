<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seller;
use App\Client;
use Auth;

class ClientController extends Controller
{
  public function index()
  {
    $clients = Client::orderBy('updated_at', 'desc')->get();
    $sellers = Seller::orderBy('first_name', 'asc')->get();
    $newClient = new Client;
    return view('clients.index', compact('clients', 'sellers', 'newClient'));
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'seller_id' => 'required|integer',
      'first_name' => 'required|string|max:50',
      'last_name' => 'required|string|max:50',
      'phone' => 'required|max:14',
      'address' => 'required|max:100',
      'email' => 'required|unique:clients|max:60'
    ]);

    $client = new Client;
    $client->user_id = Auth::user()->id;
    $client->seller_id = $request->seller_id;
    $client->first_name = $request->first_name;
    $client->last_name = $request->last_name;
    $client->phone = $request->phone;
    $client->address = $request->address;
    $client->email = $request->email;
    $client->save();
    flash('Client creation successful.')->success();
    return redirect()->route('clients.index');
  }

  public function edit($id)
  {
    $client = Client::findOrFail($id);
    $sellers = Seller::orderBy('first_name', 'asc')->get();
    return view('clients.edit', compact('client', 'sellers'));
  }

  public function update(Request $request, $id)
  {
    $client = Client::findOrFail($id);
    $validatedData = $request->validate([
      'seller_id' => 'required|integer',
      'first_name' => 'required|string|max:50',
      'last_name' => 'required|string|max:50',
      'phone' => 'required|max:14',
      'address' => 'required|max:100',
      'email' => 'required|unique:clients,email,'.$client->id.'|max:60'
    ]);
    $client->user_id = Auth::user()->id;
    $client->seller_id = $request->seller_id;
    $client->first_name = $request->first_name;
    $client->last_name = $request->last_name;
    $client->phone = $request->phone;
    $client->address = $request->address;
    $client->email = $request->email;
    $client->save();
    flash('Client updated successful.')->success();
    return redirect()->route('clients.index');
  }

  public function destroy($id)
  {
    $client = Client::findOrFail($id);
    $client->delete();
    flash('Client removed successful.')->error();
    return redirect()->route('clients.index');
  }
}
