<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use App\Models\Site;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Gate;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobListings = JobListing::latest()->get();
        return view('joblistings.index', ['jobListings' => $jobListings]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('is.admin')) abort(403, "Forbidden: This account is not an admin");
        return view('joblistings.create', 
        [
            'users' => User::orderBy('name', 'asc')->get(),
            'sites' => Site::orderBy('name', 'asc')->get(),
            'roles' => UserRole::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('joblistings.show', [
            'job_listing' => JobListing::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('is.admin')) abort(403, "Forbidden: This account is not an admin");
        return view('joblistings.edit', [
            'job_listing' => JobListing::findOrFail($id),
            'users' => User::orderBy('name', 'asc')->get(),
            'sites' => Site::orderBy('name', 'asc')->get(),
            'roles' => UserRole::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('is.admin')) abort(403, "Forbidden: This account is not an admin");
        $job_listing = JobListing::findOrFail($id);
        $job_listing->delete();
        return redirect()->route('joblistings.index');
    }
}
