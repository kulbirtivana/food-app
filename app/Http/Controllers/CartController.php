<?php

namespace App\Http\Controllers;
use App\Food;

use Illuminate\Http\Request;

class CartController extends Controller
{
    
    // public function shop()
    // {
    //     $foods = Food::all();
    //     return view('food.index')->withTitle('Food STORE | SHOP')->with(['foods' => $foods]);
    // }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('Food STORE | CART')->with(['cartCollection' => $cartCollection]);
    }


public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                )
        ));
        return redirect()->route('cart.index')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        \Cart::clear();
        return redirect()->route('cart')->with('success_msg', 'Car is cleared!');
    }
}