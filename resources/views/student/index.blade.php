@extends('layouts.admin')
@section('title')
    Student
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Students</h3>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    {{-- <th>password</th> --}}
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        {{-- <td>{{ $student->password }}</td> --}}
                                        <td>{{ $student->created_at }}</td>
                                        <td>{{ $student->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route('students.edit', $student->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('students.delete', $student->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
