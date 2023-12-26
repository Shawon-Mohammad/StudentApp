<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{


    function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    function create()
    {
        $users  = User::Orderby('user_name', 'asc')->paginate(10);
        return view('users.create', compact('users'));
    }

    function store(Request $request)
    {

        $request->validate([
            "user_name" => ['required'],
            "first_name" => ['required'],
            "last_name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $user = new User();
        $user->user_name = $request->user_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/users/create');
    }

    function delete($data)
    {
        User::findOrFail($data)->delete();
        return back()->with('success', 'User Deleted Successfully');
    }


    function edit($data)
    {
        return view('users.edit', [
            'users' =>  User::findOrFail($data),
        ]);
    }

    function update(Request $request)
    {
        $user = User::findOrFail($request->category_id);
        $user->user_name = $request->user_name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return back()->with('success', 'User Deleted Successfully');
    }
}
