<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    protected function createSuperAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $super_admin = SuperAdmin::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json($super_admin, 200);
    }

    protected function createAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $admin = Admin::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json($admin, 200);
    }

    
}
