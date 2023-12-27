<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()->whereHas('roles', function (Builder $query) {
            $query->where('id',Role::TEACHER);
        });

        $users=$users->paginate(5);

        return view('user.index', compact('users'));
        }

    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();
        $user->roles()->sync(Role::TEACHER);


        return redirect('/users/create');
    }
    function edit($id)
    {

        $data['roles'] = User::find($id);
        return view("user.edit", $data);
    }
    function update(Request $request,$id)
    {
        $request->validate([
            "name" => ['required'],
            "email" => ['required'],
            "password" => ['required'],
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        $user->roles()->sync(Role::TEACHER);

    }

    function delete($data)
    {
        try {
            User::findOrFail($data)->delete();
            return to_route('users.index')->with('success', 'The User Successfully deleted');
        } catch (Exception $e) {
            return to_route('users.index')->with('error', $e->getMessage());
        }
    }
}
