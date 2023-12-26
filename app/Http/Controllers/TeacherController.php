<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $teachers = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id',Role::TEACHER);
        });
        // if($request->filled('search') ){
        //     $teachers = $teachers->where('user_name','like','%'.$request->search);
        // }
        // if($request->filled('from_date') && $request->filled('to_date') ){
        //     $teachers = $teachers->whereDate('created_at','>',$request->from_date)
        //     ->whereDate('created_at','<',$request->to_date);
        // }
        $teachers=$teachers->paginate(5);

        return view('teacher.index', compact('teachers'));
        }

    public function create()
    {
        return view('teacher.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;

        $teacher->save();
        $teacher->roles()->sync(Role::TEACHER);


        return redirect('/teachers/create');
    }
    function edit($id)
    {

        $data['roles'] = User::find($id);
        return view("teacher.edit", $data);
    }
    function update(Request $request,$id)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],
        ]);
        $teacher = User::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = $request->password;
        $teacher->save();

        $teacher->roles()->sync(Role::TEACHER);

    }

    function delete($data)
    {
        try {
            User::findOrFail($data)->delete();
            return to_route('teachers.index')->with('success', 'The Teacher Successfully deleted');
        } catch (Exception $e) {
            return to_route('teachers.index')->with('error', $e->getMessage());
        }
    }
}
