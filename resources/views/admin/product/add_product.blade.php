@extends('admin.default')
@section('title', 'Add new product')
@section('main-content')

    <div class="w-75 mx-auto mb-5">
        <h3 class="text-success text-center mt-5">Add product</h3>
        <form action="" enctype="multipart/form-data" method="post">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="fw-semibold mb-1">Product name<span class="text-danger">*</span></label>
                <input type="text" id="product_name" name="product_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="decscription" class="fw-semibold mb-1">Decscription<span class="text-danger">*</span></label>
                <textarea name="description" class=" form-control" id="description" cols="30" rows="10"></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="fw-semibold mb-1">Price<span class="text-danger">*</span></label>
                <input type="text" id="price" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label for="quantity" class="fw-semibold mb-1">Quantity<span class="text-danger">*</span></label>
                <input type="text" id="quantity" name="quantity" class="form-control">
            </div>

            {{-- {{ $categories }} --}}
            <div class="mb-3">
                <label for="category" class="fw-semibold mb-1">Category<span class="text-danger">*</span></label>
                <div>
                    <select name="category" id="category" class="form-control">
                        <option value="">Select a category</option>
                        <option value="##">##</option>
                        <option value="##">##</option>
                        <option value="##">##</option>
                        <option value="##">##</option>

                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="fw-semibold mb-1">image<span class="text-danger">*</span></label>
                <input type="file" id="image" name="image" class="form-control">
            </div>

            <div>
                <input class=" btn btn-primary" type="submit" value="Add Product">
            </div>
        </form>
    </div>

@endsection
