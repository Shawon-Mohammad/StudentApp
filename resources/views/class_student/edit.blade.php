@extends('layouts.admin')
@section('title')
Class Student Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create Student New Class</h3>
                        <div class="card-tools">
                            <a href="{{ route('class_students.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('class_students.update' , $class_student->id) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <select name="class_id" id="class_id">
                                    @foreach ($klasses as $klass)
                                    <option value="{{$klass->id}}" {{old("class_id",$klass->id) == $klass->id ? "selected":" "}}>{{$klass->name}}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <select name="student_id" id="student_id">
                                    @foreach ($students as $student)
                                    <option value="{{$student->id}}" {{old("student_id",$student->student_id) == $student->id ? "selected":" "}}>{{$student->name}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
