<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $educations = Auth::user()->jobseeker->education;
        return Inertia::render('Education/Index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Education/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $jobseeker = Auth::user()->jobseeker;
        $education = new Education();
        $education->jobseeker_id = $jobseeker->id;
        $education['degree'] = $request['degree'];
        $education['institution'] = $request['institution'];
        $education['start_year'] = Carbon::createFromFormat('Y-m-d', $request['date'])->year;

        $education->save();
        return redirect()->route('curriculum.index');
        ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
        // $education = Education::find($id);
        // dd($education);
        return Inertia::render('Education/Edit', ['education' => $education]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        //
        // dd($education);
        // $education = Education::find($id);
        $jobseeker = Auth::user()->jobseeker;
        // $education = new Education();
        // $education->jobseeker_id = $jobseeker->id;
        // dd($education);

        $education->degree = $request['degree'];
        $education->institution = $request['institution'];
        $education->start_year = Carbon::createFromFormat('Y-m-d', $request['date'])->year;

        $education->update();
        return redirect()->route('curriculum.index')->with('message', 'salvataggio effettuato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        //
    }
}