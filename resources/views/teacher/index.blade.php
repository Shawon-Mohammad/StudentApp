@extends('layouts.admin')
@section('title')
    Teacher
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Teachers</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>user_name</th>
                                    <th>first_name</th>
                                    <th>last_name</th>
                                    <th>email</th>
                                    {{-- <th>password</th> --}}
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->user_name }}</td>
                                        <td>{{ $teacher->first_name }}</td>
                                        <td>{{ $teacher->last_name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        {{-- <td>{{ $teacher->password }}</td> --}}
                                        <td>{{ $teacher->created_at }}</td>
                                        <td>{{ $teacher->updated_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('teachers.edit', $teacher->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('teachers.delete', $teacher->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
