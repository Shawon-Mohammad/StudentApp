<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = Teacher::query();
        if($request->filled('search') ){
            $teachers = $teachers->where('title','like','%'.$request->search);
        }
        if($request->filled('from_date') && $request->filled('to_date') ){
            $teachers = $teachers->whereDate('created_at','>',$request->from_date)
            ->whereDate('created_at','<',$request->to_date);
        }
        $teachers=$teachers->paginate(1);

        return view('teacher.index', compact('teachers'));
        }

    public function create()
    {
        return view('teacher.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "user_name" => ['required'],
            "first_name" => ['required'],
            "last_name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $teacher = new Teacher();
        $teacher->user_name = $request->user_name;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;

        $teacher->save();

        return redirect('/teacher/create');
    }
    function edit($id)
    {

        $data['role'] = Role::findOrFail($id);
        $data['permissions'] = Permission::all();
        return view("teacher.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "user_name" => ['required'],
            "first_name" => ['required'],
            "last_name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],
        ]);
    }

    function delete($data)
    {
        try {
            Role::findOrFail($data)->delete();
            return to_route('teacher.index')->with('success', 'The Teacher Successfully deleted');
        } catch (Exception $e) {
            return to_route('teacher.index')->with('error', $e->getMessage());
        }
    }
}
