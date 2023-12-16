<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function show(){
        $category = Category::all();
        return view('admin.category',['category'=>$category]);
    }
    public function create(){
        return view('admin.category.addCat');
    }
    public function store(Request $request){
        $data = $request->validate([
            'cat_title'=> 'required|string|max:50',
            'cat_desc'=> 'required|string|max:50'
        ]);

        $newCat = Category::create($data);
        return redirect(route('admin.category'))->with('success','Category item is successfully added!');

    }

    public function edit(Category $cat_id){
        return view('admin.category.editCat',['category' =>$cat_id]);
    }
    public function update(Category $cat_id, Request $request){
        $data = $request->validate([
            'cat_title'=> 'required|string|max:50',
            'cat_desc'=> 'required|string|max:50'
        ]);
        $cat_id->update($data);
        return redirect(route('admin.category'))->with('success', 'Category item is successfully updated!');
    }
    public function destroy(Category $cat_id)
    {
        $cat_id->delete();
        return redirect(route('admin.category'))->with('success', 'Category item is successfully deleted!');
    }
}
