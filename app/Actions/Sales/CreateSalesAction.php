<?php

namespace App\Actions\Sales;

use App\Http\Requests\Sales\CreateSalesRequest;
use App\Models\Sales;
use App\Models\SalesManager;
use Illuminate\Support\Facades\Hash;

class CreateSalesAction {

	public function create(CreateSalesRequest $request) : Sales
	{
        //later replace this with [ $request->sales-manager ]

        $sales_manager = SalesManager::findOrFail(2);

        // creating the admin
        // admin is only created by Super Admins

        $created_sales = $sales_manager->sales()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($created_sales->wasRecentlyCreated)
        {
        	return $created_sales;
        }

        return $created_sales;
	}

}
