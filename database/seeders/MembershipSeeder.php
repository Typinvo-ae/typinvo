<?php

namespace Database\Seeders;

use Modules\MemberShip\Entities\MemberShip;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MemberShip::create([ 'name' => 'basic']);
        MemberShip::create([ 'name' => 'standard',]);
        MemberShip::create(['name' => 'premium',]);
    }

 





  
}
