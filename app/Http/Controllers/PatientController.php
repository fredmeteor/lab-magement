<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        
         // Validate the incoming request
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'patient_id' => 'required|exists:patients,id',
        
    ]);
    // Create the patient - the patient_id is auto-generated
    $patient = Patient::create($validatedData);
        
    // Optionally, redirect with a success message
    return redirect()->route('patients.create')->with('success', 'Patient created successfully with ID: ' . $patient->id);
    
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string',
           
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')
                         ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
                         ->with('success', 'Patient deleted successfully.');
    }
}
