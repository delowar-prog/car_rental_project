@extends('admin.layout.layout')
@section('title', 'Rental')
@section('content')
    <div class="container card mt-5 table-style m-2 p-3">
        <div class="d-flex justify-content-between my-1">
            <h5 class="card-title mb-0">Rental List </h5>
            <div class="d-flex gap-3">
                <h3>Total Rent: {{$rentals->total()}}</h3>
            </div>
        </div>
        @include('component.alert')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Rental Id</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Customer Name</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Phone</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Car Name</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Car Brand</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Start Date</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">End Date</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Total Cost</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Status</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Update Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <th scope="row">{{ ($rentals->currentPage() - 1) * $rentals->perPage() + $loop->iteration }}
                        </th>
                        <td style="padding:8px 5px">{{ $rental->user?->name }}</td>
                        <td style="padding:8px 5px">{{ $rental->user?->userDetail?->phone }}</td>
                        <td style="padding:8px 5px">{{ $rental->car?->name }}</td>
                        <td style="padding:8px 5px">{{ $rental->car?->brand }}</td>
                        <td style="padding:8px 5px">{{ $rental->start_date }}</td>
                        <td style="padding:8px 5px">{{ $rental->end_date }}</td>
                        <td style="padding:8px 5px">{{ $rental->total_cost }}</td>
                        <td style="padding:8px 5px">{{ $rental->status }}</td>
                        <td style="padding:8px 5px">
                            <div>
                                <form action="{{ route('rental.updateStatus', $rental->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()">
                                        <option value="">Update Status</option>
                                        <option value="ongoing" {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="canceled" {{ $rental->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                    </select>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $rentals->links() !!}
    </div>
@endsection
