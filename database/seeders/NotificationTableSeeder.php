<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $n = new Notification([
            'content' => "This is the content of a notification.",
            'date_received' => "2025-01-01",
            'user_id' => 1,
        ]);
        $n->save();

        Notification::factory(5)->create();
    }
}
