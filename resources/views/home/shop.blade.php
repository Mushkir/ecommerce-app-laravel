<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">
            {{-- {{ $products }} --}}
            @foreach ($products as $product)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div>
                            <div class="img-box">
                                <img src="{{ asset('product/' . $product->image) }}" alt="">
                            </div>
                            <div class="detail-box">
                                <h6>
                                    {{ $product->title }}
                                </h6>
                                <h6>
                                    Price
                                    <span>
                                        ${{ $product->price }}
                                    </span>
                                </h6>
                            </div>
                            <div class="new">
                                <span>
                                    New
                                </span>
                            </div>

                            <div class="d-flex justify-content-between my-3">
                                <a class="btn btn-success text-light"
                                    href="{{ url('/view_product_detail', $product->id) }}">View
                                    detail</a>

                                <a href="{{ url('/add_to_cart', $product->id) }}" class="btn btn-primary text-light">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="btn-box">
            <a href="">
                View All Products
            </a>
        </div>
    </div>
</section>
