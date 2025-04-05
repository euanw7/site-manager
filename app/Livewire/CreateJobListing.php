<?php

namespace App\Livewire;

use App\Models\JobListing;
use App\Models\JobPhase;
use App\Models\UserAssignedRole;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class CreateJobListing extends Component
{
    public $users;
    public $sites;
    public $roles;

    #[Rule('required|integer')]
    public int $job_number;

    #[Rule('required|min:1|max:50|string')]
    public string $title;

    #[Rule('required|min:1|max:255|string')]
    public string $description;

    #[Rule('required|integer')]
    public int $site_id = 1;

    #[Rule('required|date')]
    public DateTime $start_date;

    #[Rule('required|date')]
    public DateTime $end_date;

    public $job_phase_inputs;
    public $key_employee_inputs;

    public $default_job_phase = ['phase_title'=>'',
        'phase_description'=>'',
        'phase_start_date'=>'',
        'phase_end_date'=>''];

    public $default_key_employee = [
        'user_id' => 1,
        'user_role_id' => 1
    ];

    public function render()
    {
        return view('livewire.job-listings.create-job-listing');
    }

    public function mount()
    {
        $this->fill([
            'job_phase_inputs' => collect([$this->default_job_phase]),
            'key_employee_inputs' => collect([$this->default_key_employee])
        ]);
    }

    public function add_phase()
    {
        $this->job_phase_inputs->push($this->default_job_phase);
    }

    public function remove_phase()
    {
        if ($this->job_phase_inputs->count() > 1)
        {
            $this->job_phase_inputs->pop();
        }
    }

    public function add_key_employee()
    {
        $this->key_employee_inputs->push($this->default_key_employee);
    }

    public function remove_key_employee()
    {
        if ($this->key_employee_inputs->count() > 1)
        {
            $this->key_employee_inputs->pop();
        }
    }

    public function create_job_listing()
    {
        // Validate Job Listing inputs
        $this->validate();

        // Validate Job Phase(s) inputs
        $this->validate([
            'job_phase_inputs.*.phase_title'=>'required',
            'job_phase_inputs.*.phase_description'=>'required',
            'job_phase_inputs.*.phase_start_date'=>'required',
            'job_phase_inputs.*.phase_end_date'=>'required',
            'key_employee_inputs.*.user_id'=>'required',
            'key_employee_inputs.*.user_role_id'=>'required'
        ]);

        // Create new Job Listing
        $j = new JobListing([
            'job_number' => $this->job_number,
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'site_id' => $this->site_id,
        ]);
        $j->save();

        // Create Job Phase(s)
        foreach($this->job_phase_inputs as $input)
        {
            JobPhase::create([
                'title' => $input['phase_title'],
                'description' => $input['phase_description'],
                'start_date' => $input['phase_start_date'],
                'end_date' => $input['phase_end_date'],
                'job_listing_id' => $j->id
            ]);
        }

        // Create User Assigned Roles
        foreach($this->key_employee_inputs as $input)
        {
            UserAssignedRole::create([
                'user_id' => $input['user_id'],
                'user_role_id' => $input['user_role_id'],
                'job_listing_id' => $j->id
            ]);
        }

        $j->users()->attach(Auth::User());

        // Redirect to the new job listing's page
        return redirect()->route('joblistings.show', $j->id);
    }

    public function cancel()
    {
        return redirect("joblistings");
    }
}
