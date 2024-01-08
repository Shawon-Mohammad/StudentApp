@extends('layouts.admin')
@section('title')
Book
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Books</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>author_id</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->author_id }}</td>
                                        <td>{{ $book->created_at }}</td>
                                        <td>{{ $book->updated_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('books.edit', $book->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('books.delete', $book->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
