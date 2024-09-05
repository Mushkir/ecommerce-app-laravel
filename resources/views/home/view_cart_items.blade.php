@extends('layouts.home_layout')
@section('title', auth()->user()->name . '\'s Cart items')
@section('main-content')
    <div class="p-5">
        <table class="table table-bordered text-center">
            <thead>
                <th>S.No</th>
                <th>Product Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>
            </thead>

            <tbody>
                @foreach ($cartItems as $cart)
                    <tr>
                        <td>#{{ $no++ }}</td>
                        <td> {{ $cart->product->title }}</td>
                        <td><img src="{{ asset('product/' . $cart->product->image) }}" class="w-25 h-25"
                                alt="{{ $cart->product->title }}'s image"></td>
                        <td>${{ $cart->product->price }}</td>
                        <td><a href="{{ url('remove_cart_item', $cart->id) }}" class="btn btn-danger">Remove</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
