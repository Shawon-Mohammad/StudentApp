<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        $sections = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id',Role::STUDENT);
        });
        $sections = $sections->paginate(5);

        return view('section.index', compact('sections'));
    }

    public function create()
    {
        return view('section.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $sections = new User();
        $sections->name = $request->name;


        $sections->save();
        $sections->roles()->sync(Role::STUDENT);

        return redirect('/sections/create');
    }
    function edit($id)
    {

        $data['sections'] = User::find($id);
        return view("section.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],
        ]);
        $sections = User::find($id)();
        $sections->name = $request->name;

        $sections->save();
        $sections->roles()->sync(Role::STUDENT);

    }

    function delete($data)
    {
        try {
            User::findOrFail($data)->delete();
            return to_route('sections.index')->with('success', 'The Sections Successfully deleted');
        } catch (Exception $e) {
            return to_route('sections.index')->with('error', $e->getMessage());
        }
    }
}
