<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id',Role::STUDENT);
        });
        // if ($request->filled('search')) {
        //     $students = $students->where('user_name', 'like', '%' . $request->search);
        // }
        // if ($request->filled('from_date') && $request->filled('to_date')) {
        //     $students = $students->whereDate('created_at', '>', $request->from_date)
        //         ->whereDate('created_at', '<', $request->to_date);
        // }
        $students = $students->paginate(5);

        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $student = new User();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;

        $student->save();
        $student->roles()->sync(Role::STUDENT);

        return redirect('/students/create');
    }
    function edit($id)
    {

        $data['student'] = User::find($id);
        return view("student.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],
        ]);
        $student = User::find($id)();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->password = $request->password;

        $student->save();
        $student->roles()->sync(Role::STUDENT);

    }

    function delete($data)
    {
        try {
            User::findOrFail($data)->delete();
            return to_route('students.index')->with('success', 'The Student Successfully deleted');
        } catch (Exception $e) {
            return to_route('students.index')->with('error', $e->getMessage());
        }
    }
}
