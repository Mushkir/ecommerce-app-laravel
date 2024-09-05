<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $loggedInUserId = Auth::id();

        $nameEl = $request->name;
        $recAddressEl = $request->address;
        $recPhoneNoEl = $request->phone;

        $loggedInUserCartItem = Cart::where('user_id', $loggedInUserId)->get();

        foreach ($loggedInUserCartItem as $cartItems) {
            $order = new Order;
            $productId = $cartItems->product_id;

            $order->name = $nameEl;
            $order->rec_address = $recAddressEl;
            $order->phone = $recPhoneNoEl;
            $order->user_id = $loggedInUserId;
            $order->product_id = $productId;

            $order->save();
        }

        // After order confirmation clear the cart table.
        $userCartItem = Cart::where('user_id', $loggedInUserId)->get();

        foreach ($userCartItem as $deleteItems) {

            $data = Cart::find($deleteItems->id);
            $data->delete();
        }

        flash()->success('Order has been confirmed successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
