@extends('frontend.layout.layout')

    <style>
        .contact-section {
            padding: 60px 0;
            color: #f8f9fa;
        }
        .contact-form h2,
        .contact-info h2 {
            margin-bottom: 30px;
            color: #f8f9fa;
        }

        .contact-info p {
            margin-bottom: 15px;
            font-size: 1.1rem;
            color: #f8f9fa;
        }
        .contact-info i {
            font-size: 1.5rem;
            margin-right: 10px;
            color: #007bff;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-primary {
            border-radius: 0;
            padding: 10px 20px;
        }
    </style>

@section('content')
<section class="contact-section">
    <div class="container">
      <div class="row">

        <!-- Contact Form -->
        <div class="col-md-6">
          <h2>Contact Us</h2>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Your Name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Your Email">
            </div>
            <div class="mb-3">
              <label for="subject" class="form-label">Subject</label>
              <input type="text" class="form-control" id="subject" placeholder="Subject">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" rows="5" placeholder="Your Message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
          </form>
        </div>

        <!-- Contact Information -->
        <div class="col-md-6">
          <h2>Get In Touch</h2>
          <div class="contact-info">
            <p><i class="bi bi-geo-alt"></i> Motijheel, Dhaka, Bangladesh</p>
            <p><i class="bi bi-telephone"></i> +01738118208</p>
            <p><i class="bi bi-envelope"></i> info@company.com</p>
            <p><i class="bi bi-globe"></i> www.companywebsite.com</p>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.914835850757!2d-122.41941548468168!3d37.77492967975969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8085808c2ef8f829%3A0xb5e7c0b2852f7a9f!2sGoogleplex!5e0!3m2!1sen!2s!4v1615730977873!5m2!1sen!2s"
              width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
