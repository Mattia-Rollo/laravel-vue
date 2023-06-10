<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Inertia::render('Experiences/Index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Experiences/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $jobseeker = Auth::user()->jobseeker;
        $experience = new Experience();
        $experience->jobseeker_id = $jobseeker->id;
        $experience['company'] = $request['company'];
        $experience['position'] = $request['position'];
        $experience['start_year'] = Carbon::createFromFormat('Y-m-d', $request['date'])->year;

        $experience->save();
        return redirect()->route('curriculum.show', ['curriculum' => $jobseeker->id]);
        ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $experience = Experience::find($id);
        // dd($education);
        return Inertia::render('Experiences/Edit', ['experience' => $experience]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience, $id)
    {
        //
        $experience = Experience::find($id);
        $jobseeker = Auth::user()->jobseeker;
        // $experience = new experience();
        // $experience->jobseeker_id = $jobseeker->id;
        // dd($experience);

        $experience->position = $request['position'];
        $experience->description = $request['description'];
        $experience->company = $request['company'];
        // $esperience->start_year = Carbon::createFromFormat('Y-m-d', $request['date'])->year;

        $experience->update();
        return redirect()->route('curriculum.show', ['curriculum' => $jobseeker->id])->with('message', 'salvataggio effettuato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        //
    }
}