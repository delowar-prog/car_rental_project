<div class="filter-section" style="background-color:#ddd; height:150px; padding:20px;">
    <form action="" method="GET" class="d-flex flex-column gap-3">
        <h5>Choose your Favorite Car</h5>
        @row
          <!-- Car Type Filter -->
            <div class="form-group">
                <select name="car_type" id="car_type" class="form-select">
                    <option value="">Car Types</option>
                    <option value="sedan">Sedan</option>
                    <option value="suv">SUV</option>
                    <option value="hatchback">Hatchback</option>
                    <option value="truck">Truck</option>
                </select>
            </div>

            <!-- Car Brand Filter -->
            <div class="form-group">
                <select name="car_brand" id="car_brand" class="form-select">
                    <option value="">Car Brands</option>
                    <option value="toyota">Toyota</option>
                    <option value="honda">Honda</option>
                    <option value="ford">Ford</option>
                    <option value="bmw">BMW</option>
                </select>
            </div>

            <!-- Daily Rent Price Filter -->
            <div class="form-group">
                <select name="daily_rent_price" id="daily_rent_price" class="form-select">
                    <option value="">Select Daily Price</option>
                    <option value="3000">3000</option>
                    <option value="5000">5000</option>
                    <option value="10000">10000</option>
                    <option value="20000">20000</option>
                </select>

            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        @endrow
    </form>
</div>
