<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\InsertUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $users = User::paginate(10);

        return view('user.listUsers', compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }


    public function show(User $user)
    {
        return view('user.detail', compact('user'));
    }


    public function store(InsertUserRequest $request)
    {        
        $request->insertUser($request);

        return redirect()->route('users.index');
    }


    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $request->updateUser($request, $user);

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
