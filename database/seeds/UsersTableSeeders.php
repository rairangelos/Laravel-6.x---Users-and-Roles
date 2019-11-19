<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $userRole = Role::where('name', 'user')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $godRole = Role::where('name', 'god')->first();

        $admin = User::create([
            'name'=>'System Admin',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('Angelos31')
        ]);

        $user = User::create([
            'name'=>'System User',
            'email'=>'user@user.com',
            'password'=> Hash::make('Angelos31')
        ]);

        $god = User::create([
            'name'=>'System God',
            'email'=>'god@god.com',
            'password'=> Hash::make('Angelos31')
        ]);

        $admin->roles()->attach($adminRole);

        $user->roles()->attach($userRole);

        $god->roles()->attach($godRole);

    }
}
