<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create(); 
        $roles = Role::all();
        User::all()->each(function ($user) use ($roles) { 
            $user->roles()->attach(
                $roles->random(rand(3, 3))->pluck('id')->toArray()
            ); 
        });
    }
}
