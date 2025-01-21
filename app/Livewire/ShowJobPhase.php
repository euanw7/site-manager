<?php

namespace App\Livewire;

use Livewire\Component;

class ShowJobPhase extends Component
{
    public $job_phase;
    
    public function render()
    {
        return view('livewire.show-job-phase');
    }
}
