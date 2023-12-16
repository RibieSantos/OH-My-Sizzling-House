<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function show(){
        $ingredients = Inventory::all();
        return view('admin.inventory',['ingredients'=>$ingredients]);
    }
    public function create(){
        return view('admin.inventory.addIngredient');
    }
    public function store(Request $request){
        $ingredients = $request->validate([
            'ing_title'=>'required|string', 
            'ing_desc'=>'required|string', 
            'ing_qty'=>'required|integer', 
            ]);

        Inventory::create($ingredients);
        return redirect(route('admin.inventory'))->with('success','Ingredient items is successfully added!');
    }
    public function edit(Inventory $inv_id){
        return view('admin.inventory.editIngredient',['inventory'=>$inv_id]);
    }
    public function update(Request $request, Inventory $inv_id){
        $ingredients = $request->validate([
            'ing_title'=>'required|string', 
            'ing_desc'=>'required|string', 
            'ing_qty'=>'required|integer', 
            ]);
            $inv_id->update($ingredients);
        return redirect(route('admin.inventory'))->with('success', 'Ingredient item is successfully updated!');
    }
    public function destroy(Inventory $inv_id)
    {
        $inv_id->delete();
        return redirect(route('admin.inventory'))->with('success', 'Ingredient item is successfully deleted!');
    }
}
