@extends('admin.default')
@section('title', 'All orders page | Giftos')
@section('main-content')
    <div class="page-content p-5">
        <h3 class="text-center mt-5 mb-3">All order details</h3>
        {{-- {{ $allOrderItem }} --}}
        <table class="table table-bordered text-center">
            <thead>
                <tr class="table-dark text-light">
                    <th class="align-middle">S.No</th>
                    <th class="align-middle">Customer name</th>
                    <th class="align-middle">Address</th>
                    <th class="align-middle">Phone</th>
                    <th class="align-middle">Product title</th>
                    <th class="align-middle">Price</th>
                    <th class="align-middle">Image</th>
                    <th class="align-middle">Status</th>
                    <th class="align-middle">Change status</th>
                    <th class="align-middle">Print PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allOrderItem as $orderItems)
                    <tr class="align-middle">
                        <td>#{{ $no++ }}</td>
                        <td> {{ $orderItems->name }} </td>
                        <td> No. {{ $orderItems->rec_address }}. </td>
                        <td> <a href="tel:{{ $orderItems->phone }}" class=" text-dark text-decoration-none">
                                {{ $orderItems->phone }}
                            </a> </td>
                        <td> {{ $orderItems->product->title }} </td>
                        <td> Rs. {{ $orderItems->product->price }} </td>
                        <td>
                            <img style="width: 100px" src="{{ asset('product/' . $orderItems->product->image) }}"
                                alt="">
                        </td>
                        <td>
                            @if ($orderItems->status == 'in progress')
                                <span class="badge bg-danger">In Progress</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <a href="#" class="btn btn-danger">OTW</a>
                                <a href="#" class="btn btn-success">Delivered</a>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary">PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
