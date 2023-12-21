<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::query();
        if($request->filled('search') ){
            $students = $students->where('title','like','%'.$request->search);
        }
        if($request->filled('from_date') && $request->filled('to_date') ){
            $students = $students->whereDate('created_at','>',$request->from_date)
            ->whereDate('created_at','<',$request->to_date);
        }
        $students=$students->paginate(1);

        return view('student.index', compact('students'));
        }

    public function create()
    {
        return view('student.create');
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
        $student = new Student();
        $student->user_name = $request->user_name;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->password = $request->password;

        $student->save();

        return redirect('/student/create');
    }
    function edit($id)
    {

        $data['role'] = Role::findOrFail($id);
        $data['permissions'] = Permission::all();
        return view("student.edit", $data);
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
            return to_route('student.index')->with('success', 'The Student Successfully deleted');
        } catch (Exception $e) {
            return to_route('student.index')->with('error', $e->getMessage());
        }
    }
}
