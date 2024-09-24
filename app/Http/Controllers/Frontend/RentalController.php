<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\BookingConfirmationMail;
use App\Models\Car;
use App\Models\UserDetail;
use DB;
use Illuminate\Http\Request;
use App\Models\Rental;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'phone' => 'required|max:11',
            'address' => 'required',
        ]);

        $carId = $validated['car_id'];
        $startDate = Carbon::parse($validated['start_date']);
        $endDate = Carbon::parse($validated['end_date']);

        // Check if the car is available in the given date range
        $existingRental = Rental::where('car_id', $carId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->exists();

        if ($existingRental) {
            // Car is not available
            return redirect()->back()->withErrors(['car_id' => 'Sorry! This car is not available for the selected dates.']);
        }
        // Calculate the total rental days
        $car = Car::findOrFail($carId);
        $rentalDays = $startDate->diffInDays($endDate) + 1; // Include the start date

        // Calculate the total price (daily_rent * rentalDays)
        $totalPrice = $car->daily_rent_price * $rentalDays;
        // Car is available, proceed with Rental
        DB::beginTransaction();

        try {
            // Create the rental record
            $rental = Rental::create([
                'user_id' => auth()->id(),
                'car_id' => $carId,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'total_cost' => $totalPrice,
            ]);

            // Create the user details record
            $userDetail = UserDetail::create([
                'user_id' => auth()->id(),
                'phone' => $validated['phone'],
                'address' => $validated['address'],
            ]);

            // Commit the transaction if both operations are successful
            DB::commit();
            // Send the booking confirmation email
            Mail::to(auth()->user()->email)->send(new BookingConfirmationMail($rental, $userDetail));
            return redirect()->back()->with('success', 'Booking confirmed! An email has been sent.');
        } catch (\Exception $e) {
            // Rollback the transaction if something fails
            DB::rollBack();

            // Optionally log the error
            \Log::error('Error storing booking: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Something went wrong. Please try again later.']);
        }
    }

    public function getBookingHistory($userId)
    {
        $today = Carbon::today();

        $previousBookings = Rental::where('user_id', $userId)
            ->where('end_date', '<', $today)
            ->orderBy('end_date', 'desc')
            ->get();

        $currentBookings = Rental::where('user_id', $userId)
            ->where('end_date', '>=', $today)
            ->orderBy('start_date', 'asc')
            ->get();

        return view('frontend.rental.rental', compact('previousBookings', 'currentBookings'));
    }
}
