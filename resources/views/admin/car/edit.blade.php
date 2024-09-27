@extends('admin.layout.layout')
@section('title', 'Car')
@section('content')
    <div class="container mt-5 table-style">
        <div class="card">
            <div class="card-body">
                <h3>Edit Car</h3>
                @include('component.alert')
                <form method="POST" action="{{ route('car.update', $car->id) }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('admin.car.form')
                </form>
            </div>
        </div>
    </div>
@endsection
