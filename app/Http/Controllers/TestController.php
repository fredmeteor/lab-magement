namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    // Display the form to add tests to a sample
    public function create(Sample $sample)
    {
        return view('tests.create', compact('sample'));
    }

    // Store the tests associated with a sample
    public function store(Request $request, Sample $sample)
    {
        $validatedData = $request->validate([
            'tests.*.test_name' => 'required|string|max:255',
            'tests.*.result' => 'nullable|string|max:255',
        ]);

        // Loop through the tests array and create each test
        foreach ($request->tests as $testData) {
            $sample->tests()->create($testData);
        }

        return redirect()->route('samples.show', $sample)->with('success', 'Tests added successfully!');
    }

    // Edit test details
    public function edit(Sample $sample, Test $test)
    {
        return view('tests.edit', compact('sample', 'test'));
    }

    // Update a test
    public function update(Request $request, Sample $sample, Test $test)
    {
        $validatedData = $request->validate([
            'test_name' => 'required|string|max:255',
            'result' => 'nullable|string|max:255',
        ]);

        $test->update($validatedData);

        return redirect()->route('samples.show', $sample)->with('success', 'Test updated successfully!');
    }

    // Delete a test
    public function destroy(Sample $sample, Test $test)
    {
        $test->delete();

        return redirect()->route('samples.show', $sample)->with('success', 'Test deleted successfully!');
    }
}
