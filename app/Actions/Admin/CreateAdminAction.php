<?php 

namespace App\Actions\Admin;

use App\Http\Requests\Admin\CreateAdminRequest;
use App\Models\Admin;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

class CreateAdminAction {

	public function create(CreateAdminRequest $request) : Admin
	{
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

        if($created_admin->wasRecentlyCreated)
        {
        	return $created_admin;
        }

        return $created_admin;
	}

}