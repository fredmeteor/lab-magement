@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Patient</h2>
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="patient_id">Patient ID</label>
            <input type="text" name="patient_id" class="form-control" value="{{ $patient->patient_id }}" required>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
        </div>
       
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
