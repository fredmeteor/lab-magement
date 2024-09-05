@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Sample</h2>
        <form action="{{ route('samples.update', $sample->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select name="patient_id" class="form-control" required>
                    @foreach ($patients as $patient)
                        <option value="{{ $patient->id }}" {{ $patient->id == $sample->patient_id ? 'selected' : '' }}>
                            {{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sample_type">Sample Type</label>
                <input type="text" name="sample_type" class="form-control" value="{{ $sample->sample_type }}" required>
            </div>
            <div class="form-group">
                <label for="collection_date">Collection Date</label>
                <input type="date" name="collection_date" class="form-control" value="{{ $sample->collection_date }}"
                    required>
            </div>
            <div class="form-group">
                <label for="collected_by">Collected By</label>
                <input type="text" name="collected_by" class="form-control" value="{{ $sample->collected_by }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="Pending" {{ $sample->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Processing" {{ $sample->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Completed" {{ $sample->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" value="{{ $sample->location }}">
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea name="comments" class="form-control">{{ $sample->comments }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
