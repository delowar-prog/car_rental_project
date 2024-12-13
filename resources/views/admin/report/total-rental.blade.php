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
            <h1>Total Car Rental Report</h1>
            <p>Generated on: {{ date('Y-m-d') }}</p>
        </div>

        <!-- Summary Section -->
        <div class="summary">
            <h3 style="font-size:14px;margin:0;padding:0">Report Summary</h3>
            <p style="font-size:12px;margin:3px 0;padding:0">Total Cars Rented: {{count($rentedCars)}}</p>
            <p style="font-size:12px;margin:3px 0;padding:0">Total Revenue: {{$rentedCars->sum('total_cost')}} Tk</p>
        </div>

        <!-- Table of Rented Cars -->
        <table>
            <thead>
                <tr>
                    <th style="text-align: center; width:5%">Sl</th>
                    <th style="text-align: center; width:15%">Car Name</th>
                    <th style="text-align: center; width:10%">Brand</th>
                    <th style="text-align: center; width:10%">Type</th>
                    <th style="text-align: center; width:10%">Daily Rent(Tk)</th>
                    <th style="text-align: center; width:10%">Start Date</th>
                    <th style="text-align: center; width:10%">End Date</th>
                    <th style="text-align: center; width:10%">Rental Days</th>
                    <th style="text-align: center; width:10%">Total Rent (Tk)</th>
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
                        <td style="text-align: center;">{{ $index + 1 }}</td>
                        <td>{{ $car->car?->name }}</td>
                        <td style="text-align: center;">{{ $car->car?->brand }}</td>
                        <td style="text-align: center;">{{ ucfirst($car->car?->car_type) }}</td>
                        <td style="text-align: right;">{{ number_format($car->car?->daily_rent_price, 2) }}</td>
                        <td style="text-align: center;">{{ $startDate->format('M d, Y') }}</td>
                        <td style="text-align: center;">{{ $endDate->format('M d, Y') }}</td>
                        <td style="text-align: center;">{{ $days }}</td>
                        <td style="text-align: right;">{{ number_format($car->total_cost, 2) }}</td>
                    </tr>
                @endforeach
                    <tr style="background-color:lightblue;">
                        <td colspan="8" style="text-align: right;font-weight:bold;">Total</td>
                        <td style="text-align: center;font-weight:bold;">{{number_format($rentedCars->sum('total_cost'))}} /-</td>
                    </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
