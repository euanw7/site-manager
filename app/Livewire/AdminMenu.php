<?php

namespace App\Livewire;

use App\Models\HoursWorked;
use App\Models\JobListing;
use Livewire\Component;
use App\Models\Product;
use App\Models\Site;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Shuchkin\SimpleXLSXGen;

class AdminMenu extends Component
{
    public $activeTab = "productsTab";

    public $create_user_component_is_visible = false;
    public $create_site_component_is_visible = false;
    public $create_role_component_is_visible = false;
    public $create_product_component_is_visible = false;
    
    // USER
    public string $user_name;
    public string $email;
    public string $password;
    public string $password_confirmation;
    public bool $is_admin = false;

    // SITE
    public string $site_name;
    public string $address;
    public string $employee_instructions;

    // ROLE
    public string $role_name;

    // PRODUCT
    public string $product_name;
    public string $product_description;

    // EXPORT HOURS
    public $selectedEmployee = 'all';
    public $selectedJob = 'all';
    public $startDate;
    public $endDate;

    public function render()
    {
        return view('livewire.admin-menu', 
        [
            'products' => Product::orderBy('name')->get(),
            'sites' => Site::orderBy('name')->get(),
            'users' => User::orderBy('name')->get(),
            'user_roles' => UserRole::orderBy('name')->get(),
            'job_listings' => JobListing::orderBy('job_number')->get(),
        ]);
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
        $this->create_user_component_is_visible = false;
        $this->create_site_component_is_visible = false;
        $this->create_role_component_is_visible = false;
        $this->create_product_component_is_visible = false;
    }

    public function toggle_component_visibility(string $component) {
        switch ($component) {
            case 'user':
                $this->create_user_component_is_visible = !$this->create_user_component_is_visible;
                $this->create_site_component_is_visible = false;
                $this->create_role_component_is_visible = false;
                $this->create_product_component_is_visible = false;
                break;
            case 'site':
                $this->create_site_component_is_visible = !$this->create_site_component_is_visible;
                $this->create_user_component_is_visible = false;
                $this->create_role_component_is_visible = false;
                $this->create_product_component_is_visible = false;
                break;
            case 'role':
                $this->create_role_component_is_visible = !$this->create_role_component_is_visible;
                $this->create_user_component_is_visible = false;
                $this->create_site_component_is_visible = false;
                $this->create_product_component_is_visible = false;
                break;
            case 'product':
                $this->create_product_component_is_visible = !$this->create_product_component_is_visible;
                $this->create_user_component_is_visible = false;
                $this->create_site_component_is_visible = false;
                $this->create_role_component_is_visible = false;
                break;
        }
    }

    public function cancel(string $component)
    {
        switch ($component) {
            case 'user':
                $this->create_user_component_is_visible = false;
                $this->reset(['user_name', 'email', 'password', 'password_confirmation']);
                break;
            case 'site':
                $this->create_site_component_is_visible = false;
                $this->reset(['site_name', 'address', 'employee_instructions']);
                break;
            case 'role':
                $this->create_role_component_is_visible = false;
                $this->reset(['role_name']);
                break;
            case 'product':
                $this->create_product_component_is_visible = false;
                $this->reset(['product_name', 'product_description']);
                break;
        }
    }

    public function create_user()
    {
        $this->validate([
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $this->user_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' => $this->is_admin,
        ]);

        $this->reset(['user_name', 'email', 'password']);
        $this->toggle_component_visibility('user');
    }

    public function create_site()
    {
        $this->validate([
            'site_name' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'employee_instructions' => 'required|string|max:510',
        ]);

        Site::create([
            'name' => $this->site_name,
            'address' => $this->address,
            'employee_instructions' => $this->employee_instructions,
        ]);

        $this->reset(['site_name', 'address', 'employee_instructions']);
        $this->toggle_component_visibility('site');
    }

    public function create_role()
    {
        $this->validate([
            'role_name' => 'required|string|max:50',
        ]);

        UserRole::create([
            'name' => $this->role_name
        ]);

        $this->reset(['role_name']);
        $this->toggle_component_visibility('role');
    }

    public function create_product()
    {
        $this->validate([
            'product_name' => 'required|string|max:50',
            'product_description' => 'required|string|max:255',
        ]);

        Product::create([
            'name' => $this->product_name,
            'description' => $this->product_description,
        ]);

        $this->reset(['product_name', 'product_description']);
        $this->toggle_component_visibility('product');
    }

    public function export_worked_hours()
    {
        $query = HoursWorked::with(['job_listing', 'user'])
            ->join('job_listings', 'hours_workeds.job_listing_id', '=', 'job_listings.id');

        if ($this->selectedEmployee !== 'all') {
            $query->where('hours_workeds.user_id', $this->selectedEmployee);
        }

        if ($this->selectedJob !== 'all') {
            $query->where('hours_workeds.job_listing_id', $this->selectedJob);
        }

        if ($this->startDate) {
            $query->whereDate('hours_workeds.date', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('hours_workeds.date', '<=', $this->endDate);
        }

        $query->orderBy('job_listings.job_number');

        $hours_worked = $query->get();

        $data = [
            ['Job Number', 'Employee Name', 'Date', 'Hours Worked', 'Email']
        ];

        foreach ($hours_worked as $entry) {
            $data[] = [
                $entry->job_listing->job_number ?? 'N/A',
                $entry->user->name ?? 'N/A',
                $entry->date->format('Y-m-d'),
                $entry->hours,
                $entry->user->email ?? 'N/A',
            ];
        }

        $directory = public_path('exports');
        if (!file_exists($directory)) {
            mkdir($directory, 0775, true);
        }

        $filepath = $directory . '/hours_worked.xlsx';
        SimpleXLSXGen::fromArray($data)->saveAs($filepath);

        return response()->download($filepath);
    }

}
