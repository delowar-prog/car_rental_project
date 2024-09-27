@extends('admin.layout.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="container balance-summary">
        <div class="balance-title text-center text-white">
            <p class="p-1 text-uppercase mb-0">Total Balance</p>
        </div>
        <div>
            <div class="row row-cols-1 row-cols-md-3 g-2">
                <div class="col card-bg-sale p-2">
                    <h6 class="text-uppercase text-primary">Sale :</h6>
                    <table style="width: 100%; font-weight: bold">
                        <tr>
                            <td>Total Bill</td>
                            <td>2541.00</td>
                            <td>BDT</td>
                        </tr>
                        <tr>
                            <td>Total Paid</td>
                            <td>1500.00</td>
                            <td>BDT</td>
                        </tr>
                        <tr>
                            <td>Total Due</td>
                            <td>1041.00</td>
                            <td>BDT</td>
                        </tr>
                    </table>
                </div>
                <div class="col card-bg-purchase p-2">
                    <h6 class="text-uppercase text-primary">Purchase :</h6>
                    <table style="width: 100%; font-weight: bold">
                        <tr>
                            <td>Total Bill</td>
                            <td>2541.00</td>
                            <td>BDT</td>
                        </tr>
                        <tr>
                            <td>Total Paid</td>
                            <td>1500.00</td>
                            <td>BDT</td>
                        </tr>
                        <tr>
                            <td>Total Due</td>
                            <td>1041.00</td>
                            <td>BDT</td>
                        </tr>
                    </table>
                </div>
                <div class="col card-bg-expense p-2">
                    <h6 class="text-uppercase text-primary">Expense :</h6>
                    <table style="width: 100%; font-weight: bold">
                        <tr>
                            <td>Total Bill</td>
                            <td>2541.00</td>
                            <td>BDT</td>
                        </tr>
                        <tr>
                            <td>Total Paid</td>
                            <td>1500.00</td>
                            <td>BDT</td>
                        </tr>
                        <tr>
                            <td>Total Due</td>
                            <td>1041.00</td>
                            <td>BDT</td>
                        </tr>
                    </table>
                </div>
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
