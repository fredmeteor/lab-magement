<!-- resources/views/samples/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Samples and Tests</h2>

    @foreach ($patients as $patient)
    <div class="section">
        <h3>Patient: {{ $patient->name }} (ID: {{ $patient->id }})</h3>

        @foreach ($patient->samples as $sample)
        <div class="sample-details">
            <h4>Sample ID: {{ $sample->formatted_sample_id }}</h4>
            <p><strong>Date Collected:</strong> {{ $sample->created_at->format('d-m-Y') }}</p>

            <h5>Tests Performed:</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sample->tests as $test)
                    <tr>
                        <td>{{ $test->test_name }}</td>
                        <td>{{ $test->result }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
    <hr>
    @endforeach

    <!-- Button to download the entire list as PDF -->
    <a href="{{ route('samples.allPdf') }}" class="btn btn-primary">Download PDF of All</a>
</div>
@endsection
