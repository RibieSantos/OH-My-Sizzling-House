<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Events;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::all();
        $menu = Menu::all();
        $event = Events::all();
        $totalAmount = 0;
        foreach ($cart as $carts) {
            foreach ($menu as $menus) {
                if ($menus->event_id != null) {
                    if ($carts->menu_id == $menus->id) {
                        foreach ($event as $evt) {
                            if ($evt->id == $menus->event_id) {
                                if ($evt->event_status == "Activate") {
                                    $discount = (1 - $evt->discount) * $carts->total_amount;
                                    $totalAmount += $discount;
                                } else {
                                    $totalAmount += $carts->total_amount;
                                }
                            }
                        }
                    }
                } else {
                    if ($carts->menu_id == $menus->id) {


                        $totalAmount += $carts->total_amount;
                    }
                }
            }
        }
        $formattedTotalAmount = number_format($totalAmount, 2);
        return view('customers.cart', ['cart' => $cart, 'menu' => $menu, 'event' => $event, 'totalAmount' => $formattedTotalAmount]);
    }
    public function create(Menu $id)
    {
        return view('customers.cart', ['id' => $id]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'qty' => 'required|integer',

            'total_amount' => 'required|decimal:2,4'

        ]);

        $newCart = Cart::create([
            'qty' => $request->qty,
            'menu_id' => $request->menu_id,
            'user_id' => $request->user_id,
            'total_amount' => $request->total_amount,
        ]);
        return redirect(route('customers.cart'))->with('success', 'Cart item is successfully added!');
    }
    public function destroy(Cart $id)
    {
        $id->delete();
        return redirect(route('customers.cart'))->with('success', 'Cart item is successfully deleted!');
    }
    public function update(Cart $id, Request $request)
    {
        $data = $request->validate([
            'qty' => 'required|integer',
            'menu_id' => 'required',
            'user_id' => 'required',
            'total_amount' => 'required',
        ]);
        $id->update([
            'qty' => $request->qty,
            'menu_id' => $request->menu_id,
            'user_id' => $request->user_id,
            'total_amount' => $request->total_amount,
        ]);
        return redirect(route('customers.cart'))->with('success', 'Cart item is successfully updated!');
    }
}
