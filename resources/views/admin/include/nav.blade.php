<nav class="navbar navbar-expand">
    <div class="d-none d-md-block">
        <form class="">
            <div class="input-group input-group-navbar">
                <input type="text" class="form-control form-control-sm border-0 rounded-2 py-0 input-bg"
                    placeholder="Search Here" />
                <button class="btn btn-sm btn-secondary border-0 rounded-2 ms-2" type="submit">
                    Search
                </button>
            </div>
        </form>
    </div>
    <div class="dropdown">
        <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('assets/images/avatar.png')}}" class="user-logo" alt="profile_image" />
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item text-white d-flex align-items-center gap-1" style="font-size: 12px;"
                    href="#"><i class="fa-regular fa-user"></i> User Profile</a>
            </li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <a class="dropdown-item text-white d-flex align-items-center gap-1" style="font-size: 12px;"
                        href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fa-solid fa-arrow-up-from-bracket"></i> Logout</a>
                </form>
            </li>
        </ul>
    </div>
</nav>
