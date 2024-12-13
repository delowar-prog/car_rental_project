<div id="left-sidebar">
    <div class="d-flex align-items-center my-3">
        <button id="toggle-button">
            <i class="fa-solid fa-bars"></i>
        </button>
        <a href="{{ route('admin.dashboard') }}" class="brand">Admin Dashboard</a>
    </div>
    <ul class="side-navbar my-3">
        <li class="navbar-item">
            <a href="{{ url('/') }}" class="navbar-link">
                <i class="fa-solid fa-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="navbar-item">
            <a href="{{ route('customer.index') }}" class="navbar-link">
                <i class="fa-regular fa-user"></i>
                <span>Manage Customer</span>
            </a>
        </li>
        <li class="navbar-item">
            <a href="{{ route('car.index') }}" class="navbar-link">
                <i class="fa-solid fa-truck"></i>
                <span>Manage Cars</span>
            </a>
        </li>
        <li class="navbar-item">
            <a href="{{ route('rental.index') }}" class="navbar-link">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <span>Manage Rentals</span>
            </a>
        </li>
        <li class="navbar-item">
            <a href="#" class="navbar-link has-dropdown collapsed" data-bs-toggle="collapse"
                data-bs-target="#item1" aria-expanded="false" aria-controls="item1">
                <i class="fa-solid fa-tree"></i>
                <span>Report</span>
            </a>
            <ul id="item1" class="navbar-dropdown text-white collapse" data-bs-parent="#left-sidebar">
                <li class="dropdown-item">
                    <a href="{{ route('report.total-car') }}" class="dropdown-link" target="_blank">
                        <i class="fa-regular fa-circle"></i>
                        <span>Total Car</span>
                    </a>
                </li>
                <li class="dropdown-item">
                    <a href="{{ route('report.total-rental') }}" class="dropdown-link" target="_blank">
                        <i class="fa-regular fa-circle"></i>
                        <span>Total Rental</span>
                    </a>
                </li>
                <li class="dropdown-item">
                    <a href="{{ route('report.monthly-rental') }}" class="dropdown-link" target="_blank">
                        <i class="fa-regular fa-circle"></i>
                        <span>Monthly Rental</span>
                    </a>
                </li>

            </ul>
        </li>
        <li class="navbar-item">
            <a href="{{ route('rental.index') }}" class="navbar-link">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</div>
