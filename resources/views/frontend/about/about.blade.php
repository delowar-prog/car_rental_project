@extends('frontend.layout.layout')
@section('title', 'About')
@section('content')
    <section class="about-section text-center">
        <div class="container">
            <h1 class="my-5">About Us</h1>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <p class="lead">We are a forward-thinking company committed to delivering top-notch services to our
                        clients. With years of experience, we thrive on innovation and excellence, bringing the best
                        possible solutions to your business.</p>
                </div>
                <div class="col-lg-6 mx-auto mt-4">
                    <img src="{{$car->image}}" alt="Company Image" width="500">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision text-center my-5">
        <div class="container">
            <h2>Our Mission & Vision</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <h4>Mission</h4>
                    <p>To provide high-quality services that combine performance with value while establishing successful
                        relationships with our customers and our suppliers.</p>
                </div>
                <div class="col-md-6">
                    <h4>Vision</h4>
                    <p>To become a global leader by continuously improving and innovating our services, ensuring our
                        clients' satisfaction and success.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team text-center my-5">
        <div class="container">
            <h2>Meet Our Team</h2>
            <div class="row mt-4">
                <div class="col-md-4 team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member 1" class="img-fluid mb-3">
                    <h5>John Doe</h5>
                    <p>CEO & Founder</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member 2" class="img-fluid mb-3">
                    <h5>Jane Smith</h5>
                    <p>Chief Marketing Officer</p>
                </div>
                <div class="col-md-4 team-member">
                    <img src="https://via.placeholder.com/150" alt="Team Member 3" class="img-fluid mb-3">
                    <h5>Michael Lee</h5>
                    <p>Chief Technology Officer</p>
                </div>
            </div>
        </div>
    </section>

@endsection

