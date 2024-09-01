<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function countCartItems()
    {

        $userId = Auth::id();

        $numberOfCartItems = Cart::where('user_id', $userId)->count();

        return $numberOfCartItems;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = $this->countCartItems();

        return view('home.view_cart_items', compact('count'));
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
        //    Steps:
        //      1. Get the Product id from $request
        $productId = $request->route('id');

        //      2. Get the currently loggedin user's id.
        $userId = Auth::id();

        //      3. Save in DB.
        $cart = new Cart;
        $cart->product_id = $productId;
        $cart->user_id = $userId;

        $cart->save();

        flash()->success('Item has been added in your cart successfully.');

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
