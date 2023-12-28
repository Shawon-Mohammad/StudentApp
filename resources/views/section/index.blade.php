@extends('layouts.admin')
@section('title')
    Section
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Section</h3>
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
                                @foreach ($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->created_at }}</td>
                                        <td>{{ $section->updated_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('sections.edit', $section->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('sections.delete', $section->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $sections->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
