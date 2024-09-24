@extends('admin.layout.layout')
@section('title', 'Car');
@section('content')
    <div class="container mt-5 table-style">
        <div class="d-flex justify-content-between my-1">
            <h5 class="card-title mb-0">Car List </h5>
            <a class="btn btn-success add-btn" href="{{ route('car.create') }}"><i
                class="ri-add-line align-bottom me-1"></i> Create
            Car</a>
        </div>
        @include('component.alert')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Sl</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Name</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Brand</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Model</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Year</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Car Type</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Daily Rent Price</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Availability</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">image</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <th scope="row">{{ ($cars->currentPage() - 1) * $cars->perPage() + $loop->iteration }}
                        </th>
                        <td style="padding:8px 5px">{{ $car->name }}</td>
                        <td style="padding:8px 5px">{{ $car->brand }}</td>
                        <td style="padding:8px 5px">{{ $car->model }}</td>
                        <td style="padding:8px 5px">{{ $car->year }}</td>
                        <td style="padding:8px 5px">{{ $car->car_type }}</td>
                        <td style="padding:8px 5px">{{ $car->daily_rent_price }}</td>
                        <td style="padding:8px 5px">{{ $car->availability }}</td>
                        <td style="padding:8px 5px">
                            <img src="{{ $car->image }}" alt="" width="70">
                        </td>

                        <td class="d-flex align-items-center">
                                <div>
                                    <a class="btn btn-success" href="{{ route('car.edit', $car->id) }}">
                                        <i class="far fa-pen"></i>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('car.destroy', $car->id) }}"
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
        {!! $cars->links() !!}
    </div>
@endsection
