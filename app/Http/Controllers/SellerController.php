<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seller;
use Auth;

class SellerController extends Controller
{
  public function index()
  {
    $sellers = Seller::orderBy('updated_at', 'desc')->get();
    $newSeller = new Seller;
    return view('sellers.index', compact('sellers', 'newSeller'));
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:50',
      'last_name' => 'required|string|max:50',
      'document_type' => 'required|max:4',
      'document' => 'required|integer',
      'email' => 'required|unique:sellers|max:60',
      'admission' => 'required|date'
    ]);

    $seller = new Seller;
    $seller->user_id = Auth::user()->id;
    $seller->first_name = $request->first_name;
    $seller->last_name = $request->last_name;
    $seller->document_type = $request->document_type;
    $seller->document = $request->document;
    $seller->email = $request->email;
    $seller->gender = $request->gender;
    $seller->admission = $request->admission;
    $seller->save();
    flash('Seller creation successful.')->success();
    return redirect()->route('sellers.index');
  }

  public function edit($id)
  {
    $seller = Seller::findOrFail($id);
    return view('sellers.edit', compact('seller'));
  }

  public function update(Request $request, $id)
  {
    $seller = Seller::findOrFail($id);
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:50',
      'last_name' => 'required|string|max:50',
      'document_type' => 'required|max:4',
      'document' => 'required|integer',
      'email' => 'required|unique:sellers,email,'.$seller->id.'|max:60',
      'admission' => 'required|date'
    ]);
    $seller->user_id = Auth::user()->id;
    $seller->first_name = $request->first_name;
    $seller->last_name = $request->last_name;
    $seller->document_type = $request->document_type;
    $seller->document = $request->document;
    $seller->email = $request->email;
    $seller->gender = $request->gender;
    $seller->admission = $request->admission;
    $seller->save();
    flash('Seller updated successful.')->success();
    return redirect()->route('sellers.index');
  }

  public function destroy($id)
  {
    $seller = Seller::findOrFail($id);
    $seller->delete();
    flash('Seller removed successful.')->error();
    return redirect()->route('sellers.index');
  }
}
