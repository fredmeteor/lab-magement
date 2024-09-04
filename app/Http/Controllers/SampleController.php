<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\Patient;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::with('patient')->get();
        return view('samples.index', compact('samples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::all(); // You'll need patients to assign a sample to
        return view('samples.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'sample_type' => 'required|string',
            'collection_date' => 'required|date',
            'collected_by' => 'required|string',
            'status' => 'nullable|string',
            'location' => 'nullable|integer',
            'comments' => 'nullable|string',
        ]);

        $sample = Sample::create($request->all());

        return redirect()->route('samples.index')
                         ->with('success', 'Sample created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        $patients = Patient::all();
        return view('samples.edit', compact('sample', 'patients'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample $sample)
    {
        $request->validate([
            'sample_type' => 'required|string',
            'collection_date' => 'required|date',
            'collected_by' => 'required|string',
            'status' => 'nullable|string',
            'location' => 'nullable|integer',
            'comments' => 'nullable|string',
        ]);

        $sample->update($request->all());

        return redirect()->route('samples.index')
                         ->with('success', 'Sample updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {
        $sample->delete();

        return redirect()->route('samples.index')
                         ->with('success', 'Sample deleted successfully.');
    }
}
