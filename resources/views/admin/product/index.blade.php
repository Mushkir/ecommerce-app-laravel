@extends('admin.default')
@section('title', 'Products page')
@section('main-content')

    <div class="page-content p-4">
        <div class="d-flex align-items-center mt-4 justify-content-between px-5">
            <h1 class="text-center text-success">All Products</h1>

            <a class="btn btn-success" href="{{ url('/products/add_product') }}">Add new product</a>
        </div>

        @if ($numberOfProducts === 0)
            <h3 class="text-center text-danger mt-5">Currently no products available...</h3>
        @else
            <div class=" d-flex justify-content-center align-items-center mb-5" style="margin-top: 50px">

                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>S. No</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>#{{ $no++ }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ Str::limit($product->desc, $limit = 50, '...') }}</td>
                                <td><img class="w-50" src="{{ asset('product/' . $product->image) }}" alt=""></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->qty }}</td>
                                <td> <a href="{{ url('', $product->id) }}" class="btn btn-success">Edit</a> </td>
                                <td> <a href="{{ url('', $product->id) }}" class="btn btn-danger">Delete</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $products->links() }}
        @endif
    </div>

@endsection
