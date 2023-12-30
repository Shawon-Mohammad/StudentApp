<?php

namespace App\Http\Controllers;

use App\Models\klass;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class KlassController extends Controller
{
    public function index(Request $request)
    {
        $classes = klass::query();

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
        $class = new klass();
        $class->name = $request->name;
        $class->section_id = $request->section_id;

        $class->save();

        return redirect('/classes/create');
    }
    function edit($id)
    {

        $data['classes'] = klass::find($id);
        return view("class.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "name" => ['required'],
            "section_id" => ['required'],
        ]);
        $class = klass::find($id)();
        $class->name = $request->name;
        $class->section_id = $request->section_id;

        $class->save();

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
