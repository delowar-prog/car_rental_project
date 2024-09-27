<div class="container-fluid top-bar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="left d-flex justify-content-between gap-3">
            <span class=""><i class="fa-solid fa-envelope me-1"
                    style="font-size: 14px;"></i>delowarmilton@gmail.com</span>
            <span><i class="fa-solid fa-phone-volume me-1" style="font-size: 14px;"></i>+8801738118208</span>
        </div>
        @if (Route::has('login'))
            @auth
                <div class="right d-flex justify-content-between gap-3">
                    @if(Auth::user()->role == 'admin')
                    <span><a
                        href="{{ route('admin.dashboard') }}" style="text-decoration:none; color:#fff;">
                        Dashboard
                    </a></span>
                    @endif
                    <span class="">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <i class="fa-solid fa-arrow-up-from-bracket me-1" style="font-size: 14px;"></i><a
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                style="text-decoration:none; color:#fff;">
                                Logout
                            </a>
                        </form>
                    </span>

                    <span style="font-weight:bold;">{{ auth()->user()->name }}</span>

                </div>
            @else
                <div class="right d-flex justify-content-between gap-3">
                    <span class=""><i class="fa-solid fa-user me-1" style="font-size: 14px;"></i><a
                            href="{{ route('login') }}" style="text-decoration:none; color:#fff;">
                            Login
                        </a></span>
                    @if (Route::has('register'))
                        <span><i class="fa-solid fa-user-lock me-1" style="font-size: 14px;"></i><a
                                href="{{ route('register') }}" style="text-decoration:none; color:#fff;">
                                Sign Up
                            </a></span>
                    @endif
                </div>

            @endauth
        @endif


    </div>
</div>
