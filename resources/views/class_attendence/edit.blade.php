@extends('layouts.admin')
@section('title')
Class Attendence Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New Class Attendence</h3>
                        <div class="card-tools">
                            <a href="{{ route('class_attendence.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('class_attendence.update' , $class_attendence->id) }}">
                            @csrf

                            <div class="form-group mb-3">
                                <select name="class_id" id="class_id">
                                    @foreach ($classes as $class)
                                    <option value="{{$class->id}}" {{old("class_id",$class->id) == $class->id ? "selected":" "}}>{{$class->name}}</option>
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
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter is_present" id="is_present"
                                    name="is_present">
                                @error('is_present')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter is_holiday" id="is_holiday"
                                    name="is_holiday">
                                @error('is_holiday')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter date" id="date"
                                    name="date">
                                @error('date')
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
