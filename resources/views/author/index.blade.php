@extends('layouts.admin')
@section('title')
Author
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Authors</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author->id }}</td>
                                        <td>{{ $author->name }}</td>
                                        <td>{{ $author->created_at }}</td>
                                        <td>{{ $author->updated_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('authors.edit', $author->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('authors.delete', $author->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $authors->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
