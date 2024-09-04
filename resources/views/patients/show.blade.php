@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patient Details</h2>
    <div class="form-group">
        <label>Patient ID:</label>
        <p>{{ $patient->patient_id }}</p>
    </div>
    <div class="form-group">
        <label>Name:</label>
        <p>{{ $patient->name }}</p>
    </div>
    <div class="form-group">
        <label>Date of Birth:</label>
        <p>{{ $patient->dob }}</p>
    </div>
    <div class="form-group">
        <label>Contact Info:</label>
        <p>{{ $patient->contact_info }}</p>
    </div>
    <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
