<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Car</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            background-color: rgb(199, 248, 124);
            margin-bottom:10px;
            padding: 5px;
        }

        .header h1 {
            font-size: 16px;
            margin: 0;
            color: #333;
        }

        .header p {
            font-size: 13px;
            margin: 5px 0;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 7px;
            text-align: left;
            font-size: 10px;
        }

        th {
            background-color:lightblue;
            color: #555;
        }

        .summary {
            border-radius: 5px;
            border:1px solid #ddd;
            background: #fcfcfc;
            padding: 5px;
            width: 200px;
        }

        .summary h3 {
            margin: 0 0 10px 0;
        }
    </style>
</head>

<body>
    <div class="report-container">
        <div class="header" style="position: relative">
            <h1 style="font-size:20px; margin-bottom:10px;">Rafi Rent a Car</h1>
            <h1>Total Car Report</h1>
            <p>Generated on: {{ date('Y-m-d') }}</p>
        </div>

        <!-- Summary Section -->
        <div class="summary">
            <h3 style="font-size:14px;margin:0;padding:0">Report Summary</h3>
            <p style="font-size:12px;margin:3px 0;padding:0">Total Cars: {{count($cars)}}</p>
        </div>

        <!-- Table of Rented Cars -->
        <table>
            <thead>
                <tr>
                    <th style="text-align: center; width:5%">Sl</th>
                    <th style="text-align: center; width:15%">Car Name</th>
                    <th style="text-align: center; width:10%">Brand</th>
                    <th style="text-align: center; width:10%">Type</th>
                    <th style="text-align: center; width:10%">Daily Rent</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($cars as $index => $car)
                    <tr>
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td>{{ $car->name }}</td>
                        <td style="text-align: center;">{{ $car->brand }}</td>
                        <td style="text-align: center;">{{ ucfirst($car->car_type) }}</td>
                        <td style="text-align: right;">{{ number_format($car->daily_rent_price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
