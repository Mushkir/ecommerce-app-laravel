@extends('layouts.home_layout')
@section('title', auth()->user()->name . '\'s Cart items')
@section('main-content')
    <div class="p-5 table-responsive">
        <table class="table table-bordered text-center">
            <thead class="bg-dark text-light ">
                <th class="align-middle">S.No</th>
                <th class="align-middle">Product Title</th>
                <th class="align-middle">Image</th>
                <th class="align-middle">Price</th>
                <th class="align-middle">Action</th>
            </thead>
            <?php
            $totalAmount = 0;
            ?>
            <tbody>
                @foreach ($cartItems as $cart)
                    <tr>
                        <td class="align-middle">#{{ $no++ }}</td>
                        <td class="align-middle"> {{ $cart->product->title }}</td>
                        <td class="align-middle"><img src="{{ asset('product/' . $cart->product->image) }}"
                                class="w-25 h-25" alt="{{ $cart->product->title }}'s image"></td>
                        <td class="align-middle">${{ $cart->product->price }}</td>
                        <td class="align-middle"><a href="{{ url('remove_cart_item', $cart->id) }}"
                                class="btn btn-danger">Remove</a></td>
                    </tr>
                    <?php
                    $totalAmount += $cart->product->price;
                    ?>
                @endforeach
            </tbody>
        </table>
        <h3 class="text-center mt-5">Your total amount is <span class="text-danger">${{ $totalAmount }}</span></h3>
    </div>
@endsection
