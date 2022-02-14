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

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        //for now manually select Super Admin to create Admin 
        // ( so this super-admin is the parent of the the newly created admin )
        //later replace this with [ $request->super-admin ]

        $super_admin = SuperAdmin::findOrFail(1);

        // creating the admin
        // admin is only created by Super Admins

        $created_admin = $super_admin->admins()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json($created_admin, 200);
    }

    protected function createSalesManager(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        //for now manually select Super Admin to create Admin 
        // ( so this super-admin is the parent of the the newly created admin )
        //later replace this with [ $request->super-admin ]

        $admin = Admin::findOrFail(1);

        // creating the sales-manager
        // sales-manager is only created by Admins

        $created_sales_manager = $admin->salesManagers()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return response()->json($created_sales_manager, 200);
    }

    
}
