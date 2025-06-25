<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{

   // public function __construct(){
     //   $this->middleware('AuthorisedUser');
   // }

    private function userID(){
        return Auth::id();
    }

    private function userCart(){
        return Cart::with('product')->where('user_id', $this->userID());
    }


    public function store(Request $request)
    {

        $user_id = $this->userID()  ;
        $productId = $request->input('product_id');
        $price = $request->input("price");
        $quantity = $request->input("quantity", 1);

        $exist = Cart::where('user_id', $user_id)
            ->where('product_id', $productId)
            ->first();

        if ($exist) {
            $exist->quantity += $quantity;
            $exist->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $productId,
                'price' => $price,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->back()->with('success', 'Product sucssesfuly added to cart');
    }

    public function index(){
      
        $items = $this->userCart()->get();

        $total = $items->sum(fn($item)=> $item -> price * $item -> quantity);

        return view('cart.index', compact('items', 'total'));
    }


public function update(Request $request, $productId)
{
    $user_id = $this->userID();
    $quantity = $request->input('quantity');

    $item = Cart::where('user_id', $user_id)
                ->where('product_id', $productId)
                ->first();

    if ($item && $quantity > 0) {
        $item->quantity = $quantity;
        $item->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Quantity updated'
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Quantity updated');
    }

    return $this->destroy($productId);
}


public function destroy($productId)
{
    $user_id = $this->userID();

    Cart::where('user_id', $user_id)
        ->where('product_id', $productId)
        ->delete();

    return redirect()->route('cart.index')->with('success', 'Product removed from cart');
}


public function checkout(){

}
}
