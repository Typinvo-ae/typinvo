<?php

namespace Database\Seeders;

use App\Models\PopularGeoPlace;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = $this->adminCreation();
    }

    function adminCreation()
    {
        return  User::create([
            'name' => 'admin',
            'email' => 'test@gmail.com',
            'phone'=>'0122888888',
            'role' => 'isSuperAdmin',
            'password' => bcrypt('123123'),
        ]);
    }





  
}
