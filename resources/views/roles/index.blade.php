@extends('layouts.admin')
@section('title')
    Role
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0 bg-info">
                        <h3 class="card-title">Roles</h3>

                        <form class="form-inline ml-5" action="{{ route('roles.index') }}">
                            @csrf
                            <div class="row">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" name="search"
                                        placeholder="Search" aria-label="Search" value="{{ request()->search }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="input-group date" id="from_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="from_date"
                                        data-target="#from_date"value="{{ request()->from_date }}">
                                    <div class="input-group-append" data-target="#from_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <div class="input-group date" id="to_date" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="to_date"
                                        data-target="#to_date" value="{{ request()->to_date }}">
                                    <div class="input-group-append" data-target="#to_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body table-responsive p-0 pt-4">
                        <table id="roles_table" class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->title }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td>{{ $role->updated_at }}</td>
                                        <td>
                                            @can('edit_role')
                                                <a class="btn btn-success" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                            @endcan
                                            @can('delete_role')
                                                <a class="btn btn-danger"
                                                    href="{{ route('roles.delete', $role->id) }}">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $roles->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('roles.partials.create')
    @include('roles.partials.edit')
@endsection

