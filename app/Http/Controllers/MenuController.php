<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Events;

class MenuController extends Controller
{
    public function show()
    {
        $menuItem = Menu::all();
        $event = Events::all();
        $CatItem = Category::all();
        return view('admin.menu', ['menu' => $menuItem, 'category' => $CatItem,'event'=>$event]);
    }

    public function create()
    {
        $CatItem = Category::all();
        $event = Events::all();
        return view('admin.menu.addMenu', ['category' => $CatItem,'event'=>$event]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_image' => 'required|file',
            'menu_title' => 'required|string',
            'menu_description' => 'required|string',
            'menu_price' => 'required|decimal:2,4',
            'menu_cat' => 'numeric',
            'event_id'=>'',
        ]);

        // Uploading Menu Image
        $filename = '';

        if ($request->hasFile('menu_image')) {
            $filename = $request->getSchemeAndHttpHost() . '/assets/foods/' . time() . '.' . $request->menu_image->extension();
            $request->menu_image->move(public_path('assets/foods/'), $filename);
        }
        // $image = $request->file('menu_image')->getClientOriginalExtension();
        // $request->file('menu_image')->store('public/foods/');
        // $menu = new Menu();
        // $menu->menu_image = $image;
        // $menu->save();

        $newMenu = Menu::create([
            'menu_image' => $filename,
            'menu_title' => $request->menu_title,
            'menu_description' => $request->menu_description,
            'menu_price' => $request->menu_price,
            'menu_cat' => $request->menu_cat,
            'event_id' => $request->event_id,
        ]);
        return redirect(route('admin.adminMenu'))->with('success', 'Menu item is successfully added!');
    }

    public function edit(Menu $id)
    {
        $CatItem = Category::all();
        $event = Events::all();
        return view('admin.menu.editMenu', ['menu' => $id, 'category' => $CatItem,'event'=>$event]);
    }

    public function update(Menu $id, Request $request)
    {
        $data = $request->validate([
            'menu_title' => 'required|string',
            'menu_description' => 'required|string',
            'menu_price' => 'required|decimal:2,4',
            'menu_cat' => 'required|string',
            'menu_status' => 'required|string',
            'event_id'=>'',
        ]);

        // Check if a new menu_image was uploaded
        if ($request->hasFile('menu_image')) {
            // Delete the previous menu image
            if ($id->menu_image) {
                // Remove the scheme and host from the menu image URL
                $previousImage = str_replace($request->getSchemeAndHttpHost(), '', $id->menu_image);
                // Delete the previous image file
                if (file_exists(public_path($previousImage))) {
                    unlink(public_path($previousImage));
                }
            }

            // Upload the new menu image
            $filename = $request->getSchemeAndHttpHost() . '/assets/foods/' . time() . '.' . $request->menu_image->extension();
            $request->menu_image->move(public_path('assets/foods/'), $filename);
            $data['menu_image'] = $filename;
        }

        $id->update($data);
        return redirect(route('admin.adminMenu'))->with('success', 'Menu item is successfully updated!');
    }

    public function destroy(Menu $id)
    {
        $id->delete();
        return redirect(route('admin.adminMenu'))->with('success', 'Menu item is successfully deleted!');
    }
    
}
