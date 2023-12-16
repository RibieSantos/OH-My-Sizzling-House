<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Events;
use App\Models\Menu;
use Illuminate\Http\Request;

class CustomerMenuController extends Controller
{
    public function index(){
        $menu = Menu::all();
        $category = Category::all();
        $event = Events::all();
        return view('customers.dashboard',['category'=>$category,'menu'=>$menu,'event'=>$event]);
    }
}
