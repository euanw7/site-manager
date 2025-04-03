<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function adminMenu()
    {
        if (!Gate::allows('is.admin')) abort(403, "Forbidden: This account is not an admin");
        return view('admin-menu');
    }
}
