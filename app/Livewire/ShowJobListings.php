<?php

namespace App\Livewire;

use App\Models\JobListing;
use Livewire\Component;

class ShowJobListings extends Component
{
    public $search;
    public $is_active_filter = 'active';

    public function render()
    {
        $is_active = $this->is_active_filter === 'active' ? true : false;

        return view('livewire.show-job-listings', [
            'jobListings' => JobListing::latest()
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                          ->orWhere('job_number', 'like', '%' . $this->search . '%');
                })
                ->where('is_active', $is_active)
                ->get()
        ]);
    }
}
