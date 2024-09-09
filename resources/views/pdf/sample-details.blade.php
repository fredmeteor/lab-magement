<!-- resources/views/pdf/sample-details.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Sample Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h3 {
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
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
        <h1>Laboratory Sample Report</h1>
    </div>

    <div class="section">
        <h3>Patient Information</h3>
        <p><strong>Name:</strong> {{ $sample->patient->name }}</p>
        <p><strong>Patient ID:</strong> {{ $sample->patient->id }}</p>
    </div>

    <div class="section">
        <h3>Sample Information</h3>
        <p><strong>Sample ID:</strong> {{ $sample->formatted_sample_id }}</p>
        <p><strong>Date Collected:</strong> {{ $sample->created_at->format('d-m-Y') }}</p>
    </div>

    <div class="section">
        <h3>Tests Performed</h3>
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
</body>
</html>
