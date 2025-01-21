<?php

namespace App\Livewire;

use App\Models\JobListing;
use Livewire\Component;

class ShowJobDetails extends Component
{
    public JobListing $job_listing;

    public function render()
    {
        return view('livewire.show-job-details');
    }
}
