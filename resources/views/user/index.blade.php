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
                        <h3 class="card-title">Users</h3>

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
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        {{-- <td>{{ $user->password }}</td> --}}
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-success" href="{{ route('users.edit', $user->id) }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ route('users.delete', $user->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
