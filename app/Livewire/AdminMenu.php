<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Site;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

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

    public function render()
    {
        return view('livewire.admin-menu', 
        [
            'products' => Product::latest()->get(),
            'sites' => Site::latest()->get(),
            'users' => User::latest()->get(),
            'user_roles' => UserRole::latest()->get()
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
}
