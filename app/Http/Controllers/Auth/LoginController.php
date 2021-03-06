<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Distributor;
use App\Models\Retailer;
use App\Models\Sales;
use App\Models\SalesManager;
use App\Models\SubDistributor;
use App\Models\SuperAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    protected function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'admins']);

            $admin = Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);
            $success =  $admin;

            //For now we don't need scopes...
            // $success['token'] =  $admin->createToken('p-evd',['admin'])->accessToken;
            
            $success['token'] =  $admin->createToken('p-evd')->accessToken;

            return response()->json($success, 200);
        }else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    protected function salesManagerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('sales-manager')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'admins']);

            $sales_manager = SalesManager::select('sales_managers.*')->find(auth()->guard('sales-manager')->user()->id);
            $success =  $sales_manager;

            //For now we don't need scopes...
            // $success['token'] =  $admin->createToken('p-evd',['admin'])->accessToken;
            
            $success['token'] =  $sales_manager->createToken('p-evd')->accessToken;

            return response()->json($success, 200);
        }else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    protected function salesLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('sales')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'admins']);

            $sales = Sales::select('sales.*')->find(auth()->guard('sales')->user()->id);
            $success =  $sales;

            //For now we don't need scopes...
            // $success['token'] =  $admin->createToken('p-evd',['admin'])->accessToken;
            
            $success['token'] =  $sales->createToken('p-evd')->accessToken;

            return response()->json($success, 200);
        }else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    protected function distributorLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('distributor')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'admins']);

            $distributor = Distributor::select('distributors.*')->find(auth()->guard('distributor')->user()->id);
            $success =  $distributor;

            //For now we don't need scopes...
            // $success['token'] =  $admin->createToken('p-evd',['admin'])->accessToken;
            
            $success['token'] =  $distributor->createToken('p-evd')->accessToken;

            return response()->json($success, 200);
        }else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    protected function subDistributorLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('sub-distributor')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'admins']);

            $sub_distributor = SubDistributor::select('sub_distributors.*')->find(auth()->guard('sub-distributor')->user()->id);
            $success =  $sub_distributor;

            //For now we don't need scopes...
            // $success['token'] =  $admin->createToken('p-evd',['admin'])->accessToken;
            
            $success['token'] =  $sub_distributor->createToken('p-evd')->accessToken;

            return response()->json($success, 200);
        }else{
            return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        }
    }

    protected function retailerLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
        }

        if(auth()->guard('retailer')->attempt(['email' => request('email'), 'password' => request('password')])){

            // config(['auth.guards.api.provider' => 'admins']);

            $retailer = Retailer::select('retailers.*')->find(auth()->guard('retailer')->user()->id);
            $success =  $retailer;

            //For now we don't need scopes...
            // $success['token'] =  $admin->createToken('p-evd',['admin'])->accessToken;
            
            $success['token'] =  $retailer->createToken('p-evd')->accessToken;

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
