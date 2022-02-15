<?php 

namespace App\Actions\SalesManager;

use App\Http\Requests\SalesManager\CreateSalesManagerRequest;
use App\Models\Admin;
use App\Models\SalesManager;
use Illuminate\Support\Facades\Hash;

class CreateSalesManagerAction {

	public function create(CreateSalesManagerRequest $request) : SalesManager
	{
		//for now manually select Admin to create sales-manager
        // ( so this super-admin is the parent of the the newly created admin )
        //later replace this with [ $request->admin ]

        $admin = Admin::findOrFail(3);

        // creating the sales-manager
        // sales-manager is only created by Admins

        $created_sales_manager = $admin->salesManagers()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($created_sales_manager->wasRecentlyCreated)
        {
        	return $created_sales_manager;
        }

        return $created_sales_manager;
	}

	
}