<div class="container-fluid nav-bar">
    <div class="container d-flex justify-content-between align-items-center">
        <div class="left d-flex justify-content-between gap-3">
             <a class="navbar-brand text-light" href="#"><img src="{{asset('assets/images/logo.png')}}" width="200"></a>
        </div>
        <ul class="nav-menu d-flex justify-content-between">
            <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{route('about')}}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{route('contact')}}">Contact</a>
            </li>
            @auth
            <li><a class="nav-link text-light" href="{{ route('frontend.rental', auth()->user()->id) }}">
                Rental
             </a></li>
            @endauth

        </ul>


    </div>
</div>
