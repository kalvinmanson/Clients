<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Seller;
use App\Client;

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
      $nuser = new User;
      dd($nuser);
    }
  }
}
