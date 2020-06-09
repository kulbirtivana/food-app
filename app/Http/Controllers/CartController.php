<?php

namespace App\Http\Controllers;
use App\Food;
use \Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()  {
        $cartCollection = Cart::getContent();
        return view('cart')->withTitle('Food STORE | CART')->with(['cartCollection' => $cartCollection]);
    }

      public function add(Request $request){
         $food = Food::findOrFail($request->id);
        Cart::add(array(

            'id' => (int)$food->id,
            'name' => (string)$food->foodname,
            'price' => (float)$food->price,
            'quantity' => 1,//(int)$food->quantity
            // 'photo' => $food->photo
            'attributes' => array(
                'image' => $food->photo
            )
        ));
        return redirect()->route('cart')->with('success_msg', 'Item is Added to Cart!');
    }


    public function remove(Request $request){
        Cart::remove($request->id);
        return redirect()->route('cart')->with('success_msg', 'Item is removed!');
    }

    public function update(Request $request){
        Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                )
        ));
        return redirect()->route('cart')->with('success_msg', 'Cart is Updated!');
    }

    public function clear(){
        Cart::clear();
        return redirect()->route('cart')->with('success_msg', 'Car is cleared!');
    }
}