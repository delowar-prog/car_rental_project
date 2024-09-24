<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>home</title>
</head>

<body>
    @include('frontend.layout.include.navbar')
    @if (Request::is('/'))
        @include('frontend.layout.include.filter')
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" style="font-weight: bold">
            {{ session('success') }}
        </div>
    @endif
    <div class="container-fluid bg-dark pb-5" style="min-height: 80vh">
        @yield('content')
    </div>
    <footer style="height:80px; background-color:#111">
        <h5 class="text-center pt-4 text-white">Developed by &copy;Delowar Hossain</h5>
    </footer>
</body>

</html>
