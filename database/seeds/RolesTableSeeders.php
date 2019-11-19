<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name'=>'user']);
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'god']);
    }
}
