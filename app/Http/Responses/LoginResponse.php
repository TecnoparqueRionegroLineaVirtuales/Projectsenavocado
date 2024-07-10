<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\DB;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        
        /*return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended(config('fortify.home'));*/
        
        /*if(auth()->user()){ */
            $userId=auth()->user()->id;
            $role = DB::table('model_has_roles')->where('model_id', $userId)
            ->select('role_id')
            ->get()->toArray();

            //dd($role);
        /*}*/
        $home = "";
            if(isset($role) && !empty($role)){
                $home = '/admin';
            }else{
                
                $home =  '/home';
            }
        

        return redirect()->intended($home);
        //dd($home);

        
    }

}