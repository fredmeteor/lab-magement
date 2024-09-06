<!-- Show Sample Details -->
<h3>Sample: {{ $sample->sample_type }}</h3>
<p>Collected on: {{ $sample->collection_date }}</p>
<p>Collected by: {{ $sample->collected_by }}</p>

<!-- Show Associated Tests -->
<h4>Tests</h4>
<table class="table">
    <thead>
        <tr>
            <th>Test Name</th>
            <th>Test Date</th>
            <th>Status</th>
            <th>Results</th>
            <th>Technician</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sample->tests as $test)
        <tr>
            <td>{{ $test->test_name }}</td>
            <td>{{ $test->test_date }}</td>
            <td>{{ $test->status }}</td>
            <td>{{ $test->results }}</td>
            <td>{{ $test->technician->name ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
