<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function countTotalOrder()
    {

        $userId = Auth::id();

        $totalOrders = Order::where('user_id', $userId)->count();

        return $totalOrders;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;

        $cart = new CartController();

        $count = $cart->countCartItems();

        $numberOfOrders = $this->countTotalOrder();

        $loggedInUserId = Auth::id();

        $orderedItems = Order::where('user_id', $loggedInUserId)->get();

        return view('home.orders.index', compact('count', 'numberOfOrders', 'orderedItems', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showAll()
    {
        $no = 1;

        $allOrderItem = Order::all();

        return view('admin.view_order', compact('no', 'allOrderItem'));
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

    public function changeStatusOTW($id)
    {
        $selectedOrderedItem = Order::find($id);

        $selectedOrderedItem->status = "otw";

        $selectedOrderedItem->save();

        flash()->success('Order status has been changed.');

        return redirect()->back();
    }

    public function changeStatusDelivered($id)
    {
        $selectedOrderedItem = Order::find($id);

        $selectedOrderedItem->status = "del";

        $selectedOrderedItem->save();

        flash()->success('Order status has been changed as delivered.');

        return redirect()->back();
    }
}
