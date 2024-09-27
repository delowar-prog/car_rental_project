<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin-dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="main-wrapper">
      <!-----------------------------------------------------------Start left sidebar------------------------------------->
      @include('admin.include.sidebar')
      <!---------------------------------------------------------Start main section---------------------------------------->
      <div class="main-section">
        <!------------------------------------------------------Start nav section---------------------------------------->
        @include('admin.include.nav')
        <!-----------------------------------------------------Start main content------------------------------------------>
        <div class="main-content">
          <div class="page-title">
            <h5 class="">@yield('title')</h5>
          </div>
          @yield('content')
        </div>
        {{-- <footer class="footer-style">
              <p>Design by Delowar &copy; 2024 </p>
        </footer> --}}
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="{{asset('assets/js/script.js')}}"></script>
  </body>
</html>
