@extends('layouts.admin')
@section('title')
Book Create
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Create New Book</h3>
                        <div class="card-tools">
                            <a href="{{ route('books.index') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-list"></i> List
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('books.update' , $book->id) }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" placeholder="author_id" id="author_id"
                                    name="author_id" value="{{ $class->author_id }}">
                                @error('author_id')
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
