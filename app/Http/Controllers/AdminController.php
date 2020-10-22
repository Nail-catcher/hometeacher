<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Demo;
use App\Subscription;
class AdminController extends Controller
{
    public function index()
    {
    	$users = User::count();
    	$subscriptions = Subscription::count();

    	return view('admin.admin')->with(['Users'=>$users, 'Subscriptions'=>$subscriptions]);
    }
}
