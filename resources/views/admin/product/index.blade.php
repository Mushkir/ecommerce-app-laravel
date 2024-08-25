@extends('admin.default')
@section('title', 'Products page')
@section('main-content')

    <div class="page-content p-4">
        {{-- @include('admin.dashboard_content_admin') --}}

        <div class="d-flex align-items-center mt-4 justify-content-between px-5">
            <h1 class="text-center text-success">All Products</h1>

            <a class="btn btn-success" href="{{ url('/products/add_product') }}">Add new product</a>
        </div>

        @if ($numberOfProducts === 0)
            <h3 class="text-center text-danger mt-5">Currently no products available...</h3>
        @else
            <div class=" d-flex justify-content-center align-items-center mb-5" style="margin-top: 50px">
                {{-- {{ $products }} --}}
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
                        <tr>
                            <td>S. No</td>
                            <td>Product Name</td>
                            <td>Description</td>
                            <td>Image</td>
                            <td>Price</td>
                            <td>Category</td>
                            <td>Quantity</td>
                            <td> <a href="#" class="btn btn-success">Edit</a> </td>
                            <td> <a href="#" class="btn btn-danger">Delete</a> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endif

    </div>

@endsection
