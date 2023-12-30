<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class KlassController extends Controller
{
    public function index(Request $request)
    {
        $classes = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id',Role::STUDENT);
        });

        $classes = $classes->paginate(5);

        return view('class.index', compact('classes'));
    }

    public function create()
    {
        return view('class.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $classes = new User();
        $classes->name = $request->name;

        $classes->save();
        $classes->roles()->sync(Role::STUDENT);

        return redirect('/classes/create');
    }
    function edit($id)
    {

        $data['classes'] = User::find($id);
        return view("class.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "name" => ['required'],
            "section_id" => ['required'],
        ]);
        $classes = User::find($id)();
        $classes->name = $request->name;
        $classes->section_id = $request->section_id;

        $classes->save();
        $classes->roles()->sync(Role::STUDENT);

    }

    function delete($data)
    {
        try {
            User::findOrFail($data)->delete();
            return to_route('class.index')->with('success', 'The Class Successfully deleted');
        } catch (Exception $e) {
            return to_route('class.index')->with('error', $e->getMessage());
        }
    }
}
