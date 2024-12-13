<div>
    <div class="filter-section" style="background-color:#ddd; height:150px; padding:20px;">
        <div class="container">
            <h5 style="color:blue">Choose your Favorite Car</h5>
            @row
                <!-- Car Type Filter -->
                <div class="form-group">
                    <select wire:model.live="car_type" name="car_type" id="car_type" class="form-select">
                        <option value="">Car Types</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                        <option value="electric">Electric</option>
                        <option value="hybrid">Hybrid</option>
                    </select>
                </div>

                <!-- Car Brand Filter -->
                <div class="form-group">
                    <select wire:model.live="car_brand" name="car_brand" id="car_brand" class="form-select">
                        <option value="">Car Brands</option>
                        <option value="toyota">Toyota</option>
                        <option value="honda">Honda</option>
                        <option value="ford">Ford</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="bmw">BMW</option>
                        <option value="nissan">Nissan</option>
                        <option value="chevrolet">Chevrolet</option>
                    </select>
                </div>

                <!-- Daily Rent Price Filter -->
                <div class="form-group">
                    <select wire:model.live="daily_rent_price" name="daily_rent_price" id="daily_rent_price"
                        class="form-select">
                        <option value="">Select Daily Price</option>
                        <option value="500">500</option>
                        <option value="2000">2000</option>
                        <option value="5000">5000</option>
                        <option value="10000">10000</option>
                    </select>
                </div>
            @endrow
        </div>
    </div>
    <div class="container mt-4">
        <div class="row row-cols-2 row-cols-lg-3 g-5 mb-3">
            <input type="hidden" id="is_authenticated" value="{{ Auth::check() ? 'true' : 'false' }}">
            @foreach ($cars as $car)
                <div class="col">
                    <div class="card" style="height: 480px; border-radius:10px; box-shadow:2px 2px 5px #888">
                        <img src="{{ $car->image }}" class="img-fluid" style="max-height:250px; " alt="...">
                        <div class="card-body" style="position: relative;">
                            <h5 class="card-title">{{ $car->name }}</h5>
                            <p class="m-0">Brand: {{ $car->brand }}</p>
                            <p class="m-0">Model: {{ $car->model }}</p>
                            <p class="mb-2">Type: {{ $car->car_type }}</p>
                            <div style="position: absolute; bottom:20px;">
                                <div>
                                    <span style="font-size: 16px; font-weight:bold;color:#55cc88; margin-right:20px;">
                                        Daily Rent : {{ round($car->daily_rent_price) }} Tk.
                                    </span>

                                    <a href="#" class="btn btn-primary btn-sm" style="border-radius:10px;"
                                        data-bs-toggle="modal" data-bs-target="#carBooking"
                                        data-car-name="{{ $car->name }}" data-car-id="{{ $car->id }}"
                                        data-car-brand="{{ $car->brand }}" data-car-image="{{ $car->image }}"
                                        data-car-rent="{{ $car->daily_rent_price }}">
                                        Make A Booking
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $cars->links() !!}
    </div>


    <!--Modal-->
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="carBooking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #ddd">
                    <h5 class="modal-title" id="exampleModalLabel">Make a Car Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <!-- Hidden field to store car ID -->
                        <input type="hidden" name="car_id" id="car_id">
                        <div class="row row-cols-1 g-5 mb-5">
                            <!-- Car Image -->
                            <div class="form-group text-center">
                                <img src="" id="car_image" class="img-fluid" alt="Car Image"
                                    style="max-height: 300px;">
                            </div>

                            <!-- Car Name (readonly) -->
                            <div class="form-group mt-3" style="font-size: 15px; font-weight:bold;">
                                <label for="car_name">Car Name</label>
                                <input type="text" style="font-size: 15px; font-weight:bold" id="car_name"
                                    class="form-control" readonly>
                            </div>
                        </div>
                        <div class="row row-cols-lg-2 g-5">
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
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                    required>
                            </div>

                            <!-- End Date -->
                            <div class="form-group mt-3">
                                <label for="end_date">End Date</label><span class="text-danger">*</span>
                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                            </div>

                            <x-form.text-input name="phone" type="text" labelClass="required" label="Phone" />
                            <x-form.text-input name="address" type="text" labelClass="required"
                                label="Address" />

                            <!-- Submit Button -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-sm"
                                    style="border-radius:5px;">Submit
                                    Booking</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
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
            var bootstrapModal = new bootstrap.Modal(carBookingModal);

            document.querySelectorAll('[data-bs-target="#carBooking"]').forEach(button => {
                button.addEventListener('click', function(event) {
                    var isAuthenticated = document.getElementById('is_authenticated').value;

                    if (isAuthenticated === 'true') {
                        // Extract car data from data-bs-* attributes
                        var carName = button.getAttribute('data-car-name');
                        var carId = button.getAttribute('data-car-id');
                        var carBrand = button.getAttribute('data-car-brand');
                        var carImage = button.getAttribute('data-car-image');
                        var carRent = button.getAttribute('data-car-rent');

                        // Update modal fields with the car data
                        carBookingModal.querySelector('.modal-title').textContent = 'Book ' +
                            carName;
                        carBookingModal.querySelector('#car_name').value = carName;
                        carBookingModal.querySelector('#car_id').value = carId;
                        carBookingModal.querySelector('#car_brand').value = carBrand;
                        carBookingModal.querySelector('#car_rent').value = carRent;
                        carBookingModal.querySelector('#car_image').src = carImage;

                        bootstrapModal.show();
                    } else {
                        window.location.href = "{{ route('login') }}";
                    }
                });
            });

            // Properly dispose of the modal to avoid overlay issues
            carBookingModal.addEventListener('hidden.bs.modal', function() {
                bootstrapModal.dispose(); // Ensure modal instance is destroyed
                document.body.classList.remove('modal-open'); // Remove leftover class
                document.querySelector('.modal-backdrop')?.remove(); // Remove backdrop if it exists
            });
        });
    </script>
</div>
