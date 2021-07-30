<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {

        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $request->flash();
        $search =  $request->input('search');

        if($search!=""){
            $users =  User::where('name', 'like', '%'.$search.'%');
        }
        else{
            $users = User::all();
        }

        return view('users.index', compact('users'));

    }

    public function create()
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $roles = Role::pluck('title', 'id');

        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {

        $user = User::create($request->validated());

        $user->forceFill([
            'password' => Hash::make($request->get('password')),
        ])->save();

        //dd($request->input('roles', []));

        return redirect()->route('users');
    }

    public function show(User $user)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$roles = Role::pluck('title', 'id');

        //$user->load('roles');

        return view('users.edit', compact('user'));
    }

    public function update(\App\Models\User $user)
    {

        $data = \request()->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => '',
            'password' => 'required',
            'phone' => 'required',
            'postal_code' => 'required'
        ]);

//        dd($data);

        $user->update(array_merge($data,[
            'password' => Hash::make(\request()->get('password')),
        ]));


        //$user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        //abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();

        return redirect()->route('users.index');
    }
}

