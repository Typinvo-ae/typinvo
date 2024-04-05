<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\MemberShipPermission;

class MemberShipPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $MemberShipPermissions = [
            [1, 1],
            [2, 1],
            [3, 1],
            [4, 1],
            [5, 1],
            [6, 1],
            [7, 1],
            [8, 1],
            [9, 1],
            [10, 1],
            [11, 1],

            [1, 2],
            [2, 2],
            [3, 2],
            [4, 2],
            [5, 2],
            [6, 2],
            [7, 2],

            [8, 2],
            [9, 2],
            [10, 2],
            [11, 2],
            [12, 2],
            [13, 2],
            [14, 2],
            [15, 2],
            [16, 2],
            [17, 2],

            [1, 3],
            [2, 3],
            [3, 3],
            [4, 3],
            [5, 3],
            [6, 3],
            [7, 3],

            [8, 3],
            [9, 3],
            [10, 3],
            [11, 3],
            [12, 3],
            [13, 3],

            [14, 3],
            [15, 3],
            [16, 3],
            [17, 3],
            [18, 3],

            [19, 3],
            [20, 3],
            [21, 3],
            [22, 3],
            [23, 3],
        ];

        foreach ($MemberShipPermissions as $MemberShipPermission) {
            MemberShipPermission::create(['permission_id' => $MemberShipPermission[0], 'membership_id' => $MemberShipPermission[1]]);
        }
    }

 





  
}
