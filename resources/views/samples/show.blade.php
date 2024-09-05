@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Sample Details</h2>
    <div class="form-group">
        <label>Sample ID:</label>
        <p>{{ $sample->id }}</p>
    </div>
    <div class="form-group">
        <label>Patient Name:</label>
        <p>{{ $sample->patient->name }}</p>
    </div>
    <div class="form-group">
        <label>Sample Type:</label>
        <p>{{ $sample->sample_type }}</p>
    </div>
    <div class="form-group">
        <label>Collection Date:</label>
        <p>{{ $sample->collection_date }}</p>
    </div>
    <div class="form-group">
        <label>Collected By:</label>
        <p>{{ $sample->collected_by }}</p>
    </div>
    <div class="form-group">
        <label>Status:</label>
        <p>{{ $sample->status }}</p>
    </div>
    <div class="form-group">
        <label>Location:</label>
        <p>{{ $sample->location }}</p>
    </div>
    <div class="form-group">
        <label>Comments:</label>
        <p>{{ $sample->comments }}</p>
    </div>
    <a href="{{ route('samples.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
