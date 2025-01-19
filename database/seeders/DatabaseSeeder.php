<?php

namespace Database\Seeders;

use App\Models\Audit;
use App\Models\CriticalControlPoint;
use App\Models\HoursWorked;
use App\Models\JobListing;
use App\Models\JobPhase;
use App\Models\JobTask;
use App\Models\Notification;
use App\Models\Product;
use App\Models\Rejection;
use App\Models\Report;
use App\Models\Site;
use App\Models\User;
use App\Models\UserTask;
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
            RejectionTableSeeder::class,
            ReportTableSeeder::class,
            SiteTableSeeder::class,
            UserTableSeeder::class,
            NotificationTableSeeder::class,
            HoursWorkedTableSeeder::class,
            AuditTableSeeder::class,
            UserTaskTableSeeder::class,
        ]);
    }
}
