<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $selected = $request->input('items');
        if (!$selected) {
            return redirect()->route('cart.index')->with('error', 'Select product');
        }
        $user = Auth::user();
        $cartItem = Cart::with('product')
            ->where('id', $selected)
            ->where('user_id', $user->id)
            ->get();
        return view('checkout.confirm', compact('cartItems', 'user'));
    }

    public function confirm(Request $request)
    {
        $user = Auth::user();
        $email = $request->input('email', $user->email);
        $selectedIds = $request->input('items', []);


        $items = Cart::with('product')
            ->whereIn('id', $selectedIds)
            ->where('user_id', $user->id)
            ->get();

        $total = $items->sum(fn($item) => $item->price * $item->quantity);

        Mail::to($email)->send(new OrderMail($items, $user, $total));
        return redirect()->route('thanks')->with('success', 'Order is send');
    }
}
