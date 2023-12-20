@extends('layouts.admin')
@section('title')
    User Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New User</h3>
                        <div class="card-tools">
                            <a href="{{ route('user.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter user name" id="user_name"
                                    name="user_name">
                                @error('user_name')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter first name" id="first_name"
                                    name="first_name">
                                @error('first_name')
                                    <div class="alert alert-danger mt-1"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="Enter last name" id="last_name"
                                    name="last_name">
                                @error('last_name')
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
                                <input type="password" class="form-control" placeholder="Enter password" id="password"
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
