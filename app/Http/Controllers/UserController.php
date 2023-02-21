<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
