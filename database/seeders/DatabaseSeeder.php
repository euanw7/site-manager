<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ProductTableSeeder::class,
            CriticalControlPointTableSeeder::class,
            JobListingTableSeeder::class,
            JobPhaseTableSeeder::class,
            JobTaskTableSeeder::class,
            HoursWorkedTableSeeder::class,
            RejectionTableSeeder::class,
            ReportTableSeeder::class,
            SiteTableSeeder::class,
            UserTableSeeder::class,
            NotificationTableSeeder::class,
            AuditTableSeeder::class,
            UserTaskTableSeeder::class,
            UserRoleTableSeeder::class,
            UserAssignedRoleTableSeeder::class,
            ProductInUseTableSeeder::class
        ]);
    }
}
