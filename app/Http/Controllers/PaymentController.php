<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kenvel\Sberbank;
use App\Subscription;
use App\User_subscription;
use GuzzleHttp\Client;
use Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('payment');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(&$OrderId, &$mouth)
  {	
        
        $date = Carbon::now()->addMonth($mouth);
        $User = Auth::user();
        $Subscription = Subscription::create([
            'OrderId' => $OrderId,
            'end_date' => $date,
            'status' => 2,

        ]);
        User_subscription::create([
            'id_user'=>$User->id,
            'id_sub'=>$Subscription->id,

        ]);
        return $Subscription;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createMouth()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://securepayments.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'uprck3cpcmlnv5qk35r4lp79j1', 
            'orderNumber' => $OrderId,
            'amount' => "10000",
            'returnUrl' => "http://teachhome.ru/payment/done",
            'failUrl'  => "http://teachhome.ru/payment/notdone"
        ]
    ]);
    $mouth = 1;
    $result = $res->getBody();
    $array = json_decode($result, true);
    $this->store($array['orderId'], $mouth);
    return $array['formUrl'];
        
    }
    
    public function createThreeMouth()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://securepayments.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'uprck3cpcmlnv5qk35r4lp79j1', 
            'orderNumber' => $OrderId,
            'amount' => "27000",
            'returnUrl' => "http://teachhome.ru/payment/done",
            'failUrl'  => "http://teachhome.ru/payment/notdone"
        ]
    ]);
    $mouth = 3;
    $result= $res->getBody();
    $array = json_decode($result, true);
    $this->store($array['orderId'], $mouth);
    return $array['formUrl'];
        
    }
    public function createHalfYear()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://securepayments.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'uprck3cpcmlnv5qk35r4lp79j1', 
            'orderNumber' => $OrderId,
            'amount' => "50000",
            'returnUrl' => "http://teachhome.ru/payment/done",
            'failUrl'  => "http://teachhome.ru/payment/notdone"
        ]
    ]);
    $mouth = 6;
    $result= $res->getBody();
    $array = json_decode($result, true);
    $this->store($array['orderId'], $mouth);
    return $array['formUrl'];
        
    }
    public function createYear()
    {
        $client = new Client();
        $OrderId = uniqid();
        $res = $client->request('POST', 'https://securepayments.sberbank.ru/payment/rest/register.do', [
        'form_params' => [
            'token'  => 'uprck3cpcmlnv5qk35r4lp79j1', 
            'orderNumber' => $OrderId,
            'amount' => "90000",
            'returnUrl' => "http://teachhome.ru/payment/done",
            'failUrl'  => "http://teachhome.ru/payment/notdone"
        ]
    ]);
    $mouth = 12;
    $result= $res->getBody();
    $array = json_decode($result, true);
    $this->store($array['orderId'], $mouth);
    return $array['formUrl'];
        
    }
    public function done(Request $request)
    {
        $date = Carbon::now();
        $user = Auth::user();
        $US = User_subscription::whereId_user($user->id)->orderBy('id', 'desc')->first();
        $US2 = User_subscription::whereId_user($user->id)->orderBy('id', 'desc')->skip(1)->first();
        $subs = Subscription::where('OrderId',$request->orderId)->first();
            if ($US2) {
                $subs2 = Subscription::whereId($US2->id_sub)->orderBy('id', 'desc')->first();
                $end_date = strtotime($subs2->end_date);
                $create_sub = strtotime($date);
                $daysBeforeSub = $end_date - $create_sub;                
                if($daysBeforeSub>0){
                    $end_dateNow = strtotime($subs->end_date);
                    $end_dateNewSub = $daysBeforeSub + $end_dateNow;
                    $normalend_dateNewSub = date('Y/m/d H:m:s ', $end_dateNewSub);
                    $subs->end_date = $normalend_dateNewSub;
                    $subs->save();                  
                }
            $subs2->delete();
            $US2->delete();            
            }
        
        $subs->status=1;
        $subs->save();
        $end_date = strtotime($subs->end_date);
        $create_sub = strtotime($subs->created_at);
        $hueta = $end_date - $create_sub; 
        $hueta = $hueta/86400;
        
       return view('done',['hueta'=>$hueta]);
    }
    public function notdone()
    {
       return view('notdone');
    }
}
