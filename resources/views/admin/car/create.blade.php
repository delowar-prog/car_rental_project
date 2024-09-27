@extends('admin.layout.layout')
@section('title', 'Customer')
@section('content')
    <div class="container mt-5 table-style">
        <h3>Add New Car</h3>
        <div class="card">
            <div class="card-body">

                @include('component.alert')
                <form method="POST" action="{{ route('car.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @include('admin.car.form')
                </form>
            </div>
        </div>
    </div>
@endsection
