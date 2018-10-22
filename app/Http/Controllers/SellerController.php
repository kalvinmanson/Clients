<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seller;

class SellerController extends Controller
{
  public function index()
  {
    $sellers = Seller::orderBy('updated_at', 'desc')->get();
    return view('sellers.index', compact('sellers'));
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'first_name' => 'required|string|max:50',
      'flast_name' => 'required|string|max:50',
      'document_type' => 'required|max:4',
      'document' => 'required|integer|max:20',
      'email' => 'required|unique:sellers|max:60',
      'admission' => 'required|date',
      'body' => 'required',
    ]);
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
      //
  }

  public function update(Request $request, $id)
  {
      //
  }

  public function destroy($id)
  {
      //
  }
}
