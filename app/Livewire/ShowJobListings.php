<?php

namespace App\Livewire;

use App\Models\JobListing;
use Livewire\Component;

class ShowJobListings extends Component
{
    public $search;
    public $is_active_filter = 'all';

    public function render()
    {
        return view('livewire.job-listings.show-job-listings', [
            'jobListings' => JobListing::latest()
                // Search bar matches title or job number
                ->where(function ($query) {
                    $query->where('title', 'like', '%' . $this->search . '%')
                          ->orWhere('job_number', 'like', '%' . $this->search . '%');
                })
                // Filter based on is_active if selection is not 'all'
                ->when($this->is_active_filter !== 'all', function ($query) {
                    $query->where('is_active', $this->is_active_filter === 'active');
                })
                ->get()
        ]);
    }
}
