<?php

namespace App\Http\Controllers;

use App\Models\ClassStudent;
use App\Models\Klass;
use App\Models\Role;
use App\Models\Section;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClassStudentController extends Controller
{
    public function index(Request $request)
    {
        $class_students = ClassStudent::query();

        $class_students = $class_students->paginate(5);

        return view('class_student.index', compact('class_students'));
    }

    public function create()
    {
        $classes = Klass::all();
        $students = $students = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id', Role::STUDENT);
        })->get();
        return view('class_student.create',compact('students','classes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "class_id" => ['required'],
            "student_id" => ['required'],

        ]);
        $class_student = new ClassStudent();
        $class_student->class_id = $request->class_id;
        $class_student->student_id = $request->student_id;

        $class_student->save();

        return redirect('/class_students/create');
    }
    function edit($id)
    {

        $data['class_student'] = ClassStudent::find($id);
        $data['klasses'] = Klass::all();
        $data['students'] = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id', Role::STUDENT);
        })->get();
        $data['klasses'] = Klass::all();
        $data['sections'] = Section::all();

        return view("class_student.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "class_id" => ['required'],
            "student_id" => ['required'],

        ]);
        $class_student = ClassStudent::find($id);
        $class_student->class_id = $request->class_id;
        $class_student->student_id = $request->student_id;


        $class_student->save();
        return redirect('/class_students');
    }

    function delete($data)
    {
        try {
            ClassStudent::findOrFail($data)->delete();
            return to_route('class_student.index')->with('success', 'The Class Student Successfully deleted');
        } catch (Exception $e) {
            return to_route('class_student.index')->with('error', $e->getMessage());
        }
    }
}
