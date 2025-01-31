<?php

namespace Database\Seeders;

use App\Models\UserAssignedRole;
use Illuminate\Database\Seeder;

class UserAssignedRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $u = new UserAssignedRole([
            'user_id' => 1,
            'job_listing_id' => 1,
            'user_role_id' => 1
        ]);
        $u->save();

        UserAssignedRole::factory(10)->create();
    }
}
