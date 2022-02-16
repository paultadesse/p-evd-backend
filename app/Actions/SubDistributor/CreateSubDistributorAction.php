<?php 

namespace App\Actions\SubDistributor;

use App\Http\Requests\SubDistributor\CreateSubDistributorRequest;
use App\Models\Distributor;
use App\Models\SubDistributor;
use Illuminate\Support\Facades\Hash;

class CreateSubDistributorAction {

	
	public function create(CreateSubDistributorRequest $request) : SubDistributor
	{
        //later replace this with [ $request->sales-manager ]

        $distributor = Distributor::findOrFail(1);

        // creating the sub-distributor
        // admin is only created by Distributor

        $created_sub_distributor = $distributor->subDistributors()->create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        if($created_sub_distributor->wasRecentlyCreated)
        {
        	return $created_sub_distributor;
        }

        return $created_sub_distributor;
	}
}