<?php

namespace App\Http\Controllers;

use App\Models\Jobseeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class JobseekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $jobseeker = Auth::user()->jobseeker();
        dd($jobseeker);
        return Inertia::render('Jobseeker/Curriculum/Index', ['jobseeker' => $jobseeker]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jobseeker $jobseeker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jobseeker $jobseeker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jobseeker $jobseeker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jobseeker $jobseeker)
    {
        //
    }
}