<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::query();

        $books = $books->paginate(5);

        return view('book.index', compact('books'));
    }

    public function create()
    {
        return view('book.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "author_id" => ['required'],

        ]);
        $book = new Book();
        $book->author_id = $request->author_id;

        $book->save();

        return redirect('/books/create');
    }
    function edit($id)
    {

        $data['books'] = Book::find($id);
        return view("book.edit", $data);
    }
    function update(Request $request, $id)
    {
        $request->validate([
            "author_id" => ['required'],
        ]);
        $book = Book::find($id)();
        $book->author_id = $request->author_id;

        $book->save();

    }

    function delete($data)
    {
        try {
            Book::findOrFail($data)->delete();
            return to_route('book.index')->with('success', 'The Book Successfully deleted');
        } catch (Exception $e) {
            return to_route('book.index')->with('error', $e->getMessage());
        }
    }
}
