@extends('admin.layout.layout')
@section('title', 'Customer');
@section('content')
    <div class="container mt-5 table-style">
        <div class="card">
            <div class="card-body">

                @include('component.alert')
                <form method="POST" action="{{ route('customer.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    @include('admin.customer.form')
                </form>
            </div>
        </div>
    </div>
@endsection
