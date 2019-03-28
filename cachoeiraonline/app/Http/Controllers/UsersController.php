<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $users = User::all();

        return view('dashboard.users.index',['users' => $users]);

    }

    public function store(){

        return view('dashboard.users.store');

    }

    public function new(Request $request){

        $userData = $request->all();
        $userData['password'] = bcrypt($userData['password']);

        $user = new User();

        $user->create($userData);

        return redirect()->route('user.index');
    }

    public function edit($id){

        $user = User::findOrFail($id);

        return view('dashboard.users.edit',['user'=> $user]);

    }

    public function update(Request $request, $id){

        $user = User::findOrFail($id);

        $userData = $request->all();

        if(isset($userData['password'])){

            $userData['password'] = bcrypt($userData['password']);

        }else{

            $userData['password'] = $user->password;

        }

        $user->update($userData);


        return redirect()->back();

    }

    public function remove($id){

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index');
    }
}
