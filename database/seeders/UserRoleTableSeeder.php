<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new UserRole([
            'name' => 'Quality Manager'
        ]);
        $u->save();

        UserRole::factory(3)->create();
    }
}
