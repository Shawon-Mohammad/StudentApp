@extends('layouts.admin')
@section('title')
    User
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">User</h3>
                        <div class="card-tools">
                            <a href="{{ route('user.create') }}" class="btn btn-tool btn-primary bg-primary">
                                <i class="fas fa-plus"></i>Add New
                            </a>

                        </div>
                        <form class="form-inline ml-5" action="{{ route('user.index') }}">
                            @csrf

                        </form>
                    </div>
                    <div class="card-body table-responsive p-0 pt-4">
                        {{-- <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead> --}}
                        {{ $dataTable->table() }}
                        {{-- <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            @can('edit_user')
                                                <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                <button type="button" class="btn btn-tool btn-primary bg-primary"
                                                    onclick="editUser('{{ $user->id }}','{{ $user->name }}','{{ $user->email }}')">
                                                    Edit Modal
                                                </button>
                                            @endcan
                                            @can('delete_user')
                                                <a class="btn btn-danger"
                                                    href="{{ route('user.delete', $user->id) }}">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> --}}
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
