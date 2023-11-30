<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRegisterRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    function registerIndex()
    {
        return view('auth.register');
    }

    function loginIndex()
    {
        return view('auth.login');
    }

    function register(TenantRegisterRequest $request)
    {
        DB::beginTransaction();
            $tenant  = Tenant::create([
                'name' => $request->tenant_name,
                'phone' => $request->phone,
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' =>$request->email,
                'tenant_id' => $tenant->id,
                'password' => Hash::make($request->password),
            ]);
            //create Yönetici role if isn't exist
            if(!roleExist('Yönetici')){
                Role::create(['name' => 'Yönetici', 'tenant_id' => $tenant->id]);
            }
            $user->assignRole('Yönetici');
        DB::commit();

        return redirect()->route('login.show');
    }
}
