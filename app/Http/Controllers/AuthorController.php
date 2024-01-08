<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(Request $request)
    {
        $authors = Author::query();

        $authors = $authors->paginate(5);

        return view('author.index', compact('authors'));
    }

    public function create()
    {
        return view('author.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],

        ]);
        $author = new Author();
        $author->name = $request->name;

        $author->save();

        return redirect('/authors/create');
    }
    function edit($id)
    {

        $data['authors'] = Author::find($id);
        return view("author.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "name" => ['required'],
        ]);
        $author = Author::find($id)();
        $author->name = $request->name;

        $author->save();

    }

    function delete($data)
    {
        try {
            Author::findOrFail($data)->delete();
            return to_route('author.index')->with('success', 'The Author Successfully deleted');
        } catch (Exception $e) {
            return to_route('author.index')->with('error', $e->getMessage());
        }
    }
}
