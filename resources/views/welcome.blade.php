@extends('frontend.layout.layout')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row row-cols-2 row-cols-lg-3 g-3 mb-3">
            @foreach ($cars as $car)
                <div class="col">
                    <div class="card" style="height: 480px; border-radius:10px; box-shadow:2px 2px 5px #888">
                        <img src="{{ $car->image }}" class="img-fluid" style="max-height:250px; " alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            <p class="m-0">Brand: {{ $car->brand }}</p>
                            <p class="m-0">Model: {{ $car->model }}</p>
                            <p class="mb-2">Type: {{ $car->car_type }}</p>
                            <div class="d-flex justify-content-between">
                                <span class="badge bg-success" style="font-size: 14px;">
                                    Daily Rent : {{ round($car->daily_rent_price) }} Tk.
                                </span>
                                @if (Auth::check() && Auth::user()->role == 'customer')
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#carBooking" data-car-name="{{ $car->name }}"
                                        data-car-id="{{ $car->id }}" data-car-brand="{{ $car->brand }}"
                                        data-car-image="{{ $car->image }}" data-car-rent="{{ $car->daily_rent_price }}">
                                        Make A Booking
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $cars->links() !!}
    </div>
@endsection

<!--Modal-->
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="carBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Make a Car Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <!-- Hidden field to store car ID -->
                    <input type="hidden" name="car_id" id="car_id">

                    <!-- Car Image -->
                    <div class="form-group text-center">
                        <img src="" id="car_image" class="img-fluid" alt="Car Image" style="max-height: 150px;">
                    </div>

                    <!-- Car Name (readonly) -->
                    <div class="form-group mt-3">
                        <label for="car_name">Car Name</label>
                        <input type="text" id="car_name" class="form-control" readonly>
                    </div>

                    <!-- Car Brand (readonly) -->
                    <div class="form-group mt-3">
                        <label for="car_brand">Car Brand</label>
                        <input type="text" id="car_brand" class="form-control" readonly>
                    </div>

                    <div class="form-group mt-3">
                        <label for="car_rent">Daily Rent</label>
                        <input type="text" id="car_rent" class="form-control" readonly>
                    </div>

                    <!-- Start Date -->
                    <div class="form-group mt-3">
                        <label for="start_date">Start Date</label><span class="text-danger">*</span>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>

                    <!-- End Date -->
                    <div class="form-group mt-3">
                        <label for="end_date">End Date</label><span class="text-danger">*</span>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>

                    <x-form.text-input name="phone" type="text" labelClass="required" label="Phone" />
                    <x-form.text-input name="address" type="text" labelClass="required" label="Address" />

                    <!-- Submit Button -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Submit Booking</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var carBookingModal = document.getElementById('carBooking');

        carBookingModal.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            var button = event.relatedTarget;

            // Extract car data from data-bs-* attributes
            var carName = button.getAttribute('data-car-name');
            var carId = button.getAttribute('data-car-id');
            var carBrand = button.getAttribute('data-car-brand');
            var carImage = button.getAttribute('data-car-image');
            var carRent = button.getAttribute('data-car-rent');

            // Update modal fields with the car data
            var modalTitle = carBookingModal.querySelector('.modal-title');
            var carNameInput = carBookingModal.querySelector('#car_name');
            var carIdInput = carBookingModal.querySelector('#car_id');
            var carBrandInput = carBookingModal.querySelector('#car_brand');
            var carImageElement = carBookingModal.querySelector('#car_image');
            var carRentElement = carBookingModal.querySelector('#car_rent');

            modalTitle.textContent = 'Book ' + carName;
            carNameInput.value = carName;
            carIdInput.value = carId;
            carBrandInput.value = carBrand;
            carRentElement.value = carRent;
            carImageElement.src = carImage;
        });
    });
</script>

