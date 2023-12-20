<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::query();
        if($request->filled('search') ){
            $roles = $roles->where('title','like','%'.$request->search);
        }
        if($request->filled('from_date') && $request->filled('to_date') ){
            $roles = $roles->whereDate('created_at','>',$request->from_date)
            ->whereDate('created_at','<',$request->to_date);
        }
        $roles=$roles->paginate(1);

        return view('roles.index', compact('roles'));
        }

    public function create()
    {
        return view('roles.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $role = Role::create([
                'title' => $request->title
            ]);
            return to_route('roles.index')->with('success', 'The Role Successfully Created');
        } catch (Exception $e) {
            return to_route('roles.index')->with('error', $e->getMessage());
        }
    }
    function edit($id)
    {

        $data['role'] = Role::findOrFail($id);
        $data['permissions'] = Permission::all();
        return view("roles.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);
    }

    function delete($data)
    {
        try {
            Role::findOrFail($data)->delete();
            return to_route('roles.index')->with('success', 'The Role Successfully deleted');
        } catch (Exception $e) {
            return to_route('roles.index')->with('error', $e->getMessage());
        }
    }
}
