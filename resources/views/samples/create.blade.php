@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Sample</h2>
        <!-- Display the Custom Sample ID after saving -->
        @if (session('custom_sample_id'))
            <div class="alert alert-success">
                <strong>Sample ID: {{ session('custom_sample_id') }}</strong>
            </div>
        @endif


        <!-- Display success or error messages -->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form action="{{ route('samples.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select name="patient_id" class="form-control" required>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sample_type">Sample Type</label>
                <input type="text" name="sample_type" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="collection_date">Collection Date</label>
                <input type="date" name="collection_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="collected_by">Collected By</label>
                <input type="text" name="collected_by" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="Pending">Pending</option>
                    <option value="Processing">Processing</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control">
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea name="comments" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
