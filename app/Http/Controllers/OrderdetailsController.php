<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Orderdetails;
use App\Models\Orders;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderdetailsController extends Controller
{
    public function show()
    {
        $menu = Menu::all();
        $order = Orderdetails::all();
        return view('admin.orderdetails',['menu'=>$menu,'orders'=>$order]);
    }
    public function cusShow()
    {
        $order = Orderdetails::all();
        $menu = Menu::all();
        return view('customers.orderhistory',['orders'=>$order,'menu'=>$menu]);
    }
    public function store(Orders $id,Request $request)
    {

        Orderdetails::create([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'order_date' => $request->order_date,
            'qty' => $request->qty,
            'total_amount' => $request->total_price,
        ]);
        $id->delete();
        return redirect(route('customers.orders'))->with('success', 'Order items are successfully added!');
    }
}
