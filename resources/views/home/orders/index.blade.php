@extends('layouts.home_layout')
@section('title', Auth::user()->name . '\'s ordered items')
@section('main-content')
    <div class="p-5">
        {{-- {{ $orderedItems }} --}}
        @if ($numberOfOrders == 0)
            <h2 class="text-center text-danger">You have no ordered items.</h2>
        @else
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="bg-dark text-light">
                        <th class="align-middle"> S.No </th>
                        <th class="align-middle"> Product Title </th>
                        <th class="align-middle"> Image </th>
                        <th class="align-middle"> Delivery Status </th>
                        <th class="align-middle"> Price </th>
                    </thead>
                    <tbody>
                        @foreach ($orderedItems as $order)
                            <tr>
                                <td class="align-middle">#{{ $no++ }}</td>
                                <td class="align-middle">{{ $order->product->title }}</td>
                                <td class="align-middle">
                                    <img style="width: 100px" class="object-cover"
                                        src="{{ asset('product/' . $order->product->image) }}"
                                        alt="{{ $order->product->title }}'s image">
                                </td>
                                <td class="align-middle">
                                    @if ($order->status == 'in progress')
                                        Currently in progress
                                    @endif
                                </td>
                                <td class="align-middle"> Rs. {{ $order->product->price }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
