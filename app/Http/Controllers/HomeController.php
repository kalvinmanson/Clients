<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Seller;
use App\Client;
use Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
  public function index()
  {
    return view('index');
  }
  public function fakeData() {
    $jsonurl = "https://randomuser.me/api/?results=10";
    $json = json_decode(file_get_contents($jsonurl))->results;
    foreach($json as $user) {
      $dateRand = Carbon::createFromFormat('Y-m-d', substr($user->dob->date, 0, 10));
      $seller = new Seller;
      $seller->user_id = Auth::user()->id;
      $seller->first_name = $user->name->first;
      $seller->last_name = $user->name->last;
      $seller->document_type = $user->id->name;
      $seller->document = rand(1000000000,9000000000);
      $seller->email = $user->email;
      $seller->gender = $user->gender;
      $seller->admission = $dateRand;
      $seller->save();
    }
  }
}
