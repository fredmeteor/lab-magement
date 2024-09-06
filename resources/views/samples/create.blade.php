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
    <form action="{{ route('samples.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label for="patient_id" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Patient:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <select name="patient_id" class="form-control" required>
                            @foreach ($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label for="sample_type" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Sample Type:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="text" name="sample_type" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label for="collection_date" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Collection Date:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="date" name="collection_date" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label for="collected_by" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Collected By:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="text" name="collected_by" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col">
                <div class="mb-3 row">
                    <label for="status" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Status:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <select name="status" class="form-control">
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="mb-3 row">
                    <label for="location" class="col-lg-2 col-md-6 col-sm-12 col-form-label">Location:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input type="text" name="location" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    
        <div class="mb-3 row">
            <label for="comments" class="col-lg-2 col-form-label">Comments</label>
            <div class="col-lg-10">
                <textarea name="comments" class="form-control" rows="3"></textarea>
            </div>
        </div>
    
        <div class="mb-3">
            <label class="form-label">Tests:</label>
            <div id="tests-wrapper">
                <div class="mb-3 row">
                    <div class="col-lg-4">
                        <label for="test_name">Test Name:</label>
                        <input type="text" class="form-control" name="tests[0][test_name]" required>
                    </div>
    
                    <div class="col-lg-4">
                        <label for="test_date">Test Date:</label>
                        <input type="date" class="form-control" name="tests[0][test_date]" required>
                    </div>
    
                    <div class="col-lg-4">
                        <label for="result">Test Result:</label>
                        <input type="text" class="form-control" name="tests[0][result]" required>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" onclick="addTest()">Add Another Test</button>
        </div>
    
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    
    <script>
        function addTest() {
            const testsWrapper = document.getElementById('tests-wrapper');
            const index = testsWrapper.children.length;
        
            const testItem = document.createElement('div');
            testItem.classList.add('mb-3', 'row');
            testItem.innerHTML = `
                <div class="col-lg-4">
                    <label for="test_name">Test Name:</label>
                    <input type="text" class="form-control" name="tests[${index}][test_name]" required>
                </div>
    
                <div class="col-lg-4">
                    <label for="test_date">Test Date:</label>
                    <input type="date" class="form-control" name="tests[${index}][test_date]" required>
                </div>
    
                <div class="col-lg-4">
                    <label for="result">Test Result:</label>
                    <input type="text" class="form-control" name="tests[${index}][result]" required>
                </div>
            `;
        
            testsWrapper.appendChild(testItem);
        }
    </script>
    

        
    </div>
@endsection
