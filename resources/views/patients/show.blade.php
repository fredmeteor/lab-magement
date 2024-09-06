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

        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
