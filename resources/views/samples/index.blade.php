@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Samples List</h2>
    <a href="{{ route('samples.create') }}" class="btn btn-primary mb-3">Add New Sample</a>
     <!-- Search Form -->
     <form action="{{ route('samples.index') }}" method="GET" class="mb-3">
        <div class="form-group">
            <input type="text" name="sample_id" class="form-control" placeholder="Search by Sample ID" value="{{ request()->sample_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="{{ route('samples.index') }}" class="btn btn-secondary">Clear</a>
    </form>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($samples->count())
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col">Sample ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Sample Type</th>
                <th scope="col">Collection Date</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($samples as $sample)
                <tr>
                    <td>{{ $sample->formatted_sample_id }}</td>
                    <td>{{ $sample->patient->name }}</td>
                    <td>{{ $sample->sample_type }}</td>
                    <td>{{ $sample->collection_date }}</td>
                    <td>{{ $sample->status }}</td>
                    <td>
                        <a href="{{ route('samples.show', $sample->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('samples.edit', $sample->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('samples.destroy', $sample->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>No samples found.</p>
@endif
</div>
@endsection
