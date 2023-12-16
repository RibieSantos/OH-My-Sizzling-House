<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Cart;
use App\Models\Events;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function show(){
        $order = Orders::all();
        $menu = Menu::all();
        $user = User::all();
        $event = Events::all();
        
        return view('admin.orders',['menu'=>$menu,'orders'=>$order,'user'=>$user,'event'=>$event]);
    }
    public function editStatus(Orders $order_id,Request $request){
       

        $order_id->update([
            
            'order_status'=>$request->order_status,
        ]);
        return redirect(route('admin.orders'))->with('success', 'Order status is successfully updated!');

    }




    
    public function index(){
        $order = Orders::all();
        $menu = Menu::all();
        $event = Events::all();
        return view('customers.orders',['menu'=>$menu,'orders'=>$order,'event'=>$event]);
    }
    public function customerShow(Request $request){
        $cart = Cart::all();
        foreach ($cart as $carts) {
            
            Orders::create([
                'user_id'=>$carts->user_id,
                'menu_id'=>$carts->menu_id,
                'qty'=>$carts->qty,
                'order_date'=>date('').now(),
                'total_price'=>$carts->total_amount,
            ]);
            $carts->delete();

        }
        return redirect(route('customers.orders'))->with('success', 'Order items are successfully added!');
    }
    public function orderCancel(Orders $id){
        $id->delete();
        return redirect(route('customers.orders'))->with('success', 'You cancelled your order!');
    }
}
