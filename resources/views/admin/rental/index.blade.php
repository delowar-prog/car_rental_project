@extends('admin.layout.layout')
@section('title', 'Rental');
@section('content')
    <div class="container mt-5 table-style">
        <div class="d-flex justify-content-between my-1">
            <h5 class="card-title mb-0">Rental List </h5>
            <a class="btn btn-success add-btn" href="{{ route('rental.create') }}"><i
                class="ri-add-line align-bottom me-1"></i> Create
            Rental</a>
        </div>
        @include('component.alert')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Rental Id</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Customer Name</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Car Name</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Car Brand</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Start Date</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">End Date</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Total Cost</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Status</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    <tr>
                        <th scope="row">{{ ($rentals->currentPage() - 1) * $rentals->perPage() + $loop->iteration }}
                        </th>
                        <td style="padding:8px 5px">{{ $rental->user?->name }}</td>
                        <td style="padding:8px 5px">{{ $rental->car?->name }}</td>
                        <td style="padding:8px 5px">{{ $rental->car?->brand }}</td>
                        <td style="padding:8px 5px">{{ $rental->start_date }}</td>
                        <td style="padding:8px 5px">{{ $rental->end_date }}</td>
                        <td style="padding:8px 5px">{{ $rental->total_cost }}</td>
                        <td style="padding:8px 5px">{{ $rental->status }}</td>
                        <td class="d-flex align-items-center">
                                <div>
                                    <a class="btn btn-success" href="{{ route('rental.edit', $rental->id) }}">
                                        <i class="far fa-pen"></i>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('rental.destroy', $rental->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="confirm('Are you sure to delete?')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
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
