<div id="left-sidebar">
    <div class="d-flex align-items-center my-3">
      <button id="toggle-button">
        <i class="fa-solid fa-bars"></i>
      </button>
      <a href="" class="brand">Admin Dashboard</a>
    </div>
    <ul class="side-navbar my-3">
      <li class="navbar-item">
        <a href="{{url('/')}}" class="navbar-link">
          <i class="fa-solid fa-house"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="navbar-item">
        <a href="{{route('customer.index')}}" class="navbar-link">
          <i class="fa-regular fa-user"></i>
          <span>Manage Customer</span>
        </a>
      </li>
      <li class="navbar-item">
        <a href="{{route('car.index')}}" class="navbar-link">
          <i class="fa-solid fa-truck"></i>
          <span>Manage Cars</span>
        </a>
      </li>
      <li class="navbar-item">
        <a href="{{route('rental.index')}}" class="navbar-link">
          <i class="fa-solid fa-screwdriver-wrench"></i>
          <span>Manage Rentals</span>
        </a>
      </li>
    </ul>
    <div class="sidebar-footer">
      <a href="">
        <i class="fa-solid fa-arrow-up-from-bracket"></i>
        <span>Logout</span>
      </a>
    </div>
  </div>
