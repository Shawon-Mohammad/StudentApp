<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::query();
        if($request->filled('search') ){
            $permissions = $permissions->where('title','like','%'.$request->search);
        }
        if($request->filled('from_date') && $request->filled('to_date') ){
            $permissions = $permissions->whereDate('created_at','>',$request->from_date)
            ->whereDate('created_at','<',$request->to_date);
        }
        $permissions=$permissions->paginate(5);
        return view('permissions.index', compact('permissions'));
    }


    public function create()
    {
        return view('permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        try {
            $permission = Permission::create([
                'title' => $request->title
            ]);
            return to_route('permissions.index')->with('success', 'The Permission Successfully Created');
        } catch (Exception $e) {
            return to_route('permissions.index')->with('error', $e->getMessage());
        }
    }
    function edit($data)
    {

        $permission = Permission::findOrFail($data);
        return view("permissions.edit", compact('permission'));
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
            Permission::findOrFail($data)->delete();
            return to_route('permissions.index')->with('success', 'The Permission Successfully deleted');
        } catch (Exception $e) {
            return to_route('permissions.index')->with('error', $e->getMessage());
        }
    }
}
