<?php

use App\Http\Controllers\AdminAuth\AdminRegisteredUserController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerMenuController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderdetailsController;
use App\Http\Controllers\OrdersController;
use App\Models\Menu;
use App\Models\User;
use App\Models\Orderdetails;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProfileController::class,'welcome'])->name('welcome');

Route::get('/dashboard',[CustomerMenuController::class,'index'], function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Cart
    Route::get('/cart',[CartController::class,'index'])->name('customers.cart');
    Route::get('/cart/create/{id}',[CartController::class,'create'])->name('customers.cart.create');
    Route::post('/cart/store/{id}',[CartController::class,'store'])->name('customers.cart.store');
    // update cart
    Route::get('/cart/{id}/edit',[CartController::class,'edit'])->name('customers.cart.edit');
    Route::put('/cart/{id}/update',[CartController::class,'update'])->name('customers.cart.update');
    // delete cart
    Route::delete('/cart/{id}/destroy',[CartController::class,'destroy'])->name('customers.cart.destroy');
    //orders
    Route::get('/orders',[OrdersController::class,'index'])->name('customers.orders');
    Route::post('/orders/customerShow',[OrdersController::class,'customerShow'])->name('customers.orders.customerShow');

    Route::delete('/orders/{id}/orderCancel',[OrdersController::class, 'orderCancel'])->name('customers.orders.orderCancel');
    //order details
    Route::get('/orderhistory',[OrderdetailsController::class,'cusShow'])->name('customers.orderdetails');
    Route::post('/orderhistory/{id}',[OrderdetailsController::class,'store'])->name('customers.orderdetails.store');

    

});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    $menu = Menu::count();
    $user = User::count();
    $sales = Orderdetails::sum('total_amount');
    $currentYear = now()->year;
    $today = Carbon::today();
    $tsales = Orderdetails::whereDate('order_date', $today)->get();
    $totalSales = $tsales->sum('total_amount');

    $monthlySales = Orderdetails::whereYear('order_date', $currentYear)
        ->get()
        ->groupBy(function ($date) {
            return Carbon::parse($date->order_date)->format('m');
        });

    $monthlySalesData = array_fill(0, 12, 0);

    foreach ($monthlySales as $month => $data) {
        $monthlySalesData[(int)$month - 1] = $data->sum('total_amount');
    }

    return view('admin.dashboard', [
        'menu' => $menu,
        'sales' => $sales,
        'user' => $user,
        'schart' => $monthlySalesData,
        'tsales' => $totalSales
    ]);
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('auth:admin')->group(function (){

    Route::get('/admin/profile', [ProfileController::class, 'adminEdit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'adminUpdate'])->name('admin.profile.update');
    // Navigation Route
    Route::get('/admin/menu',[MenuController::class,'show'])->name('admin.adminMenu');
    Route::get('/admin/category',[CategoryController::class,'show'])->name('admin.category');
    Route::get('/admin/orders',[OrdersController::class,'show'])->name('admin.orders');
    Route::get('/admin/orderdetails',[OrderdetailsController::class,'show'])->name('admin.orderdetails');
    Route::get('/admin/users',[ProfileController::class,'show'])->name('admin.user');
    Route::get('/admin/inventory',[InventoryController::class,'show'])->name('admin.inventory');
    Route::get('/admin/events',[EventsController::class,'show'])->name('admin.events');

    // MENU CRUD ROUTE
    // Create
    Route::get('/admin/menu/create', [MenuController::class,'create'])->name('admin.menu.addMenu');
    Route::post('/admin/menu', [MenuController::class,'store'])->name('admin.menu.store');
    // Update
    Route::get('/admin/menu/{id}/edit', [MenuController::class,'edit'])->name('admin.menu.editMenu');
    Route::put('/admin/menu/{id}/update', [MenuController::class,'update'])->name('admin.menu.update');
    //Add Event
    Route::put('/admin/menu/{id}/addEvent', [MenuController::class,'addEvent'])->name('admin.menu.addEvent');

    //Delete
    Route::delete('/admin/menu/{id}/destroy', [MenuController::class,'destroy'])->name('admin.menu.destroy');

    //EVENTS CRUD ROUTE
    //Create
    Route::get('/admin/events/create', [EventsController::class,'create'])->name('admin.events.addEvent');
    Route::post('/admin/events/store', [EventsController::class,'store'])->name('admin.events.store');
    //Update
    Route::get('/admin/events/{id}/edit', [EventsController::class,'edit'])->name('admin.events.editEvent');
    Route::put('/admin/events/{id}/update', [EventsController::class,'update'])->name('admin.events.update');
    //Delete
    Route::delete('/admin/events/{id}/destroy', [EventsController::class,'destroy'])->name('admin.events.destroy');



    // CATEGORY CRUD
    // Create
    Route::get('/admin/category/create', [CategoryController::class,'create'])->name('admin.category.addCat');
    Route::post('/admin/category/store', [CategoryController::class,'store'])->name('admin.category.store');
    // Update
    Route::get('/admin/category/{cat_id}/edit', [CategoryController::class,'edit'])->name('admin.category.editCat');
    Route::put('/admin/category/{cat_id}/update', [CategoryController::class,'update'])->name('admin.category.update');
    //delete
    Route::delete('/admin/category/{cat_id}/destroy', [CategoryController::class,'destroy'])->name('admin.category.destroy');

    Route::put('/orders/editStatus/{order_id}/editStatus',[OrdersController::class, 'editStatus'])->name('admin.orders.editStatus');

    //Admin users
    // Create
    Route::get('/admin/users/addUser',[AdminUsersController::class,'create'])->name('admin.users.create');
    Route::post('/admin/users/addUser/store',[AdminUsersController::class,'store'])->name('admin.users.store');
    //Delete
    Route::delete('/admin/users/addUser/{admin_id}/destroy',[AdminUsersController::class,'destroy'])->name('admin.users.destroy');

    //Admin inventory
    Route::get('/admin/inventory/addIngredients',[InventoryController::class, 'create'])->name('admin.inventory.addInventory');
    Route::post('/admin/inventory/addIngredients/store',[InventoryController::class, 'store'])->name('admin.inventory.store');

    Route::get('/admin/inventory/{inv_id}/editIngredients',[InventoryController::class, 'edit'])->name('admin.inventory.editIngredient');
    Route::put('/admin/inventory/{inv_id}/update',[InventoryController::class, 'update'])->name('admin.inventory.update');

    Route::delete('/admin/inventory/{inv_id}/destroy', [InventoryController::class,'destroy'])->name('admin.inventory.destroy');



});

require __DIR__.'/adminauth.php';
