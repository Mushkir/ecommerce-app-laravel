<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $no = 1;

        $products = Product::paginate(5);

        $numberOfProducts = Product::all()->count();

        return view('admin.product.index', compact('products', 'numberOfProducts', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('category_name', 'asc')->get();

        return view('admin.product.add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product;

        $product->title = $request->product_name;
        $product->desc = $request->description;
        $product->price = $request->price;
        $product->qty = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;

        if ($image) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('product'), $imageName);

            $product->image = $imageName;
        }

        $product->save();

        flash()->success('New product has been added successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        $cartObj = new CartController();

        $order = new OrderController();

        $numberOfOrders = $order->countTotalOrder();

        $count = $cartObj->countCartItems();

        return view('home.view_product_detail', compact('product', 'count', 'numberOfOrders'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);

        $categories = Category::orderBy('category_name', 'asc')->get();

        return view('admin.product.view_product', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->title = $request->product_name;
        $product->desc = $request->description;
        $product->price = $request->price;
        $product->qty = $request->quantity;
        $product->category = $request->category;

        $image = $request->image;

        if ($image) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('product'), $imageName);

            $product->image = $imageName;

            $product->save();
        } else {

            $product->save();
        }

        flash()->success('Product has been updated successfully.');

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        $product->delete();

        flash()->success('Product has been deleted successfully.');

        return redirect()->back();
    }

    public function search_product(Request $request)
    {
        $search = $request->search;

        $no = 1;

        $numberOfProducts = Product::where('title', 'LIKE', '%' . $search . '%')->count();

        $products = Product::where('title', 'LIKE', '%' . $search . '%')->paginate(5);

        return view('admin.product.index', compact('products', 'numberOfProducts', 'no'));
    }
}
