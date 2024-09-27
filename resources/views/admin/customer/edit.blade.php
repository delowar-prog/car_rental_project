@extends('admin.layout.layout')
@section('title', 'Customer')
@section('content')
    <div class="container mt-5 table-style">
        <div class="d-flex justify-content-between my-1">
            <h5 class="card-title mb-0">Customer List </h5>
            <a class="btn btn-success btn-sm add-btn" href="{{ route('customer.create') }}"><i
                    class="ri-add-line align-bottom me-1"></i> Add New
            </a>
        </div>

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

            </tbody>
        </table>
    </div>
@endsection
