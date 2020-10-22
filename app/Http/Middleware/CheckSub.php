<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;
use App\Subscription;
use App\User_subscription;
class CheckSub
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $US = User_subscription::whereId_user($user->id)->count();
        if ($US>1){
            $gots = User_subscription::whereId_user($user->id)->get();

            foreach($gots as $got) {
            $sub = Subscription::whereId($got->id_sub)->where('status','=',2)->first();
            
            if($sub){
                
                $sub->delete();
                $got->delete();
            }
            }
        }
        return $next($request);
    }
}
