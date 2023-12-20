<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{


    function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    function create()
    {
        $roles  = Role::Orderby('user_name', 'asc')->paginate(10);
        return view('roles.create', compact('roles'));
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
        $role = new Role();
        $role->user_name = $request->user_name;
        $role->first_name = $request->first_name;
        $role->last_name = $request->last_name;
        $role->email = $request->email;
        $role->password = $request->password;

        $role->save();

        return redirect('/roles/create');
    }

    function delete($data)
    {
        Role::findOrFail($data)->delete();
        return back()->with('success', 'Category Deleted Successfully');
    }


    function edit($data)
    {
        return view('roles.edit', [
            'roles' =>  Role::findOrFail($data),
        ]);
    }

    function update(Request $request)
    {
        $role = Role::findOrFail($request->category_id);
        $role->user_name = $request->user_name;
        $role->first_name = $request->first_name;
        $role->last_name = $request->last_name;
        $role->email = $request->email;
        $role->password = $request->password;
        $role->save();

        return back()->with('success', 'Role Deleted Successfully');
    }
}
