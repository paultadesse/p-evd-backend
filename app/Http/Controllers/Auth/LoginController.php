<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected function superAdminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('super-admin')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'super-admins']);

            $super_admin = SuperAdmin::select('super_admins.*')->find(auth()->guard('super-admin')->user()->id);
            $success =  $super_admin;

            //For now we don't need scopes...
            // $success['token'] =  $super_admin->createToken('p-evd',['super-admin'])->accessToken;
            
            $success['token'] =  $super_admin->createToken('p-evd')->accessToken;

            return response()->json($success, 200);
        }else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
    }

}
