@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Patients List</h2>
    <a href="{{ route('patients.create') }}" class="btn btn-primary mb-3">Add New Patient</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
                <tr>
                    <td>{{ $patient->patient_id }}</td>
                    <td>{{ $patient->name }}</td>
                   
                    <td>
                        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline;">
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
