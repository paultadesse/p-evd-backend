<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Admin\CreateAdminAction;
use App\Actions\Distributor\CreateDistributorAction;
use App\Actions\SalesManager\CreateSalesManagerAction;
use App\Actions\Sales\CreateSalesAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Distributor\CreateDistributorRequest;
use App\Http\Requests\SalesManager\CreateSalesManagerRequest;
use App\Http\Requests\Sales\CreateSalesRequest;
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

    protected function createAdmin(CreateAdminRequest $request, CreateAdminAction $createAdminAction)
    {

        $admin = $createAdminAction->create($request);

        if($admin->wasRecentlyCreated)
        {
            return response()->json($admin, 200);
        }else {
            return response()->json([ 'message' => 'There is somthing going on ....']);
        }

    }

    protected function createSalesManager(CreateSalesManagerRequest $request, CreateSalesManagerAction $createSalesManagerAction)
    {
        
        $sales_manager = $createSalesManagerAction->create($request);

        if($sales_manager->wasRecentlyCreated)
        {
            return response()->json($sales_manager, 200);
        }else {
            return response()->json([ 'message' => 'There is somthing going on ....']);
        }
        
    }

    protected function createSales(CreateSalesRequest $request, CreateSalesAction $createSalesAction)
    {
        $sales = $createSalesAction->create($request);

        if($sales->wasRecentlyCreated)
        {
            return response()->json($sales, 200);
        }else {
            return response()->json([ 'message' => 'There is somthing going on ....']);
        }
    }

    protected function createDistributor(CreateDistributorRequest $request, CreateDistributorAction $createDistributorAction  )
    {
        $distributor = $createDistributorAction->create($request);

        if($distributor->wasRecentlyCreated)
        {
            return response()->json($distributor, 200);
        }else{
            return response()->json([ 'message' => 'There is somthing going on ....']);
        }
    }

    
}
