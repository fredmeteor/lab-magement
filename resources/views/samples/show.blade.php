@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Sample Details</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Sample ID</th>
                            <th scope="col">Patient Name</th>
                            <th scope="col">Sample Type</th>
                            <th scope="col"Collection Date</th>
                            <th scope="col">Collected By</th>
                            <th scope="col">Status</th>
                            <th scope="col">Location</th>
                            <th scope="col">Comment</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $sample->formatted_sample_id }}</td>
                            <td>{{ $sample->patient->name }}</td>
                            <td>{{ $sample->sample_type }}</td>
                            <td>{{ $sample->collection_date }}</td>
                            <td>{{ $sample->collected_by }}</td>
                            <td>{{ $sample->status }}</td>
                            <td>{{ $sample->location }}</td>
                            <td>{{ $sample->comments }}</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <h4 class="bg bg-primary text-white">Tests Performed:</h4>
        @if ($sample->tests->count())
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
                            <td>{{ $test->result ?? 'Pending' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tests performed yet.</p>
        @endif
        <a href="{{ route('samples.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
