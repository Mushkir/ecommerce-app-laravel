@extends('admin.default')
@section('title', 'Add new product')
@section('main-content')

    <div class="w-75 mx-auto mb-5">
        <h3 class="text-success text-center mt-5">Add product</h3>
        <form action="/products/store" enctype="multipart/form-data" method="post">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="fw-semibold mb-1">Product name<span class="text-danger">*</span></label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter the product name"
                    class="form-control">
            </div>
            @if ($errors->has('product_name'))
                <div class="alert alert-danger">{{ $errors->first('product_name') }}</div>
            @endif

            <div class="mb-3">
                <label for="decscription" class="fw-semibold mb-1">Decscription<span class="text-danger">*</span></label>
                <textarea name="description" class=" form-control" placeholder="Enter the product description" id="description"
                    cols="30" rows="10"></textarea>
            </div>
            @if ($errors->has('decscription'))
                <div class="alert alert-danger">{{ $errors->first('decscription') }}</div>
            @endif


            <div class="mb-3">
                <label for="price" class="fw-semibold mb-1">Price<span class="text-danger">*</span></label>
                <input type="text" id="price" name="price" placeholder="Enter the product price"
                    class="form-control">
            </div>
            @if ($errors->has('price'))
                <div class="alert alert-danger">{{ $errors->first('price') }}</div>
            @endif

            <div class="mb-3">
                <label for="quantity" class="fw-semibold mb-1">Quantity<span class="text-danger">*</span></label>
                <input type="text" id="quantity" name="quantity" placeholder="Enter the product quantity"
                    class="form-control">
            </div>
            @if ($errors->has('quantity'))
                <div class="alert alert-danger">{{ $errors->first('quantity') }}</div>
            @endif

            <div class="mb-3">
                <label for="category" class="fw-semibold mb-1">Category<span class="text-danger">*</span></label>
                <div>
                    <select name="category" id="category" class="form-control">
                        <option value="">Select a category</option>

                        @foreach ($categories as $categoryData)
                            <option value="{{ $categoryData->category_name }}">{{ $categoryData->category_name }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            @if ($errors->has('category'))
                <div class="alert alert-danger">{{ $errors->first('category') }}</div>
            @endif

            <div class="mb-3">
                <label for="image" class="fw-semibold mb-1">Product image<span class="text-danger">*</span></label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            @if ($errors->has('image'))
                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
            @endif

            <div>
                <input class=" btn btn-success" type="submit" value="Add Product">
                <a href="{{ url('/products') }}" class="btn btn-danger">Back to product page</a>
            </div>
        </form>
    </div>

@endsection
