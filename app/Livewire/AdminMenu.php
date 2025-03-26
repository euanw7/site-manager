<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Site;
use App\Models\User;

class AdminMenu extends Component
{
    public function render()
    {
        return view('livewire.admin-menu', 
        [
            'products' => Product::latest()->get(),
            'sites' => Site::latest()->get(),
            'users' => User::latest()->get()
        ]);
    }
}
