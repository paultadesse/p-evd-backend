<?php 

namespace App\Actions\Distributor;

use App\Http\Requests\Distributor\CreateDistributorRequest;
use App\Models\Distributor;
use App\Models\Sales;
use Illuminate\Support\Facades\Hash;

class CreateDistributorAction {

	
	public function create(CreateDistributorRequest $request) : Distributor
	{
        //later replace this with [ $request->sales-manager ]

        $sales = Sales::findOrFail(1);

        // creating the distributor
        // admin is only created by Sales

        $created_distributor = $sales->distributors()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($created_distributor->wasRecentlyCreated)
        {
        	return $created_distributor;
        }

        return $created_distributor;
	}
}