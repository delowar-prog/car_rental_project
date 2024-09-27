@extends('frontend.layout.layout')
@section('title', 'Rental History')
@section('content')
    <div class="container">
        <h3 class="my-5 bg-success py-1 text-white text-center">Booking History</h3>

        <!-- Current and Future Bookings -->
        <div class="mb-5">
            <h5>Current & Future Bookings</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color:#ddd">
                            <th>#</th>
                            <th>Booking ID</th>
                            <th>Car Photo</th>
                            <th>Brand</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Daily Rent</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($currentBookings as $index => $booking)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $booking->id }}</td>
                                <td><img src="{{ $booking->car?->image }}" width="100"></td>
                                <td>{{ $booking->car?->brand }}</td>
                                <td>{{ $booking->start_date }}</td>
                                <td>{{ $booking->end_date }}</td>
                                <td>{{ $booking->car?->daily_rent_price }}</td>
                                <td>{{ $booking->total_cost }}</td>
                                <td>
                                    @if ($booking->status == 'Ongoing')
                                        <span class="badge bg-success">Ongoing</span>
                                    @else
                                        <span class="badge bg-primary">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($booking->start_date > \Carbon\Carbon::today())
                                        <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled>Cancel</button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No current bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <p> <span style="color:red">* The booking can be cancel when Start Date is after Today</span></p>
            </div>
        </div>

        <!-- Previous Bookings -->
        <div class="mb-5">
            <h5>Previous Bookings</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr style="background-color:#ddd">
                            <th>#</th>
                            <th>Booking ID</th>
                            <th>Car Photo</th>
                            <th>Brand</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Daily Rent</th>
                            <th>Total Price</th>
                            <th>Status</th>
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
                                <td>${{ $booking->car?->daily_rent_price }}</td>
                                <td>${{ $booking->total_cost }}</td>
                                <td>
                                    @if ($booking->status == 'Ongoing')
                                        <span class="badge bg-success">Ongoing</span>
                                    @else
                                        <span class="badge bg-primary">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No previous bookings found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Cancelled Bookings -->
            <div class="mt-5">
                <h5>Cancelled Bookings</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color:#ddd">
                                <th>#</th>
                                <th>Booking ID</th>
                                <th>Car Photo</th>
                                <th>Brand</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Daily Rent</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($canceledBookings as $index => $booking)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $booking->id }}</td>
                                    <td><img src="{{ $booking->car->image }}" width="70"></td>
                                    <td>{{ $booking->car->brand }}</td>
                                    <td>{{ $booking->start_date }}</td>
                                    <td>{{ $booking->end_date }}</td>
                                    <td>${{ $booking->car?->daily_rent_price }}</td>
                                    <td>${{ $booking->total_cost }}</td>
                                    <td><span class="badge bg-danger">Cancelled</span></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No previous bookings found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    @endsection
