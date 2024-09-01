@extends('layouts.home_layout')
@section('title', $product->title . '\'s Detail')
@section('main-content')
    <div>
        {{-- {{ $product }} --}}

        <div class="col-md-12 px-5">

            <h3 class=" text-center mt-5 mb-3">{{ $product->title }}'s Detail</h3>

            <div class="mb-5">
                <div class="d-flex justify-content-center">
                    <img class="w-50 h-50 object-cover" src="{{ asset('product/' . $product->image) }}" alt="">
                </div>
                <div class="detail-box text-center mt-5">
                    <h6>
                        Name:
                        <span>
                            {{ $product->title }}
                        </span>
                    </h6>
                    <h6>
                        Price:
                        <span>
                            ${{ $product->price }}
                        </span>
                    </h6>

                    <h6>
                        Category:
                        <span>
                            {{ $product->category }}
                        </span>
                    </h6>

                    <h6>
                        Available Quantity:
                        <span>
                            {{ $product->qty }}
                        </span>
                    </h6>

                    <h6>
                        Description:
                        <span>
                            {{ $product->desc }}
                        </span>
                    </h6>


                </div>

            </div>
        </div>
    </div>
@endsection
