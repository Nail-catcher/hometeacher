<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;;
use App\User;

class SpaController extends Controller
{
  public function index()
  {
    return view('spa'); 
  }
}