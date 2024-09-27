@extends('admin.layout.layout')
@section('title', 'Customer')
@section('content')
    <div class="container mt-5 table-style">
        <div class="d-flex justify-content-between my-1">
            <h5 class="card-title mb-0">Customer List </h5>
            <div class="d-flex gap-3">
                <h3>Total Customer: {{$customers->total()}}</h3>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Sl</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Name</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Email</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Phone</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Address</th>
                    <th style="background-color: #20B2AA; color:#fff; padding:5px;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <th scope="row">{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}
                        </th>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>Phone</td>
                        <td>Address</td>
                        <td class="d-flex align-items-center">
                                <div>
                                    <a class="btn btn-success" href="{{ route('customer.show', $customer->id) }}">
                                        <i class="far fa-eye"></i>
                                    </a>
                                </div>
                                <div>
                                    <form action="{{ route('customer.destroy', $customer->id) }}"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="confirmDelete(this.form)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $customers->links() !!}
    </div>
@endsection
