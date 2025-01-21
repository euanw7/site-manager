<?php

namespace App\Livewire;

use Livewire\Component;

class ShowJobTask extends Component
{
    public $job_task;
    
    public function render()
    {
        return view('livewire.show-job-task');
    }
}
