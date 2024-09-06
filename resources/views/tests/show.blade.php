<!-- resources/views/samples/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sample: {{ $sample->formatted_sample_id }}</h2>
    
    <h3>Tests</h3>

    <a href="{{ route('tests.create', $sample->id) }}" class="btn btn-secondary">Add Tests</a>

    @if ($sample->tests->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Test Name</th>
                    <th>Result</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sample->tests as $test)
                    <tr>
                        <td>{{ $test->test_name }}</td>
                        <td>{{ $test->result }}</td>
                        <td>
                            <a href="{{ route('tests.edit', [$sample->id, $test->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tests.destroy', [$sample->id, $test->id]) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tests available for this sample.</p>
    @endif
</div>
@endsection
