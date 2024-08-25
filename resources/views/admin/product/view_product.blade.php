@extends('admin.default')
@section('title', 'Edit product page')
@section('main-content')

    <div class="w-75 mx-auto mb-5">

        <h3 class="text-success text-center mt-5">Edit product</h3>
        <form action="" enctype="multipart/form-data" method="post">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="fw-semibold mb-1">Product name</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter the product name"
                    class="form-control">
            </div>


            <div class="mb-3">
                <label for="decscription" class="fw-semibold mb-1">Decscription</label>
                <textarea name="description" class=" form-control" placeholder="Enter the product description" id="description"
                    cols="30" rows="10"></textarea>
            </div>


            <div class="mb-3">
                <label for="price" class="fw-semibold mb-1">Price</label>
                <input type="text" id="price" name="price" placeholder="Enter the product price"
                    class="form-control">
            </div>


            <div class="mb-3">
                <label for="quantity" class="fw-semibold mb-1">Quantity</label>
                <input type="text" id="quantity" name="quantity" placeholder="Enter the product quantity"
                    class="form-control">
            </div>


            <div class="mb-3">
                <label for="category" class="fw-semibold mb-1">Category</label>
                <div>
                    <select name="category" id="category" class="form-control">
                        <option value="#">Select a category</option>
                        <option value="#">Select a category</option>
                        <option value="#">Select a category</option>
                    </select>
                </div>
            </div>


            <div class="mb-3">
                <label for="image" class="fw-semibold mb-1">Product image</label>
                <input type="file" id="image" name="image" class="form-control" />
            </div>


            <div>
                <input class=" btn btn-success" type="submit" value="Add Product">
                <a href="{{ url('/products') }}" class="btn btn-danger">Back to product page</a>
            </div>
        </form>
    </div>

@endsection
