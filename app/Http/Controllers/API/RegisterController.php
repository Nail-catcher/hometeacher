<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\User;
use App\Subscription;
use App\User_subscription;
use Illuminate\Support\Facades\Auth;
use Validator;
   
class RegisterController extends BaseController
 {
//     /**
//      * Register api
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function register(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'name' => 'required',
//             'email' => 'required|email',
//             'password' => 'required',
//             'c_password' => 'required|same:password',
//         ]);
   
//         if($validator->fails()){
//             return $this->sendError('Validation Error.', $validator->errors());       
//         }
   
//         $input = $request->all();
//         $input['password'] = bcrypt($input['password']);
//         $user = User::create($input);
//         $success['token'] =  $user->createToken('MyApp')->accessToken;
//         $success['name'] =  $user->name;
   
//         return $this->sendResponse($success, 'User register successfully.');
//     }
   
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user();
            $US = User_subscription::whereId_user($user->id)->orderBy('id', 'desc')->first();
            if ($US) {
                $subs = Subscription::whereId($US->id_sub)->orderBy('id', 'desc')->first();
            } else {$subs=null;};
            $success['token'] =  $user->createToken('MyApp')->accessToken; 
            $success['name'] =  $user->name;
            $success['class_child'] =  $user->class_child;
            if($subs){
            $success['status_sub'] =  $subs->status;
            } else {
                $success['status_sub'] = 0;
            }

            return $this->sendResponse($success, 'User login successfully.');
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }
}
