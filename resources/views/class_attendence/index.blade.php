@extends('layouts.admin')
@section('title')
Class Attendence
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Classe Attendence</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Class</th>
                                    <th>Student</th>
                                    <th>Present</th>
                                    <th>Holiday</th>
                                    <th>Date</th>
                                    {{-- <th>Created at</th>
                                    <th>Updated at</th> --}}
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($class_attendences as $class_attendence)
                                    <tr>
                                        <td>{{ $class_attendence->id }}</td>
                                        <td>{{ $class_attendence->klass->name }}</td>
                                        <td>{{ $class_attendence->student->name}}</td>
                                        <td>{{ $class_attendence->is_present ? "Yes" : "No" }}</td>
                                        <td>{{ $class_attendence->is_holiday ? "Yes" : "No" }}</td>
                                        <td>{{ $class_attendence->date }}</td>
                                        {{-- <td>{{ $class_attendence->created_at }}</td>
                                        <td>{{ $class_attendence->updated_at }}</td> --}}
                                        <td class="text-center">
                                            <a class="btn btn-success"
                                                href="{{ route('class_attendences.edit', $class_attendence->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('class_attendences.delete', $class_attendence->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $class_attendences->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
