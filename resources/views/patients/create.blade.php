@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Patient</h2>
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        {{-- <div class="form-group">
            <label for="patient_id">Patient ID</label>
            <input type="text" name="patient_id" class="form-control" required>
        </div> --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
       
        
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
