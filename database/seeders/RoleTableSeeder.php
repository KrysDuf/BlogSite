<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = new Role;
        $r1->role="member";
        $r1->save();
        $r2 = new Role;
        $r2->role="moderator";
        $r2->save();
        $r3 = new Role;
        $r3->role="poster";
        $r3->save();
        $r4 = new Role;
        $r4->role="admin";
        $r4->save();
        $r5 = new Role;
        $r5->role="superAdmin";
        $r5->save();
    }
}
