<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Jobs\ProductJob;
use App\Models\Product;
use App\Notifications\CheapestPriceNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function top3()
    {
        $products = Product::orderBy('price')->take(3)->get();

        return view('product.top', compact('products'));
    }

    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        ProductJob::dispatch($request->validated(), auth()->id());

        $cheapestProduct = Product::where('category', $request->category)->orderBy('price', 'asc')->firstOrFail();

        $product = Product::where('category', $request->category)->latest('updated_at')->firstOrFail();

        if ($product->price == $cheapestProduct->price) {
            $users = User::all();
            foreach ($users as $user) {
               $user->notify(new CheapestPriceNotification($product));
            }
        }

        return redirect()->route('product.index')->with('success', 'Product was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return redirect()->route('product.index')->with('success', 'Product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product was deleted');
    }


}
