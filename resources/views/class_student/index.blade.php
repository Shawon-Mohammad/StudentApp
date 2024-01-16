@extends('layouts.admin')
@section('title')
Class Student
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Classes Student</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>class</th>
                                    <th>student</th>
                                    <th>section</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($class_students as $class_student)
                                    <tr>
                                        <td>{{ $class_student->id }}</td>
                                        <td>{{ $class_student->klass->name }}</td>
                                        <td>{{ $class_student->student->name }}</td>
                                        <td>{{ $class_student->klass->section->name }}</td>
                                        <td>{{ $class_student->created_at }}</td>
                                        <td>{{ $class_student->updated_at }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('class_students.edit', $class_student->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('class_students.delete', $class_student->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $class_students->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
