<?php

namespace App\Livewire;

use App\Models\JobListing;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowJobDetails extends Component
{
    public JobListing $job_listing;
    public $add_employee_component_is_visible = false;
    public $log_hours_component_visible = false;
    public string $selected_employee;
    public $log_date;

    // WORKED HOURS
    public float $hours_worked;
    public $logged_hours = [];
    public $currentMonth;
    public $selectedDate;
    public $hoursInput;
    public $showModal = false;

    public function mount()
    {
        $this->currentMonth = Carbon::now()->startOfMonth();
    }

    public function render()
    {
        $this->load_logged_hours();

        // Calculate the start of the month and the total days in the month based on $currentMonth
        $startOfMonth = $this->currentMonth->startOfMonth();  // Get the first day of the month
        $daysInMonth = $this->currentMonth->daysInMonth;      // Get the total number of days in the month

        // Find all employees attached to the job listing that aren't key employees.
        $assigned_employees = $this->job_listing->users()->orderBy('name')->get();

        // Find all employees that aren't attached to this job listing (key employee or not).
        $available_employees = User::whereNotIn('id', $assigned_employees->pluck('id'))->orderBy('name')->get();

        return view('livewire.job-listings.show-job-details', [
            'assigned_employees' => $assigned_employees,
            'available_employees' => $available_employees,
            'currentMonth' => $this->currentMonth, // Pass currentMonth to the view
            'startOfMonth' => $startOfMonth,       // Pass start of the month to the view
            'daysInMonth' => $daysInMonth,         // Pass the number of days in the month to the view
        ]);
    }

    public function toggle_add_employee_component_visibility()
    {
        $this->add_employee_component_is_visible = !$this->add_employee_component_is_visible;
    }

    public function toggle_log_worked_hours_component_visibility()
    {
        $this->log_hours_component_visible = !$this->log_hours_component_visible;
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

    public function log_hours()
    {
        if (!$this->log_date || !$this->hours_worked)
        {
            session()->flash('error', 'Please provide the date and hours worked.');
            return;
        }

        if ($this->hours_worked <= 0)
        {
            session()->flash('error', 'Hours worked must be greater than 0.');
            return;
        }

        $this->job_listing->hours_workeds()->create([
            'date' => $this->log_date,
            'hours' => $this->hours_worked,
            'user_id' => Auth::id(),
        ]);

        $this->toggle_log_worked_hours_component_visibility();
    }

    public function load_logged_hours()
    {
        $this->logged_hours = $this->job_listing->hours_workeds()
            ->where('user_id', Auth::id())
            ->orderBy('date', 'asc')
            ->get()
            ->map(function ($entry) {
                return [
                    'date' => $entry->date->format('Y-m-d'),
                    'hours' => $entry->hours,
                ];
            });
    }

    public function next_month()
    {
        $this->currentMonth = $this->currentMonth->addMonth();
    }

    public function previous_month()
    {
        $this->currentMonth = $this->currentMonth->subMonth();
    }
}
