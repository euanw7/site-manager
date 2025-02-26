<?php

namespace App\Livewire;

use App\Models\JobPhase;
use App\Models\UserAssignedRole;
use Livewire\Component;
use DateTime;
use Livewire\Attributes\Rule;

class EditJobListing extends Component
{
    public $job_listing;
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
        return view('livewire.job-listings.edit-job-listing');
    }

    public function mount()
    {
        $this->job_number = $this->job_listing->job_number;
        $this->title = $this->job_listing->title;
        $this->description = $this->job_listing->description;
        $this->site_id = $this->job_listing->site->id;
        $this->start_date = $this->job_listing->start_date;
        $this->end_date = $this->job_listing->end_date;

        $this->job_phase_inputs = collect();
        $this->key_employee_inputs = collect();

        // Get the job listing's phase details
        foreach ($this->job_listing->job_phases as $job_phase)
        {
            $job_phase_details = ['phase_title' => $job_phase->title,
                'phase_description' => $job_phase->description,
                'phase_start_date' => $job_phase->start_date,
                'phase_end_date' => $job_phase->end_date];

            $this->job_phase_inputs->push($job_phase_details);
        }
        
        // Get the job listing's key employee details
        foreach ($this->job_listing->user_assigned_roles as $user_assigned_role)
        {
            $key_employee_details = [
                'user_id' => $user_assigned_role->user->id,
                'user_role_id' => $user_assigned_role->user_role->id
            ];

            $this->key_employee_inputs->push($key_employee_details);
        }
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

    public function update_job_listing()
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

        $this->job_listing->job_number = $this->job_number;
        $this->job_listing->description = $this->description;
        $this->job_listing->start_date = $this->start_date;
        $this->job_listing->end_date = $this->end_date;
        $this->job_listing->site_id = $this->site_id;

        $this->job_listing->save();

        // Keep track of the phases that currently exist
        $existing_job_phases = JobPhase::where('job_listing_id', $this->job_listing->id)->get();
        $submitted_phase_titles = [];

        // Update Job Phase(s)
        foreach ($this->job_phase_inputs as $input) {
            $submitted_phase_titles[] = $input['phase_title'];
            $job_phase = JobPhase::where('job_listing_id', $this->job_listing->id)
                ->where('title', $input['phase_title'])
                ->first();

            if ($job_phase) {
                // Update the existing job phase
                $job_phase->description = $input['phase_description'];
                $job_phase->start_date = $input['phase_start_date'];
                $job_phase->end_date = $input['phase_end_date'];
                $job_phase->save();
            } else {
                // Create a new job phase
                JobPhase::create([
                    'job_listing_id' => $this->job_listing->id,
                    'title' => $input['phase_title'],
                    'description' => $input['phase_description'],
                    'start_date' => $input['phase_start_date'],
                    'end_date' => $input['phase_end_date']
                ]);
            }
        }

        // Remove deleted job phase(s) from the database
        foreach ($existing_job_phases as $existing_job_phase) {
            if (!in_array($existing_job_phase->title, $submitted_phase_titles)) {
                $existing_job_phase->delete();
            }
        }

        // Keep track of key employees that currently exist
        $existing_key_employees = UserAssignedRole::where('job_listing_id', $this->job_listing->id)->get();
        $submitted_user_ids = [];

        // Update Key Employee(s)
        foreach ($this->key_employee_inputs as $input) {
            $submitted_user_ids[] = $input['user_id'];
            $user_assigned_role = UserAssignedRole::where('job_listing_id', $this->job_listing->id)
                ->where('user_id', $input['user_id'])
                ->first();

            if ($user_assigned_role) {
                // Update the existing key employee
                $user_assigned_role->user_role_id = $input['user_role_id'];
                $user_assigned_role->save();
            } else {
                // Create a new key employee
                UserAssignedRole::create([
                    'job_listing_id' => $this->job_listing->id,
                    'user_id' => $input['user_id'],
                    'user_role_id' => $input['user_role_id']
                ]);
            }
        }

        // Remove deleted key employee(s) from the database
        foreach ($existing_key_employees as $existing_key_employee) {
            if (!in_array($existing_key_employee->user_id, $submitted_user_ids)) {
                $existing_key_employee->delete();
            }
        }

        // Redirect to the new job listing's page
        return redirect()->route('joblistings.show', $this->job_listing->id);
    }

    public function cancel()
    {
        return redirect("joblistings");
    }
}
