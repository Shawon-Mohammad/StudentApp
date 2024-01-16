<?php

namespace App\Http\Controllers;

use App\Models\klass;
use App\Models\Section;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class KlassController extends Controller
{
    public function index(Request $request)
    {
        $classes = Klass::query();

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
            "section_id" => ['required'],

        ]);
        $class = new Klass();
        $class->name = $request->name;
        $class->section_id = $request->section_id;

        $class->save();

        return redirect('/classes/create');
    }
    function edit($id)
    {

        $data['klass'] = klass::find($id);
        $data['sections'] = Section::all();

        return view("class.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "name" => ['required'],
            "section_id" => ['required'],
        ]);
        $class = Klass::find($id);
        $class->name = $request->name;
        $class->section_id = $request->section_id;

        $class->save();
        return redirect('/classes');

    }

    function delete($data)
    {
        try {
            klass::findOrFail($data)->delete();
            return to_route('class.index')->with('success', 'The Class Successfully deleted');
        } catch (Exception $e) {
            return to_route('class.index')->with('error', $e->getMessage());
        }
    }
}
