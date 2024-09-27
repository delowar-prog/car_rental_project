<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <h1>Booking Confirmation</h1>

    <p>Dear {{ $userDetail->name }},</p>

    <p>Thank you for your booking. Below are your booking details:</p>

    <ul>
        <li><strong>Car:</strong> {{ $rental->car->name }}</li>
        <li><strong>Brand:</strong> {{ $rental->car->brand }}</li>
        <li><strong>Start Date:</strong> {{ $rental->start_date->format('Y-m-d') }}</li>
        <li><strong>End Date:</strong> {{ $rental->end_date->format('Y-m-d') }}</li>
        <li><strong>Total Cost:</strong> ${{ $rental->total_cost }}</li>
    </ul>

    <p>If you have any questions, feel free to contact us at support@example.com.</p>

    <p>Thank you!</p>
</body>
</html>
