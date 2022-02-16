<?php 

namespace App\Actions\Retailer;

use App\Http\Requests\Retailer\CreateRetailerRequest;
use App\Models\Retailer;
use App\Models\SubDistributor;
use Illuminate\Support\Facades\Hash;

class CreateRetailerAction {

	
	public function create(CreateRetailerRequest $request) : Retailer
	{
        //for now we leave it as it is.... the SubDistributor is creating a retailer [ignoring who request]
        //later it's a must to check who is trying to create the retailer (Distributor or SubDistributor)

        $sub_distributor = SubDistributor::findOrFail(1);

        // creating the sub-distributor
        // admin is only created by Distributor

        $created_retailer = $sub_distributor->retailers()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($created_retailer->wasRecentlyCreated)
        {
        	return $created_retailer;
        }

        return $created_retailer;
	}
}