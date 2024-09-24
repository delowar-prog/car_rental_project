@extends('frontend.layout.layout')
@section('content')
    <h2 class="my-5 text-white">Booking History</h2>

    <!-- Current and Future Bookings -->
    <div class="mb-5">
        <h4 class="text-white">Current & Future Bookings</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Booking ID</th>
                        <th>Car Photo</th>
                        <th>Brand</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Daily Rent</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($currentBookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->id }}</td>
                        <td><img src="{{ $booking->car?->image }}" width="100"></td>
                        <td>{{ $booking->car?->brand }}</td>
                        <td>{{ $booking->start_date}}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>{{ $booking->car?->daily_rent_price }}</td>
                        <td>{{ $booking->total_cost }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-white">No current bookings found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Previous Bookings -->
    <div class="mb-5">
        <h4 class="text-white">Previous Bookings</h4>
        <div class="table-responsive">
            <table class="table table-bordered text-white">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Booking ID</th>
                        <th>Car Photo</th>
                        <th>Brand</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Daily Rent</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($previousBookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->id }}</td>
                        <td><img src="{{ $booking->car->image }}" width="70"></td>
                        <td>{{ $booking->car->brand }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                        <td>${{ $booking->daily_rent }}</td>
                        <td>${{ $booking->total_price }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-white">No previous bookings found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

