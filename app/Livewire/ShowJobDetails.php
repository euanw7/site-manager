<?php

namespace App\Livewire;

use App\Models\JobListing;
use App\Models\User;
use Livewire\Component;

class ShowJobDetails extends Component
{
    public JobListing $job_listing;
    public $add_employee_component_is_visible = false;
    public string $selected_employee;

    public function render()
    {
        // Find all employees attached to the job listing that aren't key employees.
        $assigned_employees = $this->job_listing->users()->orderBy('name')->get();

        // Find all employees that aren't attached to this job listing (key employee or not).
        $available_employees = User::whereNotIn('id', $assigned_employees->pluck('id'))->orderBy('name')->get();

        return view('livewire.job-listings.show-job-details', [
            'assigned_employees' => $assigned_employees,
            'available_employees' => $available_employees,
        ]);
    }

    public function toggle_add_employee_component_visibility()
    {
        $this->add_employee_component_is_visible = !$this->add_employee_component_is_visible;
    }

    public function add_employee()
    {
        if (!$this->selected_employee) {
            session()->flash('error', 'Please select an employee to add.');
            return;
        }

        $this->job_listing->users()->attach($this->selected_employee);

        $this->selected_employee = "";
        $this->toggle_add_employee_component_visibility();
    }

    public function remove_employee($employee_id)
    {
        $this->job_listing->users()->detach($employee_id);
    }
}
