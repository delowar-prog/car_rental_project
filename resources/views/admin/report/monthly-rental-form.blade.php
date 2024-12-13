@extends('admin.layout.layout')
@section('title', 'Customer')
@section('content')
    <div class="container mt-5 table-style">
        <h3>Monthly Rental Report</h3>
        <div class="card">
            <div class="card-body">

                @include('component.alert')
                <form method="POST" action="{{ route('car.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <input type="date" name="fromDate" class="form-control" placeholder="From Date">
                        </div>
                        <div class="col-md-4">
                            <input type="date" name="toDate" class="form-control" placeholder="To Date">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
