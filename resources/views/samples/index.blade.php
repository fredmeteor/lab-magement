@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Samples List</h2>
    <a href="{{ route('samples.create') }}" class="btn btn-primary mb-3">Add New Sample</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sample ID</th>
                <th>Patient Name</th>
                <th>Sample Type</th>
                <th>Collection Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($samples as $sample)
                <tr>
                    <td>{{ $sample->id }}</td>
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
</div>
@endsection
