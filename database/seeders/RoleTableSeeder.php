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
        $r1->role="poster";
        $r1->save();
        $r2 = new Role;
        $r2->role="moderator";
        $r2->save();
        $r3 = new Role;
        $r3->role="admin";
        $r3->save();
    }
}
