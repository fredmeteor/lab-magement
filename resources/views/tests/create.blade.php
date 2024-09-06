<!-- resources/views/tests/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Tests for Sample: {{ $sample->formatted_sample_id }}</h2>

    <form action="{{ route('tests.store', $sample->id) }}" method="POST">
        @csrf

        <div id="test-fields">
            <div class="test-field-group">
                <h4>Test 1</h4>
                <div class="form-group">
                    <label for="test_name_1">Test Name</label>
                    <input type="text" name="tests[0][test_name]" id="test_name_1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="test_result_1">Test Result</label>
                    <input type="text" name="tests[0][result]" id="test_result_1" class="form-control">
                </div>
            </div>
        </div>

        <button type="button" id="add-test-field" class="btn btn-secondary">Add Another Test</button>

        <button type="submit" class="btn btn-primary">Save Tests</button>
    </form>
</div>

<script>
    let testIndex = 1;

    document.getElementById('add-test-field').addEventListener('click', function() {
        testIndex++;
        let testFields = `
            <div class="test-field-group">
                <h4>Test ${testIndex}</h4>
                <div class="form-group">
                    <label for="test_name_${testIndex}">Test Name</label>
                    <input type="text" name="tests[${testIndex}][test_name]" id="test_name_${testIndex}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="test_result_${testIndex}">Test Result</label>
                    <input type="text" name="tests[${testIndex}][result]" id="test_result_${testIndex}" class="form-control">
                </div>
            </div>
        `;
        document.getElementById('test-fields').insertAdjacentHTML('beforeend', testFields);
    });
</script>
@endsection
