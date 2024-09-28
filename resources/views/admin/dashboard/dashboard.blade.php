@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="container mt-4">
        <div class="card-container">
            <div class="col p-3" style="background-color:rgba(87, 142, 193, 0.908);">
                <h4 class="text-center">Total Cars</h4>
                <h1 class="text-center" style="font-size: 50px; color:blueviolet">{{ $total_cars }}</h1>
            </div>
            <div class="col p-3" style="background-color:rgb(127, 255, 185);">
                <h4 class="text-center">Available Cars</h4>
                <h1 class="text-center" style="font-size: 50px; color:rgb(255, 140, 127)">{{ $available_cars }}</h1>
            </div>
            <div class="col p-3" style="background-color:rgb(255, 191, 127);">
                <h4 class="text-center">Number of Rentals</h4>
                <h1 class="text-center" style="font-size: 50px; color:rgb(127, 138, 255);">{{ $total_rentals }}</h1>
            </div>
            <div class="col p-3" style="background-color:rgb(127, 138, 255);">
                <h4 class="text-center">Total Earnings (Tk.)</h4>
                <h1 class="text-center" style="font-size: 40px; color:rgb(219, 255, 127);">{{ number_format($total_earnings, 2) }}</h1>
            </div>
        </div>
    </div>
    <!--..............................................................Start chart---------------------------------------------->
    <div class="container mt-5 chart-bg">
        <h5 class="">Report</h5>
        <div class="row row-cols-1 row-cols-lg-2 g-2 g-lg-3">
            <div class="col p-2">
                <canvas id="lineChart"></canvas>
            </div>
            <div class="col p-2"><canvas id="barChart"></canvas></div>
        </div>
    </div>
    <div class="container mt-5 table-style">
        <h5 class="">Table</h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Sl</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">First Name</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Last Name</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Designation</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Phone</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Address</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Email</th>
                    <th style="background-color: #20B2AA; color:#fff;" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Md. Faisal</td>
                    <td>Khan</td>
                    <td>GM</td>
                    <td>01738118012</td>
                    <td>Dhaka, Bangladesh</td>
                    <td>faisal@gmil.com</td>
                    <td>Active</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Abdul Malek</td>
                    <td>Jobbar</td>
                    <td>Manager</td>
                    <td>01738115212</td>
                    <td>Rajshahi, Bangladesh</td>
                    <td>malek@gmil.com</td>
                    <td>Active</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Mr. Kheleq</td>
                    <td>Molla</td>
                    <td>Director</td>
                    <td>01738115999</td>
                    <td>Chittagong, Bangladesh</td>
                    <td>molla@gmil.com</td>
                    <td>Inactive</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
