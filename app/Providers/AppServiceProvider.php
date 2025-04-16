<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('is.admin', function ($user) {
            return $user->is_admin;
        });

        Gate::define('is.quality.manager', function ($user, $job_listing) {
            $user_assigned_role = $job_listing
                ->user_assigned_roles()
                ->where('user_id', $user->id)
                ->first();
                
            return $user_assigned_role->user_role->name === 'Quality Manager';
        });

        Gate::define('is.job.manager', function ($user, $job_listing) {
            $user_assigned_role = $job_listing
                ->user_assigned_roles()
                ->where('user_id', $user->id)
                ->first();
                
            return $user_assigned_role->user_role->name === 'Job Manager';
        });

        Gate::define('is.assigned.to.job', function ($user, $job_listing) {
            foreach ($job_listing->users as $assignedUser)
            {
                if ($assignedUser->name === $user->name)
                {
                    return true;
                } 
            }
            return false;
        });
    }
}
