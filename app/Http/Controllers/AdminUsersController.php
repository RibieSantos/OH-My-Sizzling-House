<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    public function create(){
        return view('admin.users.addUser');
    }

    public function store(Request $request){
        $request->validate([
            'fname' => ['required', 'string', 'max:30'],
            'lname' => ['required', 'string', 'max:30'],
            'gender' => ['required', 'string'],
            'contact' => ['required','numeric', 'min:11'],
            'address' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100'],
            'pass' => ['required', 'min:8'],
        ]);

        $adminUser = Admin::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->pass),
        ]);
        return redirect(route('admin.user'))->with('success','Admin item is successfully added!');
    }

    public function destroy(Admin $admin_id){
        $admin_id->delete();
        return redirect(route('admin.user'))->with('success','Admin item is successfully deleted!');
    }
}
