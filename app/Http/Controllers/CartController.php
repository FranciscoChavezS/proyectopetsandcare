<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $basket = Cart::byUser(Auth::user()->id)->with('product')->get();
        if(count($basket) < 1) {
            return response()->redirectToRoute('dashboard');
        }
        return response()->view('shoppingCart',['basket' => $basket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Cart::byUserProduct(Auth::user()->id, $request->product_id)->get();
        if($cart->count() > 0) {
            $cart = $cart[0];
            $quantity = $request->quantity;
            $product = Product::find($request->product_id);
            if($quantity + $cart->quantity > $product->stock) {
                $quantity = $product->stock;
            } else {
                $quantity += $cart->quantity;
            }
            $cart->quantity = $quantity;
            $cart->save();
        } else {
            $cart = new Cart($request->all());
            $cart->saveOrFail();
        }


        return response()->redirectToRoute('Cart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->quantity = $request->quantity;
        if($cart->quantity > 0) {
            $cart->save();
        } else {
            $cart->delete();
        }
        return response()->redirectToRoute('Cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->delete();

        return response()->redirectToRoute('Cart.index');
    }

    public function clean()
    {
        $basket = Cart::byUser(Auth::user()->id)->get();
        foreach ($basket as $item) {
            $item->delete();
        }
        return response()->redirectToRoute('dashboard');
    }
}

