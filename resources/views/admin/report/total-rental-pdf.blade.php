<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .report-container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            color: #333;
        }

        .header p {
            margin: 5px 0;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .summary {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .summary h3 {
            margin: 0 0 10px 0;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="report-container">
        <div class="header" style="position: relative">
            <h1>Total Car Rental Report</h1>
            <p>Generated on: {{ date('Y-m-d') }}</p>
        </div>

        <!-- Summary Section -->
        <div class="summary">
            <h3>Report Summary</h3>
            <p>Total Cars Rented: </p>
            <p>Total Revenue: Tk</p>
        </div>

        <!-- Table of Rented Cars -->
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Car Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Daily Rent (Tk)</th>
                    <th>Rental Duration (Days)</th>
                    <th>Total Rent (Tk)</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($rentedCars as $index => $car)
                    @php
                        $startDate = Carbon\Carbon::parse($car->start_date);
                        $endDate = Carbon\Carbon::parse($car->end_date);
                        $days = $startDate->diffInDays($endDate)+1;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $car->car?->name }}</td>
                        <td>{{ $car->car?->brand }}</td>
                        <td>{{ ucfirst($car->car?->car_type) }}</td>
                        <td>{{ number_format($car->car?->daily_rent_price, 2) }}</td>
                        <td>{{ $days }}</td>
                        <td>{{ number_format($car->total_cost, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Car Rental Management. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
