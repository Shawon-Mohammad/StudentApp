@extends('layouts.admin')
@section('title')
Student Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New Students</h3>
                        <div class="card-tools">
                            <a href="{{ route('students.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('students.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="name" id="name"
                                    name="name">
                                @error('name')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter email" id="email"
                                    name="email">
                                @error('email')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter password" id="password"
                                    name="password">
                                @error('password')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
