<?php

namespace App\Livewire;

use Livewire\Component;
use DateTime;
use Livewire\Attributes\Rule;
use App\Models\JobTask;

class ShowJobPhaseDetails extends Component
{
    #[Rule('required|min:1|max:50|string')]
    public string $title;

    #[Rule('required|min:1|max:255|string')]
    public string $description;

    #[Rule('required|date')]
    public DateTime $start_date;

    #[Rule('required|date')]
    public DateTime $end_date;

    #[Rule('required|bool')]
    public bool $quality_critical = false;

    public $job_phase;
    public $create_component_is_visible = false;

    public $key;
    public $value;
    
    public function render()
    {
        return view('livewire.job-phases.show-job-phase-details');
    }

    public function toggle_component_visibility()
    {
        $this->create_component_is_visible = !$this->create_component_is_visible;
    }

    public function create_job_task()
    {
        $this->validate();

        $j = new JobTask([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'quality_critical' => $this->quality_critical,
            'job_phase_id' => $this->value->id
        ]);
        $j->save();

        $this->toggle_component_visibility();
    }
}
