<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Sample;
use App\Models\Patient;
use App\Models\Test;
use PDF;
class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      // Show all patients, samples, and tests
    //   public function indexall()
    //   {
    //       // Load all patients along with their samples and tests
    //       $patients = Patient::with('samples.tests')->get();
  
    //       // Pass the data to the view
    //       return view('samples.index-all', compact('patients'));
    //   }

    public function index(Request $request)
    {
        $query = Sample::query();

        if ($request->has('sample_id') && $request->sample_id != '') {
            $inputSampleId = $request->sample_id;
            
            // Split the custom_sample_id into the numeric part and the patient's name
            $sampleIdParts = explode('-', $inputSampleId);
            $id = intval($sampleIdParts[0]);  // First part is the sample ID (numeric)
            $patientName = isset($sampleIdParts[1]) ? str_replace('_', ' ', $sampleIdParts[1]) : null;
    
            // Query based on the sample ID and optionally the patient name
            $query->where('id', $id);
    
            if ($patientName) {
                $query->whereHas('patient', function ($query) use ($patientName) {
                    $query->where('name', 'like', '%' . $patientName . '%');
                });
            }
        }
    
        $samples = $query->paginate(10);
    
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
            'tests.*.test_name' => 'required|string',  // Validate each test name
            'tests.*.test_date' => 'required|date',    // Validate each test date
        ]);

        $sample = Sample::create($request->all());

         // Add multiple tests to the sample
         foreach ($request->input('tests') as $testData) {
            $sample->tests()->create([
                'test_name' => $testData['test_name'],
                'test_date' => $testData['test_date'],
                'status' => 'Pending',
                'technician_id' => $testData['technician_id'] ?? null,
            ]);
        }

        return redirect()->route('samples.create')->with([
            'success' => 'Sample and tests saved successfully!',
            'custom_sample_id' => $sample->formatted_sample_id,
        ]);
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

    // Method to generate the PDF
    public function generatePdf(Sample $sample)
    {
        // Load the view and pass the sample data
        $pdf = PDF::loadView('pdf.sample-details', compact('sample'));

        // Stream the PDF directly in the browser or download it
        return $pdf->download('sample-report-' . $sample->formatted_sample_id . '.pdf');
    }

    // Generate a PDF report of all patients, samples, and tests
    // public function generateAllPdf()
    // {
    //     // Load all patients with their samples and tests
    //     $patients = Patient::with('samples.tests')->get();

    //     // Load the PDF view and pass the data
    //     $pdf = PDF::loadView('pdf.all-samples', compact('patients'));

    //     // Return the PDF as a downloadable file
    //     return $pdf->download('all-samples-report.pdf');
    // }
}
