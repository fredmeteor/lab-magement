<!-- resources/views/pdf/all-samples.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>All Samples Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3, .section h4 {
            margin-bottom: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>All Patients, Samples, and Tests Report</h1>
    </div>

    @foreach ($patients as $patient)
    <div class="section">
        <h3>Patient: {{ $patient->name }} (ID: {{ $patient->id }})</h3>

        @foreach ($patient->samples as $sample)
        <div class="sample-details">
            <h4>Sample ID: {{ $sample->formatted_sample_id }}</h4>
            <p><strong>Date Collected:</strong> {{ $sample->created_at->format('d-m-Y') }}</p>

            <h5>Tests Performed:</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Test Name</th>
                        <th>Result</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sample->tests as $test)
                    <tr>
                        <td>{{ $test->test_name }}</td>
                        <td>{{ $test->result }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
    <hr>
    @endforeach
</body>
</html>
