@extends('layouts.admin')
@section('title')
Class Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New Class</h3>
                        <div class="card-tools">
                            <a href="{{ route('classes.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('classes.update' , $klass->id) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="name" id="name"
                                    name="name" value="{{old("name",$klass->name) }}">
                                @error('name')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <select name="section_id" id="section_id">
                                    @foreach ($sections as $section)
                                    <option value="{{$section->id}}" {{old("section_id",$klass->section_id) == $section->id ? "selected":" "}}>{{$section->name}}</option>
                                    @endforeach
                                </select>
                                @error('section_id')
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
