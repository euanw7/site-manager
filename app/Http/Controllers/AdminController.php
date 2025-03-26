<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function adminMenu()
    {
        return view('admin-menu');
    }
}
