<?php

namespace App\Http\Controllers;
use Auth;
use App\lk;
use Illuminate\Http\Request;
use App\User;
use App\News;
use App\Subscription;
use App\User_subscription;

class LkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $US = User_subscription::whereId_user($user->id)->orderBy('id', 'desc')->first();

        if ($US) {
        $subs = Subscription::whereId($US->id_sub)->where('status','=',1)->get();
    } else {$subs=null;};
        $news = News::orderBy('created_at', 'DESC')->paginate(1);
        return view('lk',compact('news', 'subs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lk  $lk
     * @return \Illuminate\Http\Response
     */
    public function show(lk $lk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lk  $lk
     * @return \Illuminate\Http\Response
     */
    public function edit(lk $lk)
    {
        $user = Auth::user();
        return view('auth.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lk  $lk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|max:255|unique:users,name,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'second_name' => 'required|string|max:255'.$user->id,
            'class_child' => 'required|string|max:2'.$user->id,
        ]);
        $input = $request->only('name','email','second_name','class_child');
        $user->update($input);
        return redirect('lk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lk  $lk
     * @return \Illuminate\Http\Response
     */
    public function destroy(lk $lk)
    {
        //
    }
}
