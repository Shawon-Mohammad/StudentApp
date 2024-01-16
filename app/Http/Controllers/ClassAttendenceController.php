<?php

namespace App\Http\Controllers;

use App\Models\ClassAttendence;
use App\Models\Klass;
use App\Models\Role;
use App\Models\Section;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClassAttendenceController extends Controller
{
    public function index(Request $request)
    {
        $class_attendences = ClassAttendence::query();

        $class_attendences = $class_attendences->paginate(5);

        return view('class_attendence.index', compact('class_attendences'));
    }

    public function create()
    {
        $classes = Klass::all();
        $students = $students = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id', Role::STUDENT);
        })->get();
        return view('class_attendence.create',compact('students','classes'));
    }
    public function store(Request $request)
    {
        $request->validate([
            "class_id" => ['required'],
            "student_id" => ['required'],
            "is_present" => ['required'],
            "is_holiday" => ['required'],
            "date" => ['required'],

        ]);
        $class_attendence = new ClassAttendence();
        $class_attendence->class_id = $request->class_id;
        $class_attendence->student_id = $request->student_id;
        $class_attendence->is_present = $request->is_present;
        $class_attendence->is_holiday = $request->is_holiday;
        $class_attendence->date = $request->date;

        $class_attendence->save();

        return redirect('/class_attendences/create');
    }
    function edit($id)
    {

        $data['klass'] = ClassAttendence::find($id);
        $data['sections'] = Section::all();

        return view("class_attendence.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "class_id" => ['required'],
            "student_id" => ['required'],
            "is_present" => ['required'],
            "is_holiday" => ['required'],
            "date" => ['required'],
        ]);
        $class_attendence = ClassAttendence::find($id);
        $class_attendence->class_id = $request->class_id;
        $class_attendence->student_id = $request->student_id;
        $class_attendence->is_present = $request->is_present;
        $class_attendence->is_holiday = $request->is_holiday;
        $class_attendence->date = $request->date;

        $class_attendence->save();
        return redirect('/class_attendences');

    }

    function delete($data)
    {
        try {
            ClassAttendence::findOrFail($data)->delete();
            return to_route('class_attendence.index')->with('success', 'The Class Attendence Successfully deleted');
        } catch (Exception $e) {
            return to_route('class_attendence.index')->with('error', $e->getMessage());
        }
    }
}
